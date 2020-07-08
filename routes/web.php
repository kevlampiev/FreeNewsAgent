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
        Route::get('/', [
            'uses' => 'HomeController@index'
        ])->name('home');

        Route::get('/login', [
            'uses' => 'HomeController@login'
        ])->name('login');

        Route::get('/feedback', [
           'uses'=>"CustomerRequestsController@addFeedback"
        ])->name('feedback');

        Route::post('/feedback', [
            'uses'=>"CustomerRequestsController@storeFeedback"
        ]);

        Route::get('/info-enquiery', [
           'uses'=>"CustomerRequestsController@getInfoEnquiery"
        ])->name('infoEnquiery');

        Route::post('/info-enquiery', [
            'uses'=>"CustomerRequestsController@storeInfoEnquiery"
        ]);


    });

Route::group([
    'prefix' => 'categories',
    'namespace' => 'Customer'
],
    function () {
        Route::get('/list', [
            'uses' => 'HomeController@newsCategoriesList'
        ])->name('categories');

        Route::get('/{id}/articles/list', [
            'uses' => 'CategoriesController@articlesOfCategory'
        ])->name('articlesOfCategory');

        Route::get('/{category_id}/articles/add', [
            'uses' => 'ArticlesController@add'
        ])->name('addArticle');

        Route::post('/{category_id}/articles/add',[
        'uses'=>'ArticlesController@insert' ]);

        Route::get('/{category_id}/articles/{article}/edit', [
            'uses' => 'ArticlesController@edit'
        ])->name('editArticle');

        Route::post('/{category_id}/articles/{article}/edit',[
            'uses'=>'ArticlesController@update' ]);

        Route::post('/{category_id}/articles/{article}/delete', [
            'uses'=>'ArticlesController@delete'
        ])->name('deleteArticle');

        Route::get('/{category_id}/articles/{id}', [
            'uses' => 'ArticlesController@index'
        ])->name('showArticle');



    }
);
