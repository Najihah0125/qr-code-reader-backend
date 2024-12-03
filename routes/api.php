<?php

use App\Http\Controllers\QrCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('submitqrcode', [QrCodeController::class, 'submitQrCode']);
Route::post('checkduplicate', [QrCodeController::class, 'checkDuplicate']);