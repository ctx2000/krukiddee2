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
                {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div> --}}
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
                @foreach ($stu as $s)


                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card h-100">
                        <a href="#"><img src="{{asset('storage/images/'.$s->picture)}}" width="324" height="150"
                                class="card-img-top"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{$s->name.' '.$s->lastname}}</a>
                            </h4>
                            <br>
                            <h5>{{$s->bankAccountName}}</h5>
                            <p class="card-text">{{$s->bankName}}</p>
                        </div>
                        <div class="card-footer">




                            <div class="btn-toolbar justify-content-between" role="toolbar"
                                aria-label="Toolbar with button groups">
                                @if ($s->closeDonate < now())
                                <div class="btn-group mr-1" role="group" aria-label="First group">

                                    <a href=" {{route('nontification.create',['id'=>$s->id])}} "
                                        class="btn btn-outline-danger">เพิ่มคำขอบคุณ</a>

                            </div>

                            @endif

                            <div class="input-group">
                                <div class="btn-group" role="group" aria-label="3 group">
                                    <a class="btn btn-outline-info" href="{{route('student.edit',['id'=>$s->id])}}">

                                        <li style="color: #0f5e52;" class="fa fa-pencil "></li>

                                    </a>

                                </div>
                                <div class="btn-group" role="group" aria-label="First group">
                                    <form action="{{route('student.destroy',['id'=>$s->id])}}" method="POST"
                                        class="d-inline" onsubmit="return confirm('ต้องการลบข้อมูล?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-outline-secondary ">

                                            <li style=" color: #545c5b;" class="fa fa-trash "></li>

                                        </button>

                                    </form>


                                </div>
                            </div>

                        </div>
                        {{-- <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-1" role="group" aria-label="First group">

                                        <button type="button" class="btn btn-secondary">Left</button>



                                </div>
                                <div class="btn-group mr-4" role="group" aria-label="First group">

                                        <button type="button" class="btn btn-secondary">Left</button>

                                </div>
                            </div> --}}
                    </div>
                </div>
            </div>

            @endforeach


        </div>
        {{-- <div class="row">



                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>นักเรียนทั้งหมด </h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ชื่อ-นามสกุล</th>
                                        <th scope="col">ที่อยู่</th>
                                        <th scope="col">เบอร์โทร</th>
                                        <th scope="col">ชื่อบัญชี</th>
                                        <th scope="col">ธนาคาร</th>
                                        <th scope="col">หมายเลขบัญชี</th>

                                        <th scope="col">รูป</th>

                                        <th scope="col">ตัวเลือก</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stu as $s)
                                    <tr>
                                        <td> {{$s->name.'  '.$s->lastname}}</td>
        <td> {{$s->address}}</td>
        <td> {{$s->tel}}</td>
        <td> {{$s->bankAccountName}}</td>
        <td> {{$s->bankName}}</td>
        <td> {{$s->bankNumber}}</td>

        <td>
            <img src="{{asset('storage/images/'.$s->picture)}}" width="50">
        </td>



        <td>
            <a href=" {{route('nontification.create',['id'=>$s->id])}} "
                class="btn btn-outline-success btn-sm">เพิ่มคำขอบคุณ</a> |
            <a href="{{route('student.edit',['id'=>$s->id])}}" class="btn btn-info btn-sm">
                <li class="fa fa-pencil text-white"></li>
            </a> |
            <form action="{{route('student.destroy',['id'=>$s->id])}}" method="POST" class="d-inline"
                onsubmit="return confirm('ต้องการลบข้อมูล?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <li class="fa fa-trash text-white"></li>
                </button>
            </form>
        </td>
        </tr>

        @endforeach
        </tbody>
        </table>
</div> --}}
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
