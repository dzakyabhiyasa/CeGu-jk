<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visitors = Visitor::with('booking.room.building')->where('booking_id', $request->input('bookingId'))->get();

        // dd($visitors);

        return view('visitor.index')->with([
            'visitors' => $visitors,
            'bookingId' => $request->input('bookingId')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('visitor.create')->with([
            'bookingId' => $request->input('bookingId')
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
        Visitor::create($request->all());
        return redirect()->route('visitor.index', ['bookingId' => $request->input('booking_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor, Request $request)
    {
        return view('visitor.edit')->with([
            'bookingId' => $request->input('bookingId'),
            'visitor' => $visitor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        $visitor->update($request->all());
        
        return redirect()->route('visitor.index', ['bookingId' => $request->input('booking_id')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor, Request $request)
    {
        $visitor->delete();   
        return redirect()->route('visitor.index',['bookingId' => $request->input('bookingId')]);
    }
}
