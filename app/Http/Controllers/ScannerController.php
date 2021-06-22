<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Scanner;
use Illuminate\Http\Request;

class ScannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $scanners = Scanner::with('visitor')->where('booking_id', $request->input('bookingId'))->get();

        // dd($scanners);

        return view('scanner.index')->with([
            'scanners' => $scanners,
            'bookingId' => $request->input('bookingId')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scanning(Request $request)
    {
        if ($request->input('message') !== '') {
            return view('scanner.scan')->with([
                'bookingId' => $request->input('bookingId'),
                'message' => $request->input('message')
            ]);   
        } else {
            return view('scanner.scan')->with([
                'bookingId' => $request->input('bookingId')
            ]);    
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->input('visitor'));
        return view('scanner.create')->with([
            'bookingId' => $request->input('bookingId'),
            'visitor' => $request->input('visitor')
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
        if ($request->input('code') !== '' && !empty($request->input('code'))) {
            $visitor = Visitor::where('booking_id', $request->input('booking_id'))->where('no_id', $request->input('code'))->get();
            if ($visitor->count() == 1) {
                $scanner = Scanner::where('booking_id', $request->input('booking_id'))->where('visitor_id', $visitor[0]->id)->get();
                // dd($scanner);
                if ($scanner->count() == 0) {
                    return redirect()->route('scanner.create', ['bookingId' => $request->input('booking_id'), 'visitor' => $visitor->first()]);
                } else {
                    return redirect()->route('scanner.scan', ['bookingId' => $request->input('booking_id'), 'message' => 'Pengunjung telah memasuki gedung & ruangan']);
                }
            } else {
                return redirect()->route('scanner.scan', ['bookingId' => $request->input('booking_id'), 'message' => 'Code tidak ditemukan']);
            }
        } else{
            // dd($request);
            $path = $request->file('permission_rapid')->store('public/scanner');
            // dd($path);

            Scanner::create([
                'booking_id' => $request->booking_id,
                'visitor_id' => $request->visitor_id,
                'permission_rapid' => $path,
                'body_temperature' => $request->body_temperature,
                'face_mask' => $request->face_mask,
                'washing_hands' => $request->washing_hands,
                'building_in' => $request->building_in,
                'room_in' => $request->room_in
            ]);

            return redirect()->route('scanner.index', ['bookingId' => $request->input('booking_id')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scanner  $scanner
     * @return \Illuminate\Http\Response
     */
    public function show(Scanner $scanner)
    {
        return view('scanner.show')->with([
            'scanner' => $scanner
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scanner  $scanner
     * @return \Illuminate\Http\Response
     */
    public function edit(Scanner $scanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scanner  $scanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scanner $scanner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scanner  $scanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Scanner $scanner)
    {
        $scanner->delete();   
        return redirect()->route('scanner.index',['bookingId' => $request->input('bookingId')]);
    }

    public function scan_gedung(Request $request)
    {
        if ($request->input('sort_date') !== '' && !empty($request->input('sort_date'))) {
            $scanners = Scanner::whereDate('building_in', '=', $request->input('sort_date'))->get();
        } else {
            $scanners = Scanner::get();
        }
        
        return view('dashboard.scan_gedung')->with([
            'scanners' => $scanners,
            'sort_date' => $request->input('sort_date')
        ]);
    }

    public function scan_ruangan(Request $request)
    {
        if ($request->input('sort_date') !== '' && !empty($request->input('sort_date'))) {
            $scanners = Scanner::whereDate('room_in', '=', $request->input('sort_date'))->get();
        } else {
            $scanners = Scanner::get();
        }
        
        return view('dashboard.scan_ruangan')->with([
            'scanners' => $scanners,
            'sort_date' => $request->input('sort_date')
        ]);
    }
}
