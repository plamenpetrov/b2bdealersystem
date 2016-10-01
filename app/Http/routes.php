<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/login', array(
    'as' => 'login_get',
    'uses' => 'AuthController@getLogin'
));

Route::post('/login', array(
    'as' => 'login_post',
    'uses' => 'AuthController@postLogin'
        )
);

Route::get('/logout', array(
    'as' => 'logout',
    'uses' => 'AuthController@logout'
));

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
    Route::get('/nomenclature', array('as' => 'nomenclature', 'uses' => 'HomeController@nomenclature'));

    ################### COMPANY ROUTES #######################
    Route::group(['prefix' => 'company'], function() {
        Route::get('/', array('as' => 'company_index', 'uses' => 'CompanyController@index'));
        Route::get('/add', array('as' => 'company_add', 'uses' => 'CompanyController@add'));
        Route::get('/edit/{id}', array('as' => 'company_edit', 'uses' => 'CompanyController@edit'))->where('id', '[0-9]+');
        Route::get('/delete/{id}', array('as' => 'company_delete', 'uses' => 'CompanyController@delete'))->where('id', '[0-9]+');

        Route::post('/store', array('as' => 'company_save', 'uses' => 'CompanyController@store'));
    });

    ################### PERSON ROUTES #######################
    Route::group(['prefix' => 'person'], function() {
        Route::get('/', array('as' => 'person_index', 'uses' => 'PersonController@index'));
        Route::get('/add', array('as' => 'person_add', 'uses' => 'PersonController@add'));
        Route::get('/edit/{id}', array('as' => 'person_edit', 'uses' => 'PersonController@edit'))->where('id', '[0-9]+');
        Route::get('/delete/{id}', array('as' => 'person_delete', 'uses' => 'PersonController@delete'))->where('id', '[0-9]+');

        Route::post('/store', array('as' => 'person_save', 'uses' => 'PersonController@store'));
    });

    ################### PRODUCT GROUPS ROUTES #######################
    Route::group(['prefix' => 'productgroups'], function() {
        Route::get('/', array('as' => 'productgroups_index', 'uses' => 'ProductGroupsController@index'));
        Route::get('/add', array('as' => 'productgroups_add', 'uses' => 'ProductGroupsController@add'));
        Route::get('/edit/{id}', array('as' => 'productgroups_edit', 'uses' => 'ProductGroupsController@edit'))->where('id', '[0-9]+');
        Route::get('/delete/{id}', array('as' => 'productgroups_delete', 'uses' => 'ProductGroupsController@delete'))->where('id', '[0-9]+');

        Route::post('/store', array('as' => 'productgroups_save', 'uses' => 'ProductGroupsController@store'));
    });

    ################### PRODUCT ROUTES #######################
    Route::group(['prefix' => 'product'], function() {
        Route::get('/', array('as' => 'product_index', 'uses' => 'ProductController@index'));
        Route::get('/add', array('as' => 'product_add', 'uses' => 'ProductController@add'));
        Route::get('/edit/{id}', array('as' => 'product_edit', 'uses' => 'ProductController@edit'))->where('id', '[0-9]+');
        Route::get('/delete/{id}', array('as' => 'product_delete', 'uses' => 'ProductController@delete'))->where('id', '[0-9]+');

        Route::post('/store', array('as' => 'product_save', 'uses' => 'ProductController@store'));
    });

    ################### CART ROUTES #######################
    Route::group(['prefix' => 'cart'], function() {
        Route::get('/', array('as' => 'cart_index', 'uses' => 'CartController@index'));
        Route::get('/delete/{id}', array('as' => 'cart_delete', 'uses' => 'CartController@delete'))->where('id', '[0-9]+');

        Route::post('/store', array('as' => 'cart_save', 'uses' => 'CartController@store'));
        Route::post('/confirm', array('as' => 'cart_confirm', 'uses' => 'CartController@confirm'))->where('id', '[0-9]+');

        Route::get('/empty', array('as' => 'cart_empty', 'uses' => 'CartController@emptyCart'));
    });

    ################### ORDERS ROUTES #######################
    Route::group(['prefix' => 'order'], function() {
        Route::get('/', array('as' => 'order_index', 'uses' => 'OrderController@index'));
        Route::get('/show/{id}', array('as' => 'order_show', 'uses' => 'OrderController@show'))->where('id', '[0-9]+');

        Route::get('/cancellation/{id}', array('as' => 'orders_cancellation', 'uses' => 'OrderController@cancellation'))->where('id', '[0-9]+');
    });
});
