<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EthereumApiController;
use App\Http\Controllers\AddressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/test', [EthereumApiController::class, 'test'])->middleware('guest');

Route::get('/list', [AddressController::class, 'getAddressData'])->middleware('guest');

Route::get('/home', [AddressController::class, 'home'])->middleware('guest');

Route::get('/time-balance', [AddressController::class, ''])->middleware('guest');
