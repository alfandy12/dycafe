<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuAdminController;
use App\Http\Controllers\OrderingAdminController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteRServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/admin-menu', MenuAdminController::class);
    Route::resource('/admin-account', AccountController::class);
    Route::resource('/admin-pesanan', OrderingAdminController::class);
    Route::resource('/admin-category', CategoryAdminController::class);
});
Route::get('/', [MenuController::class, 'index'])->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::post('/get/{id}', [MenuController::class, 'getOrder']);
    Route::get('/pesanan', [PesananController::class, 'index']);
    route::get('/removeAll', [PesananController::class, 'removeAll']);
    route::get('/remove/{id}', [PesananController::class, 'remove']);
    route::put('/edit-order/{id}', [PesananController::class, 'edit']);
    route::post('/pesan-menu',[PesananController::class, 'pesanMenu']);
    Route::get('/print/{id}', [PesananController::class, 'printpdf']);
    route::get('/cetakstruk', [PesananController::class, 'finish']);
    Route::get('/search-pesanan', [PesananController::class, 'searchOrdering']);
    route::get('/category/{id}' , [MenuController::class, 'category']);
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


