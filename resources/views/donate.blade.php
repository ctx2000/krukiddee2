@extends('layouts.memberNav')

@section('content')
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
                            <h3>บริจาคให้ : {{$stu->name}} </h3>
                        </div>
                        <div class="card-body">
                            {{-- คอนเท้น --}}

                            <form action=" {{route('donation.store')}} " method="POST" enctype="multipart/form-data">

                                @csrf

                                <label for="description">จำนวนเงินบริจาค</label>
                                {{ Form::number('price', null, ['class'=>'form-control','min'=>0]) }}
                                <label for="description">รายละเอียดของนักเรียน</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>

                                <input type="file" class="form-control" id="picture" name="picture">

                                <input type="hidden" name="student_id" value="{{$stu->id}}">

                                <button type="submit" class="btn btn-primary mt-3">บันทึก</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection
