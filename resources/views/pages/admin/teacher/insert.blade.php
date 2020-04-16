@extends('layouts.admin.master')

@push('title')
Krukidee | แก้ไขข้อมูลสมาชิก
@endpush

@push('plugin-styles')
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

    canvas {
        border: 1px solid red;
    }
</style>

{!! Html::script('admin/js/app.js') !!}
{!! Html::style('admin/assets/plugins/select2/select2.min.css') !!}
<!-- Plugin css import here -->
@endpush

@section('content')
<!-- Page content here -->
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/member/all')}}">ข้อมูลสมาชิก</a></li>
        <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูล</li>
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
                {!! Form::open(['novalidate','route' => ['admin.storeTeacher'], 'method' => 'post', 'files'
                => true,'class'=> ($errors->any()) ? '' : 'needs-validation']) !!}
                <fieldset>
                    {{-- <form action=" {{route('admin.storeTeacher')}} " method="POST"
                    enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="sex">คำนำหน้าชื่อ</label>
                            {{ Form::select('sex',['นาย' => 'นาย','นาง' => 'นาง','นางสาว' => 'นางสาว', ],null, ['class'=>'form-control','required']) }}
                            @if ($errors->has('tel'))
                            <div class="invalid-feedback">{{ $errors->first('tel') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">

                            <label for="exampleFormControlInput1">ชื่อ</label>
                            {{ Form::text('name', null,['class'=>'form-control ','required']) }}
                            @if ($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif

                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastname">นามสกุล</label>
                            {{ Form::text('lastname', null, ['class'=>'form-control','required']) }}
                            @if ($errors->has('lastname'))
                            <div class="invalid-feedback">{{ $errors->first('lastname') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tel">หมายเลขโทรศัพท์</label>
                            {{ Form::text('tel', null, ['class'=>'form-control','required']) }}
                            @if ($errors->has('tel'))
                            <div class="invalid-feedback">{{ $errors->first('tel') }}</div>
                            @endif
                        </div>


                    </div>
                    <div class="form-row">


                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="id_card">เลขบัตรประชาชน</label>
                            {{ Form::text('id_card', null, ['class'=>'form-control','required']) }}
                            @if ($errors->has('id_card'))
                            <div class="invalid-feedback">{{ $errors->first('id_card') }}</div>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label for="schoolName">ชื่อโรงเรียน</label>
                            {{ Form::text('schoolName', null, ['class'=>'form-control','required']) }}
                            @if ($errors->has('schoolName'))
                            <div class="invalid-feedback">{{ $errors->first('schoolName') }}</div>
                            @endif
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
                    <div class="form-group">
                        <label class="">ภาพใบกระกอบวิชาชีพ : </label>
                        <input id="file_upload" style="display:none" name="picture" type="file" multiple="false">
                        @if ($errors->has('picture'))
                        <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
                        @endif

                        <div id="upload" class="btn btn-outline-success">
                            <i data-feather="upload-cloud" class="icon-md mr-2"></i>เลือกภาพ
                        </div>

                        <div id="thumbnail"></div>
                    </div>

                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="lastname">อีเมล์(ชื่อผู้ใช้งาน)</label>
                            {{ Form::email('email', null, ['class'=>'form-control','required']) }}
                            @if ($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">รหัสผ่าน</label>
                            {{ Form::text('password',null,['class'=>'form-control','required']) }}
                            @if ($errors->has('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>

                        <div class="check-box-wrap">
                            <div class="input-box">
                                <input type="checkbox" id="agree" class="" name="agree" value="agree">
                                <label for="fruit4" class="form-check-label">ยอมรับ <a href="#"
                                        target="blank">ข้อกำหนดและเงื่อนไขการใช้งาน</a>
                                </label>
                            </div>

                        </div>


                    <button type="submit" class="btn btn-primary">เพิ่มครู</button>
                    {{-- </form> --}}
                    <fieldset>
                        {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<!-- Plugin js import here -->
{!! Html::script('admin/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
{!! Html::script('admin/assets/plugins/select2/select2.min.js') !!}
{!! Html::script('admin/assets/js/select2.js') !!}
@endpush

@push('custom-scripts')
<!-- Custom js here -->
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
        id_card: {
            required: true
        },
        schoolName: {
            required: true
        },
        address: {
            required: true
        }
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
        tel: "กรุณากรอกเบอร์โทรศัพท์ของคุณ",
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
    //<form name="form1"  method="post" action="registerProcess.php" class="form-horizontal" >
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



    });
</script>
@endpush
