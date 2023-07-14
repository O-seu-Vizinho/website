<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\elderlyController;
use App\Http\Controllers\searchUserController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\billingController;
use App\Http\Controllers\ServicoController;




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
Route::get('/user/{id}', [searchUserController::class, 'singleUser'])->middleware('auth');
Route::get('/elderly/{id}', [elderlyController::class, 'getElder'])->middleware('auth');
Route::get('/order', [orderController::class, 'allOrders'])->middleware('auth');
Route::get('/order/{id}', [orderController::class, 'getOrder'])->name('orderSingle')->middleware('auth');
Route::get('/createOrder', [orderController::class, 'createOrder'])->middleware('auth');
Route::post('/createOrderPost', [orderController::class, 'createOrderPost'])->name('createPedido');
Route::get('/editOrder', [orderController::class, 'editOrder'])->middleware('auth');
Route::post('/editOrderPost', [orderController::class, 'editOrderPost'])->name('editPedido');
Route::get('/createPayment', [paymentController::class, 'createPayment'])->middleware('auth');
Route::post('/createPaymentPost', [paymentController::class, 'createPaymentPost'])->name('createPayment');
Route::get('/createFeedback', [feedbackController::class, 'createFeedback'])->middleware('auth');
Route::post('/createFeedbackPost', [feedbackController::class, 'createFeedbackPost'])->name('createFeedback');
Route::get('/createBilling', [billingController::class, 'createBilling'])->middleware('auth');
Route::post('/createBillingPost', [billingController::class, 'createBillingPost'])->name('createBilling');
Route::get('/createTransaction', [searchUserController::class, 'createTransaction'])->middleware('auth');
Route::post('/createTransactionPost', [searchUserController::class, 'createTransactionPost'])->name('createTransacao');
Route::get('/viagemaceite/{id}', [ServicoController::class, 'viagemaceite'])->name('viagemaceite');
Route::get('/viagemaceite2', [ServicoController::class, 'servicoaceite'])->name('servicoaceite');
Route::get('/emviagem', [ServicoController::class, 'emviagem'])->name('emviagem');
Route::get('/concluida', [ServicoController::class, 'concluida'])->name('concluida');
Route::get('/elderly/test', function() {
    return view('elderProfile');
})->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
