<?php

//todo:Admin routes
use Illuminate\Support\Facades\Storage;
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
                storage_path()."/app/public".$path)->encode('data-url');
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

if(!function_exists('saveInStorage')){
    function saveInStorage($file,$mimeTpe,$uploadPath,$post_id=null){

        $strPos=strpos($file,';');
        $sub=substr($file,0,$strPos);
        $ex=explode('/',$sub)[1];
        $name=time().'.'.$ex;

        $str_decode=explode(',', $file)[1];

        $upload_path=$uploadPath.$post_id."/";

        switch ($mimeTpe) {
            case 'image':
                //do something
                //todo:Avatar
                $img=Image::make($file)->resize(350,350);
                //todo:after make link (php artisan storage:link) save as following
                Storage::disk("public")->put($upload_path.$name, (string) $img->encode(), 'public');
                return [$name,$upload_path];
            default:
                //todo:after make link (php artisan storage:link) save as following
                Storage::disk("public")->put($upload_path.$name, (string) base64_decode($str_decode), 'public');
                return [$name,$upload_path];
        }
    }
}

