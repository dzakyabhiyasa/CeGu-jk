<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utilities\Helpers;
use App\Http\Requests\Index\UpdateProfileRequest;
use App\Http\Requests\Index\UpdatePasswordRequest;
use App\Models\Building;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{

    public function landing()
    {
        return view('index.home');
    }

    public function index(Request $request)
    {

        if ($request->query('title') !== null) {
            $buildings = Building::where('name', 'like', '%'.$request->query('title').'%')->paginate(6);
        } else {
            $buildings = Building::paginate(6);
        }

        return view('index.index')->with([
            'buildings' => $buildings
        ]);
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

    public function booking()
    {
        return view('index.booking');
    }
}
