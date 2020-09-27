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
