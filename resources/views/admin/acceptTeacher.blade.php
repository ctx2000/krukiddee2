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
                            <h3 class="card-title">ครูทั้งหมด &nbsp;</h3>

                            <form class="form-inline ml-3" method="POST" action="{{route('admin.searchTeacher')}}">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <input class="form-control " type="search" placeholder="Search..."
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
                                    <th>นามสกุล</th>
                                    <th>สถานะ</th>
                                    <th>เครื่องมือ</th>
                                </tr>
                                @foreach ($teacher as $t)
                                @php
                                $id = Crypt::encrypt($t->id);
                                @endphp
                                <tr>
                                    <td>{{$t->name}}</td>
                                    <td>{{$t->lastname}}</td>
                                    <td>{{$t->status}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary btn-sm"><i
                                                    class="fas fa-cog"></i></button>
                                            <button type="button"
                                                class="btn btn-default btn-sm dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown"></button>
                                            <span class="sr-only">Toggle Dropdown</span>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item"
                                                    href="{{route('admin.editTeacher',['id'=>$id])}}">
                                                    <li class="	fas fa-pen"></li> แก้ไขข้อมูล
                                                </a>


                                                <a class="dropdown-item"
                                                    href="{{route('admin.allowTeacher',['id'=>$id])}}">
                                                    <li class="	far fa-calendar-check"></li> อนุมัติ
                                                </a>


                                                <a class="dropdown-item" href="#">
                                                    <li class="	fas fa-trash-alt"></li> ลบผู้ใช้
                                                </a>
                                                <a class="dropdown-item" href="{{route('admin.aboutTeacher',['id'=>$id])}}">
                                                    <li class="	fas fa-list-ul"></li> ดูข้อมูล
                                                </a>


                                            </div>
                                    </td>
                                </tr>

                                @endforeach
                            </table>

                        </div>

                        {{$teacher->links()}}
                    </div>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ระบุสาเหตุการแบนผู้ใช้</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('admin.memberBaned')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">แบนผู้ใช้:</label>
                                        <input type="text" class="form-control" id="name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">สาเหตุ:</label>
                                        <textarea class="form-control" id="cause" name="cause"></textarea>
                                    </div>
                                    <input type="hidden" id="id" name="id">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $('.cause').click(function(){
            // get data from edit btn

            var name = $(this).attr('data-name');
            var id = $(this).attr('data-id');


            // set value to modal
            $("#name").val(name);
            $("#id").val(id);


            $('#myModal').modal('show');
            });
                </script>


            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
