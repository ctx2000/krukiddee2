<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>@stack('title')</title>
    {!! Html::style('user/assets/css/themify-icons.css') !!}
    {!! Html::style('user/assets/css/font-awesome.min.css') !!}
    {!! Html::style('user/assets/css/flaticon.css') !!}
    {!! Html::style('user/assets/css/bootstrap.min.css') !!}
    {!! Html::style('user/assets/css/animate.css') !!}
    {!! Html::style('user/assets/css/owl.carousel.css') !!}
    {!! Html::style('user/assets/css/owl.theme.css') !!}
    {!! Html::style('user/assets/css/slick.css') !!}
    {!! Html::style('user/assets/css/slick-theme.css') !!}
    {!! Html::style('user/assets/css/swiper.min.css') !!}
    {!! Html::style('user/assets/css/owl.transitions.css') !!}
    {!! Html::style('user/assets/css/jquery.fancybox.css') !!}
    {!! Html::style('user/assets/css/odometer-theme-default.css') !!}
    {!! Html::style('user/assets/css/nice-select.css') !!}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('plugin-styles')

    {!! Html::style('user/assets/css/style.css') !!}
    @stack('style')
</head>

<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <!-- <div class="preloader">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div> -->
        <!-- end preloader -->
        <!-- Start header -->
        @include('layouts.user.header')
        <!-- end of header -->
        @yield('content')
        <!-- wpo-site-footer -->
        @include('layouts.user.footer')
        <!-- end wpo-site-footer -->
    </div>
    <!-- end of page-wrapper -->
    <!-- All JavaScript files
    ================================================== -->
    {!! Html::script('user/assets/js/jquery.min.js') !!}
    {!! Html::script('user/assets/js/bootstrap.min.js') !!}
    <!-- Plugins for this template -->
    {!! Html::script('user/assets/js/jquery-plugin-collection.js') !!}
    @stack('plugin-scripts')

    <!-- Custom script for this template -->
    {!! Html::script('user/assets/js/script.js') !!}
    @stack('custom-scripts')
</body>

</html>
