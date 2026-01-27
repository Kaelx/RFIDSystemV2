<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RfidScan;
use Illuminate\Http\Request;

class RfidScanController extends Controller
{

    public function rfidRecord(Request $request)
    {
        $query = RfidScan::with('recordable');

        // Search by RFID
        if ($request->has('rfid')) {
            $rfid = $request->rfid;

            $query->where(function ($q) use ($rfid) {
                $q->whereHasMorph('recordable', ['App\Models\Student', 'App\Models\Employee', 'App\Models\Seller'], function ($query) use ($rfid) {
                    $query->where('rfid', $rfid);
                });
            });
        }

        $records = $query->get();

        return response()->json([
            'success' => true,
            'data' => $records
        ]);
    }
}
