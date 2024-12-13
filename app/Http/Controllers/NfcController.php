<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NfcController extends Controller
{
    // submit NFC data
    public function submitNfc(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nfc_data' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json('Validation error: ', $validator->errors());
        }

        $nfc_data = $request->input('nfc_data');

        // check duplicate
        $is_duplicate = DB::select("SELECT 1 FROM nfc WHERE nfc_data = ?", [$nfc_data]);

        if(!empty($is_duplicate)) {
            return response()->json(['is_duplicate' => true]);
        }
        
        $scanned_at = $request->input('scanned_datetime');
        $created_at = Carbon::now('Asia/Kuala_Lumpur');
        $updated_at = Carbon::now('Asia/Kuala_Lumpur');

        $insert_data = DB::insert("INSERT INTO nfc (nfc_data, scanned_at, created_at, updated_at) values (?,?,?,?)", [$nfc_data, $scanned_at, $created_at, $updated_at]);

        if ($insert_data) {
            return response()->json('NFC has been submitted');
        } else {
            return response()->json('Error when submitting data');
        }
    }
}
