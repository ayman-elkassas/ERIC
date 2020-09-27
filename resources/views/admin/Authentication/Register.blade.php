<!DOCTYPE html>
<html>
<head>

    <title>{{env("APP_NAME")}} - SignUP</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="ERIC" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('admin-cuba/assets/images/logo/logo-icon.png')}}" type="image/x-icon">

    <!-- font css -->
    <link rel="stylesheet" href="{{asset('admin-panel-nextro/css/pro.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-panel-nextro/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('admin-panel-nextro/css/fontawsome.css')}}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('admin-panel-nextro/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin-panel-nextro/css/customizer.css')}}">

    {{--    bx icons--}}
    <link rel="stylesheet" href="{{asset('admin-panel-nextro/icons/boxicons.css')}}">
    {{--    csrf token--}}
    {{--meta--}}
    <meta name="csrf-token" content="{{csrf_token()}}">

</head>
<body>
<div class="auth-wrapper align-items-stretch aut-bg-img" style="background-image:url({{asset('admin-panel-nextro/image/auth/login-back.jpg')}})">
    <div class="flex-grow-1">
        <div class="h-100 d-md-flex align-items-end auth-side-img">
            <div class="col-sm-10 auth-content w-auto">
                <img src="{{asset('admin-cuba/assets/images/logo/logo_dark.png')}}" alt="" class="img-fluid">
                <h1 class="text-white my-4">Welcome Back!</h1>
                <h4 class="text-white font-weight-normal">SignUp to your account and get explore the ERIC Dashboard.<br />Do not forget to play with live customizer</h4>
            </div>
        </div>
        <div class="auth-side-form">
            <div class=" auth-content">
                <img src="assets/images/auth/auth-logo-dark.html" alt="" class="img-fluid mb-4 d-block d-xl-none d-lg-none">
                <h4 class="mb-3 f-w-400">Sign up</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bx bx-mail-send"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Email address">
                </div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bx bx-lock-open-alt"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group text-left mt-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input input-primary" id="customCheckdefh2" checked="">
                        <label class="custom-control-label" for="customCheckdefh2">Send me the <a href="#!"> Newsletter</a> weekly.</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-block mb-4">Sign up</button>
                <div class="text-center">
                    <div class="saprator my-4"><span>OR</span></div>
                    <button class="btn text-white bg-facebook mb-2 mr-2  wid-40 px-0 hei-40 rounded-circle"><i class="bx bxl-facebook"></i></button>
                    <button class="btn text-white bg-googleplus mb-2 mr-2 wid-40 px-0 hei-40 rounded-circle"><i class="bx bxl-google-plus"></i></button>
                    <button class="btn text-white bg-twitter mb-2  wid-40 px-0 hei-40 rounded-circle"><i class="bx bxl-twitter"></i></button>
                    <p class="mt-4">Already have an account? <a href="auth-signin-img-side.html" class="f-w-400">SignIn</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pct-customizer">
    <div href="#!" class="pct-c-btn">
        <button class="btn btn-light-danger" id="pct-toggler">
            <i data-feather="settings"></i>
        </button>
        <button class="btn btn-light-primary" data-toggle="tooltip" title="Document" data-placement="left">
            <i data-feather="book"></i>
        </button>
        <button class="btn btn-light-success" data-toggle="tooltip" title="Buy Now" data-placement="left">
            <i data-feather="shopping-bag"></i>
        </button>
        <button class="btn btn-light-info" data-toggle="tooltip" title="Support" data-placement="left">
            <i data-feather="headphones"></i>
        </button>
    </div>
    <div class="pct-c-content ">
        <div class="pct-header bg-primary">
            <h5 class="mb-0 text-white f-w-500">Nextro Customizer</h5>
        </div>
        <div class="pct-body">
            <h6 class="mt-2"><i data-feather="credit-card" class="mr-2"></i>Header settings</h6>
            <hr class="my-2">
            <div class="theme-color header-color">
                <a href="#!" class="" data-value="bg-default"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-primary"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-danger"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-warning"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-info"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-success"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-dark"><span></span><span></span></a>
            </div>
            <h6 class="mt-4"><i data-feather="layout" class="mr-2"></i>Sidebar settings</h6>
            <hr class="my-2">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="cust-sidebar">
                <label class="custom-control-label f-w-600 pl-1" for="cust-sidebar">Light Sidebar</label>
            </div>
            <div class="custom-control custom-switch mt-2">
                <input type="checkbox" class="custom-control-input" id="cust-sidebrand">
                <label class="custom-control-label f-w-600 pl-1" for="cust-sidebrand">Color Brand</label>
            </div>
            <div class="theme-color brand-color d-none">
                <a href="#!" class="active" data-value="bg-primary"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-danger"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-warning"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-info"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-success"><span></span><span></span></a>
                <a href="#!" class="" data-value="bg-dark"><span></span><span></span></a>
            </div>
        </div>
    </div>
</div>

<!-- Required Js -->
<script src="{{asset('admin-panel-nextro')}}/js/vendor-all.min.js"></script>
<script src="{{asset('admin-panel-nextro')}}/js/plugins/bootstrap.min.js"></script>
<script src="{{asset('admin-panel-nextro')}}/js/plugins/feather.min.js"></script>
<script src="{{asset('admin-panel-nextro')}}/js/pcoded.min.js"></script>
<script src="{{asset('admin-panel-nextro')}}/js/boxicons.js"></script>

<script>
    // header option
    $('#pct-toggler').on('click', function() {
        $('.pct-customizer').toggleClass('active');

    });
    // header option
    $('#cust-sidebrand').change(function() {
        if ($(this).is(":checked")) {
            $('.theme-color.brand-color').removeClass('d-none');
            $('.m-header').addClass('bg-dark');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
            $('.theme-color.brand-color').addClass('d-none');
        }
    });
    // Header Color
    $('.brand-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        // $('.header-color > a').removeClass('active');
        // $('.pcoded-header').removeClassPrefix('brand-');
        // $(this).addClass('active');
        if (temp == "bg-default") {
            $('.m-header').removeClassPrefix('bg-');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
            $('.m-header').addClass(temp);
        }
    });
    // Header Color
    $('.header-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        // $('.header-color > a').removeClass('active');
        // $('.pcoded-header').removeClassPrefix('brand-');
        // $(this).addClass('active');
        if (temp == "bg-default") {
            $('.pc-header').removeClassPrefix('bg-');
        } else {
            $('.pc-header').removeClassPrefix('bg-');
            $('.pc-header').addClass(temp);
        }
    });
    // sidebar option
    $('#cust-sidebar').change(function() {
        if ($(this).is(":checked")) {
            $('.pc-sidebar').addClass('light-sidebar');
            $('.pc-horizontal .topbar').addClass('light-sidebar');
            // $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
        } else {
            $('.pc-sidebar').removeClass('light-sidebar');
            $('.pc-horizontal .topbar').removeClass('light-sidebar');
            // $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
        }
    });
    $.fn.removeClassPrefix = function(prefix) {
        this.each(function(i, it) {
            var classes = it.className.split(" ").map(function(item) {
                return item.indexOf(prefix) === 0 ? "" : item;
            });
            it.className = classes.join(" ");
        });
        return this;
    };
</script>
</body>
</html>
