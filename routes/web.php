<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('index');
});

// Route::get('/', function () {
//     return view('backend.index');
// });

// Route::get('/', function () {
//     return view('Auth.register');
// });


Route::view('about', 'about')->name('about');
//register route
Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('postregister', [AuthController::class, 'postregister'])->name('postregister');

//login route
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('postlogin', [AuthController::class, 'postlogin'])->name('postlogin');

//logout
Route::get('logout',[AuthController::class, 'logout'])->name('logout');