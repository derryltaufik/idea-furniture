<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productType/{id}', 'ProductTypeController@index');
Route::get('/product/{id}', 'ProductController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'check.member'], function (){
        Route::get('/editProfile/{id}');
        Route::get('/cart/{id}');
        Route::get('/transactionHistory/{id}');
        Route::post('/product/{id}', 'ProductController@addToCart');
    });
    
    Route::group(['middleware' => 'check.admin'], function () {
        Route::get('/productType/update/{id}', 'ProductTypeController@updateProductType');
        Route::post('/productType/update/{id}', 'ProductTypeController@saveUpdateProductType');
        Route::post('/productType/delete/{id}', 'ProductTypeController@deleteProductType');
        Route::get('/addProductType', 'ProductTypeController@addProductType');
        Route::post('/addProductType', 'ProductTypeController@saveProductType');
        Route::get('/product/update/{id}', 'ProductController@updateProduct');
        Route::post('/product/update/{id}', 'ProductController@saveUpdateProduct');
        Route::post('/product/delete/{id}', 'ProductController@deleteProduct');
        Route::get('/addProduct', 'ProductController@addProduct');
        Route::post('/addProduct', 'ProductController@saveProduct');
    });
});