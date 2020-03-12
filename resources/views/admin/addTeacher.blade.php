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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>เพิ่มข้อมูลครู </h3>
                        </div>

                        <div class="card-body">
                            <form action=" {{route('admin.storeTeacher')}} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">ชื่อ</label>
                                        {{ Form::text('name', null, ['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname">นามสกุล</label>
                                        {{ Form::text('lastname', null, ['class'=>'form-control']) }}
                                    </div>


                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="lastname">อีเมล์</label>
                                        {{ Form::email('email', null, ['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tel">หมายเลขโทรศัพท์</label>
                                        {{ Form::text('tel', null, ['class'=>'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="id_card">เลขบัตรประชาชน</label>
                                        {{ Form::text('id_card', null, ['class'=>'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="address">ชื่อโรงเรียน</label>
                                        {{ Form::text('address', null, ['class'=>'form-control']) }}
                                    </div>


                                </div>
                                <div class="form-group ">
                                    <label for="address">ที่อยู่โรงเรียน</label>
                                    {{ Form::text('address', null, ['class'=>'form-control']) }}
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="picture" name="picture">
                                        <label class="custom-file-label"
                                            for="validatedCustomFile">เลือกภาพใบกระกอบวิชาชีพ</label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="address">รหัสผ่าน</label>
                                    {{ Form::password('password',['class'=>'form-control']) }}
                                </div>
                                <div class="form-group ">
                                    <label for="password">ยืนยันรหัสผ่าน</label>
                                    {{ Form::password('password',['class'=>'form-control']) }}
                                </div>

                                <button type="submit" class="btn btn-primary">เพิ่มครู</button>
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
