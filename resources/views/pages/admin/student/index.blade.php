@extends('layouts.admin.master')

@push('title')
Krukidee | ข้อมูลครู
@endpush

@push('plugin-styles')
<!-- Plugin css import here -->
{!! Html::style('admin/assets/plugins/datatables-net/dataTables.bootstrap4.css') !!}
{!! Html::script('admin/js/app.js') !!}
@endpush

@section('content')
<!-- Page content here -->
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.student')}}">ข้อมูลนักเรียน</a></li>
        <li class="breadcrumb-item active" aria-current="page">ทั้งหมด</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- <h6 class="card-title">รายชื่อครู</h6> -->
                <!-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th width=10>#</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>ที่อยู่</th>
                                <th>ระดับ</th>
                                <th>ยอดปิดรับ</th>
                                <th>สถานะ</th>
                                <th width=10 class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $s)
                            <tr>
                                @php
                                $id = Crypt::encrypt($s->id);
                                @endphp
                                <td>{{$s->id}}</td>
                                <td>{{$s->name.' '.$s->lastname}}</td>
                                <td>{{$s->address}}</td>
                                <td>
                                    @if ($s->level==1)
                                    <span class="badge badge-secondary" data-toggle="tooltip"
                                    data-placement="top" title="ไม่รีบ">1</span>
                                    @elseif ($s->level==2)
                                    <span class="badge badge-success" data-toggle="tooltip"
                                    data-placement="top" title="ปานกลาง">2</span>
                                    @elseif ($s->level==3)
                                    <span class="badge badge-warning" data-toggle="tooltip"
                                    data-placement="top" title="เร่งด่วน">3</span>
                                    @elseif ($s->level==4)
                                    <span class="badge badge-danger" data-toggle="tooltip"
                                    data-placement="top" title="เร่งด่วนมาก">4</span>
                                    @endif
                                </td>
                                <td>{{number_format($s->maxDonate)}}</td>
                                <td>
                                    @if($s->status == 'open')
                                    <span class="badge badge-pill badge-success" data-toggle="tooltip"
                                        data-placement="left" title="เปิดใช้งาน">
                                        <i data-feather="user-check" class="icon-sm"></i>
                                    </span>
                                    @else
                                    <span class="badge badge-pill badge-danger" data-toggle="tooltip"
                                        data-placement="left" title="ปิดใช้งาน">
                                        <i data-feather="user-x" class="icon-sm"></i>
                                    </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="btn-group">

                                        <button type="button" class="btn btn-light btn-icon"><i class="icon-lg"
                                                data-feather="settings"></i></button>
                                        <button type="button"
                                            class="btn btn-light dropdown-toggle dropdown-toggle-split btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                            href="{{route('admin.aboutStudent',['id'=>$s->id])}}">
                                            <i data-feather="eye" class="icon-sm mr-2"></i> <span
                                                class="">ดูข้อมูล</span></a>
                                            <a class="dropdown-item"
                                                href="{{route('admin.studentEdit',['id'=>$s->id])}}">
                                                <i data-feather="edit-2" class="icon-sm mr-2"></i><span class=""> แก้ไขข้อมูล</span>
                                            </a>

                                            @if ($s->status=='ban')
                                            <a class="dropdown-item unCause" href="#" data-names="{{$s->name}}"
                                                data-ids="{{$s->id}}">
                                                <i data-feather="user-check" class="icon-sm mr-2"></i><span class="">
                                                    ยกการระงับ</span>
                                            </a>
                                            @else

                                            <a class="dropdown-item cause" href="#" data-name="{{$s->name}}"
                                                data-id="{{$s->id}}">
                                                <i data-feather="slash" class="icon-sm mr-2"></i><span class="">
                                                    ระงับการบริจาค</span>
                                            </a>
                                            @endif

                                            <a class="dropdown-item"
                                                href="{{route('admin.deleteStudent',['id'=>$s->id])}}">
                                                <i data-feather="trash" class="icon-sm mr-2"></i><span class="">
                                                    ลบข้อมูล</span>
                                            </a>



                                        </div>
                                        @if ($s->closeDonate < now())
                                        <a href="#" class="btn btn-secondary " data-toggle="tooltip"
                                        data-placement="left" title="เพิ่มคำขอบคุณ"><i class="icon-md"
                                            data-feather="edit-3"></i></a>
                                        @endif


                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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

@push('plugin-scripts')
<!-- Plugin js import here -->
{!! Html::script('admin/assets/plugins/datatables-net/jquery.dataTables.js') !!}
{!! Html::script('admin/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') !!}
@endpush

@push('custom-scripts')
<!-- Custom js here -->
{!! Html::script('admin/assets/js/data-table.js') !!}
@if (session('feedback'))
<script>
    Swal.fire('ผลการทำงาน',"{{session('feedback')}}",'success');
</script>
@endif
@endpush
