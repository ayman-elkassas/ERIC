<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin','namespace' => 'Admin\Dashboard'], function () {

    //todo:prefix => start any route with "admin" and so on your route
    //todo:namespace => for every controller inside this group should use namespace Admin
    //todo:Make middleware on group routes to check guard login or somehow

    //todo:your middleware name is "admin" declare in kernel
    // and "adminAuthGuard" your guard passed to middleware "admin"

    Route::group(['middleware' => 'jwt.check'], function () {
        //todo:make your internal routes inside this group
        Route::get('/', 'HomeController@index');

    });

    Route::group(['middleware' => 'jwt.auth'], function () {

        //todo:any route should auth

    });

    //todo:any path forward to index Dashboard Admin Panel page
    Route::get('/{any}', function () {
        return redirect('/admin/');
    })->where('any', '.*');
});
