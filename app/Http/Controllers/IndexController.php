<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utilities\Helpers;
use App\Http\Requests\Index\UpdateProfileRequest;
use App\Http\Requests\Index\UpdatePasswordRequest;
use App\Models\Booking;
use App\Models\Building;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{

    public function landing()
    {

        if (!Auth::check()) {
            return view('index.home');
        }

        if (Auth::user()->role == 'admin') {
            return redirect(route('dashboard.index'));
        } else {
            return view('index.home');
        }
    }

    public function index(Request $request)
    {
        if ($request->query('title') !== null) {
            $buildings = Building::where('name', 'like', '%' . $request->query('title') . '%')->paginate(6);
        } else if ($request->query('date') !== null) {
            $buildings = Building::with('rooms.bookings')->paginate(6);
            // dd($buildings);
        } else {
            $buildings = Building::paginate(6);
        }

        return view('index.index')->with([
            'buildings' => $buildings,
            'date' => $request->query('date')
        ]);
    }

    public function admin(){
        return view('dashboard.index');
    }

    public function detail($id)
    {
        $building = Building::find($id);
        return view('index.detail')->with([
            'building' => $building
        ]);
    }

    public function profile()
    {
        return view('index.profile');
    }

    public function profilePost(UpdateProfileRequest $request)
    {
        Auth::user()->update([
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'address' => $request['address']
        ]);
        return Helpers::successRedirect('profile', 'Berhasil merubah profil !');
    }

    public function profilePassword(UpdatePasswordRequest $request)
    {
        Auth::user()->update([
            'password' => Hash::make($request['password'])
        ]);
        return Helpers::successRedirect('profile', 'Berhasil merubah password !');
    }

    public function building_to_room(Request $request){
        $room_id = $request->seat;
        return redirect(route('room.show', $room_id));
    }

    public function booking(Request $request, $building_id)
    {
        $room_id = $request->seat;
        return redirect(route('booking.form', [$building_id, $room_id]));
    }

    public function booking_form($building_id, $room_id)
    {
        return view('index.booking')->with([
            'building_id' => $building_id,
            'room_id' => $room_id
        ]);
    }

    public function booking_process(Request $request, $building_id, $room_id)
    {
        // dd($request);
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $path = $request->file('covid')->store('covid');

        //todo parsing datetime

        Booking::create([
            'room_id' => $room_id,
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'in' => $request->in,
            'out' => $request->out,
            'description' => $request->reason,
            'permission' => $path,
            'expired' => 0,
            'status' => 'booking'
        ]);

        return redirect(route('booking.index'));
    }
}
