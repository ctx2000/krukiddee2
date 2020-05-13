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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
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
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">
                                        @php
                                        $id = Crypt::encrypt($teacher->id);
                                        @endphp
                                        ครูผู้ดูแล : <a href="{{route('admin.aboutTeacher',['id'=>$id])}}">
                                            {{$teacher->name.' '.$teacher->lastname}}</a></h2>
                                    <h6 class="d-block"> รับบริจาคทั้งหมด : {{$count}} ครั้ง</h6>
                                    <h6 class="d-block"> ยอดบริจาครวม : {{number_format($sum)}} บาท</h6>
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
                                role="tab" aria-controls="connectedServices"
                                aria-selected="false">ประวัติการรับบริจาค</a>
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
                                    {{ $student->name.' '.$student->lastname }}
                                </div>
                            </div>
                            <hr />

                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">ที่อยู่</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$student->address}}
                                </div>
                            </div>
                            <hr />


                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">ชั้นเรียน</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$student->grade}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">โทรศัพท์</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$student->tel}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">รหัสบัตรประชาชน</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$student->id_card}}
                                </div>
                            </div>
                            <hr />

                        </div>

                        <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                            aria-labelledby="ConnectedServices-tab">
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>จำนวนเงินที่บริจาค</th>
                                            <th>ความคิดเห็น</th>
                                            <th>รูป</th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </thead>
                                    @foreach ($donate as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->price}}</td>
                                        <td>{{$d->description}}</td>
                                        <td>
                                            <div class="bigGallPic" id="bigGallDiv" onclick="this.style.display='none'">
                                            </div>
                                            <a href="{{asset('storage/receipt/'.$d->picture)}}" data-toggle="lightbox"
                                                data-title="" data-footer="">
                                                <img class="img-fluid" src="{{asset('storage/receipt/'.$d->picture)}}"
                                                    width="50" height="50" alt="">
                                            </a>
                                        </td>
                                        <td>{{$d->status}}</td>


                                    </tr>


                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                            event.preventDefault();
                            $(this).ekkoLightbox();
                        });
            </script>
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
@if (session('feedback'))
<script>
    Swal.fire('ผลการทำงาน',"{{session('feedback')}}",'success');
</script>
@endif
@endpush
