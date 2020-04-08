@extends('layouts/teacherNav')
@section('content')
{{-- การใส่css หน้าcause ไม่ยาก แค่บอกให้คนกรอก กรอกตามที่css จะแสดงผลได้ในหน้าcause จบ normal คือแท็ก <p> h1-6 เลิอกเลย --}}

<link href="{{asset('css/summernote-bs4.css')}}" rel="stylesheet">
<script src="{{asset('js/summernote-bs4.js')}}"></script>
<div class="content-wrapper">
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">เพิ่มรายละเอียดนักเรียน</h3>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <form action="{{route('teacher.addDesc')}}" method="POST">
                                @csrf
                                <div class="form-group ">
                                    <label for="Address">ที่อยู่โรงเรียน</label>
                                    {{ Form::text('Address', null, ['class'=>'form-control','required']) }}
                                    @if ($errors->has('Address'))
                                    <div class="invalid-feedback">{{ $errors->first('Address') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="Address">อธิบายเกี่ยวกับตัวนักเรียน</label>
                                    <textarea name="desc"
                                        class="summernote form-control">ความเป็นอยู่,ภาระ,สถานะครอบครัว เป็นต้น</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="Address">ที่อยู่โรงเรียน</label>
                                    <textarea name="desc2"
                                        class="summernote form-control">ระบุความต้องการของนักเรียน เช่น ต้องการซ่อมที่พัก,ต้องการอาหารแห้ง หรือทุนการศึกษา เป็นต้น</textarea>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">ต่อไป</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</section>
<script>
    $(document).ready(function() {
$('.summernote').summernote({
    height: 190,
});

});
</script>
@endsection
