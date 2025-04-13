<?php

use App\Http\Controllers\AccountController;
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
Route::get('new-form', [MainController::class, 'newForm'])->name('new-form');
Route::get('account', [MainController::class, 'accountPage'])->name('account-page');

//Login Features
Route::post('login-process', [LoginController::class, 'loginProcess'])->name('login-process');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//Form Features
Route::post('form-post', [FormController::class, 'formPost'])->name('form-post');
Route::get('edit-form/{id}', [FormController::class, 'editForm'])->name('edit-form');
Route::post('form-update', [FormController::class, 'formUpdate'])->name('form-update');
Route::post('form-delete/{id}', [FormController::class, 'formDelete'])->name('form-delete');
Route::get('detail-form', [FormController::class, 'detailForm'])->name('detail-form');
Route::get('data-get/{po_no}', [FormController::class, 'dataGet'])->name('data-get');
Route::post('polybag-create', [FormController::class, 'dataCreatePolybag'])->name('polybag-create');
Route::post('carton-create', [FormController::class, 'dataCreateCarton'])->name('carton-create');
Route::get('polybag-edit/{po_no}/{id}', [FormController::class, 'polybagEdit'])->name('polybag-edit');
Route::get('carton-edit/{po_no}/{id}', [FormController::class, 'cartonEdit'])->name('carton-edit');
Route::post('carton-update', [FormController::class, 'cartonUpdate'])->name('carton-update');
Route::post('polybag-update', [FormController::class, 'polybagUpdate'])->name('polybag-update');
Route::post('polybag-delete/{id}', [FormController::class, 'polybagDelete'])->name('polybag-delete');
Route::post('carton-delete/{id}', [FormController::class, 'cartonDelete'])->name('carton-delete');
Route::get('polybag/{po_no}/print', [FormController::class,'printData'])->name('polybag.cetak');


//Account Features
Route::post('create-user', [AccountController::class, 'createUser'])->name('create-user');
Route::get('edit-user/{id}', [AccountController::class, 'editUser'])->name('edit-user');
Route::post('delete-user/{id}', [AccountController::class, 'deleteUser'])->name('delete-user');
Route::post('update-user', [AccountController::class, 'updateUser'])->name('update-user');
