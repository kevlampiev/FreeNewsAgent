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

Route::get('/', [
    'uses' => 'Customer\HomeController@index'
])->name('home');

Route::get('/login', [
    'uses' => 'Customer\HomeController@login'
])->name('login');

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

        Route::get('/{category_id}/articles/{id}', [
            'uses' => 'ArticlesController@index'
        ])->name('showArticle');

    }
);

//Route::get('/categories/list', [
//    'uses' => 'Customer\HomeController@newsCategoriesList'
//])->name('categories');
//
//Route::get('/categories/{id}/articles/list', [
//    'uses' => 'Customer\CategoriesController@articlesOfCategory'
//])->name('articlesOfCategory');
//
//Route::get('/categories/{category_id}/articles/add', [
//    'uses' => 'Customer\ArticlesController@add'
//])->name('addArticle');
//
//Route::get('/categories/{category_id}/articles/{id}', [
//    'uses' => 'Customer\ArticlesController@index'
//])->name('showArticle');


