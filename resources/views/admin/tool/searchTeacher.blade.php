@extends('layouts/adminNav')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Member ทั้งหมด &nbsp;</h3>

                        <form class="form-inline ml-3" method="POST" action="{{route('admin.searchTeacher')}}">
                            @csrf
                                <div class="input-group input-group-sm">
                                    <input class="form-control " type="search" placeholder="Search"
                                        aria-label="Search" name="search">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">

                            <table class="table">
                                <tr>
                                    <th>ชื่อ</th>
                                </tr>
                                @foreach ($teacher as $t)
                                <tr>
                                    <td>{{$t->name}}</td>
                                </tr>

                                @endforeach
                            </table>

                        </div>


                    </div>
                </div>



            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
