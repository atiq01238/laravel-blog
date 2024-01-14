<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('auth.login');
});
Route::get('signup', function () {
    return view('auth.signup');
});
Route::post('signup', [AuthController::class,'store'])->name('auth.signup');
Route::post('login',[AuthController::class,'login'])->name('auth.login');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
Route::get('Allcategorie', function () {
    return view('categories.allcategorie');
});
Route::get('Categories', function () {
    return view('categories.create');
});


