<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'auth','namespace'=>'Admin\Authentication'],function (){

    //todo:Auth Admins
    Route::get('/login', 'Login@Login');
    Route::post('/login', 'Login@doLogin');

    Route::post('/register',function (){
        return view('admin.Authentication.Register');
    });

    Route::get('/logout', 'Login@Logout');
});
