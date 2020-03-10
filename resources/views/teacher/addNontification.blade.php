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
                            <h3>แก้ไขข้อมูลนักเรียน -> {{$student->name.' '.$student->lastname}} </h3>
                        </div>

                        <div class="card-body">
                        <form action="{{route('nontification.store')}}" method="POST">
                            @csrf
                            {{-- {!! Form::model($student, ['novalidate','route' => ['nontification.store',$student->id], 'method'
                            => 'put', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' :
                            'needs-validation']) !!} --}}
                            {{-- <form action=" {{route('student.update')}} " method="POST" enctype="multipart/form-data"> --}}

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">ชื่อ</label>
                                        {{-- {{ Form::text('name', null, ['class'=>'form-control','readonly']) }} --}}
                                        <input name="name" type="text" class="form-control" id="name"
                                            aria-describedby="nameHelp" placeholder="{{$student->name}}"readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname">นามสกุล</label>
                                        {{-- {{ Form::text('lastname', null, ['class'=>'form-control','readonly']) }} --}}
                                        <input name="lastname" type="text" class="form-control" id="price"
                                            aria-describedby="priceHelp" placeholder="{{$student->lastname}}"readonly>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="title">หัวข้อ</label>
                                    {{ Form::text('title', null, ['class'=>'form-control']) }}
                                    {{-- <input name="lastname" type="text" class="form-control" id="price"
                                        aria-describedby="priceHelp"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="data">ข้อความ</label>
                                    {{ Form::textarea('data', null, ['id'=>'exampleFormControlTextarea1','rows'=>'4','class'=>'form-control']) }}
                                    {{-- <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                        rows="3"></textarea> --}}
                                </div>
                            <input type="hidden" name="id" value="{{$student->id}}">

                                <button type="submit" class="btn btn-primary">เพิ่มคำขอบคุณ</button>
                            </form>
                                {{-- {!! Form::close() !!} --}}
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
