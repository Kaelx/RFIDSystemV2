<?php

namespace App\Http\Controllers;

use App\Models\RfidScan;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Vendor;

class RfidScanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rfid.index');
    }


    public function rfidScan(Request $request)
    {
        $validated = $request->validate([
            'rfid' => 'required|string|max:255',
        ]);

        $data = null;
        $type = null;

        // Check Student
        $student = Student::where('rfid', $validated['rfid'])->first();
        if ($student) {
            $data = $student;
            $type = 'student';
        }

        // Check Employee
        if (!$data) {
            $employee = Employee::where('rfid', $validated['rfid'])->first();
            if ($employee) {
                $data = $employee;
                $type = 'employee';
            }
        }

        // Check Vendor
        if (!$data) {
            $vendor = Vendor::where('rfid', $validated['rfid'])->first();
            if ($vendor) {
                $data = $vendor;
                $type = 'vendor';
            }
        }

        // Record the scan in RfidScan table
        if ($data) {
            $this->create($data, $validated['rfid']);
        }

        return view('rfid.index', compact('data', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($data, $rfid)
    {
        RfidScan::create([
            'recordable_id' => $data->id,
            'recordable_type' => $data->getMorphClass(),
            'rfid' => $rfid,
            'scanned_at' => now(),
        ]);
    }



    public function rfidRecord()
    {

        $records = RfidScan::with('recordable')->latest()->paginate(10);
        return view('rfid.record', compact('records'));
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
