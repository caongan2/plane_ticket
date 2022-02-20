<?php

use Illuminate\Support\Facades\Route;

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

Route::get('ve-may-bay-gia-re', [\App\Http\Controllers\BuyTicketController::class, 'index']);
Route::post('submit', [\App\Http\Controllers\BuyTicketController::class, 'buyTicket'])->name('buy-ticket');
