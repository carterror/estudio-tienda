<?php

use App\Http\Controllers\ConnectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiJsController;
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

Route::get('/', [HomeController::class, "getHome"])->name("home");

//Logeo, Registro
Route::get('/login', [ConnectController::class, "getLogin"])->name("login");
Route::post('/login', [ConnectController::class, "postLogin"])->name("login");
Route::get('/logout', [ConnectController::class, "getLogout"])->name("logout");

Route::get('/register', [ConnectController::class, "getRegister"])->name("register");
Route::post('/register', [ConnectController::class, "postRegister"])->name("register");

//Reset Pass
Route::get('/recover', [ConnectController::class, "getRecove"])->name("recove");
Route::post('/recover', [ConnectController::class, "postRecove"])->name("recove");
Route::get('/reset', [ConnectController::class, "getReset"])->name("reset_pass");
Route::post('/reset', [ConnectController::class, "postReset"])->name("reset_pass");

//usuario
Route::get('/user/edit', [UserController::class, "getUserEdit"])->name("user_edit");
Route::post('/user/edit/info', [UserController::class, "postUserEditInfo"])->name("user_edit_info");
Route::post('/user/edit/avatar', [UserController::class, "postUserEditAvatar"])->name("user_edit_avatar");
Route::post('/user/edit/pass', [UserController::class, "postUserEditPass"])->name("user_edit_pass");

//ajax Api Route
Route::get('/md/api/load/product/{section}', [ApiJsController::class, "getPSection"])->name("product_section");
