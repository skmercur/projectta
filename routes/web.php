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
    return view('admin');
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
Route::post('/delProduct','ProductsController@delProduct');
Route::post('/upProduct','ProductsController@upProduct');
Route::get('/test',function(){
    return view('test');
});
Route::post('/LogoutA','\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/delCat','CategoriesController@delCat');
Route::post('/upCat','CategoriesController@upCat');
Route::post('/GetSells','ProductsController@GetSells');
Route::post('/GetSellsDzd','ProductsController@GetSellsDzd');
Route::post('/getImages','ProductsController@getImages');
Route::post('/getNumberOfViews','ProductsController@getNumberOfViews');
Route::post('/GetNbrClients','ClientsController@GetNbrClients');

