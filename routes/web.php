<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CarPartController;
use App\Http\Controllers\ClaimController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    Route::controller(TechnicianController::class)->prefix('technicains')->group(function () {
        Route::get('', 'index')->name('technicains');
        Route::get('create', 'create')->name('technicains.create');
        Route::post('store', 'store')->name('technicains.store');
        Route::get('show/{id}', 'show')->name('technicains.show');
        Route::get('edit/{id}', 'edit')->name('technicains.edit');
        Route::put('edit/{id}', 'update')->name('technicains.update');
        Route::delete('destroy/{id}', 'destroy')->name('technicains.destroy');
    });

    Route::controller(PromotionController::class)->prefix('promotions')->group(function () {
        Route::get('', 'index')->name('promotions');
        Route::get('create', 'create')->name('promotions.create');
        Route::post('store', 'store')->name('promotions.store');
        Route::get('show/{id}', 'show')->name('promotions.show');
        Route::get('edit/{id}', 'edit')->name('promotions.edit');
        Route::put('edit/{id}', 'update')->name('promotions.update');
        Route::delete('destroy/{id}', 'destroy')->name('promotions.destroy');
    });

    Route::controller(CarPartController::class)->prefix('car_parts')->group(function () {
        Route::get('/car_parts', [CarPartController::class, 'index'])->name('car_parts');
        Route::get('', 'index')->name('car_parts');
        Route::get('create', 'create')->name('car_parts.create');
        Route::post('store', 'store')->name('car_parts.store');
        Route::get('show/{id}', 'show')->name('car_parts.show');
        Route::get('edit/{id}', 'edit')->name('car_parts.edit');
        Route::put('edit/{id}', 'update')->name('car_parts.update');
        Route::delete('destroy/{id}', 'destroy')->name('car_parts.destroy');
    });

    Route::controller(ClaimController::class)->prefix('claims')->group(function () {
        Route::get('/claims', [ClaimController::class, 'index'])->name('claims');
        Route::get('', 'index')->name('claims');
        Route::get('create', 'create')->name('claims.create');
        Route::post('store', 'store')->name('claims.store');
        Route::get('show/{id}', 'show')->name('claims.show');
        Route::get('edit/{id}', 'edit')->name('claims.edit');
        Route::put('edit/{id}', 'update')->name('claims.update');
        Route::delete('destroy/{id}', 'destroy')->name('claims.destroy');
    });
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});


