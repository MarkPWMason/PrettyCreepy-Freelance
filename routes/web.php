<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

//home
Route::get('/', function () {
    return view('homepage');
})->name('home');

//login
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::post('/admin', [AdminController::class, 'adminLogin'])->name('adminLogin')->middleware('throttle:10,1');

//create-item
Route::get('/create-item', function(){
    return view('create-item');
})->name('create-item');