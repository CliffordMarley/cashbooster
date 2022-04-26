<!DOCTYPE html>
<html>
<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title>{{$title}} {{$page}}</title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme"/>
    <meta name="description" content="AdminK - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="extra/assets/img/favicon.png">
    <!-- Angular material -->
    <link rel="stylesheet" type="text/css" href="extra/assets/skin/css/angular-material.min.css">
    <!-- Icomoon -->
    <link rel="stylesheet" type="text/css" href="extra/assets/fonts/icomoon/icomoon.css">
    <!-- AnimatedSVGIcons -->
    <link rel="stylesheet" type="text/css" href="extra/assets/fonts/animatedsvgicons/css/codropsicons.css">
    <!-- CSS - allcp forms -->
    <link rel="stylesheet" type="text/css" href="extra/assets/allcp/forms/css/forms.css">
    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="extra/assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css">
    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="extra/assets/skin/default_skin/less/theme.css">
</head>
<body class="utility-page sb-l-c sb-r-c">
<!-- Body Wrap -->
<div id="main" class="animated fadeIn">
    <!-- Main Wrapper -->
    <section id="content_wrapper">
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>
        <!-- Content -->
        <section id="content">
            <!-- Login Form -->
            <div class="row">
                <div class="col-12 text-center">
                   <center>
                    <a class="logo-image mtn" href="index.html">
                        <img width="200" src="{{config('app.url')}}/logo.jpeg" alt="" class="img-responsive">
                   </a>
                   </center>
                </div>
            </div>
            <div class="allcp-form theme-primary mw500" id="login">
                <div class="bg-primary mw600 text-center mb20 br3 pt5 pb10">
                    <!-- <img src="assets/img/logo.png" alt=""/> -->
                    <div class="logo-widget">

                        <div class="logo-slogan mtn">
                            <div>{{$title}}<span class="text-info"></span></div>
                        </div>
                    </div>
                </div>
                <div class="panel mw500">
                    <form method="post" action="/login" id="form-login">
                        @csrf
                        <div class="panel-body pn mv10">
                            <div class="section">
                                <label for="username" class="field prepend-icon">
                                    <input type="text" name="email" id="username" class="gui-input"
                                           placeholder="Username">
                                    <span class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </label>
                            </div>
                            <!-- /section -->
                            <div class="section">
                                <label for="password" class="field prepend-icon">
                                    <input type="password" name="password" id="password" class="gui-input"
                                           placeholder="Password">
                                    <span class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </label>
                            </div>
                            <!-- /section -->
                            <div class="section">
                                <div class="bs-component pull-left pt5">
                                    <div class="radio-custom radio-primary mb5 lh25">
                                        <input type="radio" id="remember" name="remember">
                                        <label for="remember">Remember me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-bordered btn-primary pull-right">Log in</button>
                            </div>
                            <!-- /section -->
                        </div>
                        <!-- /Form -->
                    </form>
                </div>
                <!-- /Panel -->
            </div>
            <!-- /Spec Form -->
            <hr>
            <div class="row">
                <div class="col-12 mt-4">
                     @if($errors->first('email') != null && !empty($errors->first('email')))
                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Access Denied: </strong>  {{ $errors->first('email') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                    @endif
                                      @if($errors->first('password') != null && !empty($errors->first('password')))
                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Access Denied: </strong>  {{ $errors->first('password') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                    @endif
                                     @if($errors->first('access_denied') != null && !empty($errors->first('access_denied')))
                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Access Denied: </strong>  {{ $errors->first('access_denied') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                    @endif
                </div>
            </div>
        </section>
        <!-- /Content -->
    </section>
    <!-- /Main Wrapper -->
</div>
<!-- /Body Wrap  -->
<!-- Scripts -->
<!-- jQuery -->
<script src="extra/assets/js/jquery/jquery-1.12.3.min.js"></script>
<script src="extra/assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
<!-- AnimatedSVGIcons -->
<script src="extra/assets/fonts/animatedsvgicons/js/snap.svg-min.js"></script>
<script src="extra/assets/fonts/animatedsvgicons/js/svgicons-config.js"></script>
<script src="extra/assets/fonts/animatedsvgicons/js/svgicons.js"></script>
<script src="extra/assets/fonts/animatedsvgicons/js/svgicons-init.js"></script>
<!-- Scroll -->
<script src="extra/assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- HighCharts Plugin -->
<script src="extra/assets/js/plugins/highcharts/highcharts.js"></script>
<!-- CanvasBG JS -->
<script src="extra/assets/js/plugins/canvasbg/canvasbg.js"></script>
<!-- Theme Scripts -->
<script src="extra/assets/js/utility/utility.js"></script>
<script src="extra/assets/js/demo/demo.js"></script>
<script src="extra/assets/js/main.js"></script>
<script src="extra/assets/js/demo/widgets_sidebar.js"></script>
{{-- <script src="assets/js/pages/dashboard_init.js"></script> --}}
<!-- /Scripts -->
</body>
</html>
