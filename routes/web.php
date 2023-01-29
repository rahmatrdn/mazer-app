<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('login', [AuthController::class, 'index'])->name("login");

Route::group(['prefix' => 'auth/'], function () {
    Route::post('do-login', [AuthController::class, 'doLogin']);

    Route::get("register", [AuthController::class, "register"]);
    Route::post("do-register", [AuthController::class, "doRegister"]);
    Route::get('logout', [AuthController::class, 'doLogout']);
});

// ADMIN MENU
Route::group([
    'prefix' => 'admin', 
    "middleware" => ['auth', 'access:ADMIN']
], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::group([
        'prefix' => 'user', 
    ], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('add', [UserController::class, 'add']);
        Route::post('do-add', [UserController::class, 'doAdd']);
        Route::get('update/{id}', [UserController::class, 'update']);
        Route::post('do-update/{id}', [UserController::class, 'doUpdate']);
        Route::get('do-delete/{id}', [UserController::class, 'doDelete']);
    });

});
