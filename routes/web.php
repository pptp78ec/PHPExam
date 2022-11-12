<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\MovieSessionsController;
use App\Http\Controllers\UsersController;
use App\Models\Booking;
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
Route::resource('/movies', MoviesController::class);
Route::resource('/moviesessions', MovieSessionsController::class);
Route::resource('/booking', BookingController::class);
Route::resource('/users', UsersController::class);
Route::post('authenticate', [UsersController::class, 'authenticate'])->name('users.authenticate');
Route::get('/', function () {
    return redirect('/movies');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
