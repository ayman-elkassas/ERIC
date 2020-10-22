<?php
//todo:Roles

//todo:to assign role to user
// one role
// \auth()->user()->assignRole('admin');
// or many roles
// \auth()->user()->assignRole('admin','user');

//todo:to check user role
// if(auth()->user()->hasRole('admin')){
//    dd("Ok");
// }

//todo:to remove role from user
// \auth()->user()->removeRole('admin');

//todo:if user has many roles and you want to remove all roles and assign
// to u one role
// \auth()->user()->syncRoles(['admin']);

//todo:Permissions

//todo:to give user permissions
// \auth()->user()->givePermissionTo('add');

//todo:to check permission user
// \auth()->user()->hasPermissionTo(['add']);
// OR using permission id
// \auth()->user()->hasPermissionTo('1');
// \auth()->user()->hasPermissionTo(Permission->find(1)->id);

//todo:to revoke permission from user
// \auth()->user()->revokePermissionTo('add');

//todo:to revoke & add new permission in one
// \auth()->user()->syncPermissions(['add','edit']);

//todo:to check if has any permission
// \auth()->user()->hasAnyPermission(['add','edit']);

// todo:and if more visite
//  https://spatie.be/docs/laravel-permission/v3/basic-usage/basic-usage

//Roles And Permissions

//todo: Assign permissions to role (All the same previous methods)
// $role=Role::find(1);
// $role->givePermissionTo('add','edit','delete','view');

//todo:check if user can make this permission or not
// $user->can('edit');

//todo:to revoke all permissions and add new at one
// $role->syncPermissions(['add','edit']);
