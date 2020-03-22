@extends('layouts.memberNav')

@section('content')
<div class="">
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
                            {{-- {!! Form::model($student, ['novalidate','route' => ['student.update',$student->id], 'method'
                            => 'put', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' :
                            'needs-validation']) !!} --}}
                            <form novalidate class="{{ ($errors->any()) ? 'was-validated' : 'needs-validation' }}"
                                action=" {{route('donation.store')}} " method="POST" enctype="multipart/form-data">

                                @csrf
                                <div class="form-group">
                                    <label for="description">จำนวนเงินบริจาค</label>
                                    {{-- {{ Form::text('price', null, ['class'=>'form-control']) }} --}}
                                    <input type="text" id="price" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"  required autofocus>
                                    @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <label for="description">เพิ่มความคืดเห็น</label>
                                <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"  name="description" id="exampleFormControlTextarea1"
                                    rows="3"required autofocus ></textarea>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif

                                <input type="file" class="form-control" id="picture" name="picture" required autofocus>

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
