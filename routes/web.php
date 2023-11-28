<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


});
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/view_category',[AdminController::class,'view']);
Route::post('/add_category',[AdminController::class,'add_category']);
Route::get('delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('view_product',[AdminController::class,'view_product']);
Route::post('add_product',[AdminController::class,'add_product']);
Route::get('show_product',[AdminController::class,'show_product']);
Route::get('delete_product/{id}',[AdminController::class,'delete_product']);
Route::get('update_product/{id}',[AdminController::class,'update_product']);
Route::post('update/{id}',[Admincontroller::class,'update']);
Route::get('details/{id}',[HomeController::class,'details']);
Route::post('add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('show_cart',[HomeController::class,'show_cart']);
Route::get('delete_cart/{id}',[HomeController::class,'delete_cart']);
Route::get('cash_order',[HomeController::class,'cash_order']);
Route::get('stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripepost'])->name('stripe.post');
Route::get('order',[AdminController::class,'order']);
Route::get('delivered/{id}',[AdminController::class,'delivered']);
Route::get('print/{id}',[AdminController::class,'print']);
Route::get('search',[AdminController::class,'search']);
Route::get('show_order',[HomeController::class,'show_order']);
Route::get('cancel_order/{id}',[HomeController::class,'cancel']);
Route::post('add_comment',[HomeController::class,'comment']);
Route::post('add_reply',[HomeController::class,'add_reply']);
Route::get('shows_product',[HomeController::class,'show_product']);
Route::get('add_cart/{id}',[HomeController::class,'order_cart']);
Route::get('auth/google',[HomeController::class,'authpage']);
Route::get('auth/google/callback',[HomeController::class,'authcallback']);
