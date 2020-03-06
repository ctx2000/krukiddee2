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



                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>นักเรียนทั้งหมด </h3>
                        </div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ชื่อ-นามสกุล</th>
                                        <th scope="col">ที่อยู่</th>
                                        <th scope="col">เบอร์โทร</th>
                                        <th scope="col">ชื่อบัญชี</th>
                                        <th scope="col">ธนาคาร</th>
                                        <th scope="col">หมายเลขบัญชี</th>
                                        <th scope="col">รายละเอียด</th>
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
                                        <td> {{$s->description}}</td>
                                        <td>
                                            <img src="{{asset('storage/images/'.$s->picture)}}" width="50">
                                        </td>
                                        <td>
                                            <a href="">Edit</a> |
                                            <form action="{{route('student.destroy',['id'=>$s->id])}}" method="POST"
                                                class="d-inline" onsubmit="return confirm('ต้องการลบข้อมูล?')">
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
                        </div>
                    </div>
                </div>
            </div>

            {{-- content here --}}


        </div>



</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
