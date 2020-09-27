<?php

//todo:Admin routes
if(!function_exists('FAdminUrl')){
    function FAdminUrl($url=null){
        return url('/admin/'.$url);
    }
}

//todo:Admin Auth routes
if(!function_exists('FAdminAuthUrl')){
    function FAdminAuthUrl($url=null){
        return url('/auth/'.$url);
    }
}

//todo:AdminAuth Guard
if(!function_exists('FAdminAuthGuard')){
    function FAdminAuthGuard(){
        return auth()->guard('adminAuthGuard');
    }
}
