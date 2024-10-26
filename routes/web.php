<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\{
    AuthController,
    };
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route untuk halaman Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Route untuk login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Route untuk register
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Route untuk logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route dashboard user
Route::get('user/dashboard', function () {
    $user = Session::get('user');
    if ($user && $user['role'] === 'user') {
        return view('user.dashboard');
    } else {
        return redirect('login');
    }
})->name('user.dashboard');

// Route dashboard admin
Route::get('admin/dashboard', function () {
    $user = Session::get('user');
    if ($user && $user['role'] === 'admin') {
        return view('admin.dashboard');
    } else {
        return redirect('login');
    }
})->name('admin.dashboard');
