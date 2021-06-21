<?php

namespace App\Http\Controllers;

use App\Models\ImageBuilding;
use Illuminate\Http\Request;

class ImageBuildingController extends Controller
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
        $path = $request->file('image')->store('public');

        ImageBuilding::create([
            'building_id' => $request->building_id,
            'image' => $path,
        ]);

        return redirect()->route('gedung.edit', [$request->building_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageBuilding  $imageBuilding
     * @return \Illuminate\Http\Response
     */
    public function show(ImageBuilding $imageBuilding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageBuilding  $imageBuilding
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageBuilding $imageBuilding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageBuilding  $imageBuilding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageBuilding $imageBuilding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageBuilding  $imageBuilding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $imageBuilding = ImageBuilding::find($id);
        $imageBuilding->delete(); 

        return redirect()->route('gedung.edit', [$request->building_id]);
    }
}
