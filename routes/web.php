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

Route::get('/', [\App\Http\Controllers\BuyTicketController::class, 'index']);
Route::post('submit', [\App\Http\Controllers\BuyTicketController::class, 'buyTicket'])->name('buy-ticket');
Route::get('search', [\App\Http\Controllers\BuyTicketController::class, 'search'])->name('search');
Route::get('login', [\App\Http\Controllers\LoginController::class, 'viewLogin'])->name('login');
Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::post('login-page', [\App\Http\Controllers\LoginController::class, 'login'])->name('login_page');
Route::get('thong-ke', [\App\Http\Controllers\BuyTicketController::class, 'getAllTicket'])->name('get-all');
Route::post('update/{id}', [\App\Http\Controllers\BuyTicketController::class, 'updateStatus'])->name('update');
Route::get('delete/{id}', [\App\Http\Controllers\BuyTicketController::class, 'deleteTicket'])->name('delete');
