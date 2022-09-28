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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('vongquaymayman', [HomeController::class, 'vongquaymayman'])->middleware(['auth'])->name('dashboard');;

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::post('/save-data-roll', [HomeController::class, 'saveDataRoll'])->middleware(['auth'])->name('save');

require __DIR__.'/auth.php';
