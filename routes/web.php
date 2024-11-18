<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\{
    AuthController,
    ProductController,
    LocationController,
    SupplierController,
    DashboardController,
    RequestController,
    UserDashboardController,
    ItemController,

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
    $user = Session::get('user');
    
    if ($user) {
        // Redirect berdasarkan role user
        if ($user['role'] === 'admin') {
            return redirect('admin/dashboard');
        } else {
            return redirect('user/dashboard');
        }
    }

    // Jika user belum login, tampilkan halaman home
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

Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

// Route dashboard admin
Route::get('admin/dashboard', function () {
    $user = Session::get('user');
    if ($user && $user['role'] === 'admin') {
        return view('admin.dashboard');
    } else {
        return redirect('login');
    }
})->name('admin.dashboard');

Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

// Resource routes for admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('requests', RequestController::class);
    Route::get('requests/{id}/approve', [RequestController::class, 'approve'])->name('requests.approve');
    Route::get('requests/{id}/reject', [RequestController::class, 'reject'])->name('requests.reject');
});

Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/items/available', [ItemController::class, 'available'])->name('user.items.available');
    Route::get('/items/borrowed', [ItemController::class, 'borrowed'])->name('user.items.borrowed');
    Route::get('/requests', [RequestController::class, 'index'])->name('user.requests.index');
    Route::get('/items/repair', [ItemController::class, 'repair'])->name('user.items.repair');
});



