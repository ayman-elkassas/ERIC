<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <title>{{env("APP_NAME")}}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="{{asset('admin/assets/images/favicon.png')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    {{--Main Style--}}
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://colorlib.com//polygon/adminty/files/assets/scss/partials/menu/_pcmenu.scss">

{{--meta--}}
    <meta name="csrf-token" content="{{csrf_token()}}">

</head>
<body>

{{--Page Loader--}}
<div  class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
{{--        header--}}
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="index-2.html">
                        <img class="img-fluid" src="{{asset('admin')}}/assets/images/logo.png" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()" data-cf-modified-9e8b5592bad3a80efa739fb4-="">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                    <span class="badge bg-c-pink">5</span>
                                </div>
                                <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{asset('admin')}}/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{asset('admin')}}/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{asset('admin')}}/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-message-square"></i>
                                    <span class="badge bg-c-green">3</span>
                                </div>
                            </div>
                        </li>
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{asset('admin')}}/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>{{\Auth::user()->name}}</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="#">
                                            <i class="feather icon-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="user-profile.html">
                                            <i class="feather icon-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="email-inbox.html">
                                            <i class="feather icon-mail"></i> My Messages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="auth-lock-screen.html">
                                            <i class="feather icon-lock"></i> Lock Screen
                                        </a>
                                    </li>
                                    <li>
                                        <a href="auth-normal-sign-in.html">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
{{--        contacts--}}
        <div id="sidebar" class="users p-chat-user showChat">
            <div class="had-container">
                <div class="card card_main p-fixed users-main">
                    <div class="user-box">
                        <div class="chat-inner-header">
                            <div class="back_chatBox">
                                <div class="right-icon-control">
                                    <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                    <div class="form-icon">
                                        <i class="icofont icofont-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-friend-list">
                            <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius img-radius" src="{{asset('admin')}}/assets/images/avatar-3.jpg" alt="Generic placeholder image ">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Josephin Doe</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="{{asset('admin')}}/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Lary Doe</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="{{asset('admin')}}/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Alice</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="{{asset('admin')}}/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Alia</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="{{asset('admin')}}/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Suzen</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        innter chatting--}}
        <div class="showChat_inner">
            <div class="media chat-inner-header">
                <a class="back_chatBox">
                    <i class="feather icon-chevron-left"></i> Josephin Doe
                </a>
            </div>
            <div class="media chat-messages">
                <a class="media-left photo-table" href="#!">
                    <img class="media-object img-radius img-radius m-t-5" src="{{asset('admin')}}/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                </a>
                <div class="media-body chat-menu-content">
                    <div class="">
                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
            </div>
            <div class="media chat-messages">
                <div class="media-body chat-menu-reply">
                    <div class="">
                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
                <div class="media-right photo-table">
                    <a href="#">
                        <img class="media-object img-radius img-radius m-t-5" src="{{asset('admin')}}/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                    </a>
                </div>
            </div>
            <div class="chat-reply-box p-b-20">
                <div class="right-icon-control">
                    <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                    <div class="form-icon">
                        <i class="feather icon-navigation"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                {{--todo:menu sidebar--}}
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">

{{--                        Members--}}
                        <div class="pcoded-navigatio-lavel">{{trans('admin.dash_headers.first')}}</div>
                        <ul class="pcoded-item pcoded-left-item">
                            {{-- pcoded-trigger => to make by default open--}}
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                    <span class="pcoded-mtext">{{trans('admin.mem.member')}}</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <router-link to="/admin-user">
                                            <span class="pcoded-mtext">{{trans('admin.mem.admin')}}</span>
                                        </router-link>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-mtext">{{trans('admin.mem.user')}}</span>
                                            <span class="pcoded-badge label label-danger ">NEW</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

{{--                        Resources--}}
                        <div class="pcoded-navigatio-lavel">{{trans('admin.dash_headers.second')}}</div>
                        <ul class="pcoded-item pcoded-left-item">
{{--                            pcoded-trigger => to make by default open--}}
                            <li class="pcoded-hasmenu pcoded-trigger">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-bookmark"></i></span>
                                    <span class="pcoded-mtext">{{trans('admin.eric_sys.res.resources')}}</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-mtext">{{trans('admin.eric_sys.res.txt')}}</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-mtext">{{trans('admin.eric_sys.res.video')}}</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-mtext">{{trans('admin.eric_sys.res.img')}}</span>
                                            <span class="pcoded-badge label label-info ">NEW</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-mtext">{{trans('admin.eric_sys.res.voice')}}</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-mtext">{{trans('admin.eric_sys.res.pdf')}}</span>
                                            <span class="pcoded-badge label label-danger ">NEW</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

{{--                        Course--}}
                        <ul class="pcoded-item pcoded-left-item">
                            {{--                            pcoded-trigger => to make by default open--}}
                            <li class="pcoded">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-check"></i></span>
                                    <span class="pcoded-mtext">{{trans('admin.eric_sys.course.course')}}</span>
                                </a>
                            </li>
                        </ul>
{{--                        Fields--}}
                        <ul class="pcoded-item pcoded-left-item">
                            {{--                            pcoded-trigger => to make by default open--}}
                            <li class="pcoded">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                                    <span class="pcoded-mtext">{{trans('admin.eric_sys.field.field')}}</span>
                                </a>
                            </li>
                        </ul>

{{--                        Post--}}
                        <ul class="pcoded-item pcoded-left-item">
                            {{--                            pcoded-trigger => to make by default open--}}
                            <li class="pcoded">
                                <router-link to="/post-list">
                                    <span class="pcoded-micon"><i class="feather icon-activity"></i></span>
                                    <span class="pcoded-mtext">{{trans('admin.eric_sys.post.post')}}</span>
                                    <span class="pcoded-badge label label-warning">SOON</span>
                                </router-link>
                            </li>
                        </ul>

{{--                        Subscribe Cources--}}
                        <ul class="pcoded-item pcoded-left-item">
                            {{--                            pcoded-trigger => to make by default open--}}
                            <li class="pcoded">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-share"></i></span>
                                    <span class="pcoded-mtext">{{trans('admin.eric_sys.subscribe.subscribe')}}</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>
{{--            todo:replace any component related to
                    router-link called as content of <admin-main>--}}
                <admin-main></admin-main>
            </div>
        </div>
    </div>
</div>

{{--Scripts--}}
<script src="{{asset('js/app.js')}}" type="9e8b5592bad3a80efa739fb4-text/javascript" defer></script>

{{--Main js--}}
<script type="9e8b5592bad3a80efa739fb4-text/javascript" src="{{asset('admin')}}/modernizr.js"></script>
<script type="9e8b5592bad3a80efa739fb4-text/javascript" src="{{asset('admin')}}/css-scrollbars.js"></script>

{{--datatable--}}
<script src="{{asset('admin')}}/bower_components/datatables.net/js/jquery.dataTables.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/assets/pages/data-table/js/jszip.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script type="9e8b5592bad3a80efa739fb4-text/javascript" src="{{asset('admin')}}/assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="{{asset('admin')}}/assets/pages/data-table/js/vfs_fonts.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/assets/pages/data-table/extensions/buttons/js/jszip.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/bower_components/datatables.net-buttons/js/buttons.print.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/bower_components/datatables.net-buttons/js/buttons.html5.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>
<script src="{{asset('admin')}}/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>

{{--public files--}}
<script src="{{asset('admin')}}/rocket-loader.min.js" data-cf-settings="9e8b5592bad3a80efa739fb4-|49" defer=""></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>

<script type="9e8b5592bad3a80efa739fb4-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
