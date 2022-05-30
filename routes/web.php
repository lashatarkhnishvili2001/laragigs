<?php

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - show form to create new listing 
// store - Store new listing 
// edit - Show form to edit listing
// update - update listing
// destroy - delete listing

// all listings
Route::get('/', [ListingController::class, 'index']);

//show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// store Listing Data
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

// update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing
Route::Delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listing 
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');


//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login ')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);