<?php

namespace App\Http\Controllers;

use App\Models\RfidScan;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Seller;

class RfidScanController extends Controller
{


    public function rfidScan(Request $request)
    {
        $validated = $request->validate([
            'rfid' => 'required|string|max:255',
        ]);

        $data = null;
        $type = null;

        // Check Student
        if (!$data) {
            $student = Student::where('rfid', $validated['rfid'])->first();
            if ($student) {
                $data = $student;
                $type = 'student';
            }
        }


        // Check Employee
        if (!$data) {
            $employee = Employee::where('rfid', $validated['rfid'])->first();
            if ($employee) {
                $data = $employee;
                $type = 'employee';
            }
        }

        // Check Seller
        if (!$data) {
            $vendor = Seller::where('rfid', $validated['rfid'])->first();
            if ($vendor) {
                $data = $vendor;
                $type = 'vendor';
            }
        }

        // Record the scan in RfidScan table
        if ($data) {
            $this->createRecord($data);
        }

        return response()->json([
            'success' => true,
            'data' => $data,
            'type' => $type
        ]);
        // return view('rfid.index', compact('data', 'type'));
    }


    public function createRecord($data)
    {
        RfidScan::create([
            'recordable_id' => $data->id,
            'recordable_type' => $data->getMorphClass(),
            'scanned_at' => now(),
        ]);
    }



    public function rfidRecord()
    {

        $records = RfidScan::with('recordable')->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $records
        ]);
    }
}
