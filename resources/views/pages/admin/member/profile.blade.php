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
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ข้อมูลสมาชิก</a></li>
        <li class="breadcrumb-item active" aria-current="page">ทั้งหมด</li>
    </ol>
</nav>
<div class="content-wrapper">
    <div class="container">

        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="http://placehold.it/150x150" id="imgProfile"
                                        style="width: 150px; height: 150px" class="img-thumbnail" />

                                </div>
                                <div class="userData ml-3">
                                    @php
                                    $id = Crypt::encrypt($user->id);
                                    @endphp
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">
                                        ชื่อสมาชิก : {{$user->name}}</h2>
                                    <h6 class="d-block"> บริจาคไปแล้ว : {{$count}} ครั้ง</h6>
                                    <h6 class="d-block"> ยอดบริจาครวม : {{number_format($sum)}} บาท</h6>
                                    @if ($user->status=='ban')
                                    <a class="btn btn-success" href="{{route('admin.memberUnban',['id'=>$id])}}">
                                        <i data-feather="user-check" class="icon-sm mr-1"></i> ปลดแบน
                                    </a>
                                    @else

                                    <a class="btn btn-info cause" href="#" data-name="{{$user->name}}"
                                        data-id="{{$id}}">
                                        <i data-feather="slash" class="icon-sm mr-1"></i>แบนผู้ใช้
                                    </a>
                                    @endif
                                    <a href="{{route('admin.deleteUser',['id'=>$id])}}"
                                        class="btn btn-danger delete-confirm"><i data-feather="trash"
                                            class="icon-sm mr-1"></i>ลบข้อมูลผู้ใช้</a>
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard"
                                        value="Discard Changes" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab"
                                aria-controls="basicInfo" aria-selected="true">ข้อมูล</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices"
                                role="tab" aria-controls="connectedServices" aria-selected="false">การบริจาคทั้งหมด</a>
                        </li>
                    </ul>
                    <div class="tab-content ml-1" id="myTabContent">
                        <div class="tab-pane fade show active" id="basicInfo" role="tabpanel"
                            aria-labelledby="basicInfo-tab">


                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">ชื่อ นามสกุล</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $user->name.' '.$user->lastname }}
                                </div>
                            </div>
                            <hr />

                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">อีเมล์</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$user->email}}
                                </div>
                            </div>
                            <hr />


                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">ที่อยู่โรงเรียน</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$user->schoolname.' : '.$user->Address}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">รูปใบประกอบวิชาชีพ</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    Something
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">รหัสบัตรประชาชน</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$user->id_card}}
                                </div>
                            </div>
                            <hr />

                        </div>
                        <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                            aria-labelledby="ConnectedServices-tab">
                            <table class="table">
                                <tr>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>จำนวนบริจาค</th>
                                    <th>คอมเม้นต์</th>

                                </tr>
                                @foreach ($donate as $d)
                                <tr>
                                    <td> <a
                                            href="{{route('admin.aboutStudent',['id'=>$d->student_id])}}">{{$d->name.' '.$d->lastname}}</a>
                                    </td>
                                    <td>{{$d->price}}</td>
                                    <td>{{$d->description}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

</div>
</div>
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
<script src="{{asset('js/sweetalert2.min.js')}}"></script>
@if (session('feedback'))
<script>
    Swal.fire('ผลการทำงาน',"{{session('feedback')}}",'success');
</script>
@endif
<script>
    $('.delete-confirm').on('click', function (e) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal.fire({
        title: 'ต้องการลบผู้ใช้งานนี้หรือไม่?',
        text: 'การลบข้อมูลจะไม่สามารถกู้คืนได้',
        icon: 'warning',
        showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'ยืนยัน'
    }).then((result) => {
  if (result.value) {
            window.location.href = url;
        }
    });
});
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
