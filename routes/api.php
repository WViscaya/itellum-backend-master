<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me'])->name('me');
});

Route::apiResource('invoices', App\Http\Controllers\InvoiceController::class)->middleware('api');
Route::apiResource('users', App\Http\Controllers\UserController::class)->middleware('api');
Route::apiResource('clients', App\Http\Controllers\ClientController::class)->middleware('api');
Route::apiResource('categories', App\Http\Controllers\CategoryController::class)->middleware('api');
Route::apiResource('products', App\Http\Controllers\ProductController::class)->middleware('api');
Route::apiResource('plans', App\Http\Controllers\PlanController::class)->middleware('api');
