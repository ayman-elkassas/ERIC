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
<body class="dark-sidebar" main-theme-layout="box-layout">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-main-header" id="admin-header">
            <admin-header></admin-header>

{{--            <div class="main-header-right row m-0">--}}
{{--                <form class="form-inline search-full" action="#" method="get">--}}
{{--                    <div class="form-group w-100">--}}
{{--                        <div class="Typeahead Typeahead--twitterUsers">--}}
{{--                            <div class="u-posRelative">--}}
{{--                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>--}}
{{--                                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>--}}
{{--                            </div>--}}
{{--                            <div class="Typeahead-menu"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                <div  class="main-header-left">--}}
{{--                    <div class="logo-wrapper"><router-link to="/home"><img class="img-fluid" src="{{asset('admin-cuba')}}/assets/images/logo/logo.png" alt=""></router-link></div>--}}
{{--                    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>--}}
{{--                </div>--}}
{{--                <div class="left-menu-header col horizontal-wrapper pl-0">--}}
{{--                    <ul class="horizontal-menu">--}}
{{--                        <li class="mega-menu"><a class="nav-link" href="#"><i data-feather="layers"></i><span>Bonus Ui</span></a>--}}
{{--                            <div class="mega-menu-container menu-content">--}}
{{--                                <div class="container-fluid">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mega-box">--}}
{{--                                            <div class="mobile-title d-none">--}}
{{--                                                <h5>Mega menu</h5><i data-feather="x"></i>--}}
{{--                                            </div>--}}
{{--                                            <div class="link-section icon">--}}
{{--                                                <div>--}}
{{--                                                    <h6>Error Page</h6>--}}
{{--                                                </div>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="error-400.html">Error page 400</a></li>--}}
{{--                                                    <li><a href="error-401.html">Error page 401</a></li>--}}
{{--                                                    <li><a href="error-403.html">Error page 403</a></li>--}}
{{--                                                    <li><a href="error-404.html">Error page 404</a></li>--}}
{{--                                                    <li><a href="error-500.html">Error page 500</a></li>--}}
{{--                                                    <li><a href="error-503.html">Error page 503</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col mega-box">--}}
{{--                                            <div class="link-section doted">--}}
{{--                                                <div>--}}
{{--                                                    <h6> Authentication</h6>--}}
{{--                                                </div>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="login.html">Login Simple</a></li>--}}
{{--                                                    <li><a href="login-image.html">Login Bg Image</a></li>--}}
{{--                                                    <li><a href="login-video.html">Login Bg video</a></li>--}}
{{--                                                    <li><a href="signup.html">Register Simple</a></li>--}}
{{--                                                    <li><a href="signup-image.html">Register Bg Image</a></li>--}}
{{--                                                    <li><a href="signup-video.html">Register Bg video</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col mega-box">--}}
{{--                                            <div class="link-section dashed">--}}
{{--                                                <div>--}}
{{--                                                    <h6>Usefull Pages</h6>--}}
{{--                                                </div>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="search.html">Search Website</a></li>--}}
{{--                                                    <li><a href="search-video.html">Search Video</a></li>--}}
{{--                                                    <li><a href="unlock.html">Unlock User</a></li>--}}
{{--                                                    <li><a href="forget-password.html">Forget Password</a></li>--}}
{{--                                                    <li><a href="reset-password.html">Reset Password</a></li>--}}
{{--                                                    <li><a href="maintenance.html">Maintenance</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col mega-box">--}}
{{--                                            <div class="link-section">--}}
{{--                                                <div>--}}
{{--                                                    <h6>Email templates</h6>--}}
{{--                                                </div>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="basic-template.html">Basic Email</a></li>--}}
{{--                                                    <li><a href="email-header.html">Basic With Header</a></li>--}}
{{--                                                    <li><a href="template-email.html">Ecomerce Template</a></li>--}}
{{--                                                    <li><a href="template-email-2.html">Email Template 2</a></li>--}}
{{--                                                    <li><a href="ecommerce-templates.html">Ecommerce Email</a></li>--}}
{{--                                                    <li><a href="email-order-success.html">Order Success</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col mega-box">--}}
{{--                                            <div class="link-section">--}}
{{--                                                <div>--}}
{{--                                                    <h6>Coming Soon</h6>--}}
{{--                                                </div>--}}
{{--                                                <ul class="svg-icon">--}}
{{--                                                    <li><a href="comingsoon.html"> <i data-feather="file"> </i>Coming-soon</a></li>--}}
{{--                                                    <li><a href="comingsoon-bg-video.html"> <i data-feather="film"> </i>Coming-video</a></li>--}}
{{--                                                    <li><a href="comingsoon-bg-img.html"><i data-feather="image"> </i>Coming-Image</a></li>--}}
{{--                                                </ul>--}}
{{--                                                <div>--}}
{{--                                                    <h6>Other Soon</h6>--}}
{{--                                                </div>--}}
{{--                                                <ul class="svg-icon">--}}
{{--                                                    <li><a class="txt-primary" href="landing-page.html"> <i data-feather="cast"></i>Landing Page</a></li>--}}
{{--                                                    <li><a class="txt-secondary" href="sample-page.html"> <i data-feather="airplay"></i>Sample Page</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="nav-right col-8 pull-right right-menu">--}}
{{--                    <ul class="nav-menus">--}}
{{--                        <li class="language-nav">--}}
{{--                            <div class="translate_wrapper">--}}
{{--                                <div class="current_lang">--}}
{{--                                    <div class="lang"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">EN                               </span></div>--}}
{{--                                </div>--}}
{{--                                <div class="more_lang">--}}
{{--                                    <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">English<span> (US)</span></span></div>--}}
{{--                                    <div class="lang" data-value="de"><i class="flag-icon flag-icon-de"></i><span class="lang-txt">Deutsch</span></div>--}}
{{--                                    <div class="lang" data-value="es"><i class="flag-icon flag-icon-es"></i><span class="lang-txt">Español</span></div>--}}
{{--                                    <div class="lang" data-value="fr"><i class="flag-icon flag-icon-fr"></i><span class="lang-txt">Français</span></div>--}}
{{--                                    <div class="lang" data-value="pt"><i class="flag-icon flag-icon-pt"></i><span class="lang-txt">Português<span> (BR)</span></span></div>--}}
{{--                                    <div class="lang" data-value="cn"><i class="flag-icon flag-icon-cn"></i><span class="lang-txt">简体中文</span></div>--}}
{{--                                    <div class="lang" data-value="ae"><i class="flag-icon flag-icon-ae"></i><span class="lang-txt">لعربية <span> (ae)</span></span></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>                         <span class="header-search"><i data-feather="search"></i></span></li>--}}
{{--                        <li class="onhover-dropdown">--}}
{{--                            <div class="notification-box"><i data-feather="bell"></i><span class="badge badge-pill badge-secondary">4</span></div>--}}
{{--                            <ul class="notification-dropdown onhover-show-div">--}}
{{--                                <li class="bg-primary">--}}
{{--                                    <h6 class="f-18 mb-0">Notitication</h6>--}}
{{--                                    <p class="mb-0">You have 4 new notification</p>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-primary"> </i>Delivery processing <span class="pull-right">10 min.</span></p>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-success"></i>Order Complete<span class="pull-right">1 hr</span></p>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-info"></i>Tickets Generated<span class="pull-right">3 hr</span></p>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-danger"></i>Delivery Complete<span class="pull-right">6 hr</span></p>--}}
{{--                                </li>--}}
{{--                                <li><a class="btn btn-primary" href="#">Check all notification</a>--}}
{{--                                    <!--a.f-15.f-w-500.txt-dark(href="#") Check all notification-->--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <div class="mode"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg></div>--}}
{{--                        </li>--}}
{{--                        <li class="cart-nav onhover-dropdown">--}}
{{--                            <div class="cart-box"><i data-feather="shopping-cart"></i><span class="badge badge-pill badge-primary">2</span></div>--}}
{{--                            <ul class="cart-dropdown chat-dropdown onhover-show-div">--}}
{{--                                <li class="bg-primary text-center">--}}
{{--                                    <h6 class="f-18">Shoping cart</h6>--}}
{{--                                    <p class="mb-0">You have 3 items in your cart  </p>--}}
{{--                                </li>--}}
{{--                                <li class="mt-0">--}}
{{--                                    <div class="media"><img class="img-fluid rounded-circle mr-3 img-60" src="{{asset('admin-cuba')}}/assets/images/ecommerce/01.jpg" alt="">--}}
{{--                                        <div class="media-body"><span>Boy's T-shirt</span>--}}
{{--                                            <p>It is a long established fact that a reader</p>--}}
{{--                                            <h6 class="f-12 light-font">1 x $ 299.00</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="close-circle"><a href="#"><i data-feather="x"></i></a></div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="media"><img class="img-fluid rounded-circle mr-3 img-60" src="{{asset('admin-cuba')}}/assets/images/ecommerce/02.jpg" alt="">--}}
{{--                                        <div class="media-body"><span>Girls's T-shirt</span>--}}
{{--                                            <p>It is a long established fact that a reader</p>--}}
{{--                                            <h6 class="f-12 light-font">1 x $ 199.00</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="close-circle"><a href="#"><i data-feather="x"></i></a></div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="media"><img class="img-fluid rounded-circle mr-3 img-60" src="{{asset('admin-cuba')}}/assets/images/ecommerce/08.jpg" alt="">--}}
{{--                                        <div class="media-body"><span>Girls's T-shirt</span>--}}
{{--                                            <p>It is a long established fact that a reader</p>--}}
{{--                                            <h6 class="f-12 light-font">2 x $ 199.00</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="close-circle"><a href="#"><i data-feather="x"></i></a></div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="total">--}}
{{--                                        <h6 class="mb-0 mt-1">Subtotal : <span class="f-right">$799.00</span></h6>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="buttons">--}}
{{--                                        <h6 class="mb-0"><a class="view-cart" href="cart.html">View Cart</a><a class="checkout f-right" href="#">Checkout</a></h6>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="onhover-dropdown"><i data-feather="message-square"></i>--}}
{{--                            <ul class="chat-dropdown onhover-show-div">--}}
{{--                                <li class="bg-primary text-center">--}}
{{--                                    <h6 class="f-18 mb-0">Message Box</h6>--}}
{{--                                    <p class="mb-0">You have 3 new messages </p>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="media"><img class="img-fluid rounded-circle mr-3" src="{{asset('admin-cuba')}}/assets/images/user/1.jpg" alt="">--}}
{{--                                        <div class="status-circle online"></div>--}}
{{--                                        <div class="media-body"><span>Erica Hughes</span>--}}
{{--                                            <p>Lorem Ipsum is simply dummy...</p>--}}
{{--                                        </div>--}}
{{--                                        <p class="f-12 font-success">58 mins ago</p>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="media"><img class="img-fluid rounded-circle mr-3" src="{{asset('admin-cuba')}}/assets/images/user/2.jpg" alt="">--}}
{{--                                        <div class="status-circle online"></div>--}}
{{--                                        <div class="media-body"><span>Kori Thomas</span>--}}
{{--                                            <p>Lorem Ipsum is simply dummy...</p>--}}
{{--                                        </div>--}}
{{--                                        <p class="f-12 font-success">1 hr ago</p>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="media"><img class="img-fluid rounded-circle mr-3" src="{{asset('admin-cuba')}}/assets/images/user/4.jpg" alt="">--}}
{{--                                        <div class="status-circle offline"></div>--}}
{{--                                        <div class="media-body"><span>Ain Chavez</span>--}}
{{--                                            <p>Lorem Ipsum is simply dummy...</p>--}}
{{--                                        </div>--}}
{{--                                        <p class="f-12 font-danger">32 mins ago</p>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="text-center"> <a class="btn btn-primary" href="#">View All     </a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>--}}
{{--                        <li class="profile-nav onhover-dropdown p-0">--}}
{{--                            <div class="media profile-media"><img class="b-r-10" src="{{asset('admin-cuba')}}/assets/images/dashboard/profile.jpg" alt="">--}}
{{--                                <div class="media-body"><span>Emay Walter</span>--}}
{{--                                    <p class="mb-0 font-roboto"><i class="middle fa fa-angle-down"></i></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <ul class="profile-dropdown onhover-show-div">--}}
{{--                                <li><i data-feather="user"></i><span>Account </span></li>--}}
{{--                                <li><i data-feather="mail"></i><span>Inbox</span></li>--}}
{{--                                <li><i data-feather="file-text"></i><span>Taskboard</span></li>--}}
{{--                                <li><i data-feather="settings"></i><span>Settings</span></li>--}}
{{--                                <li><i data-feather="log-out"> </i><span><a style="color: #000;" href="{{FAdminAuthUrl('logout')}}">Log Out</a></span></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <script id="result-template" type="text/x-handlebars-template">--}}
{{--                    <div class="ProfileCard u-cf">--}}
{{--                        <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>--}}
{{--                        <div class="ProfileCard-details">--}}
{{--                            <div class="ProfileCard-realName">Ayman</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </script>--}}
{{--                <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>--}}
{{--            </div>--}}
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
            <header class="main-nav" sidebar-layout="iconcolor-sidebar">
                <div  class="logo-wrapper"><router-link to="/home"><img class="img-fluid for-light" src="{{asset('admin-cuba')}}/assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="{{asset('admin-cuba')}}/assets/images/logo/logo.png" alt=""></router-link>
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
<script src="{{asset('admin-cuba')}}/assets/js/theme-customizer/customizer.js"></script>

    {{--main js--}}
<script src="{{asset('/js/app.js')}}" type="text/javascript"></script>

</body>
</html>
