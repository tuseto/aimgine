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

//-----------------------------------------------------ADMIN------------------------------------------------------//
Route::group(['middleware' => ['web']], function () {
    Route::get('admin', 'admin\LoginController@login');
    Route::post('admin', 'admin\LoginController@doLogin');
    Route::get('admin/logout', 'admin\LoginController@logout');

    Route::group(['middleware' => ['checkAdmin']], function () {
        Route::get('admin/index','admin\IndexController@index');
        Route::resource('admin/home/slider', 'admin\home\SliderController');
        Route::resource('admin/home/entrytext', 'admin\home\EntrytextController');
        Route::resource('admin/home/service', 'admin\home\ServiceController');

        Route::resource('admin/work/categories', 'admin\work\CategoriesController');

        Route::resource('admin/work/projects/{project}/images', 'admin\work\ProjectImages');

        Route::resource('admin/work/projects', 'admin\work\ProjectsController');





    });
});
