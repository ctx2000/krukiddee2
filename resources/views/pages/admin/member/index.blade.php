@extends('layouts.admin.master')

@push('title')
Krukidee | ข้อมูลสมาชิก
@endpush

@push('plugin-styles')
<!-- Plugin css import here -->
{!! Html::script('admin/js/app.js') !!}
{!! Html::style('admin/assets/plugins/datatables-net/dataTables.bootstrap4.css') !!}
@endpush

@section('content')
<!-- Page content here -->
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/member/all')}}">ข้อมูลสมาชิก</a></li>
        <li class="breadcrumb-item active" aria-current="page">ทั้งหมด</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- <h6 class="card-title">รายชื่อสมาชิก</h6> -->
                <!-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th width=10>#</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>อีเมล</th>
                                <th>โทรศัพท์</th>
                                <th width=10 class="text-center">สถานะ</th>
                                <th width=10 class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $number = 1;
                            @endphp
                            @foreach ($user as $s)
                            <tr>
                                @php
                                $id = Crypt::encrypt($s->id);
                                @endphp
                                <!-- <td>{{$s->id}}</td> -->
                                <td>{{$number++}}</td>
                                <td>{{$s->name}}</td>
                                <td>{{$s->email}}</td>
                                <td>{{$s->tel}}</td>
                                <td class="text-center">
                                @if($s->status == '')
                                  <span class="badge badge-pill badge-success" data-toggle="tooltip" data-placement="left" title="เปิดใช้งาน">
                                    <i data-feather="user-check" class="icon-sm"></i>
                                  </span>
                                @else
                                  <span class="badge badge-pill badge-danger" data-toggle="tooltip" data-placement="left" title="ปิดใช้งาน">
                                    <i data-feather="user-x" class="icon-sm"></i>
                                  </span>
                                @endif
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light btn-icon"><i class="icon-lg"
                                                data-feather="settings"></i></button>
                                        <button type="button"
                                            class="btn btn-light dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            @if($s->status == '')
                                            <a class="dropdown-item cause" id="cause" href="#" data-name="{{$s->name}}" data-id="{{$id}}">
                                              <i data-feather="user-x" class="icon-sm mr-2"></i>
                                              <span>แบนผู้ใช้</span>
                                            </a>
                                            @else
                                            <a class="dropdown-item" href="{{route('admin.memberUnban',['id'=>$id])}}">
                                              <i data-feather="user-check" class="icon-sm mr-2"></i>
                                            <span>ปลดแบบผู้ใช้</span>
                                            </a>
                                            @endif
                                            <a class="dropdown-item" href="{{route('admin.memberAbout',['id'=>$id])}}">
                                              <i data-feather="eye" class="icon-sm mr-2"></i>
                                              <span class="">ดูข้อมูล</span>
                                            </a>
                                            <a class="dropdown-item" href="{{route('admin.editMember',['id'=>$id])}}">
                                              <i data-feather="edit-2" class="icon-sm mr-2"></i>
                                              <span>แก้ไขข้อมูล</span>
                                            </a>
                                            <a class="dropdown-item" onclick="onDeleteMember({{$s->id}})" href="#"><i
                                                    data-feather="trash" class="icon-sm mr-2"></i> <span
                                                    class="">ลบข้อมูล</span></a>
                                            <form id="delete-form-{{$s->id}}" action="{{route('admin.deleteUser', ['id'=>$id])}}" method="GET" style="display:none;">
                                              @csrf
                                              @method('DELETE')
                                          </form>
                                        </div>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ระบุสาเหตุการแบนผู้ใช้งาน</h5>
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
                        <textarea type="text" class="form-control" id="cause" name="cause" placeholder="ระบุสาเหตุ" rows="5"></textarea>
                    </div>
                    <input type="hidden" id="id" name="id">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </form>


            </div>
        </div>
    </div>
</div>

@endsection

@push('plugin-scripts')
<!-- Plugin js import here -->
{!! Html::script('admin/assets/plugins/datatables-net/jquery.dataTables.js') !!}
{!! Html::script('admin/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') !!}
@endpush

@push('custom-scripts')
<!-- Custom js here -->
{!! Html::script('admin/assets/js/data-table.js') !!}
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

    function onDeleteMember(id) {
        Swal.fire({
          title: 'คุณต้องการลบใช่หรือไม่?',
          text: "คุณจะไม่สามารถยกเลิกสิ่งนี้ได้!",
          icon: 'error',
          showCancelButton: true,
          confirmButtonClass: 'ml-2',
          confirmButtonText: 'ใช่, ฉันต้องการลบ!',
          cancelButtonText: 'ยกเลิก',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
          } else if (
            result.dismiss === Swal.DismissReason.cancel
          ) {
            return;
          }
        })
      }
</script>
@if (session('feedback'))
<script>
    Swal.fire('ผลการทำงาน',"{{session('feedback')}}",'success');
</script>
@endif
@endpush
