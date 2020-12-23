<?php

namespace App\Http\Controllers\Admin\ResourcePdf;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class NormalResourcePdf extends Controller
{
    //
    public function __construct()
    {
        //TODO:To Auth token who access this routes
        //todo:should insert in constructor of controller to auth with provider
        Config::set('jwt.user', Admins::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Admins::class,
        ]]);
    }
}
