<?php

//todo:Admin routes
use Intervention\Image\Facades\Image;

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

//todo:Admin Auth routes
if(!function_exists('imageToStreamBase64')){
    function imageToStreamBase64($path=null){

        if($path!=null){
            // encode image as data-url
            $avatar = (string) Image::make(
                public_path().$path)->encode('data-url');
        }
        else{
            return "Invalid Path";
        }

        return $avatar;
    }
}

if(!function_exists('cleanString')) {
    function cleanString($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
};

