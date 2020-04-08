<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>Krukiddee</title>

    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{asset('css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{asset('css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{asset('css/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{asset('css/nice-select.css') }}" rel="stylesheet">
    <link href="{{asset('css/signup.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body>
    <header id="header" class="wpo-site-header wpo-header-style-3">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6 col-sm-7 col-12">
                        <div class="contact-intro">
                            <ul>
                                <li><a href="{{ route('admin.dashboard')}}">กลับหน้าแรก</a></li>

                            </ul>
                        </div>
                    </div>
                    @auth
                    <div class="col col-md-6 col-sm-5 col-12">
                        <div class="contact-info">
                            <ul>

                                <li>
                                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        ออกจากระบบ
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                    @else


                    @endauth

                </div>
            </div>
        </div> <!-- end topbar -->
        <nav class="navigation navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="open-btn">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
                </div>


            </div><!-- end of container -->
        </nav>
    </header>


    <section class="hero hero-style-3">
        <div class="hero-slider">

            <div class="slide">
                <div class="container">
                    <img src="assets/images/slider/slide-4.jpg" alt class="slider-bg">
                    <div class="row">
                        <div class="col col-md-6 slide-caption">
                            <div class="slide-title">
                                <h2>{{$s->titleBig}}</h2>



                                {{-- <h2>Let’s be Kind for <span>Children</span></h2> --}}
                            </div>
                            <div class="slide-subtitle">
                                <p>{{$s->titlesmall1}}</p>
                                <p>{{$s->titlesmall2}}</p>
                            </div>
                            <div class="btns">
                                <a href="{{route('admin.slideBigEdit',['id'=>$s->id])}}" class="theme-btn">แก้ไขสไลด์นี้</a>
                                <a href="causes-single.php" class="theme-btn-s2">ลบสไลด์นี้</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>


    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugins for this template -->
    <script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>
    <!-- Custom script for this template -->
    <script src="{{ asset('js/script.js') }}"></script>
    <div class="wpo-ne-footer">
        <!-- start wpo-news-letter-section -->
        <section class="wpo-news-letter-section">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <!-- <div class="wpo-newsletter">
                                <h3>Follow us For ferther information</h3>
                                <div class="wpo-newsletter-form">
                                    <form>
                                        <div>
                                            <input type="text" placeholder="Enter Your Email" class="form-control">
                                            <button type="submit">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div> <!-- end container -->

        </section>
    </div>
</body>

</html>
