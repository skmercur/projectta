<?php

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
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', function(){
    return view('home');
});
Route::get('/products',function(){
    return view('products');
});
Route::get('/admin',function(){
    return view('admin');
});
Route::post('/test',function(){
    return response()->json(["value"=>mt_rand(0,200)]);
});
Route::post('/addCat',"CategoriesController@addCat");
Route::post('/getCat',"CategoriesController@getCat");
Route::post('/addProduct','ProductsController@addProduct');
Route::post('/ConfirmProduct','ProductsController@confirmeProduct');
Route::post('/getComments','CommentsController@getComments');
Route::post('/getProduct','ProductsController@getProduct');
Route::get('/test',function(){
    return view('test');
});
Route::post('/LogoutA','\App\Http\Controllers\Auth\LoginController@logout');
