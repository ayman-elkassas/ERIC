<?php

use App\Http\Controllers\Admin\UserRole\RoleController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::group(['prefix' => 'admin','namespace' => 'Admin\Dashboard'], function () {

    //todo:prefix => start any route with "admin" and so on your route
    //todo:namespace => for every controller inside this group should use namespace Admin
    //todo:Make middleware on group routes to check guard login or somehow

    //todo:your middleware name is "admin" declare in kernel
    // and "adminAuthGuard" your guard passed to middleware "admin"

    Route::group(['middleware' => 'jwt.check'], function () {

    });

    Route::group(['middleware' => 'auth.role'], function () {

        //todo:any route should auth

        //todo:make your internal routes inside this group
        Route::get('/', 'HomeController@index');

        //todo:make your internal routes inside this group
        Route::post('/user', 'HomeController@getUser');

        //todo:any path forward to index Dashboard Admin Panel page
        Route::get('/{any}', function () {
            return redirect('/admin/');
        })->where('any', '.*');

    });

    Route::get('invalidToken',function (){
        return view('Admin.Authentication.TokenExpire');
    });

});

//TODO:CRUD CONTROLLER
// GET	        /users-role	            index	photos.index
// GET	        /users-role/create	    create	photos.create
// POST	        /users-role	            store	photos.store
// GET	        /users-role/{id}	    show	photos.show
// GET	        /users-role/{id}/edit	edit	photos.edit (get object by id to edit)
// PUT/PATCH	/users-role/{id}	    update	photos.update (put new object to update)
// DELETE	    /photos/{id}	        destroy	photos.destroy

Route::group(['prefix' => 'admin-members','namespace' => 'Admin\AdminMembers'], function () {
    Route::group(['middleware' => 'auth.role'], function () {
        Route::resource('/admins', 'AdminController');
    });
});

Route::group(['prefix' => 'admin-mrole','namespace' => 'Admin\RoleManagement'], function () {
    Route::group(['middleware' => 'auth.role'], function () {
        //TODO:CRUD Controller
        Route::resource('/manage-role', 'RoleManagement');

        Route::get('/remove-all-rolls','RevokeAllRolls@RemoveAllRolls');
        Route::get('/all-roles-with-permission','RevokeAllRolls@getAllRolesWithPermissions');
        Route::post('/update-role-permission','RevokeAllRolls@changeRolePermission');

    });
});

Route::group(['prefix' => 'admin-mpermission','namespace' => 'Admin\PermissionManagement'], function () {
    Route::group(['middleware' => 'auth.role'], function () {
        Route::resource('/manage-permission', 'PermissionManagement');
    });
});




