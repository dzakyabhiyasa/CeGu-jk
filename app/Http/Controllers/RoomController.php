<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\room;
use App\Models\Building;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = room::get();

        return view('ruangan.index')->with([
            'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::get();

        return view('ruangan.create')->with([
            'buildings' => $buildings
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        room::create($request->all());
        return redirect()->route('ruangan.index');
    }

    public function detail(Request $request, $id)
    {
        $room = room::find($id);

        if ($request->query('order') !== null) {
            $bookings = Booking::with('user')->where('room_id', $id)->where('status', 'accept')->orderBy('created_at', $request->query('order'))->get();
        } else {
            $bookings = Booking::with('user')->where('room_id', $id)->where('status', 'accept')->get();
        }

        return view('index.detail-room')->with([
            'room' => $room,
            'bookings' => $bookings
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $room = room::find($id);
        // dd($building->images);
        return view('ruangan.show')->with([
            'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buildings = Building::get();
        $room = room::find($id);
        return view('ruangan.edit')->with([
            'buildings' => $buildings,
            'room' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        $room->update($request->all());
        return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = room::find($id);
        $room->delete();  
        return redirect()->route('ruangan.index');
    }
}
