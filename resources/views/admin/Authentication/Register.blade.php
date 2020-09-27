@extends('Admin.Authentication.Layout.Master')

@section('content')
<div class="auth-wrapper align-items-stretch aut-bg-img" style="background-image:url({{asset('admin-panel-nextro/image/auth/login-back.jpg')}})">
    <div class="flex-grow-1">
        <div class="h-100 d-md-flex align-items-end auth-side-img">
            <div class="col-sm-10 auth-content w-auto">
                <img src="{{asset('admin-cuba/assets/images/logo.svg')}}" alt="" class="img-fluid">
                <h1 class="text-white my-4">{{trans('admin.register_page.welcome')}}</h1>
                    <h4 class="text-white font-weight-normal">{{trans('admin.register_page.desc1')}}<br />{{trans('admin.register_page.desc2')}}</h4>
            </div>
        </div>
        <div class="auth-side-form">
            <form method="post" action="{{FAdminAuthUrl('register')}}">
                <div class=" auth-content">
                    <img src="assets/images/auth/auth-logo-dark.html" alt="" class="img-fluid mb-4 d-block d-xl-none d-lg-none">
                    <h3 class="mb-4 f-w-400">{{trans('admin.register_page.title')}}</h3>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="Username">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bx bx-mail-send"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Email address">
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bx bx-lock-open-alt"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group text-left mt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input input-primary" id="customCheckdefh2" checked="">
                            <label class="custom-control-label" for="customCheckdefh2">Send me the <a href="#!"> Newsletter</a> weekly.</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mb-0">Sign up</button>
                    <div class="text-center">
                        <div class="saprator my-4"><span>OR</span></div>
                        <button class="btn text-white bg-facebook mb-2 mr-2  wid-40 px-0 hei-40 rounded-circle"><i class="bx bxl-facebook"></i></button>
                        <button class="btn text-white bg-googleplus mb-2 mr-2 wid-40 px-0 hei-40 rounded-circle"><i class="bx bxl-google-plus"></i></button>
                        <button class="btn text-white bg-twitter mb-2  wid-40 px-0 hei-40 rounded-circle"><i class="bx bxl-twitter"></i></button>
                        <p class="mb-2 mt-4 text-muted">Already have an account? <a href="{{FAdminAuthUrl('login')}}" class="f-w-400">SignIn</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
