<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\PeminjamanController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
    //Halaman User
    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->name('user.index');
        Route::get('user/create', 'create')->name('user.create');
        Route::post('user/store', 'store')->name('user.store');
        Route::get('user/{id}', 'show')->name('user.show');
        Route::get('user/{id}/edit', 'edit')->name('user.edit');
        Route::put('user/{id}', 'update')->name('user.update');
        Route::delete('user/delete/{id}', 'destroy')->name('user.destroy');
    });

    //Halaman Peminjaman
    Route::controller(PeminjamanController::class)->group(function () {
        Route::get('peminjaman', 'index')->name('peminjaman.index');
        Route::get('peminjaman/create', 'create')->name('peminjaman.create');
        Route::post('peminjaman/store', 'store')->name('peminjaman.store');
        Route::get('peminjaman/{id}', 'show')->name('peminjaman.show');
        Route::get('peminjaman/{id}/edit', 'edit')->name('peminjaman.edit');
        Route::put('peminjaman/{id}', 'update')->name('peminjaman.update');
        Route::delete('peminjaman/delete/{id}', 'destroy')->name('peminjaman.destroy');
    });


    Route::resource('products', ProductController::class);

    //Halaman Warehouse
    Route::controller(WarehouseController::class)->group(function () {
        Route::get('warehouse', 'index')->name('warehouse.index');
        Route::get('warehouse/create', 'create')->name('warehouse.create');
        Route::post('warehouse/store', 'store')->name('warehouse.store');
        Route::get('warehouse/{id}', 'show')->name('warehouse.show');
        Route::get('warehouse/{id}/edit', 'edit')->name('warehouse.edit');
        Route::put('warehouse/{id}', 'update')->name('warehouse.update');
        Route::delete('warehouse/delete/{id}', 'destroy')->name('warehouse.destroy');
    });

    //Halaman Asset
    Route::controller(AssetController::class)->group(function () {
        Route::get('asset', 'index')->name('asset.index');
        Route::get('asset/create', 'create')->name('asset.create');
        Route::post('asset/store', 'store')->name('asset.store');
        Route::get('asset/{id}', 'show')->name('asset.show');
        Route::get('asset/{id}/edit', 'edit')->name('asset.edit');
        Route::put('asset/{id}', 'update')->name('asset.update');
        Route::delete('asset/delete/{id}', 'destroy')->name('asset.destroy');
    });

    //Halaman Role
    Route::controller(RoleController::class)->group(function () {
        Route::get('role', 'index')->name('role.index');
        Route::get('role/create', 'create')->name('role.create');
        Route::post('role/store', 'store')->name('role.store');
        Route::get('role/{id}', 'show')->name('role.show');
        Route::get('role/{id}/edit', 'edit')->name('role.edit');
        Route::put('role/{id}', 'update')->name('role.update');
        Route::delete('role/delete/{id}', 'destroy')->name('role.destroy');
    });
});
