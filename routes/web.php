<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
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



//Main Features
Route::get('login', [MainController::class, 'login'])->name('login');
Route::get('/', [MainController::class, 'index'])->name('index');

//Login Features
Route::post('login-process', [LoginController::class, 'loginProcess'])->name('login-process');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//Form Features
Route::get('new-form', [FormController::class, 'newForm'])->name('new-form');
Route::get('form-post', [FormController::class, 'formPost'])->name('form-post');
