<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'auth','namespace'=>'Admin\Authentication'],function (){

    //todo:Auth Admins
    //todo:Login
    Route::get('/login', 'LoginController@Login');
    Route::post('/login', 'LoginController@DoLogin');

    //todo:ForgetPassword
    Route::get('/forget-password','ForgetPasswordController@ForgetPassword');
    Route::post('/forget-password','ForgetPasswordController@DoForgetPassword');

    //todo:Register
    Route::get('/register', 'RegisterController@Register');
    Route::post('/register', 'RegisterController@DoRegister');

    //todo:logout
    Route::group(['middleware' => 'jwt.auth'], function () {

        //todo:any route should auth
        Route::get('/logout', 'LoginController@Logout');

    });

//    //todo:any path forward to index Dashboard Admin Panel page
//    Route::get('/{any}', function () {
//        return redirect(FAdminAuthUrl('login'));
//    })->where('any', '.*');

});
