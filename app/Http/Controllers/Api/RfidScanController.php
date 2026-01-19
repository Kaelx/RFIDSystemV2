<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RfidScan;

class RfidScanController extends Controller
{

    public function rfidRecord()
    {

        $records = RfidScan::with('recordable')->get();

        return response()->json([
            'success' => true,
            'data' => $records
        ]);
    }
}
