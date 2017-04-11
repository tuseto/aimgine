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
        Route::get('admin/home/references', 'admin\home\ReferenceController@index');
        Route::put('admin/home/references', 'admin\home\ReferenceController@update');

        Route::resource('admin/work/categories', 'admin\work\CategoryController');
        Route::resource('admin/work/projects/{project}/images', 'admin\work\ProjectImageController');
        Route::resource('admin/work/projects', 'admin\work\ProjectController');

        Route::resource('admin/wedo/categories', 'admin\wedo\CategoryController');
        Route::resource('admin/wedo/services', 'admin\wedo\ServiceController');

        Route::resource('admin/whoarewe/team', 'admin\whoarewe\TeamController');
        Route::resource('admin/whoarewe/testimonials', 'admin\whoarewe\TestimonialController');
        Route::get('admin/whoarewe/ourapproach', 'admin\whoarewe\OurApproachController@index');
        Route::post('admin/whoarewe/ourapproach', 'admin\whoarewe\OurApproachController@update');

        Route::resource('admin/contactus/forms', 'admin\contactus\FormsController');
        Route::resource('admin/contactus/elements', 'admin\contactus\ElementsController');

        Route::resource('admin/blog/categories', 'admin\blog\CategoryController');
        Route::resource('admin/blog/articles', 'admin\blog\ArticleController');

        Route::resource('admin/pagetags', 'admin\PagetagsController');

        Route::resource('admin/ourclients', 'admin\ourclients\OurClientsController');

        Route::post('admin/api/newArticle','admin\api\ApiController@newArticle');
        Route::post('admin/api/ourapproach','admin\api\ApiController@editOurApproach');
        Route::post('admin/api/newBlogArticle','admin\api\ApiController@newBlogArticle');


    });
});
Route::get('/', 'client\IndexController@index');
Route::get('/', 'client\IndexController@index');

Route::get('/work', 'client\WorkController@index');
Route::get('/work/{categoryname}/{category}', 'client\WorkController@showCategory');
Route::get('/work/{categoryname}/{projectname}/{project}', 'client\WorkController@showProject');

Route::get('/our-services/{catname}/{wedocategory}', 'client\OurServicesController@index');

Route::get('/who-we-are/team', 'client\WhoareweController@team');
Route::get('/who-we-are/testimonials', 'client\WhoareweController@testimonials');
Route::get('/who-we-are/ourapproach', 'client\WhoareweController@ourapproach');

Route::get('/our-clients', 'client\OurclientsController@index');
Route::get('/contact-us', 'client\ContactusController@index');
Route::get('/blog', 'client\BlogController@index');
Route::get('/blog/{catname}/{projectname}/{article}', 'client\BlogController@singleArticle');
Route::get('/blog/{catname}/{category}', 'client\BlogController@categoryArticles');
