<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QrCodeController extends Controller
{
    // submit qr code data
    public function submitQrCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'qr_code_data' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json('Validation error: ', $validator->errors());
        }

        $qr_code_data = $request->input('qr_code_data');
        $created_at = Carbon::now();
        $updated_at = Carbon::now();

        $insert_data = DB::insert("INSERT INTO qr_codes (qr_code_data, created_at, updated_at) values (?,?,?)", [$qr_code_data, $created_at, $updated_at]);

        if ($insert_data) {
            return response()->json('QR code has been submitted');
        } else {
            return response()->json('Error when submitting data');
        }
    }
}