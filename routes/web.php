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
        Route::get('/login', 'HomeController@login')->name('login');
        Route::get('/feedback', 'CustomerRequestsController@addFeedback')->name('feedback');
        Route::post('/feedback', 'CustomerRequestsController@storeFeedback');
        Route::get('/info-enquiery','CustomerRequestsController@getInfoEnquiery')->name('infoEnquiery');
        Route::post('/info-enquiery', 'CustomerRequestsController@storeInfoEnquiery');
    });

Route::group([
    'prefix' => 'categories',
    'namespace' => 'Customer'
],
    function () {
        Route::get('/list',  'HomeController@newsCategoriesList')->name('categories');
        Route::get('/{slug}/articles/list', 'CategoriesController@articlesOfCategory')->name('articlesOfCategory');
        Route::get('/{slug}/articles/add','ArticlesController@add')->name('addArticle');
        Route::post('/{slug}/articles/add','ArticlesController@insert');
        Route::get('/{slug}/articles/{article}/edit', 'ArticlesController@edit')->name('editArticle');
        Route::post('/{slug}/articles/{article}/edit','ArticlesController@update' );
        Route::post('/{slug}/articles/{article}/delete', 'ArticlesController@delete')->name('deleteArticle');
        Route::get('/{slug}/articles/{id}','ArticlesController@index')->name('showArticle');
    }
);

Route::group([
    'prefix' => 'infosources',
    'namespace' => 'Customer'
],
    function () {
        Route::get('/list','InfoSourcesController@list')->name('infoSourcesList');
    }
);
