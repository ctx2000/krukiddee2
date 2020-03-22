<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand  navbar-orange navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href=""><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard')}}" class="nav-link">หน้าแรก</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('teacher.show')}}" class="nav-link">Contact</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item ">
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
                        <span class="badge badge-warning ">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

            </ul>
        </nav>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">KruKidDee</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                    </div>
                    <div class="info">
                        <a href="{{route('teacher.edit')}}" class="d-block">{{ auth()->user()->name }} |
                            <u>แก้ไข</u></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-header">เมนูหลัก</li>



                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    จัดการสมาชิก
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.member')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>สมาชิกทั้งหมด</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    จัดการครู
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.teacher')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ครูทั้งหมด</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.addTeacher')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>เพิ่มครู</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="{{route('admin.acceptTeacher')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ครูรออนุมัติ</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon 	far fa-smile"></i>
                                <p>
                                    จัดการนักเรียน
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.student')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>นักเรียนทั้งหมด</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.addStudent')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>เพิ่มนักเรียน</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="{{route('admin.checkReciept')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ตรวจสอบยอดบริจาค</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.allReciept')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>การบริจาคทั้งหมด</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-folder-open"></i>
                                <p>
                                    จัดการเว็บไซด์
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/UI/general.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รูปสไลด์</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/UI/icons.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รูปFooter</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

            @yield('content')

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.0-alpha
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->



</body>

</html>
