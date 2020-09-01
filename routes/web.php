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

/*****************************************/
/*********** КЛИЕНТСКАЯ ЧАСТЬ ************/
/*****************************************/
Route::group([
    'namespace' => 'Customer'
],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
//        Route::get('/login', 'HomeController@login')->name('login');
        Route::get('/feedback', 'CustomerRequestsController@addFeedback')->name('customer.feedback');
        Route::post('/feedback', 'CustomerRequestsController@storeFeedback');
        Route::get('/info-enquiery', 'InfoEnquiriesController@create')->name('customer.infoEnquiery');
        Route::post('/info-enquiery', 'InfoEnquiriesController@store');

        //данные по статьям и категориям /categories+
        Route::group([
            'prefix' => 'categories'
        ],
            function () {
                Route::get('/', 'HomeController@newsCategoriesList')->name('customer.categories');
                Route::get('/{slug}/articles', 'CategoriesController@articlesOfCategory')->name('customer.articlesOfCategory');
                Route::get('/{slug}/articles/{id}', 'ArticlesController@index')->name('customer.showArticle');
            }
        );

    });


/*****************************************/
/****** АДМИНИСТРАТИВНАЯ ЧАСТЬ ***********/
/*****************************************/
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware'=>'auth'
],
    function () {
        Route::get('/', 'HomeController@index')->name('admin');

        //категории новостей /admin/categories +
        Route::group([
            'prefix' => 'categories'
        ],
            function () {
                Route::get('/', 'CategoriesController@index')->name('admin.categoriesList');
                Route::get('add', 'CategoriesController@create')->name('admin.addCategory');
                Route::post('add', 'CategoriesController@insert');
                Route::get('{category}/edit', 'CategoriesController@edit')->name('admin.editCategory');
                Route::post('{category}/edit', 'CategoriesController@update');
                Route::post('{category}/delete', 'CategoriesController@delete')->name('admin.deleteCategory');
                //статьи конкретной категории   /admin/categories/{slug}/articles +
                Route::group([
                    'prefix' => '{slug?}/articles'
                ], function () {
                    Route::get('/', 'CategoriesController@articlesOfCategory')->name('admin.articlesOfCategory');
                    Route::get('add', 'ArticlesController@add')->name('admin.addArticle');
                    Route::post('add', 'ArticlesController@insert');
                    Route::get('{article}/edit', 'ArticlesController@edit')->name('admin.editArticle');
                    Route::post('{article}/edit', 'ArticlesController@update');
                    Route::post('{article}/delete', 'ArticlesController@delete')->name('admin.deleteArticle');
                });
            }
        );

        //Нормальные источники новостей (из базы данных)  /admin/infosources +
        Route::group([
            'prefix' => 'infosources'
        ], function () {
            Route::get('/', 'InfoSourcesController@index')->name('admin.infoSourcesList');
            Route::get('add', 'InfoSourcesController@create')->name('admin.addInfoSource');
            Route::post('add', 'InfoSourcesController@insert');
            Route::get('{source}/edit', 'InfoSourcesController@edit')->name('admin.editInfoSource');
            Route::post('{source}/edit', 'InfoSourcesController@update');
            Route::post('{source}/delete', 'InfoSourcesController@delete')->name('admin.deleteInfoSource');

        });

        Route::resource('infoEnquiries', 'InfoEnquiriesController');
    }
);



Auth::routes();

