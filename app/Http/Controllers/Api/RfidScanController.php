<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RfidScan;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Seller;
use Illuminate\Http\Request;

class RfidScanController extends Controller
{

    public function rfidRecord(Request $request)
    {
        if (!$request->has('rfid')) {
            return response()->json([
                'success' => false,
                'message' => 'RFID parameter is required'
            ], 400);
        }

        $rfid = $request->rfid;
        $result = null;

        // Check in Student table
        if (!$result) {
            $student = Student::where('rfid', $rfid)->first();
            if ($student) {
                $result = [
                    'type' => 'student',
                    'data' => $student
                ];
            }
        }

        // Check in Employee table
        if (!$result) {
            $employee = Employee::where('rfid', $rfid)->first();
            if ($employee) {
                $result = [
                    'type' => 'employee',
                    'data' => $employee
                ];
            }
        }

        // Check in Seller table
        if (!$result) {
            $seller = Seller::where('rfid', $rfid)->first();
            if ($seller) {
                $result = [
                    'type' => 'seller',
                    'data' => $seller
                ];
            }
        }

        if ($result) {
            return response()->json([
                'success' => true,
                'data' => $result
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'RFID not found'
        ], 404);
    }
}
