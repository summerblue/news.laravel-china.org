<?php

# ------------------ Page Route ------------------------
Route::get('/', 'PagesController@home')->name('home');
Route::get('/feed', 'PagesController@feed')->name('feed');
Route::get('/sitemap', 'PagesController@sitemap');
Route::get('/sitemap.xml', 'PagesController@sitemap');
Route::get('/search', 'PagesController@search')->name('search');

Route::group(['middleware' => ['auth', 'admin_auth']], function () {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration Routes... 请自行开启注册功能
// Route::get('register', 'Auth\AuthController@getRegister');
// Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...  请自行开启注册功能
// Route::get('password/reset', 'Auth\PasswordController@getEmail');
// Route::post('password/email', 'Auth\PasswordController@postEmail');
// Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
// Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::resource('posts', 'PostController', ['only' => ['show']]);
Route::resource('categories', 'CategoryController', ['only' => ['show']]);
