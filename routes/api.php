<?php

use App\Http\Controllers\NfcController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ********************** QR CODE ***************************
Route::post('submitqrcode', [QrCodeController::class, 'submitQrCode']);
Route::post('checkduplicate', [QrCodeController::class, 'checkDuplicate']);

// ********************** NFC ***************************
Route::post('submitnfc', [NfcController::class, 'submitNfc']);
Route::post('checkduplicatenfc', [NfcController::class, 'checkDuplicate']);