<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\FundManagerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('companies', CompanyController::class)->except(['create', 'edit', 'update', 'show', 'delete', 'edit']);
Route::resource('funds', FundController::class)->except(['create', 'edit']);
Route::get('possible-duplicated-funds', [FundController::class, 'possibleDuplicatedFund']);
Route::resource('fund-managers', FundManagerController::class)->except(['create', 'edit', 'show']);
