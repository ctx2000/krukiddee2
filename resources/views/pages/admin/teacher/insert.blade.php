@extends('layouts.admin.master')

@push('title')
Krukidee | แก้ไขข้อมูลสมาชิก
@endpush

@push('plugin-styles')
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
                => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
                <fieldset>
                {{-- <form action=" {{route('admin.storeTeacher')}} " method="POST"
                enctype="multipart/form-data"> --}}
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">

                        <label for="exampleFormControlInput1">ชื่อ</label>
                        {{ Form::text('name', null,['class'=>'form-control ','required']) }}
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
                    <div class="form-group col-md-6">
                        <label for="lastname">อีเมล์</label>
                        {{ Form::email('email', null, ['class'=>'form-control','required']) }}
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tel">หมายเลขโทรศัพท์</label>
                        {{ Form::text('tel', null, ['class'=>'form-control','required']) }}
                        @if ($errors->has('tel'))
                        <div class="invalid-feedback">{{ $errors->first('tel') }}</div>
                        @endif
                    </div>
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
                <div class="form-group ">
                    <label for="address">ที่อยู่โรงเรียน</label>
                    {{ Form::text('address', null, ['class'=>'form-control','required']) }}
                    @if ($errors->has('address'))
                    <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="picture" name="picture" required>
                        @if ($errors->has('picture'))
                        <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
                        @endif
                        <label class="custom-file-label"
                            for="validatedCustomFile">เลือกภาพใบกระกอบวิชาชีพ</label>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="password">รหัสผ่าน</label>
                    {{ Form::text('password',null,['class'=>'form-control','required']) }}
                    @if ($errors->has('password'))
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="check-box-wrap">
                    <div class="input-box">
                        <input type="checkbox" id="agree" name="agree" value="agree">
                        <label for="fruit4">ยอมรับ <a href="#" target="blank">ข้อกำหนดและเงื่อนไขการใช้งาน</a> </label>
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
@endpush

@push('custom-scripts')
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
@endpush
