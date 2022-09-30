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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CouponController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('vongquaymayman', [HomeController::class, 'vongquaymayman'])->middleware(['auth'])->name('dashboard');;

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/test', [HomeController::class, 'test'])->middleware(['auth'])->name('test');
Route::get('/profile', [HomeController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::get('/admin', [HomeController::class, 'admin'])->middleware(['auth'])->name('admin');
Route::get('/logout', [HomeController::class, 'logout'])->middleware(['auth'])->name('logout');
Route::post('/buy-roll', [HomeController::class, 'buyRoll'])->middleware(['auth'])->name('buyRoll');
Route::post('/save-data-roll', [HomeController::class, 'saveDataRoll'])->middleware(['auth'])->name('save');
Route::resource('partners', PartnerController::class);
Route::resource('products', ProductController::class);
Route::resource('coupons', CouponController::class);

require __DIR__.'/auth.php';
