<?php

/****************   Model binding into route **************************/
Route::model('article', 'App\Article');
Route::model('articlecategory', 'App\ArticleCategory');
Route::model('language', 'App\Language');
Route::model('photoalbum', 'App\PhotoAlbum');
Route::model('photo', 'App\Photo');
Route::model('user', 'App\User');
Route::pattern('id', '[0-9]+');
Route::pattern('user_id', '[0-9]+');
Route::pattern('slug', '[0-9a-z-_]+');

/***************    Site routes  **********************************/


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
    Route::get('about', 'PagesController@about');
    Route::get('contact', 'PagesController@contact');
    Route::get('articles', 'ArticlesController@index');
    Route::get('article/{slug}', 'ArticlesController@show');
    Route::get('video/{id}', 'VideoController@show');
    Route::get('photo/{id}', 'PhotoController@show');
    
    Route::get('allocation/{user_id}', 'AllocationsController@show');
    Route::get('allocation/create', 'AllocationsController@create');
    Route::post('allocation/store', 'AllocationsController@store')->name('allocations.store');
    Route::post('allocation/{user_id}/update', 'AllocationsController@update')->name('allocations.update');
    
    Route::get('profile/{id}', 'ProfileController@show');
    Route::post('profile/{id}/update', 'ProfileController@update')->name('profile.update');
    
    Route::get('expense/{user_id}/{type}', 'ExpenseController@index');
    Route::get('expense/{user_id}/{type}/{id}', 'ExpenseController@show');
    Route::get('expense/{user_id}/{type}/{id}/edit', 'ExpenseController@edit');
    Route::get('expense/{user_id}/{type}/create', 'ExpenseController@create');
    Route::post('expense/{user_id}/{type}/store', 'ExpenseController@store')->name('allocations.store');
    Route::post('expense/{user_id}/{type}/{id}/update', 'ExpenseController@update')->name('expense.update');
    
    Route::get('expense/{user_id}/{type}/suggestions', 'ExpenseController@suggestions');
    Route::get('expense/{user_id}/{type}/suggestions/{id}', 'ExpenseController@suggestion');

});

/***************    Admin routes  **********************************/
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

    # Admin Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index');

    # Language
    Route::get('language/data', 'Admin\LanguageController@data');
    Route::get('language/{language}/show', 'Admin\LanguageController@show');
    Route::get('language/{language}/edit', 'Admin\LanguageController@edit');
    Route::get('language/{language}/delete', 'Admin\LanguageController@delete');
    Route::resource('language', 'Admin\LanguageController');

    # Article category
    Route::get('articlecategory/data', 'Admin\ArticleCategoriesController@data');
    Route::get('articlecategory/{articlecategory}/show', 'Admin\ArticleCategoriesController@show');
    Route::get('articlecategory/{articlecategory}/edit', 'Admin\ArticleCategoriesController@edit');
    Route::get('articlecategory/{articlecategory}/delete', 'Admin\ArticleCategoriesController@delete');
    Route::get('articlecategory/reorder', 'ArticleCategoriesController@getReorder');
    Route::resource('articlecategory', 'Admin\ArticleCategoriesController');

    # Articles
    Route::get('article/data', 'Admin\ArticleController@data');
    Route::get('article/{article}/show', 'Admin\ArticleController@show');
    Route::get('article/{article}/edit', 'Admin\ArticleController@edit');
    Route::get('article/{article}/delete', 'Admin\ArticleController@delete');
    Route::get('article/reorder', 'Admin\ArticleController@getReorder');
    Route::resource('article', 'Admin\ArticleController');

    # Photo Album
    Route::get('photoalbum/data', 'Admin\PhotoAlbumController@data');
    Route::get('photoalbum/{photoalbum}/show', 'Admin\PhotoAlbumController@show');
    Route::get('photoalbum/{photoalbum}/edit', 'Admin\PhotoAlbumController@edit');
    Route::get('photoalbum/{photoalbum}/delete', 'Admin\PhotoAlbumController@delete');
    Route::resource('photoalbum', 'Admin\PhotoAlbumController');

    # Photo
    Route::get('photo/data', 'Admin\PhotoController@data');
    Route::get('photo/{photo}/show', 'Admin\PhotoController@show');
    Route::get('photo/{photo}/edit', 'Admin\PhotoController@edit');
    Route::get('photo/{photo}/delete', 'Admin\PhotoController@delete');
    Route::resource('photo', 'Admin\PhotoController');

    # Users
    Route::get('user/data', 'Admin\UserController@data');
    Route::get('user/{user}/show', 'Admin\UserController@show');
    Route::get('user/{user}/edit', 'Admin\UserController@edit');
    Route::get('user/{user}/delete', 'Admin\UserController@delete');
    Route::resource('user', 'Admin\UserController');
});
