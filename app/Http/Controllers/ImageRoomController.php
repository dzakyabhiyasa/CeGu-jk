<?php

namespace App\Http\Controllers;

use App\Models\ImageRoom;
use Illuminate\Http\Request;

class ImageRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $path = $request->file('image')->store('public/room');

        ImageRoom::create([
            'room_id' => $request->room_id,
            'image' => $path,
        ]);

        return redirect()->route('ruangan.edit', [$request->room_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageRoom  $imageRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ImageRoom $imageRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageRoom  $imageRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageRoom $imageRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageRoom  $imageRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageRoom $imageRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageRoom  $imageRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $imageRoom = ImageRoom::find($id);
        $imageRoom->delete(); 

        return redirect()->route('ruangan.edit', [$request->room_id]);
    }
}
