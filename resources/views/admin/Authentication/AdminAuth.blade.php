<!DOCTYPE html>
<html>
<head>

    <title>{{env("APP_NAME")}} - Authentication</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="ERIC" />

    {{--    title--}}
    <title>{{trans('admin.app_name')}}</title>

    <!-- font css -->
    <link rel="stylesheet" href="{{asset('admin-panel-nextro/css/pro.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-panel-nextro/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('admin-panel-nextro/css/fontawsome.css')}}">

    {{--    <!-- vendor css -->--}}
    <link rel="stylesheet" href="{{asset('admin-panel-nextro/css/customizer.css')}}">

    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">

    {{--    icon--}}
    <link rel="icon" href="{{asset('admin-cuba')}}/assets/images/logo/logo-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin-cuba')}}/assets/images/logo/logo-icon.png" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">

    {{--    csrf token--}}
    {{--meta--}}
    <meta name="csrf-token" content="{{csrf_token()}}">

</head>
<body>
<!-- Page Sidebar Ends-->
<div id="content" style="overflow: hidden">
{{--    <router-view name="master"></router-view>--}}
    <master-seen></master-seen>
</div>
    <!-- Container-fluid Ends-->

<!-- Required Js -->

<script src="{{asset('/js/app.js')}}" type="text/javascript"></script>

<script src="{{asset('admin-panel-nextro')}}/js/vendor-all.min.js"></script>
<script src="{{asset('admin-panel-nextro')}}/js/plugins/bootstrap.min.js"></script>
<script src="{{asset('admin-panel-nextro')}}/js/plugins/feather.min.js"></script>
<script src="{{asset('admin-panel-nextro')}}/js/pcoded.min.js"></script>
<script src="{{asset('admin-panel-nextro')}}/js/boxicons.js"></script>

<!-- latest jquery-->
<script src="{{asset('admin-cuba')}}/assets/js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap js-->
<script src="{{asset('admin-cuba')}}/assets/js/bootstrap/popper.min.js"></script>
<script src="{{asset('admin-cuba')}}/assets/js/bootstrap/bootstrap.js"></script>
<!-- feather icon js-->
<script src="{{asset('admin-cuba')}}/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="{{asset('admin-cuba')}}/assets/js/icons/feather-icon/feather-icon.js"></script>
{{--<!-- Sidebar jquery-->--}}
<script src="{{asset('admin-cuba')}}/assets/js/sidebar-menu.js"></script>
<script src="{{asset('admin-cuba')}}/assets/js/config.js"></script>
{{--<!-- Plugins JS start-->--}}
<script src="{{asset('admin-cuba')}}/assets/js/tooltip-init.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('admin-cuba')}}/assets/js/script.js"></script>

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
