<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\InvoiceController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

Route::apiResource('/companies', CompanyController::class)->middleware('auth:api');

Route::post('invoices/send', [InvoiceController::class, 'send'])->middleware('auth:api');
Route::post('invoices/xml', [InvoiceController::class, 'xml'])->middleware('auth:api');
Route::post('invoices/pdf', [InvoiceController::class, 'pdf'])->middleware('auth:api');