<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CustomerController;

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

Route::post('/inventory/add/{user_id}', [InventoryController::class,'add']);
Route::patch('/inventory/update/{inventory_id}/{user_id}', [InventoryController::class, 'update']);
Route::get('/inventory/remove/{inventory_id}/{user_id}', [InventoryController::class, 'remove']);

Route::post('/customer/add/{user_id}', [CustomerController::class,'add']);
Route::patch('/customer/update/{customer_id}/{user_id}', [CustomerController::class, 'update']);
Route::get('/customer/remove/{customer_id}/{user_id}', [CustomerController::class, 'remove']);
