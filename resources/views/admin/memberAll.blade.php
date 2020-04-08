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
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Member ทั้งหมด</h3>
                            <input id="myInput" type="text" placeholder="Search..">

                        </div>
                        <div class="card-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>ชื่อ</th>
                                        <th>email</th>
                                        <th>สถานะ</th>
                                        <th>เครื่องมือ</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($user as $s)
                                    <tr>
                                        @php
                                        $id = Crypt::encrypt($s->id);
                                        @endphp
                                        <td>{{$s->id}}</td>
                                        <td>{{$s->name}}</td>
                                        <td>{{$s->email}}</td>
                                        <td>{{$s->status}}</td>
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
                                                            href="{{route('admin.editMember',['id'=>$id])}}">
                                                            <li class="	fas fa-pen"></li> แก้ไขข้อมูล
                                                        </a>

                                                        @if ($s->status=='ban')
                                                    <a class="dropdown-item" href="{{route('admin.memberUnban',['id'=>$id])}}">
                                                            <li class="	far fa-calendar-check"></li> ปลดแบน
                                                        </a>
                                                        @else

                                                        <a class="dropdown-item cause" href="#" data-name="{{$s->name}}"
                                                            data-id="{{$id}}">
                                                            <li class="fas fa-ban"></li> แบนผู้ใช้
                                                        </a>
                                                        @endif

                                                        <a class="dropdown-item" href="{{route('admin.deleteUser',['id'=>$id])}}">
                                                            <li class="	fas fa-trash-alt"></li> ลบผู้ใช้
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('admin.memberAbout',['id'=>$id])}}">
                                                            <li class="	fas fa-list-ul"></li> ดูข้อมูล
                                                        </a>


                                            </div>
                                            {{-- <ul>
                                            <li class="fas fa-pen "></li><i class="fa fa-caret-down" aria-hidden="true"></i>
                                        </ul> --}}

                                            {{-- <li class="dropdown active fas fa-pen text-white">
                                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            ตัวเลือก
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">ต้องการรับบริจาคด่วนมาก</a>
                                                <a class="dropdown-item" href="#">ขาดแคลนทุนการศึกษา</a>
                                                <a class="dropdown-item" href="#">มีความยากลำบาก</a>
                                                <a class="dropdown-item" href="#">ขาดแคลนทุนทรัพย์</a>
                                            </div>
                                        </li> --}}
                                            {{-- <form action="#" method="POST" class="d-inline"
                                        onsubmit="return confirm('ต้องการลบข้อมูล?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-secondary btn-sm ">

                                            <li style="color: #545c5b;" class="fas fa-trash text-white"></li>

                                        </button>

                                    </form> --}}

                                        </td>

                                    </tr>


                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        {{$user->links()}}
                    </div>
                </div>



            </div>
        </div>
        <!-- /.container-fluid -->
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
<script src="{{asset('js/sweetalert2.min.js')}}"></script>
@if (session('feedback'))
<script>
    Swal.fire('ผลการทำงาน',"{{session('feedback')}}",'success');
</script>
@endif


@endsection
