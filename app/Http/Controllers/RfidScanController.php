<?php

namespace App\Http\Controllers;

use App\Models\RfidScan;
use Illuminate\Http\Request;
use App\Models\Student;
use Soap\Sdl;

class RfidScanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rfid.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(String $id)
    {
        //
    }
    /**
     * Display the specified resource.
     */
    public function rfid(Request $request)
    {
        $validated = $request->validate([
            'rfid' => 'required|string|max:255',
        ]);

        $student = Student::where('rfid', $validated['rfid'])->first();
        return view('rfid.index', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RfidScan $rfidScan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RfidScan $rfidScan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RfidScan $rfidScan)
    {
        //
    }
}
