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
                {!! Form::model($user, ['novalidate','route' => ['admin.memberUpdate'], 'method'
                =>
                'post', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation'])
                !!}
                <fieldset>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">ชื่อ</label>
                                {{ Form::text('name', null,['class'=>'form-control ','required']) }}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">นามสกุล</label>
                                {{ Form::text('lastname', null,['class'=>'form-control ','required']) }}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">อีเมล</label>
                                {{ Form::email('email', null,['class'=>'form-control ','required']) }}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">รหัสผ่าน</label>
                                {{ Form::text('password',null,['class'=>'form-control']) }}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">เบอร์โทรศัพท์</label>
                                {{ Form::number('tel', null,['class'=>'form-control ','required']) }}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">ที่อยู่</label>
                                {{ Form::text('Address', null,['class'=>'form-control ','required']) }}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <input type="hidden" value="{{$user->id}}" name="id">
                    <button type="submit" value="submit" class="btn btn-primary submit">แก้ไขข้อมูลสมาชิก</button>
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
        surname: {
          required: true
        },
        email: {
          required: true
        },
        password: {
          required: true,
          minlength: 6
        },
        phone: {
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
