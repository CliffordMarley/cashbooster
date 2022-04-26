<!DOCTYPE html>
<html>
<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme"/>
    <meta name="description" content="AdminK - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{config('app.url')}}/assets/img/favicon.png">
    {{-- <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/assets/bootstrap/css/bootstrap.min.css"> --}}

    <!-- Angular material -->
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/assets/skin/css/angular-material.min.css">
    <!-- Icomoon -->
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/assets/fonts/icomoon/icomoon.css">
    <!-- AnimatedSVGIcons -->
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/assets/fonts/animatedsvgicons/css/codropsicons.css">
    <!-- CSS - allcp forms -->
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/assets/allcp/forms/css/forms.css">
    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css">
    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/assets/skin/default_skin/less/theme.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/assets/allcp/forms/css/forms.css">


</head>
<body class="content-blank">
<!-- Body Wrap -->
<div id="main">
    <!-- Header  -->
    <header class="navbar navbar-fixed-top bg-dark">
        <ul class="nav navbar-nav navbar-left">
            {{-- <li class="dropdown dropdown-fuse hidden-xs">
                <div class="navbar-btn btn-group phn">
                    <button class="btn-hover-effects dropdown-toggle btn" data-toggle="dropdown" aria-expanded="false">
                        <span class="fa fa-chevron-down"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{config('app.url')}}/#">Action</a></li>
                        <li><a href="{{config('app.url')}}/#">Another action</a></li>
                        <li><a href="{{config('app.url')}}/#">Something else</a></li>
                        <li class="divider"></li>
                        <li><a href="{{config('app.url')}}/#">Separated link</a></li>
                    </ul>
                </div>
            </li> --}}
            <li class="hidden-xs">
                <div class="navbar-btn btn-group">
                    <button class="btn-hover-effects navbar-fullscreen toggle-active btn si-icons si-icons-default">
                        <span class="fa fa-arrows-alt"></span>
                    </button>
                </div>
            </li>
        </ul>
        <form class="navbar-form navbar-left search-form square" role="search">
            <div class="input-group add-on">
                <input type="text" class="form-control btn-hover-effects" placeholder="Search..." onfocus="this.placeholder=''"
                       onblur="this.placeholder='Search...'">
                <button class="btn btn-default text-info-darker hidden-xs hidden-sm" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li class="hidden-xs">
                <div class="navbar-btn btn-group phn">
                    <button class="btn-hover-effects topbar-dropmenu-toggle btn">
                        <span class="fa fa-magic fs20 text-dark"></span>
                    </button>
                </div>
            </li>
            <li class="dropdown dropdown-fuse">
                <div class="navbar-btn btn-group">
                    <button class="dropdown-toggle btn btn-hover-effects" data-toggle="dropdown">
                        <span class="fa fa-envelope fs20 text-danger"></span>
                        <span class="fs14 visible-xl">
                            6
                        </span>
                    </button>
                    <div class="navbar-activity dropdown-menu keep-dropdown w375" role="menu">
                        <div class="panel mbn">
                            <div class="panel-menu">
                                <div class="btn-group btn-group-justified btn-group-nav" role="tablist">
                                    <a href="{{config('app.url')}}/#nav-tab1" data-toggle="tab"
                                       class="btn btn-sm active">Activity</a>
                                    <a href="{{config('app.url')}}/#nav-tab2" data-toggle="tab"
                                       class="btn btn-sm br-l-n br-r-n">Messages</a>
                                    <a href="{{config('app.url')}}/#nav-tab3" data-toggle="tab" class="btn btn-sm">Notifications</a>
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <div class="tab-content br-n pn">
                                    <div id="nav-tab1" class="tab-pane active" role="tabpanel">
                                        <ul class="media-list" role="menu">
                                            <li class="media">
                                                <a class="media-left" href="{{config('app.url')}}/#">
                                                    <img src="{{config('app.url')}}/assets/img/avatars/1.png" class="br3" alt="avatar">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New post
                                                        <span class="text-muted">- 09/01/16</span>
                                                    </h5>
                                                    Last Updated 5 days ago by
                                                    <a class="" href="{{config('app.url')}}/#"> Anna Smith </a>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-left" href="{{config('app.url')}}/#">
                                                    <img src="{{config('app.url')}}/assets/img/avatars/2.png" class="br3" alt="avatar">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New post
                                                        <span class="text-muted">- 09/01/16</span>
                                                    </h5>
                                                    Last Updated 5 days ago by
                                                    <a class="" href="{{config('app.url')}}/#"> John Doe </a>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="media-left" href="{{config('app.url')}}/#">
                                                    <img src="{{config('app.url')}}/assets/img/avatars/3.png" class="br3" alt="avatar">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New post
                                                        <span class="text-muted">- 09/01/16</span>
                                                    </h5>
                                                    Last Updated 5 days ago by
                                                    <a class="" href="{{config('app.url')}}/#"> John Doe </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="nav-tab2" class="tab-pane chat-widget" role="tabpanel">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="{{config('app.url')}}/#">
                                                    <img class="media-object" alt="64x64" src="{{config('app.url')}}/assets/img/avatars/1.png">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <span class="media-status online"></span>
                                                <h5 class="media-heading">Anna Smith
                                                    <span> - 3:16 am</span>
                                                </h5>
                                                Sed egestas ligula eget dictum posuere. Maecenas feugiat in enim.
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-status offline"></span>
                                                <h5 class="media-heading">Mike Adams
                                                    <span> - 3:36 am</span>
                                                </h5>
                                                Etiam facilisis ultrices fringilla. Vivamus sit amet elementum ipsum
                                            </div>
                                            <div class="media-right">
                                                <a href="{{config('app.url')}}/#">
                                                    <img class="media-object" alt="64x64" src="{{config('app.url')}}/assets/img/avatars/3.png">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="{{config('app.url')}}/#">
                                                    <img class="media-object" alt="64x64" src="{{config('app.url')}}/assets/img/avatars/1.png">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <span class="media-status online"></span>
                                                <h5 class="media-heading">Anna Smith
                                                    <span> - 4:27 am</span>
                                                </h5>
                                                Sed egestas ligula eget dictum posuere. Maecenas feugiat in enim.
                                            </div>
                                        </div>
                                    </div>
                                    <div id="nav-tab3" class="tab-pane alerts-widget" role="tabpanel">
                                        <div class="media">
                                            <a class="media-left" href="{{config('app.url')}}/#">
                                                <span class="fa fa-shopping-cart"></span>
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading">New Product Order
                                                    <span class="text-muted"></span>
                                                </h5>
                                                <a href="{{config('app.url')}}/#">iPad Air</a>
                                                <span class="text-muted-alt">- 3 hours ago</span>
                                            </div>
                                            <div class="media-right">
                                                <div class="media-response"> Confirm?</div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-info btn-sm">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default btn-sm">
                                                        <i class="fa fa-cog"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="media-left" href="{{config('app.url')}}/#"> <span
                                                    class="fa fa-comments"></span>
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading">New User Comment
                                                    <span class="text-muted"></span>
                                                </h5>
                                                <span class="text-muted-alt">Sam Fisher - I'd like to read more!</span>
                                            </div>
                                            <div class="media-right">
                                                <div class="media-response text-right"> Moderate?</div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-info btn-sm">
                                                        <i class="fa fa-check "></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="media-left" href="{{config('app.url')}}/#">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading">New User Review
                                                    <span class="text-muted"></span>
                                                </h5>
                                                <span class="text-muted-alt">Sebastian Jones - 5 hours ago</span>
                                            </div>
                                            <div class="media-right">
                                                <div class="media-response"> Approve?</div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-info btn-sm">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default btn-sm">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <a href="{{config('app.url')}}/#" class="btn btn-alert"> View All </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="dropdown dropdown-fuse navbar-user">
                <a href="{{config('app.url')}}/#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="btn-hover-effects" src="{{config('app.url')}}/assets/img/avatars/profile_avatar.jpg" alt="avatar">
                    <span class="hidden-xs">
                        <span class="name">{{$userdata->firstname}} {{$userdata->lastname}}</span>
                    </span>
                    <span class="fa fa-caret-down hidden-xs"></span>
                </a>
                <ul class="dropdown-menu list-group keep-dropdown w230" role="menu">

                    <li class="dropdown-footer text-center">
                        <a href="{{config('app.url')}}/logout" class="btn btn-warning">
                            logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- /Header -->
    <!-- Sidebar  -->
    <aside id="sidebar_left" class="nano affix">
        <!-- Sidebar Left Wrapper  -->
        <div class="sidebar-left-content nano-content">
            <!-- Sidebar Header -->
            <header class="sidebar-header">
                <!-- Sidebar - Logo -->
                <div class="sidebar-widget logo-widget">
                    <div class="media">
                        <a class="logo-image" href="{{config('app.url')}}/index.html">
                            <img src="{{config('app.url')}}/assets/img/logo.png" alt="" class="img-responsive">
                        </a>
                        <div class="logo-slogan">
                            <div>CashBooster<span class="text-info"></span></div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- /Sidebar Header -->
            <!-- Sidebar Menu  -->
            <ul class="nav sidebar-menu">
                <li class="sidebar-label pt30">Statistics</li>
                <li>
                    <a class="" href="{{config('app.url')}}/#">
                        {{-- <span class="caret"></span> --}}
                        <span class="sidebar-title">Dashboard</span>
                        <span class="fa fa-dashboard"></span>
                    </a>

                </li>
                <li class="sidebar-label pt25">Control</li>

                <li>
                    <a class="accordion-toggle " href="{{config('app.url')}}/#">
                        <span class="caret"></span>
                        <span class="sidebar-title">Game Play</span>
                        <span class="sb-menu-icon fa fa-list-ul"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li class="">
                            <a href="{{config('app.url')}}/games">
                                Games Configuration
                            </a>
                        </li>
                        <li class="">
                            <a href="{{config('app.url')}}/games/plays">
                                Previous Outcomes
                            </a>
                        </li>
                        <li class="">
                            <a href="{{config('app.url')}}/players">
                                View All Players
                            </a>
                        </li>
                        <li class="">
                            <a href="{{config('app.url')}}/forms-layouts.html">
                                Restrict Numbers
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="accordion-toggle " href="{{config('app.url')}}/#">
                        <span class="caret"></span>
                        <span class="sidebar-title">User Management</span>
                        <span class="sb-menu-icon fa fa-list-ul"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li class="">
                            <a href="{{config('app.url')}}/admins">
                                View All
                            </a>
                        </li>
                        <li class="">
                            <a href="{{config('app.url')}}/admins/create">
                                Create Users
                            </a>
                        </li>
                        <li class="">
                            <a href="{{config('app.url')}}/admin/myaccount">
                                Change Password
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle " href="{{config('app.url')}}/#">
                        <span class="caret"></span>
                        <span class="sidebar-title">Transactions</span>
                        <span class="sb-menu-icon fa fa-list-ul"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li class="">
                            <a href="{{config('app.url')}}/forms-elements.html">
                                All Deposits
                            </a>
                        </li>
                        {{-- <li class="">
                            <a href="{{config('app.url')}}/forms-widgets.html">
                                Game Plays
                            </a>
                        </li> --}}
                        {{-- <li class="">
                            <a href="{{config('app.url')}}/forms-layouts.html">
                                Change Password
                            </a>
                        </li> --}}
                    </ul>
                </li>

                <!-- Sidebar Progress Bars -->

            </ul>
            <!-- /Sidebar Menu  -->
        </div>
        <!-- /Sidebar Left Wrapper  -->
    </aside>
    <!-- /Sidebar -->
    <!-- Main Wrapper -->
    <section id="content_wrapper">
                <!-- Topbar Menu Wrapper -->
        <div id="topbar-dropmenu-wrapper">
            <div class="topbar-menu row">
                <div class="col-xs-4 col-sm-2">
                    <a href="{{config('app.url')}}/#" class="service-box bg-danger">
                        <span class="fa fa-music"></span>
                        <span class="service-title">Audio</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="{{config('app.url')}}/#" class="service-box bg-success">
                        <span class="fa fa-picture-o"></span>
                        <span class="service-title">Images</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="{{config('app.url')}}/#" class="service-box bg-primary">
                        <span class="fa fa-video-camera"></span>
                        <span class="service-title">Videos</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="{{config('app.url')}}/#" class="service-box bg-alert">
                        <span class="fa fa-envelope"></span>
                        <span class="service-title">Messages</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="{{config('app.url')}}/#" class="service-box bg-system">
                        <span class="fa fa-cog"></span>
                        <span class="service-title">Settings</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="{{config('app.url')}}/#" class="service-box bg-dark">
                        <span class="fa fa-user"></span>
                        <span class="service-title">Users</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- /Topbar Menu Wrapper -->
                <!-- Topbar -->
        <header id="topbar" class="alt">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-link">
                        <a href="{{config('app.url')}}/index.html">Home</a>
                    </li>
                    <li class="breadcrumb-current-item">{{$title}} </li>
                </ol>
            </div>
        </header>
        <!-- /Topbar -->
        <!-- Content -->
        <section id="content" class="animated fadeIn ptn">
            <div class="">
                <h4 class="mn"> {{$page}} </h4>
                <hr class="alt short">
                <div class="row">
                    <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            {{session('success')}}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{session('error')}}
                        </div>
                    @endif
                    </div>
                </div>
                @yield('content')
            </div>
  <div class="h-500 mt100"></div>
        </section>
        <!-- /Content -->
        <footer id="content-footer">
            <div class="row">
                <div class="col-xs-12 text-center">
                    &copy; 2016 All Rights Reserved. <a href="{{config('app.url')}}/#">Terms of use</a> and <a href="{{config('app.url')}}/#">Privacy Policy</a>
                </div>
                <a href="{{config('app.url')}}/#content" class="footer-return-top">
                    <span class="fa fa-angle-up"></span>
                </a>
            </div>
        </footer>
    </section>
<!-- /Main Wrapper -->
</div>
<!-- /Body Wrap  -->
<!-- Scripts -->
<!-- jQuery -->
<script src="{{config('app.url')}}/assets/js/jquery/jquery-1.12.3.min.js"></script>
<script src="{{config('app.url')}}/assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
<!-- AnimatedSVGIcons -->
<script src="{{config('app.url')}}/assets/fonts/animatedsvgicons/js/snap.svg-min.js"></script>
<script src="{{config('app.url')}}/assets/fonts/animatedsvgicons/js/svgicons-config.js"></script>
<script src="{{config('app.url')}}/assets/fonts/animatedsvgicons/js/svgicons.js"></script>
<script src="{{config('app.url')}}/assets/fonts/animatedsvgicons/js/svgicons-init.js"></script>
<!-- HighCharts Plugin -->
<script src="{{config('app.url')}}/assets/js/plugins/highcharts/highcharts.js"></script>
<!-- Scroll -->
<script src="{{config('app.url')}}/assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Theme Scripts -->
<script src="{{config('app.url')}}/assets/js/utility/utility.js"></script>
<script src="{{config('app.url')}}/assets/js/demo/demo.js"></script>
<script src="{{config('app.url')}}/assets/js/main.js"></script>
<script src="{{config('app.url')}}/assets/js/demo/widgets_sidebar.js"></script>
<script src="{{config('app.url')}}/assets/js/pages/dashboard_init.js"></script>
<script src="{{config('app.url')}}/assets/js/plugins/canvasbg/canvasbg.js"></script>
{{-- <script src="{{config('app.url')}}/assets/bootstrap/js/bootstrap.min.js"></script> --}}

@if($page == 'List')
<script src="{{config('app.url')}}/assets/js/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="{{config('app.url')}}/assets/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="{{config('app.url')}}/assets/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script src="{{config('app.url')}}/assets/js/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="{{config('app.url')}}/assets/js/pages/tables-data.js"></script>

@endif
<!-- /Scripts -->
</body>
</html>
<script>
    $('.alert').alert()
    // $(document).ready(()=>{
    //     $('.delete_action').click(function(e){
    //         e.preventDefault();
    //         //do your stuff.
    //         $('.delete_action').submit();
    //     });
    // })
</script>
