<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/profile', function () {
    $user = Auth::user();
    return view('profile', ['user' => $user]);
});

// Route::GET('/dashboard', [ProductController::class, 'index']);
// Route::GET('/tambah-produk', [ProductController::class, 'create']);
// Route::GET('/edit-produk/{id}', [ProductController::class, 'edit']);
// Route::POST('/tambah-produk', [ProductController::class, 'store']);
// Route::PUT('/edit-produk/{id}', [ProductController::class, 'update']);
// Route::DELETE('/dashboard/{id}', [ProductController::class, 'destroy']);
// Route::POST('/', [UserController::class, 'login']);

// Route::group(['middleware' => 'web'], function () {

// });

Route::get('/login', [UserController::class, 'form'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::GET('/produk', [ProductController::class, 'index']);
    Route::GET('/tambah-produk', [ProductController::class, 'create']);
    Route::GET('/edit-produk/{id}', [ProductController::class, 'edit']);
    Route::POST('/tambah-produk', [ProductController::class, 'store']);
    Route::PUT('/edit-produk/{id}', [ProductController::class, 'update']);
    Route::DELETE('/produk/{id}', [ProductController::class, 'destroy']);
    Route::GET('/export', [ProductController::class, 'export']);
    Route::post('/logout', [UserController::class, 'logout']);
});
