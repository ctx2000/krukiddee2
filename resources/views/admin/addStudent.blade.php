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

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>เพิ่มข้อมูลนักเรียน </h3>
                        </div>

                        <div class="card-body">
                            <form action=" {{route('student.store')}} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">ชื่อ</label>
                                        <input name="name" type="text" class="form-control" id="name"
                                            aria-describedby="nameHelp">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname">นามสกุล</label>
                                        <input name="lastname" type="text" class="form-control" id="price"
                                            aria-describedby="priceHelp">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="grade">ชั้นเรียน</label>
                                        {{ Form::text('grade', null, ['class'=>'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="age">อายุ</label>
                                        <input name="age" type="number" class="form-control" id="name"
                                            aria-describedby="nameHelp">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="birthday">วันเกิด</label>
                                        {{ Form::date('birthday', \Carbon\Carbon::now(),['class'=>'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-row">


                                    <div class="form-group col-md-3">
                                        <label for="id_card">เลขบัตรประชาชน</label>
                                        {{ Form::text('id_card', null, ['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tel">หมายเลขโทรศัพท์นักเรียน(ถ้ามี)</label>
                                        {{ Form::text('tel', null, ['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">ที่อยู่</label>
                                        {{ Form::text('address', null, ['class'=>'form-control']) }}
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="tel">ระดับความเร่งด่วน</label>
                                        {{ Form::select('level',['1'=>'ไม่เร่งด่วน','2'=>'เร่งด่วนเล็กน้อย','3'=>'เร่งด่วน','4'=>'เร่งด่วนมาก'], null, ['class'=>'form-control','placeholder' => 'เลือกระดับความเร่งด่วนในการรับบริจาค..']) }}
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tel">วันที่ปิดรับบริจาค</label>
                                        {{ Form::date('closeDonate', \Carbon\Carbon::now(),['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tel">จำนวนเงินสูงสุด</label>
                                        {{ Form::number('maxDonate', null, ['class'=>'form-control','min'=>0]) }}
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="bank_of">บัญชีของ : </label>
                                        {{ Form::text('bank_of', null, ['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="bankName">เลือกธนาคาร</label>
                                        {{ Form::select('bankName', ['ธนาคารกรุงไทย' => 'ธนาคารกรุงไทย', 'ธนาคารกรุงเทพ' => 'ธนาคารกรุงเทพ'
                                        , 'ธนาคารกรุงศรีอยุธยา' => 'ธนาคารกรุงศรีอยุธยา', 'ธนาคารไทยพานิชย์' => 'ธนาคารไทยพานิชย์', 'ธนาคารกสิกร' => 'ธนาคารกสิกร'
                                        , 'ธนาคารเพื่อการเกษตรและสหกรณ์' => 'ธนาคารเพื่อการเกษตรและสหกรณ์', 'ธนาคารทหารไทย' => 'ธนาคารทหารไทย',
                                         'ธนาคารเกียรตินาคิน' => 'ธนาคารเกียรตินาคิน', 'ธนาคารซีไอเอ็มบีไทย' => 'ธนาคารซีไอเอ็มบีไทย', 'ธนาคารธนชาต' => 'ธนาคารธนชาต',
                                          'ธนาคารออมสิน' => 'ธนาคารออมสิน', '	ธนาคารอาคารสงเคราะห์' => '	ธนาคารอาคารสงเคราะห์', 'ธนาคารอิสลามแห่งประเทศไทย' => 'ธนาคารอิสลามแห่งประเทศไทย'
                                    ], null, ['class'=>'form-control','placeholder' => 'เลือกธนาคาร...']) }}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="bankAccountName">ชื่อบัญชีธนาคาร</label>
                                        {{ Form::text('bankAccountName', null, ['class'=>'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="bankNumber">เลขที่บัญชี</label>
                                        {{ Form::text('bankNumber', null, ['class'=>'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <label for="user_id">เลือกธนาคาร</label>
                                        {{ Form::select('user_id', $teacher->pluck('name','id') , null, ['class'=>'form-control','placeholder' => 'เลือกครู...']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="description">รายละเอียดของนักเรียน</label>
                                        {{ Form::textarea('description', null, ['id'=>'exampleFormControlTextarea1','rows'=>'2','class'=>'form-control']) }}

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="picture" name="picture">
                                        <label class="custom-file-label"
                                            for="validatedCustomFile">เลือกภาพนักเรียน</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">เพิ่มนักเรียน</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
