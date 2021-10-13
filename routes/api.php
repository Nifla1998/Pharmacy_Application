<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CustomerController;

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
Auth::routes();

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/inventory/add/{user_id}', [InventoryController::class,'add']);
Route::patch('/inventory/update/{inventory_id}/{user_id}', [InventoryController::class, 'update']);
Route::get('/inventory/remove/{inventory_id}/{user_id}', [InventoryController::class, 'remove']);

Route::post('/customer/add/{user_id}', [CustomerController::class,'add']);
Route::patch('/customer/update/{customer_id}/{user_id}', [CustomerController::class, 'update']);
Route::get('/customer/remove/{customer_id}/{user_id}', [CustomerController::class, 'remove']);
