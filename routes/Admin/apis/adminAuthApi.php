<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

//todo:whole file with prefix (api) => then total (api.admin/auth/your_route)

Route::group(['prefix'=>'auth','namespace'=>'Admin\Authentication'],function (){

    Route::post('/login', 'LoginController@Login');
    Route::post('/register', 'RegisterController@Register');

    //todo:any path forward to index Dashboard Admin Panel page
    Route::get('/{any}', function () {
        return redirect(FAdminAuthUrl('login'));
    })->where('any', '.*');

});
