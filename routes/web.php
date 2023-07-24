<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ListingController;
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
Route::post('/adminLogin', [AdminController::class, 'adminLogin'])->name('adminLogin')->middleware('throttle:10,1');
Route::post('/adminLogout', [AdminController::class, 'adminLogout'])->name('adminLogout')->middleware('mustBeLoggedIn');

//create-item
Route::get('/create-item', [ListingController::class, 'createListing'])->name('create-item')->middleware('mustBeLoggedIn');
Route::post('/create-item', [ListingController::class, 'postListing'])->name('post-item')->middleware('mustBeLoggedIn');

//Access images
Route::get('image/{fileName}', [ImageController::class, 'getImage'])->name('image');

//Listings
Route::get('/products', [ListingController::class, 'showListings'])->name('showListings');
Route::get('/product/{id}', [ListingController::class, 'showListing'])->name('showListing');