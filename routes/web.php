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
Route::get('search', [\App\Http\Controllers\BuyTicketController::class, 'search'])->name('search');
Route::get('thong-ke', [\App\Http\Controllers\BuyTicketController::class, 'getAllTicket'])->name('get-all');
Route::get('update/{id}', [\App\Http\Controllers\BuyTicketController::class, 'updateStatus'])->name('update');
Route::get('delete/{id}', [\App\Http\Controllers\BuyTicketController::class, 'deleteTicket'])->name('delete');
