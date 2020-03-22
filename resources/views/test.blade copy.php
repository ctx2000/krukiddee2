@extends('layouts.memberNav')

@section('content')
<div class="">
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3>หัวข้อ </h3>
                        </div>
                        <div class="card-body">
                            {{-- คอนเท้น --}}
                            {{-- <div class="row">

                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <a href="#"><img class="card-img-top" src="" alt=""></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="#">ชื่อ</a>
                                            </h4>
                                            <h5>เทส</h5>
                                            <p class="card-text">เทส</p>
                                        </div>
                                        <div class="card-footer">

                                            <div class="btn-toolbar justify-content-between" role="toolbar"
                                                aria-label="Toolbar with button groups">
                                                <div class="btn-group mr-1" role="group" aria-label="First group">

                                                    <a href=" #" class="btn btn-outline-danger">เพิ่มคำขอบคุณ</a>

                                                </div>



                                                <div class="input-group">
                                                    <div class="btn-group" role="group" aria-label="3 group">
                                                        <a class="btn btn-outline-info" href="#">

                                                            <li style="color: #0f5e52;" class="fa fa-pencil "></li>

                                                        </a>

                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <form action="#" method="POST" class="d-inline"
                                                            onsubmit="return confirm('ต้องการลบข้อมูล?')">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-outline-secondary ">

                                                                <li style=" color: #545c5b;" class="fa fa-trash "></li>

                                                            </button>

                                                        </form>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-4"></div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <a href="#"><img class="card-img-top" src="" alt=""></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="#">ชื่อ</a>
                                            </h4>
                                            <h5>เทส</h5>
                                            <p class="card-text">เทส</p>
                                        </div>
                                        <div class="card-footer">

                                            <div class="btn-toolbar justify-content-between" role="toolbar"
                                                aria-label="Toolbar with button groups">
                                                <div class="btn-group mr-1" role="group" aria-label="First group">

                                                    <a href=" #" class="btn btn-outline-danger">เพิ่มคำขอบคุณ</a>

                                                </div>



                                                <div class="input-group">
                                                    <div class="btn-group" role="group" aria-label="3 group">
                                                        <a class="btn btn-outline-info" href="#">

                                                            <li style="color: #0f5e52;" class="fa fa-pencil "></li>

                                                        </a>

                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <form action="#" method="POST" class="d-inline"
                                                            onsubmit="return confirm('ต้องการลบข้อมูล?')">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-outline-secondary ">

                                                                <li style=" color: #545c5b;" class="fa fa-trash "></li>

                                                            </button>

                                                        </form>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection
