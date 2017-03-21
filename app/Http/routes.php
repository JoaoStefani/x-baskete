<?php

/****************   Model binding into route **************************/
Route::model('noticia', 'App\Noticia');
Route::model('user', 'App\User');
Route::model('video', 'App\Video');
Route::model('banner', 'App\Banner');

Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[0-9a-z-_]+');

/***************    Site routes  **********************************/
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('sobre', 'PagesController@sobre');
Route::get('contato', 'PagesController@contato');
Route::post('helpdesk', 'PagesController@helpdesk');
Route::get('noticias', 'NoticiasController@index');
Route::get('noticia/{slug}', 'NoticiasController@show');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/***************    Admin routes  **********************************/
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

    # Admin Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index');

    # Noticias
    Route::get('noticia/data', 'Admin\NoticiaController@data');
    Route::get('noticia/{id}/show', 'Admin\NoticiaController@show');
    Route::get('noticia/{id}/edit', 'Admin\NoticiaController@edit');
    Route::get('noticia/{id}/delete', 'Admin\NoticiaController@delete');
    Route::get('noticia/reorder', 'Admin\NoticiaController@getReorder');
    Route::resource('noticia', 'Admin\NoticiaController');

    #Banner
    Route::group(['prefix' => 'banner'], function() {
        Route::get('data', 'Admin\BannerController@data');
        Route::get('{id}/show', 'Admin\BannerController@show');
        Route::get('{id}/edit', 'Admin\BannerController@edit');
        Route::get('{id}/delete', 'Admin\BannerController@delete');
        //Route::get('banner/reorder', 'Admin\BannerController@getReorder');
        Route::resource('', 'Admin\BannerController');
    });

    # Users
    Route::get('user/data', 'Admin\UserController@data');
    Route::get('user/{user}/show', 'Admin\UserController@show');
    Route::get('user/{user}/edit', 'Admin\UserController@edit');
    Route::get('user/{user}/delete', 'Admin\UserController@delete');
    Route::get('user/{ativacao}/{user}', 'Admin\UserController@userAtivacao');
    Route::resource('user', 'Admin\UserController');

    # Vídeos
    Route::get('video/data', 'Admin\VideoController@data');
    Route::get('video/{video}/show', 'Admin\VideoController@show');
    Route::get('video/{video}/edit', 'Admin\VideoController@edit');
    Route::get('video/{video}/delete', 'Admin\VideoController@delete');
    Route::resource('video', 'Admin\VideoController');
});
