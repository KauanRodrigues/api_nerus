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

Route::namespace('api')->group(function(){
    Route::prefix('produto')->group(function(){
        Route::get('/', 'ProdutoController@index')->name('produto.index');
        Route::post('/', 'ProdutoController@store')->name('produto.store');
        Route::post('/deletar', 'ProdutoController@deletar')->name('produto.destroy');
    });
});
