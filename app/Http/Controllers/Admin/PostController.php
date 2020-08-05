<?php

//Make namespace of Controller class folder
namespace App\Http\Controllers\Admin;

//And use any classes used in controller
use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Return All Posts
    public function all_post() {
//        return Posts::all();
        return Posts::with('p_user')->get();
    }
}
