@extends('layouts.admin.master')

@push('title')
Krukidee | ข้อมูลการบริจาค
@endpush

@push('plugin-styles')
<!-- Plugin css import here -->
{!! Html::style('admin/assets/plugins/datatables-net/dataTables.bootstrap4.css') !!}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">

@endpush

@section('content')
<!-- Page content here -->
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ข้อมูลการบริจาค</a></li>
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
                                <th>จำนวนเงินบริจาค</th>
                                <th>ใบเสร็จ</th>
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
                                <td>{{$s->price}}</td>
                                <td>
                                    <div class="bigGallPic" id="bigGallDiv" onclick="this.style.display='none'"></div>
                                    <a href="{{asset('storage/receipt/'.$s->picture)}}"  data-toggle="lightbox" data-title="{{$s->name}}" data-footer="">
                                        <img class="img-fluid" src="{{asset('storage/receipt/'.$s->picture)}}" width="50" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('teacher.checkedReciept',['id'=>$s->id,'check'=>'true'])}}">ยืนยัน</a> |
                                    <a href="{{route('teacher.checkedReciept',['id'=>$s->id,'check'=>'false'])}}">ไม่ถูกต้อง</a>
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

{{-- <script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script> --}}

@endsection

@push('plugin-scripts')
<!-- Plugin js import here -->
{!! Html::script('admin/assets/plugins/datatables-net/jquery.dataTables.js') !!}
{!! Html::script('admin/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') !!}
@endpush

@push('custom-scripts')
<!-- Custom js here -->
{!! Html::script('admin/assets/js/data-table.js') !!}

@endpush
