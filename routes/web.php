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


// '/'に対してTodolistFormControllerのindexを割り当てる
//Route::get('/', 'TodolistFormController@index');
Route::get('/', 'TodolistFormController@index');

// '/create-page'に対して同じController内のcreatePage割り当てる
Route::get('/create-page', 'TodolistFormController@createPage');

// POSTメソッドの'/create'に対して同じController内のcreate割り当てる
Route::post('/create', 'TodolistFormController@create');

Route::get('/edit-page/{id}', 'TodolistFormController@editPage');

//POST:/editに対してedit割り当てる
Route::post('/edit', 'TodolistFormController@edit');

Route::get('/delete-page/{id}', 'TodolistFormController@deletePage');
Route::post('/delete/{id}', 'TodolistFormController@delete');