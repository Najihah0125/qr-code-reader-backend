<?php

use App\Http\Controllers\NfcController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;

// ********************** QR CODE ***************************
Route::post('submitqrcode', [QrCodeController::class, 'submitQrCode']);

// ********************** NFC ***************************
Route::post('submitnfc', [NfcController::class, 'submitNfc']);