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
                                <li><i class="fi flaticon-call"></i>081-975-8181</li>
                                <li><i class="fi flaticon-envelope"></i> chumsak.inspire@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    @auth
                    <div class="col col-md-6 col-sm-5 col-12">
                        <div class="contact-info">
                            <ul>
                            <li><a href="#">{{auth()->user()->name}}</a></li>
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

                    <div class="col col-md-6 col-sm-5 col-12">
                        <div class="contact-info">
                            <ul>
                                <li><a href="{{ route('register') }}">สมัครสมาชิก</a></li>
                                <li><a href="{{ route('teacherRegister') }}">สมัครครู</a></li>
                                <li><a class="theme-btn" href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                            </ul>
                        </div>
                    </div>

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
                <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                    <button class="close-navbar"><i class="ti-close"></i></button>
                    @auth


                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="{{route('donation.index')}}">หน้าหลัก</a>

                        </li>

                        <li><a href="{{route('donation.history')}}">ประวัติการบริจาค</a></li>
                        <li class="menu-item-has-children">
                            <a href="#">บริจาค</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('donation.donateLevel',['level'=>4])}}">ต้องการรับบริจาคด่วนมาก</a></li>
                                <li><a href="{{route('donation.donateLevel',['level'=>3])}}">ขาดแคลนทุนการศึกษา</a></li>
                                <li><a href="{{route('donation.donateLevel',['level'=>2])}}">มีความยากลำบาก</a></li>
                                <li><a href="{{route('donation.donateLevel',['level'=>1])}}">ขาดแคลนทุนทรัพย์</a></li>
                            </ul>
                        </li>

                        <li><a href="about.html">เกี่ยวกับเรา</a></li>


                        {{-- <li class="menu-item-has-children">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>

                                <span class="badge badge-warning ">{{ $badge }}</span>
                        </a>
                        <ul class="sub-menu">
                            @foreach ($nonti as $n)
                            <li><a href="index.html">{{$n->title}}</a></li>
                            @endforeach

                        </ul>

                        </li> --}}
                    </ul>
                    @else
                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="{{route('donation.index')}}">หน้าหลัก</a>

                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">บริจาค</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('donation.donateLevel',['level'=>4])}}">ต้องการรับบริจาคด่วนมาก</a></li>
                                <li><a href="{{route('donation.donateLevel',['level'=>3])}}">ขาดแคลนทุนการศึกษา</a></li>
                                <li><a href="{{route('donation.donateLevel',['level'=>2])}}">มีความยากลำบาก</a></li>
                                <li><a href="{{route('donation.donateLevel',['level'=>1])}}">ขาดแคลนทุนทรัพย์</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">เกี่ยวกับเรา</a></li>


                    </ul>
                    @endauth

                </div><!-- end of nav-collapse -->
                <div class="cart-search-contact">
                    @auth
                    <div class="mini-cart">
                        <button class="cart-toggle-btn">
                            <span class="cart-count">02</span>
                            <i class="fa fa-bell-o" style="font-size:18px;"></i>
                            </button>
                        <div class="mini-cart-content">
                            <div class="mini-cart-title">
                                <p>Shopping Cart</p>
                            </div>
                            <div class="mini-cart-items">
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image">
                                        <a href="#"><img src="assets/images/shop/mini/img-1.jpg" alt="Hoodie with zipper"></a>
                                    </div>
                                    <div class="mini-cart-item-des">
                                        <a href="#">Hoodie with zipper</a>
                                        <span class="mini-cart-item-price">$25.15</span>
                                        <span class="mini-cart-item-quantity">x 1</span>
                                    </div>
                                </div>
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image">
                                        <a href="#"><img src="assets/images/shop/mini/img-2.jpg" alt="Hoodie with zipper"></a>
                                    </div>
                                    <div class="mini-cart-item-des">
                                        <a href="#">Hoodie with zipper</a>
                                        <span class="mini-cart-item-price">$12.99</span>
                                        <span class="mini-cart-item-quantity">x 2</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mini-cart-action clearfix">
                                <span class="mini-checkout-price">$255.12</span>
                                <a href="" class="theme-btn-s4">View Cart</a>
                            </div>
                        </div>
                    </div>

                    @endauth
                    <div class="header-search-form-wrapper">
                        <button class="search-toggle-btn"><i class="fi flaticon-magnifying-glass"></i></button>
                        <div class="header-search-form">
                            <form>
                                <div>
                                    <input type="text" class="form-control" placeholder="Search here...">
                                    <button type="submit"><i class="fi flaticon-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- end of container -->
        </nav>
    </header>

    @yield('content')
    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
