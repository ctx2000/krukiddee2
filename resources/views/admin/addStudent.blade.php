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
                            <form action=" {{route('admin.studentStore')}} " method="POST" enctype="multipart/form-data">
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


                                    <div class="form-group col-md-6">
                                        <label for="id_card">เลขบัตรประชาชน</label>
                                        {{ Form::text('id_card', null, ['class'=>'form-control','required']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tel">หมายเลขโทรศัพท์นักเรียน(ถ้ามี)</label>
                                        {{ Form::text('tel', null, ['class'=>'form-control']) }}
                                    </div>


                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="address">ที่อยู่</label>
                                        {{ Form::text('address', null, ['class'=>'form-control','required']) }}
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="district">อำเภอ</label>
                                        {{ Form::text('district', null, ['class'=>'form-control','required']) }}
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="province" >จังหวัด</label>
                                        <select name="province"class="form-control">
                                            <option value="" selected>--------- เลือกจังหวัด ---------</option>
                                            <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                            <option value="กระบี่">กระบี่ </option>
                                            <option value="กาญจนบุรี">กาญจนบุรี </option>
                                            <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                            <option value="กำแพงเพชร">กำแพงเพชร </option>
                                            <option value="ขอนแก่น">ขอนแก่น</option>
                                            <option value="จันทบุรี">จันทบุรี</option>
                                            <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                            <option value="ชัยนาท">ชัยนาท </option>
                                            <option value="ชัยภูมิ">ชัยภูมิ </option>
                                            <option value="ชุมพร">ชุมพร </option>
                                            <option value="ชลบุรี">ชลบุรี </option>
                                            <option value="เชียงใหม่">เชียงใหม่ </option>
                                            <option value="เชียงราย">เชียงราย </option>
                                            <option value="ตรัง">ตรัง </option>
                                            <option value="ตราด">ตราด </option>
                                            <option value="ตาก">ตาก </option>
                                            <option value="นครนายก">นครนายก </option>
                                            <option value="นครปฐม">นครปฐม </option>
                                            <option value="นครพนม">นครพนม </option>
                                            <option value="นครราชสีมา">นครราชสีมา </option>
                                            <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                            <option value="นครสวรรค์">นครสวรรค์ </option>
                                            <option value="นราธิวาส">นราธิวาส </option>
                                            <option value="น่าน">น่าน </option>
                                            <option value="นนทบุรี">นนทบุรี </option>
                                            <option value="บึงกาฬ">บึงกาฬ</option>
                                            <option value="บุรีรัมย์">บุรีรัมย์</option>
                                            <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                            <option value="ปทุมธานี">ปทุมธานี </option>
                                            <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                            <option value="ปัตตานี">ปัตตานี </option>
                                            <option value="พะเยา">พะเยา </option>
                                            <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                            <option value="พังงา">พังงา </option>
                                            <option value="พิจิตร">พิจิตร </option>
                                            <option value="พิษณุโลก">พิษณุโลก </option>
                                            <option value="เพชรบุรี">เพชรบุรี </option>
                                            <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                            <option value="แพร่">แพร่ </option>
                                            <option value="พัทลุง">พัทลุง </option>
                                            <option value="ภูเก็ต">ภูเก็ต </option>
                                            <option value="มหาสารคาม">มหาสารคาม </option>
                                            <option value="มุกดาหาร">มุกดาหาร </option>
                                            <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                            <option value="ยโสธร">ยโสธร </option>
                                            <option value="ยะลา">ยะลา </option>
                                            <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                            <option value="ระนอง">ระนอง </option>
                                            <option value="ระยอง">ระยอง </option>
                                            <option value="ราชบุรี">ราชบุรี</option>
                                            <option value="ลพบุรี">ลพบุรี </option>
                                            <option value="ลำปาง">ลำปาง </option>
                                            <option value="ลำพูน">ลำพูน </option>
                                            <option value="เลย">เลย </option>
                                            <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                            <option value="สกลนคร">สกลนคร</option>
                                            <option value="สงขลา">สงขลา </option>
                                            <option value="สมุทรสาคร">สมุทรสาคร </option>
                                            <option value="สมุทรปราการ">สมุทรปราการ </option>
                                            <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                            <option value="สระแก้ว">สระแก้ว </option>
                                            <option value="สระบุรี">สระบุรี </option>
                                            <option value="สิงห์บุรี">สิงห์บุรี </option>
                                            <option value="สุโขทัย">สุโขทัย </option>
                                            <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                            <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                            <option value="สุรินทร์">สุรินทร์ </option>
                                            <option value="สตูล">สตูล </option>
                                            <option value="หนองคาย">หนองคาย </option>
                                            <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                            <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                            <option value="อุดรธานี">อุดรธานี </option>
                                            <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                            <option value="อุทัยธานี">อุทัยธานี </option>
                                            <option value="อุบลราชธานี">อุบลราชธานี</option>
                                            <option value="อ่างทอง">อ่างทอง </option>
                                            <option value="อื่นๆ">อื่นๆ</option>
                                      </select>
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
                                        <label for="user_id">เลือกครู</label>
                                        <select id="user_id" name="user_id" class="form-control" placeholder="เลือกครู...">
                                            <option value="" disabled selected>เลือกครู...</option>
                                            @foreach ($teacher as $t)
                                        <option  value="{{ $t->id }}">{{ $t->name.' '.$t->lastname }}----โรงเรียน{{$t->schoolname}}</option>
                                            @endforeach
                                        </select>

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
