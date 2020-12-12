<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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


//TODO:Role And Permissions CRUD
Route::group(['prefix' => 'admin-mrole','namespace' => 'Admin\RoleManagement'], function () {
    Route::group(['middleware' => 'auth.role'], function () {
        //TODO:CRUD Controller
        Route::resource('/manage-role', 'RoleManagement');
        Route::get('/remove-all-rolls','RevokeAllRolls@RemoveAllRolls');
        Route::get('/all-roles-with-permission','RevokeAllRolls@getAllRolesWithPermissions');
        Route::post('/update-role-permission','RevokeAllRolls@changeRolePermission');
    });
});

//TODO:Assign Permissions To Roles
Route::group(['prefix' => 'admin-mpermission','namespace' => 'Admin\PermissionManagement'], function () {
    Route::group(['middleware' => 'auth.role'], function () {
        Route::resource('/manage-permission', 'PermissionManagement');
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

//TODO:Admin CRUD
Route::group(['prefix' => 'admin-members','namespace' => 'Admin\AdminMembers'], function () {
    Route::group(['middleware' => 'auth.role'], function () {
        Route::resource('/admins', 'AdminController');
        //todo:Normal controllers routes
        Route::get('/roles', 'NormalAdminController@getRoleNames');
        Route::get('/remove-all-admins', 'NormalAdminController@RemoveAllRolls');
    });
});

//TODO:User CRUD
Route::group(['prefix' => 'user-members','namespace' => 'Admin\UserMembers'], function () {
    Route::group(['middleware' => 'auth.role'], function () {
        Route::resource('/users', 'UserController');
        //todo:Normal controllers routes
        Route::get('/category', 'NormalUserController@getCategoriesWithFields');
        Route::get('/skill', 'NormalUserController@getSkills');
        Route::get('/getSkillUser/{id}', 'NormalUserController@getSkillUser');
        Route::get('/getFieldUser/{id}', 'NormalUserController@getFieldUser');
        Route::get('/getUserByCharFromFName/{char}', 'NormalUserController@getUserByCharFromFName');
        Route::get('/remove-all-users', 'NormalUserController@RemoveAllUsers');
    });
});

//TODO:Topics CRUD
Route::group(['prefix' => 'admin-topics','namespace' => 'Admin\TopicManagment'], function () {
    Route::group(['middleware' => 'auth.role'], function () {
        Route::resource('/topics', 'TopicController');
        //todo:Normal controllers routes
        Route::get('/remove-all-admins', 'NormalTopicController@RemoveAllCategories');
        Route::get('/getTopics/{id}', 'NormalTopicController@GetTopicsOfUser');
    });
});

Route::get('/cache-clear',function (){
    $exit_code=Artisan::call("optimize:clear");
    //todo:return 0 if execute success
    if($exit_code==0){
        dd("Cached Is Cleared Successfully...");
    }
});




