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

                <h5>Reciept Check</h5>
                <table class="table">
                    <tr>
                        <th>ชื่อนักเรียน</th>
                        <th>จำนวนเงินบริจาค</th>
                        <th>ใบเสร็จ</th>
                        <th>ตัวเลือก</th>
                    </tr>
                    @foreach ($student as $s)
                    <tr>
                        <td>{{$s->name.' '.$s->lastname}}</td>
                        <td>{{$s->price}}</td>
                    <td><img class="" src="{{asset('storage/receipt/'.$s->picture)}}"width="50" alt=""></td>
                    <td>
                    <a href="{{route('teacher.checkedReciept',['id'=>$s->id,'check'=>'true'])}}">ยืนยัน</a>  |
                    <a href="{{route('teacher.checkedReciept',['id'=>$s->id,'check'=>'false'])}}">ไม่ถูกต้อง</a>
                    </td>
                    </tr>
                    @endforeach
                </table>
                {{-- content here --}}


            </div>



        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
