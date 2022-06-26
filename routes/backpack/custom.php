<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
        'prefix'     => config('backpack.base.route_prefix', 'admin'),
        'middleware' => ['web', 'admin'],
], function () {
    Route::middleware('can:manage static contents')->group(function() {
        Route::get('/static-page', '\App\Http\Controllers\AdminStaticPageController@list');
        Route::get('/static-page/edit/{id}', '\App\Http\Controllers\AdminStaticPageController@edit');
        Route::post('/static-page/edit/{id}', '\App\Http\Controllers\AdminStaticPageController@update');

        Route::get('/static-block', '\App\Http\Controllers\AdminStaticBlockController@list');
        Route::get('/static-block/edit/{id}', '\App\Http\Controllers\AdminStaticBlockController@edit');
        Route::post('/static-block/edit/{id}', '\App\Http\Controllers\AdminStaticBlockController@update');

        Route::get('/static-images', '\App\Http\Controllers\AdminStaticImagesController@list');
        Route::get('/static-images/edit/{id}', '\App\Http\Controllers\AdminStaticImagesController@edit');
        Route::post('/static-images/edit/{id}', '\App\Http\Controllers\AdminStaticImagesController@update');
    });

    CRUD::resource('/article', '\App\Http\Controllers\ArticleCrudController');
    CRUD::resource('/link', '\App\Http\Controllers\LinkCrudController');
    CRUD::resource('/ads', '\App\Http\Controllers\AdCrudController');
    CRUD::resource('/category', '\App\Http\Controllers\CategoryCrudController');
});
