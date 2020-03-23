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
                            {!! Form::model($student, ['novalidate','route' => ['admin.studentUpdate'], 'method'
                            =>
                            'post', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation'])
                            !!}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">ชื่อ</label>
                                    {{ Form::text('name', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">นามสกุล</label>
                                    {{ Form::text('lastname', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('lastname'))
                                    <div class="invalid-feedback">{{ $errors->first('lastname') }}</div>
                                    @endif
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="grade">ชั้นเรียน</label>
                                    {{ Form::text('grade', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('grade'))
                                    <div class="invalid-feedback">{{ $errors->first('grade') }}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="age">อายุ</label>
                                    {{ Form::text('age', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('age'))
                                    <div class="invalid-feedback">{{ $errors->first('age') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="birthday">วันเกิด</label>
                                    {{ Form::date('birthday', null,['class'=>'form-control','required']) }}
                                    @if ($errors->has('birthday'))
                                    <div class="invalid-feedback">{{ $errors->first('birthday') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">


                                <div class="form-group col-md-3">
                                    <label for="id_card">เลขบัตรประชาชน</label>
                                    {{ Form::text('id_card', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('id_card'))
                                    <div class="invalid-feedback">{{ $errors->first('id_card') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="tel">หมายเลขโทรศัพท์นักเรียน(ถ้ามี)</label>
                                    {{ Form::text('tel', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('tel'))
                                    <div class="invalid-feedback">{{ $errors->first('tel') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">ที่อยู่</label>
                                    {{ Form::text('address', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('address'))
                                    <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="tel">ระดับความเร่งด่วน</label>
                                    {{ Form::select('level',['1'=>'ไม่เร่งด่วน','2'=>'เร่งด่วนเล็กน้อย','3'=>'เร่งด่วน','4'=>'เร่งด่วนมาก'], null, ['class'=>'form-control','placeholder' => 'เลือกระดับความเร่งด่วนในการรับบริจาค..','required']) }}
                                    @if ($errors->has('level'))
                                    <div class="invalid-feedback">{{ $errors->first('level') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="closeDonate">วันที่ปิดรับบริจาค</label>
                                    {{ Form::date('closeDonate', \Carbon\Carbon::now(),['class'=>'form-control','required']) }}
                                    @if ($errors->has('closeDonate'))
                                    <div class="invalid-feedback">{{ $errors->first('closeDonate') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="maxDonate">จำนวนเงินสูงสุด</label>
                                    {{ Form::number('maxDonate', null, ['class'=>'form-control','min'=>0,'required']) }}
                                    @if ($errors->has('maxDonate'))
                                    <div class="invalid-feedback">{{ $errors->first('maxDonate') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="bank_of">บัญชีของ : </label>
                                    {{ Form::text('bank_of', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('bank_of'))
                                    <div class="invalid-feedback">{{ $errors->first('bank_of') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bankName">เลือกธนาคาร</label>
                                    {{ Form::select('bankName', ['ธนาคารกรุงไทย' => 'ธนาคารกรุงไทย', 'ธนาคารกรุงเทพ' => 'ธนาคารกรุงเทพ'
                                        , 'ธนาคารกรุงศรีอยุธยา' => 'ธนาคารกรุงศรีอยุธยา', 'ธนาคารไทยพานิชย์' => 'ธนาคารไทยพานิชย์', 'ธนาคารกสิกร' => 'ธนาคารกสิกร'
                                        , 'ธนาคารเพื่อการเกษตรและสหกรณ์' => 'ธนาคารเพื่อการเกษตรและสหกรณ์', 'ธนาคารทหารไทย' => 'ธนาคารทหารไทย',
                                         'ธนาคารเกียรตินาคิน' => 'ธนาคารเกียรตินาคิน', 'ธนาคารซีไอเอ็มบีไทย' => 'ธนาคารซีไอเอ็มบีไทย', 'ธนาคารธนชาต' => 'ธนาคารธนชาต',
                                          'ธนาคารออมสิน' => 'ธนาคารออมสิน', '	ธนาคารอาคารสงเคราะห์' => '	ธนาคารอาคารสงเคราะห์', 'ธนาคารอิสลามแห่งประเทศไทย' => 'ธนาคารอิสลามแห่งประเทศไทย'
                                    ], null, ['class'=>'form-control','placeholder' => 'เลือกธนาคาร...','required']) }}
                                    @if ($errors->has('bankName'))
                                    <div class="invalid-feedback">{{ $errors->first('bankName') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bankAccountName">ชื่อบัญชีธนาคาร</label>
                                    {{ Form::text('bankAccountName', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('bankAccountName'))
                                    <div class="invalid-feedback">{{ $errors->first('bankAccountName') }}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="bankNumber">เลขที่บัญชี</label>
                                    {{ Form::text('bankNumber', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('bankNumber'))
                                    <div class="invalid-feedback">{{ $errors->first('bankNumber') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row ">
                                {{-- <div class="form-group col-md-3">
                                    <label for="description">ครูปัจจุบัน</label>

                                <input type="text" value="{{$oldTeacher->name.' '.$oldTeacher->lastname}}" class="form-control" readonly>

                                </div> --}}
                                <div class="form-group col-md-6">
                                    <label for="user_id">เลือกครู</label>
                                    <select id="user_id" name="user_id" class="form-control" placeholder="เลือกครู...">
                                    <option value="{{$oldTeacher->id}}"  selected>{{$oldTeacher->name.' '.$oldTeacher->lastname}} โรงเรียน{{$oldTeacher->schoolname}}</option>
                                        @foreach ($teacher as $t)
                                    <option  value="{{ $t->id }}">{{ $t->name.' '.$t->lastname }}----โรงเรียน{{$t->schoolname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description">รายละเอียดของนักเรียน</label>

                                    {{ Form::textarea('description', null, ['id'=>'exampleFormControlTextarea1','rows'=>'2','class'=>'form-control','required']) }}
                                    @if ($errors->has('description'))
                                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="picture" name="picture">
                                    <label class="custom-file-label" for="validatedCustomFile">เลือกภาพนักเรียน</label>
                                </div>
                            </div>
                        <input type="hidden" name="id" value="{{$student->id}}">

                            <button type="submit" class="btn btn-primary">ยืนยันการแก้ไขข้อมูล</button>
                            {!! Form::close() !!}
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
