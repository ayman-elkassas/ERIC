<!DOCTYPE html>
<html lang="en">
<head>
{{--    meta tags--}}
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">

{{--    title--}}
    <title>{{trans('admin.app_name')}}</title>

{{--    icon--}}
    <link rel="icon" href="{{asset('admin-cuba')}}/assets/images/logo/logo-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin-cuba')}}/assets/images/logo/logo-icon.png" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">

{{--    main css--}}
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

{{--    csrf token--}}
    {{--meta--}}
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body ref="target" id="target" class="center dark-sidebar" main-theme-layout="box-layout">

<!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-main-header" id="admin-header">
            <admin-header></admin-header>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
            <header class="main-nav" sidebar-layout="iconcolor-sidebar">
                <div  class="logo-wrapper"><router-link to="/home"><img style="width: -webkit-fill-available" class="img-fluid for-dark" src="{{asset('admin-cuba')}}/assets/images/logo/logo.png" alt=""></router-link>
                    <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
                </div>
                <nav>
                    <div  class="main-navbar">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div  id="mainnav">
                            <div >
                                <ul  class="nav-menu custom-scrollbar">

{{--                                todo:back--}}
                                    <li class="back-btn">
                                        <router-link to="/home">
                                            <img class="img-fluid" src="{{asset('admin-cuba')}}/assets/images/logo/logo-icon.png" alt=""></router-link>
                                        <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                    </li>

                                    <li class="sidebar-title">
                                        <div>
                                            <h6 class="lan-1">General</h6>
                                            <p>{{trans('admin.menu_titles.dashboard')}}</p>
                                        </div>
                                    </li>

{{--                                todo:User Management Roles And Permission--}}
                                    @role('super_admin')
                                    <li  class="dropdown">
                                        <a class="nav-link menu-title" href="#"><i data-feather="home"></i><span>{{trans('admin.roles.title')}}</span>
                                            <label class="badge badge-success">2</label>
                                        </a>
                                        <ul id="roles" class="nav-submenu menu-content content">
                                            <li><router-link to="/admin-role">{{trans('admin.roles.sub1')}}</router-link></li>
                                            <li><router-link to="/admin-permission">{{trans('admin.roles.sub2')}}</router-link></li>
                                        </ul>
                                    </li>
                                    @endrole

{{--                                todo:Users And Privealage--}}
                                    <li  class="dropdown">
                                        <a class="nav-link menu-title" href="#"><i data-feather="home"></i><span>{{trans('admin.mem.member')}}</span>
                                            <label class="badge badge-success">2</label>
                                        </a>
                                        <ul id="user" class="nav-submenu menu-content content">
                                            <li><router-link to="/admin-list">{{trans('admin.mem.admin')}}</router-link></li>
                                            <li><router-link to="/user-list">{{trans('admin.mem.user')}}</router-link></li>
                                        </ul>
                                    </li>

{{--                                todo:Posts--}}
                                    <li id="post">
                                        <router-link class="nav-link menu-title link-nav" to="/post-list">
                                            <i data-feather="layout"></i>
                                            <span>{{trans('admin.eric_sys.Post.Post')}} </span>
                                        </router-link>
                                    </li>

{{--                                    todo:Fields--}}
                                    <li id="field">
                                        <router-link class="nav-link menu-title link-nav" to="/field-list">
                                            <i data-feather="zap"></i>
                                            <span>{{trans('admin.eric_sys.field.field')}} </span>
                                        </router-link>
                                    </li>

{{--                                   todo: main idea of project--}}
                                    <li class="sidebar-title">
                                        <div>
                                            <h6 class="lan-8">{{trans('admin.dash_headers.second')}}</h6>
                                            <p class="lan-9">Ready to use Apps</p>
                                        </div>
                                    </li>

{{--                                    todo:Resources--}}
                                    <li class="dropdown">
                                        <a class="nav-link menu-title" href="#">
                                            <i data-feather="box"></i>
                                            <span>{{trans('admin.eric_sys.res.resources')}}
                                                <label class="badge badge-success">New</label>
                                            </span>
                                        </a>

                                        <ul id="resource" class="nav-submenu menu-content">
                                            <li><router-link to="./resource-text-list">{{trans('admin.eric_sys.res.txt')}}</router-link></li>
                                            <li><router-link to="./resource-video-list">{{trans('admin.eric_sys.res.video')}}</router-link></li>
                                            <li><router-link to="./resource-image-list">{{trans('admin.eric_sys.res.img')}}</router-link></li>
                                            <li><router-link to="./resource-voice-list">{{trans('admin.eric_sys.res.voice')}}</router-link></li>
                                            <li><router-link to="./resource-pdf-list">{{trans('admin.eric_sys.res.pdf')}}</router-link></li>
                                        </ul>

                                    </li>

{{--                                    todo: Courses--}}
                                    <li id="course" class="dropdown">
                                        <router-link class="nav-link menu-title link-nav" to="./course-list">
                                            <i data-feather="shopping-bag"></i>
                                            <span>{{trans('admin.eric_sys.course.course')}}</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </div>
                </nav>
            </header>
            <!-- Page Sidebar Ends-->
            <div class="page-body content" id="content">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><router-link to="/home"><i data-feather="home"></i></router-link></li>
                                    <li class="breadcrumb-item">Pages</li>
                                </ol>
                            </div>
                            <div class="col-6">
                                <!-- Bookmark Start-->
                                <div class="bookmark pull-right">
                                    <ul>
                                        <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                                        <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                                        <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                                        <li><a href="#"><i class="bookmark-search" data-feather="star"></i></a>
                                            <form class="form-inline search-form" action="#" method="get">
                                                <div class="form-group form-control-search">
                                                    <div class="Typeahead Typeahead--twitterUsers">
                                                        <div class="u-posRelative">
                                                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search.." name="q" title="" autofocus>
                                                            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div>
                                                        </div>
                                                        <div class="Typeahead-menu"></div>
                                                        <script id="result-template" type="text/x-handlebars-template">
                                                            <div class="ProfileCard u-cf">
                                                                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                                                                <div class="ProfileCard-details">
                                                                    <div class="ProfileCard-realName">Ayman</div>
                                                                </div>
                                                            </div>
                                                        </script>
                                                        <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
                                                    </div>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Bookmark Ends-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div  class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <admin-main></admin-main>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2020 © ERIC All rights reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="pull-right mb-0">Ayman Elkassas Developed with  <i class="fa fa-heart font-secondary"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

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

    {{--main js--}}
<script src="{{asset('/js/app.js')}}" type="text/javascript"></script>

</body>
</html>
