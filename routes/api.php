<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ImageController;




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

// admin
Route::resource('admin', AdminController::class);


// users
Route::resource('users', AdminController::class);

// messages
Route::resource('messages', MessageController::class);

// orders
Route::resource('orders', OrderController::class);

// order-item
Route::resource('orderitems', OrderItemController::class);

// gender
Route::resource('genders', GenderController::class);
Route::get('gender_categorie/{id}', [GenderController::class, 'gender_categorie']);
Route::get('gender_categorie_item/{id}', [GenderController::class, 'gender_categorie_item']);

// categories
Route::resource('categories', CategorieController::class);
Route::get('categorie_items/{id}', [CategorieController::class, 'categorie_items']);


// items
Route::resource('items', ItemController::class);

// images
Route::resource('images', ImageController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

