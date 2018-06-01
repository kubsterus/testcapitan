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


Route::get('/', 'FrontPageController@index');
Route::get('/category/{alias}', 'FrontPageController@category');
Route::get('/category/{alias}/{page}', 'FrontPageController@category');
Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/admin/categories', 'CategoryController@all');
Route::get('/admin/categories/add', 'CategoryController@add');
Route::get('/admin/categories/item/{id}', 'CategoryController@edit');
Route::get('/admin/categories/item/{id}/delete', 'CategoryController@delete');

Route::get('/admin/articles', 'ArticleController@all');
Route::get('/admin/articles/add', 'ArticleController@add');
Route::get('/admin/articles/item/{id}', 'ArticleController@edit');
Route::get('/admin/articles/item/{id}/delete', 'ArticleController@delete');


Route::post('/admin/categories/item/{id}', 'CategoryController@edit');
Route::post('/admin/categories/create', 'CategoryController@create');

Route::post('/admin/articles/item/{id}', 'ArticleController@edit');
Route::post('/admin/articles/create', 'ArticleController@create');
