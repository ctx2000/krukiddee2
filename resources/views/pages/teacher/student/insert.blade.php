@extends('layouts.teacher.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@push('title')
Krukidee | เพิ่มข้อมูลนักเรียน
@endpush

@push('plugin-styles')
<!-- Plugin css import here -->
{!! Html::script('admin/js/app.js') !!}
{!! Html::style('admin/assets/plugins/select2/select2.min.css') !!}
<style type="text/css">
    body {
        background-color: #E3E6F6;
    }

    .drop-area {
        width: 100px;
        height: 100%;
        border: 1px solid #999;
        text-align: center;
        padding: 10px;
        cursor: pointer;
    }

    #thumbnail img {
        width: 100px;
        height: 100px;
        margin: 5px;
    }
    #thumbnail2 img {
        width: 100px;
        height: 100px;
        margin: 5px;
    }
    canvas {
        border: 1px solid red;
    }
</style>
@endpush

@section('content')

<!-- Page content here -->
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/member/all')}}">ข้อมูลนักเรียน</a></li>
        <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลนักเรียน</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">แก้ไขข้อมูล</h6>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action=" {{route('admin.studentStore')}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">ชื่อ</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    aria-describedby="nameHelp">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname">นามสกุล</label>
                                <input name="lastname" type="text" class="form-control" id="price"
                                    aria-describedby="priceHelp">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname">ชื่อ-นามสกุล ภาษาอังกฤษ <small class="text-primary">*url ไม่ต้องใส่(-)</small></label>
                                <input name="title" type="text" class="form-control" id="price"
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
                            <div class="form-group col-md-3">
                                <label for="address">ที่อยู่</label>
                                {{ Form::text('address', null, ['class'=>'form-control','required']) }}
                            </div>
                            <div class="form-group col-md-3">
                                <label for="province">จังหวัด</label>
                                {{Form::select('province',[],null,['id'=>'input_province','class'=>'js-example-basic-single','onchange'=>'showAmphoes()'])}}

                            </div>
                            <div class="form-group col-md-2">
                                <label for="district">อำเภอ</label>
                                {{Form::select('district',[],null,['id'=>'input_amphoe','class'=>'js-example-basic-single','onchange'=>'showDistricts()'])}}

                            </div>
                            <div class="form-group col-md-2">
                                <label for="sub_district">ตำบล</label>
                                {{Form::select('sub_district',[],null,['id'=>'input_district','class'=>'js-example-basic-single','onchange'=>'showZipcode()'])}}

                            </div>
                            <div class="form-group col-md-2">
                                <label for="zipcode">รหัสไปรษณีย์</label>
                                {{ Form::text('zipcode', null, ['id'=>'input_zipcode','class'=>'form-control','disabled']) }}
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="user_id">เลือกครู</label>


                            </div>
                            <div class="form-group col-md-3">
                                <label for="tel">ระดับความเร่งด่วน</label>
                                {{ Form::select('level',['1'=>'ไม่เร่งด่วน','2'=>'เร่งด่วนเล็กน้อย','3'=>'เร่งด่วน','4'=>'เร่งด่วนมาก'], null, ['class'=>'js-example-basic-single','placeholder' => 'เลือกระดับความเร่งด่วนในการรับบริจาค..']) }}
                            </div>
                            <div class="form-group col-md-3">
                                <label for="tel">วันที่ปิดรับบริจาค</label>
                                {{ Form::date('closeDonate', \Carbon\Carbon::now(),['class'=>'form-control']) }}
                            </div>
                            <div class="form-group col-md-3">
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
                        ], null, ['class'=>'js-example-basic-single','placeholder' => 'เลือกธนาคาร...']) }}
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
                        <div class="form-group ">
                            <label for="description">รายละเอียดสั้นๆ/ข้อมูลนักเรียน <small class="text-primary">(SEO)</small></label>

                            {{ Form::textarea('seo', null, ['id'=>'exampleFormControlTextarea1','rows'=>'5','class'=>'form-control']) }}

                        </div>

                        <div class="form-group">
                            <label class="">เลือกภาพนักเรียน : </label>
                            <input id="file_upload" style="display:none" name="picture" type="file" multiple="false">
                            @if ($errors->has('picture'))
                            <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
                            @endif

                            <div id="upload" class="btn btn-outline-primary">
                                <i data-feather="upload-cloud" class="icon-md mr-2"></i>เลือกภาพ
                            </div>
                            <small class="text-primary">*ขนาด 123 x 4567</small>

                            <div id="thumbnail"></div>

                        </div>
                        <div class="form-group">
                            <label class="">เลือกภาพหน้าปกนักเรียน : </label>
                            <input id="file_upload2" style="display:none" name="picture_cover" type="file" multiple="false">
                            @if ($errors->has('picture_cover'))
                            <div class="invalid-feedback">{{ $errors->first('picture_cover') }}</div>
                            @endif

                            <div id="upload2" class="btn btn-outline-primary">
                                <i data-feather="upload-cloud" class="icon-md mr-2"></i>เลือกภาพ
                            </div>
                            <small class="text-primary">*ขนาด 123 x 4567</small>

                            <div id="thumbnail2"></div>
                        </div>

                        <div class="form-group ">
                            <div class="float-left">
                                <a href="{{route('teacher.dashboard')}}" class="btn btn-danger">ยกเลิก</a>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">ต่อไป</button>
                            </div>
                        </div>
                        <fieldset>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<!-- Plugin js import here -->
{!! Html::script('admin/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('admin/assets/plugins/select2/select2.min.js') !!}
{!! Html::script('admin/assets/js/select2.js') !!}
<script>
    $(document).ready(function(){

      showProvinces();
    });
</script>
<script>
    function ajax(url, callback){
          $.ajax({
            "url" : url,
            "type" : "GET",
            "dataType" : "json",
          })
          .done(callback); //END AJAX
        }
</script>
<script>
    function showProvinces(){
              //PARAMETERS
              var url = "{{ url('/') }}/api/province";
              var callback = function(result){
                $("#input_province").empty();
                for(var i=0; i<result.length; i++){
                  $("#input_province").append(
                    $('<option></option>')
                      .attr("value", ""+result[i].province_code)
                      .html(""+result[i].province)
                  );
                }
                showAmphoes();
              };
              //CALL AJAX
              ajax(url,callback);
            }
            function showAmphoes(){
  //INPUT
  var province_code = $("#input_province").val();
  //PARAMETERS
  var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe";
  var callback = function(result){
    //console.log(result);
    $("#input_amphoe").empty();
    for(var i=0; i<result.length; i++){
      $("#input_amphoe").append(
        $('<option></option>')
          .attr("value", ""+result[i].amphoe_code)
          .html(""+result[i].amphoe)
      );
    }
    showDistricts();
  };
  //CALL AJAX
  ajax(url,callback);
}
function showDistricts(){
  //INPUT
  var province_code = $("#input_province").val();
  var amphoe_code = $("#input_amphoe").val();
  //PARAMETERS
  var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe/"+amphoe_code+"/district";
  var callback = function(result){
    //console.log(result);
    $("#input_district").empty();
    for(var i=0; i<result.length; i++){
      $("#input_district").append(
        $('<option></option>')
          .attr("value", ""+result[i].district_code)
          .html(""+result[i].district)
      );
    }
    showZipcode();
  };
  //CALL AJAX
  ajax(url,callback);
}
function showZipcode(){
  //INPUT
  var province_code = $("#input_province").val();
  var amphoe_code = $("#input_amphoe").val();
  var district_code = $("#input_district").val();
  //PARAMETERS
  var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe/"+amphoe_code+"/district/"+district_code;
  var callback = function(result){
    //console.log(result);
    for(var i=0; i<result.length; i++){
      $("#input_zipcode").val(result[i].zipcode);
    }
  };
  //CALL AJAX
  ajax(url,callback);
}
</script>
<!-- Custom js here -->
<script type="text/javascript">
    $(function() {
    // validate signup form on keyup and submit
    $("#editMemberForm").validate({
      rules: {
        name: {
          required: true
        },
        lastname: {
          required: true
        },
        email: {
          required: true
        },
        password: {
          required: true,
          minlength: 6
        },
        tel: {
          required: true
        },
        agree: "required"
      },
      messages: {
        name: "กรุณากรอกชื่อของคุณ",
        surname: "กรุณากรอกนามสกุลของคุณ",
        email: "กรุณากรอกอีเมลของคุณ",
        password: {
          required: "กรุณากรอกรหัสผ่านของคุณ",
          minlength: "รหัสผ่านต้องมีความยาวไม่น้อยกว่า 6 ตัว"
        },
        phone: "กรุณากรอกเบอร์โทรศัพท์ของคุณ",
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
  });

</script>
<script type="text/javascript">

    $(function() {


        $("#upload").on("click", function(e) {
            $("#file_upload").show().click().hide();
            e.preventDefault();
        });
        $("#file_upload").on("change", function(e) {
            var files = this.files
            showThumbnail(files)
        });


        function showThumbnail(files) {

            $("#thumbnail").html("");
            for (var i = 0; i < files.length; i++) {
                var file = files[i]
                var imageType = /image.*/
                if (!file.type.match(imageType)) {
                    //     console.log("Not an Image");
                    continue;
                }

                var image = document.createElement("img");
                var thumbnail = document.getElementById("thumbnail");
                image.file = file;
                thumbnail.appendChild(image)

                var reader = new FileReader()
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                }(image))

                var ret = reader.readAsDataURL(file);
                var canvas = document.createElement("canvas");
                ctx = canvas.getContext("2d");
                image.onload = function() {
                    ctx.drawImage(image, 100, 100)
                }
            } // end for loop

        } // end showThumbnail
        $("#upload2").on("click", function(e) {
            $("#file_upload2").show().click().hide();
            e.preventDefault();
        });
        $("#file_upload2").on("change", function(e) {
            var files = this.files
            showThumbnail2(files)
        });


        function showThumbnail2(files) {

            $("#thumbnail2").html("");
            for (var i = 0; i < files.length; i++) {
                var file = files[i]
                var imageType = /image.*/
                if (!file.type.match(imageType)) {
                    //     console.log("Not an Image");
                    continue;
                }

                var image = document.createElement("img");
                var thumbnail = document.getElementById("thumbnail2");
                image.file = file;
                thumbnail.appendChild(image)

                var reader = new FileReader()
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                }(image))

                var ret = reader.readAsDataURL(file);
                var canvas = document.createElement("canvas");
                ctx = canvas.getContext("2d");
                image.onload = function() {
                    ctx.drawImage(image, 100, 100)
                }
            } // end for loop

        } // end showThumbnail


    });
</script>
@endpush
