<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'namespace' => 'Customer'
],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
//        Route::get('/login', 'HomeController@login')->name('login');
        Route::get('/feedback', 'CustomerRequestsController@addFeedback')->name('customer.feedback');
        Route::post('/feedback', 'CustomerRequestsController@storeFeedback');
        Route::get('/info-enquiery','CustomerRequestsController@getInfoEnquiery')->name('customer.infoEnquiery');
        Route::post('/info-enquiery', 'CustomerRequestsController@storeInfoEnquiery');
    });

Route::group([
    'prefix' => 'categories',
    'namespace' => 'Customer'
],
    function () {
        Route::get('/',  'HomeController@newsCategoriesList')->name('customer.categories');
        Route::get('/{slug}/articles', 'CategoriesController@articlesOfCategory')->name('customer.articlesOfCategory');
        Route::get('/{slug}/articles/{id}','ArticlesController@index')->name('customer.showArticle');
    }
);

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
],
    function () {
        Route::get('/','HomeController@index')->name('admin');
        Route::get('infosources','InfoSourcesController@list')->name('admin.infoSourcesList');
        Route::get('categories','CategoriesController@index')->name('admin.categoriesList');
        Route::get('/{slug}/articles','CategoriesController@articlesOfCategory')->name('admin.articlesOfCategory');
        Route::get('/{slug}/articles/add','ArticlesController@add')->name('admin.addArticle');
        Route::post('/{slug}/articles/add','ArticlesController@insert');
        Route::get('/{slug}/articles/{article}/edit', 'ArticlesController@edit')->name('admin.editArticle');
        Route::post('/{slug}/articles/{article}/edit','ArticlesController@update' );
        Route::post('/{slug}/articles/{article}/delete', 'ArticlesController@delete')->name('admin.deleteArticle');
    }
);

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
