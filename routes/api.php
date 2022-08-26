<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CompanyController;

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

// Route::apiResource('companies', CompanyController::class);

Route::get('companies', [CompanyController::class, 'index']);
Route::post('companies/store', [CompanyController::class, 'store']);
Route::get('companies/reload-captcha', [CompanyController::class, 'reloadCaptcha']);
