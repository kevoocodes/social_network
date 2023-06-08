<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::post('/', function () {
    return view('welcome');
});

Route::get('/welcome', [LoginController::class, 'showLoginPage']);  //Route that makes login
Route::get('/register', [RegisterController::class, 'showRegisterPage']);  //Routes that makes register
Route::post('/register', [RegisterController::class, 'userRegister']);  //for registration
Route::post('/welcome', [LoginController::class, 'userLogin'])->name('login'); //for login
