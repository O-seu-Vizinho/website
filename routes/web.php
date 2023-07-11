<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\elderlyController;
use App\Http\Controllers\searchUserController;
use App\Http\Controllers\orderController;


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
Route::get('/createElderly', [elderlyController::class, 'createElderly'])->middleware('auth');
Route::post('/createElderlyPost', [elderlyController::class, 'createElderlyPost'])->name('createIdoso');
Route::get('/elderlyAll', [elderlyController::class, 'allElderly'])->middleware('auth');
Route::get('/user',  [searchUserController::class, 'allUsers'])->middleware('auth');
Route::get('/elderly/{id}', [elderlyController::class, 'getElder'])->middleware('auth');
Route::get('/order', [orderController::class, 'allOrders'])->middleware('auth');
Route::get('/order/{id}', [orderController::class, 'getOrder'])->middleware('auth');
Route::get('/createOrder', [orderController::class, 'createOrder'])->middleware('auth');
Route::post('/createOrderPost', [orderController::class, 'createOrderPost'])->name('createPedido');
Route::get('/elderly/test', function() {
    return view('elderProfile');
})->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
