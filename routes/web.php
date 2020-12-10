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

Route::get('/', function(){
    return redirect('/home');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productType/{id}', 'ProductTypeController@index');
Route::get('/product/{id}', 'ProductController@index');

// middleware untuk cek udah login atau belum
Route::group(['middleware' => 'auth'], function () {
    // middleware untuk check role user yg lagi login itu member atau tidak
    Route::group(['middleware' => 'check.member'], function (){
        Route::get('/editProfile/{id}', 'UserController@editProfile');
        Route::post('/editProfile/{id}', 'UserController@saveProfile');
        Route::get('/cart/{id}', 'TransactionController@indexCart');
        Route::post('/cart/{id}/update/{itemId}', 'TransactionController@updateItem');
        Route::post('/cart/{id}/delete/{itemId}', 'TransactionController@deleteItem');
        Route::post('/cart/{id}/checkout', 'TransactionController@checkout');
        Route::get('/transactionHistory/{id}', 'TransactionController@indexHistory');
        Route::post('/product/{id}', 'ProductController@addToCart');
    });

    // middleware untuk check role user yg lagi login itu admin atau tidak
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
