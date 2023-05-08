<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActivityController;

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


Route::get('', [LoginController::class, 'index'])->name('index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::prefix('activity')->group(function () {
        Route::controller(ActivityController::class)->group(function() {
            Route::get('', 'index')->name('activity.index');
            Route::get('/create', 'create')->name('activity.create');
            Route::post('/store', 'store')->name('activity.store');
            Route::get('/edit/{reference}/{user_id?}', 'edit')->name('activity.edit');
            Route::put('/update/{reference}/{user_id?}', 'update')->name('activity.update');
            Route::delete('/delete/{reference}{user_id}', 'delete')->name('activity.delete');
            Route::delete('/mass/delete/{reference}', 'massDelete')->name('activity.mass.delete');
        });
    });
});

