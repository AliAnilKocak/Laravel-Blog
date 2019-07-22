<?php


Route::get('/about', 'HomePageController@about')->name('about');
Route::get('/contact', 'HomePageController@contact')->name('contact');
Route::get('/{slug_postname}', 'PostController@index')->name('post');

Route::get('/{navbar_slug}', 'NavbarController@index')->name('navbar');
Route::get('/', 'HomePageController@index')->name('homepage');

Route::get('/tag/{slug_tagname}', 'TagController@index')->name('tag');
Route::get('/category/{slug_categoryname}', 'CategoryController@index')->name('category');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function () {

        Route::get('/home', 'AdminHomePageController@index')->name('admin.homepage');

        Route::group(['prefix' => 'post'], function () {
            Route::match(['get', 'post'], '/', 'AdminPostController@index')->name('admin.posts');
            Route::get('/create', 'AdminPostController@form')->name('admin.post.create');
            Route::get('/edit/{id}', 'AdminPostController@form')->name('admin.post.edit');
            Route::post('/save/{id?}', 'AdminPostController@save')->name('admin.post.save');
            Route::get('/delete/{id}', 'AdminPostController@delete')->name('admin.post.delete');
        });

        Route::group(['prefix' => 'page'], function () {
            Route::match(['get', 'post'], '/', 'AdminNavbarController@index')->name('admin.pages');
            Route::get('/create', 'AdminNavbarController@form')->name('admin.page.create');
            Route::get('/edit/{id}', 'AdminNavbarController@form')->name('admin.page.edit');
            Route::post('/save/{id?}', 'AdminNavbarController@save')->name('admin.page.save');
            Route::get('/delete/{id}', 'AdminNavbarController@delete')->name('admin.page.delete');
        });
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'UserController@login_form')->name('admin.login');
    Route::post('/login', 'UserController@login');
});
