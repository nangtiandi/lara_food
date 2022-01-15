<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes([
    'register' => false, // Routes of Registration
    'reset' => false,    // Routes of Password Reset
    'verify' => false,   // Routes of Email Verification
    'confirm' => false
  ]);
Route::resource('category',CategoryController::class);
Route::resource('food',\App\Http\Controllers\FoodController::class);
Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::post('/order-submit',[OrderController::class,'submit'])->name('order.submit');
Route::get('order', [App\Http\Controllers\FoodController::class, 'order'])->name('admin.order');
Route::get('order/{order}/approve', [App\Http\Controllers\OrderController::class, 'approve']);
Route::get('order/{order}/cancel', [App\Http\Controllers\OrderController::class, 'cancel']);
Route::get('order/{order}/ready', [App\Http\Controllers\OrderController::class, 'ready']);
Route::get('order/{order}/done', [App\Http\Controllers\OrderController::class, 'done']);
Route::get('/orderList', [App\Http\Controllers\OrderController::class, 'orderList'])->name('admin.orderList');


