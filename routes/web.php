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

Route::get('/', 'HomePageController@index')->name('homepage');
Route::get('/{slug_postname}', 'PostController@index')->name('post');
Route::get('/tag/{slug_tagname}', 'TagController@index')->name('tag');
Route::get('/category/{slug_categoryname}', 'CategoryController@index')->name('category');


Route::get('/{navbar_slug}', 'NavbarController@index')->name('navbar');
