@extends('layouts/teacherNav')
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
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3>เพิ่มข้อมูลนักเรียน </h3>
                        </div>

                        <div class="card-body">
                            <form action=" {{route('student.store')}} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">ชื่อ</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        aria-describedby="nameHelp">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">นามสกุล</label>
                                    <input name="lastname" type="text" class="form-control" id="price"
                                        aria-describedby="priceHelp">
                                </div>
                                <div class="form-group">
                                    <label for="address">ที่อยู่</label>
                                    {{ Form::text('address', null, ['class'=>'form-control']) }}
                                </div>
                                <div class="form-group">
                                    <label for="tel">หมายเลขโทรศัพท์นักเรียน(ถ้ามี)</label>
                                    {{ Form::text('tel', null, ['class'=>'form-control']) }}
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="bankName">เลือกธนาคาร</label>
                                        {{ Form::select('bankName', ['ธนาคารกรุงไทย' => 'ธนาคารกรุงไทย', 'S' => 'ธนาคารกรุงเทพ'], null, ['class'=>'form-control','placeholder' => 'เลือกธนาคาร...']) }}
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bankAccountName">ชื่อบัญชีธนาคาร</label>
                                        {{ Form::text('bankAccountName', null, ['class'=>'form-control']) }}
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="bankNumber">เลขที่บัญชี</label>
                                        {{ Form::text('bankNumber', null, ['class'=>'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">รายละเอียดของนักเรียน</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="picture" name="picture">
                                        <label class="custom-file-label" for="validatedCustomFile">เลือกภาพนักเรียน</label>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
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
