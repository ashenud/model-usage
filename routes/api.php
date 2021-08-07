<?php

use App\Http\Controllers\Api\SalesOrderController;
use App\Http\Controllers\Api\UserController;
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

Route::post('/login', [UserController::class , 'login']);

Route::group(['middleware'=>['auth:api']],function(){

    Route::group(['prefix' => 'sales_order'], function () {
        Route::post('get', [SalesOrderController::class , 'get']);
        Route::post('has_one', [SalesOrderController::class , 'hasOne']);
        Route::post('belongs_to', [SalesOrderController::class , 'belongsTo']);
        Route::post('has_many', [SalesOrderController::class , 'hasMany']);
    });

});
