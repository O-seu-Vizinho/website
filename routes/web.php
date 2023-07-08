<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\searchUserController;
use App\Http\Controllers\elderlyController;


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
    return view('welcome');
});

Route::get('/user',  [searchUserController::class, 'allUsers']);

Route::get('/elderly/{id}', [elderlyController::class, 'getElder']);

Route::get('/elderly/test', function() {
    return view('elderProfile');
});

