<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/sticky-footer-navbar.css"></script>
    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;

            /* height: 60px; */
            /* line-height: 60px; */
            background-color: #dce6de;
        }


        /* Other Classes for Page Styling */

        body {
            background: #007bff;
            background: linear-gradient(to left, #0062E6, #33AEFF);
        }
    </style>
</head>

<body class="hold-transition layout-top-nav">
    <div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Left navbar links -->

            <a class="navbar-brand" href="{{route('donation.index')}}">หน้าหลัก</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth

                <ul class="navbar-nav mr-auto">


                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            บริจาค
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">ต้องการรับบริจาคด่วนมาก</a>
                            <a class="dropdown-item" href="#">ขาดแคลนทุนการศึกษา</a>
                            <a class="dropdown-item" href="#">มีความยากลำบาก</a>
                            <a class="dropdown-item" href="#">ขาดแคลนทุนทรัพย์</a>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a href="#" class="nav-link">การรับบริจาคที่ผ่านมา</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('donation.history')}}" class="nav-link">ประวัติการบริจาค</a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link">เกี่ยวกับเรา</a>
                    </li>

                </ul>


                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item  ">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>

                            <span class="badge badge-warning ">{{ $badge }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>

                            @foreach ($nonti as $n)
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-envelope mr-2"></i> {{$n->title}}
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            @endforeach
                        </div>
                    </li>

                </ul>

                @else
                <ul class="navbar-nav">


                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            บริจาค
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">ต้องการรับบริจาคด่วนมาก</a>
                            <a class="dropdown-item" href="#">ขาดแคลนทุนการศึกษา</a>
                            <a class="dropdown-item" href="#">มีความยากลำบาก</a>
                            <a class="dropdown-item" href="#">ขาดแคลนทุนทรัพย์</a>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a href="#" class="nav-link">การรับบริจาคที่ผ่านมา</a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link">เกี่ยวกับเรา</a>
                    </li>


                </ul>


                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item ">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">สมัครสมาชิก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacherRegister') }}">สมัครครู</a>
                    </li>

                </ul>
                @endauth
            </div>
        </nav>

        <!-- /.navbar -->

        <div id="app">

            @yield('content')
        </div>


        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <footer class="footer page-footer font-small blue">
        <div class="container">
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Very long link 1</a>
                        </li>
                        <li>
                            <a href="#!">Very long link 2</a>
                        </li>

                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>

                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>

                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>

                    </ul>

                </div>
                <!-- Grid column -->
                <div class="col-md-12">
                    <div class="footer-copyright text-center py-3">© 2020 Copyright:
                        <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>







</body>

</html>
