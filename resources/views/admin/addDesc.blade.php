@extends('layouts/adminNav')
@section('content')
<link href="{{asset('css/summernote-bs4.css')}}" rel="stylesheet">
<script src="{{asset('js/summernote-bs4.js')}}"></script>
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


                                    <div class="form-group">
                                        <h3><label for="description1">อธิบายเกี่ยวกับตัวนักเรียน</label></h3>
                                        <textarea name="description1"
                                            class="summernote form-control">เช่น ความเป็นอยู่,ภาระ,สถานะครอบครัว เป็นต้น</textarea>
                                    </div>
                                    <div class="form-group">
                                        <h3><label for="description2">ระบุความต้องการของนักเรียน</label></h3>
                                        <textarea name="description2"
                                            class="summernote form-control"> เช่น ต้องการซ่อมที่พัก,ต้องการอาหารแห้ง หรือทุนการศึกษา เป็นต้น</textarea>
                                    </div>

                                <input type="hidden" name="id" value="{{$id}}">
                                <div class="form-group ">


                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function() {
$('.summernote').summernote({
    height: 190,
});

});
</script>
<!-- /.content-wrapper -->
@endsection
