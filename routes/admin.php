<?php

use Illuminate\Support\Facades\Config;

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {

//    Config::set("auth.defines","admin");
    //todo:prefix => start any route with "admin" and so on your route
    //todo:namespace => for every controller inside this group should use namespace Admin
    //todo:Make middleware on group routes to check guard login or somehow

    //todo:your middleware name is "admin" declare in kernel
    // and "adminAuthGuard" your guard passed to middleware "admin"

    Route::group(['middleware' => 'admin:adminAuthGuard'], function () {

        //todo:make your internal routes inside this group
        Route::get('/',function (){
            return view('admin.admin-master');
        });
    });
});
