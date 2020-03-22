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


                <table class="table">
                    <tr>
                        <th>ชื่อ</th>
                        <th>ตัวเลือก</th>
                    </tr>
                    @foreach ($student as $s)
                    <tr>
                        <td>{{$s->name}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary btn-sm"><i
                                        class="fas fa-cog"></i></button>
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown"></button>
                                <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="{{route('admin.studentEdit',['id'=>$s->id])}}">
                                        <li class="	fas fa-pen"></li> แก้ไขข้อมูล
                                    </a>

                                    @if ($s->status=='ban')
                                    <a class="dropdown-item unCause" href="#" data-names="{{$s->name}}"
                                        data-ids="{{$s->id}}">
                                        <li class="	far fa-calendar-check"></li> ยกการระงับ
                                    </a>
                                    @else

                                    <a class="dropdown-item cause" href="#" data-name="{{$s->name}}"
                                        data-id="{{$s->id}}">
                                        <li class="fas fa-ban"></li> ระงับการบริจาค
                                    </a>
                                    @endif

                                    <a class="dropdown-item" href="#">
                                        <li class="	fas fa-trash-alt"></li> ลบผู้ใช้
                                    </a>
                                    <a class="dropdown-item" href="">
                                        <li class="	fas fa-list-ul"></li> ดูข้อมูล
                                    </a>


                                </div>
                        </td>
                    </tr>

                    @endforeach
                </table>


            </div>



        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ระบุสาเหตุการระงับบริจาค</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('admin.studentBan')}}">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ระงับบริจาคของ:</label>
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
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ยกเลิกการระงับบริจาค</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('admin.studentUnban')}}">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ยกเลิกระงับของ:</label>
                        <input type="text" class="form-control" id="names" readonly>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">ระบุวันที่ปิดรับบริจาค:</label>

                        {{ Form::date('closeDonate', \Carbon\Carbon::now(),['class'=>'form-control']) }}
                    </div>
                    <input type="hidden" id="ids" name="id">

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

$('.unCause').click(function(){
// get data from edit btn

var name = $(this).attr('data-names');
var id = $(this).attr('data-ids');


// set value to modal
$("#names").val(name);
$("#ids").val(id);


$('#myModal2').modal('show');
});
</script>
@endsection
