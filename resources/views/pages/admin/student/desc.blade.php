@extends('layouts.admin.master')

@push('title')
Krukidee | แก้ไขข้อมูลนักเรียน
@endpush

@push('plugin-styles')
<!-- Plugin css import here -->
@endpush

@section('content')
<script src="{{ asset('js/app.js') }}"></script>
<link href="{{asset('css/summernote-bs4.css')}}" rel="stylesheet">
<script src="{{asset('js/summernote-bs4.js')}}"></script>
<!-- Page content here -->
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/member/all')}}">ข้อมูลนักเรียน</a></li>
        <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลนักเรียน</li>
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

                    {{-- <input type="hidden" name="id" value="{{$id}}"> --}}
                    <div class="form-group ">


                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
$('.summernote').summernote({
    height: 190,
});

});
</script>
@endsection

@push('plugin-scripts')
<!-- Plugin js import here -->
{!! Html::script('admin/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
@endpush

@push('custom-scripts')
<!-- Custom js here -->

@endpush
