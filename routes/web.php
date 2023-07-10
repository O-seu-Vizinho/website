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
    return redirect('/register');
});

Route::get('/user',  [searchUserController::class, 'allUsers'])->middleware('auth');

Route::get('/elderly/{id}', [elderlyController::class, 'getElder'])->middleware('auth');

Route::get('/elderly/test', function() {
    return view('elderProfile');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
