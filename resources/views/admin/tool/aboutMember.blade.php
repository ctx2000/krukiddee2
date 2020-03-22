@extends('layouts/adminNav')
@section('content')
<style>

</style>
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
                                        ชื่อสมาชิก : {{$user->name}}</h2>
                                    <h6 class="d-block"> บริจาคไปแล้ว : {{$count}} ครั้ง</h6>
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
                                <td> <a href="#">{{$d->name.' '.$d->lastname}}</a> </td>
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
@endsection
