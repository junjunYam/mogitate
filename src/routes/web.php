<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product_id}', [ProductController::class, 'detail'])->name('product.detail');
Route::post('/products/{product_id}/update', [ProductController::class, 'update']);
Route::get('/products/register', [ProductController::class, 'register']);
Route::get('/products/search', [ProductController::class, 'search']);
Route::post('/products/{product_id}/delete', [ProductController::class, 'delete']);
