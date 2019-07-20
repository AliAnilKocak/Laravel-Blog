<?php


Route::get('/about', 'HomePageController@about')->name('about');
Route::get('/contact', 'HomePageController@contact')->name('contact');
Route::get('/{slug_postname}', 'PostController@index')->name('post');

Route::get('/{navbar_slug}', 'NavbarController@index')->name('navbar');
Route::get('/', 'HomePageController@index')->name('homepage');

Route::get('/tag/{slug_tagname}', 'TagController@index')->name('tag');
Route::get('/category/{slug_categoryname}', 'CategoryController@index')->name('category');

Route::group(['middleware' => 'auth'], function () {
    
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'UserController@login_form')->name('admin.login');
    Route::post('/login', 'UserController@login');
});
