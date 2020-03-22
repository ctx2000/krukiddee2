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

                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">แก้ไขข้อมูลสมาชิก : {{$user->name}}</h3>
                        </div>

                        <div class="card-body">
                            {!! Form::model($user, ['novalidate','route' => ['admin.memberUpdate'], 'method'
                            =>
                            'post', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation'])
                            !!}
                            <div class="form-group">
                                <label for="name">ชื่อ</label>
                                {{ Form::text('name', null,['class'=>'form-control ','required']) }}
                                @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lastname">นามสกุล</label>
                                {{ Form::text('lastname', null,['class'=>'form-control ','required']) }}
                                @if ($errors->has('lastname'))
                                <div class="invalid-feedback">{{ $errors->first('lastname') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">อีเมล์</label>
                                {{ Form::email('email', null,['class'=>'form-control ','required']) }}
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tel">หมายเลขโทรศัพท์</label>
                                {{ Form::number('tel', null,['class'=>'form-control ','required']) }}
                                @if ($errors->has('tel'))
                                <div class="invalid-feedback">{{ $errors->first('tel') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="Address">ที่อยู่</label>
                                {{ Form::text('Address', null,['class'=>'form-control ','required']) }}
                                @if ($errors->has('Address'))
                                <div class="invalid-feedback">{{ $errors->first('Address') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">รหัสผ่าน</label>
                                {{ Form::text('password',null,['class'=>'form-control']) }}
                                @if ($errors->has('password'))
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        <input type="hidden" value="{{$user->id}}" name="id">
                            <button type="submit" class="btn btn-primary">แก้ไขข้อมูลสมาชิก</button>
                            {!! Form::close() !!}
                        </div>
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
