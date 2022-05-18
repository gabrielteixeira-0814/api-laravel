<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register'])->name('register_users'); 
Route::post('/login', [AuthController::class, 'login'])->name('login_users'); 
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout_users');

Route::namespace('Api')->name('api.')->group(function(){

    Route::prefix('products')->group(function(){


        
        Route::group(['middleware' => ['auth:sanctum']], function(){
            Route::post('/', [ProductController::class, 'store'])->name('store_products'); 
            Route::post('/{id}', [ProductController::class, 'update'])->name('update_products');
            Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy_products');
             
        });
      
        Route::get('/', [ProductController::class, 'getList'])->name('getList_products'); 
        Route::get('/{id}', [ProductController::class, 'get'])->name('get_products'); 
    });
});