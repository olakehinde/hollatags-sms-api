<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SmsController::class, 'index'])->name('home');

Route::get('send', [SmsController::class, 'showSendPage']);
Route::get('lookup', [SmsController::class, 'showLookupPage']);
Route::get('status', [SmsController::class, 'showStatusPage']);

Route::post('send', [SmsController::class, 'sendSMS'])->name('send');
Route::post('lookup', [SmsController::class, 'lookup'])->name('lookup');
Route::post('status', [SmsController::class, 'status'])->name('status');
Route::post('credit', [SmsController::class, 'checkCredit']);
Route::post('otp', [SmsController::class, 'otp'])->name('otp');