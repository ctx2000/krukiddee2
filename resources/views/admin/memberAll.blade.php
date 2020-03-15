@extends('layouts/adminNav')
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
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Member ทั้งหมด</h3>
                            <input id="myInput" type="text" placeholder="Search..">

                        </div>
                        <div class="card-body">

                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>ชื่อ</th>
                                        <th>email</th>
                                        <th>เครื่องมือ</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($user as $s)
                                    <tr>
                                    <td>{{$s->id}}</td>
                                    <td>{{$s->name}}</td>
                                    <td>{{$s->email}}</td>
                                    <td>
                                        แก้ไข | ลบ
                                    </td>

                                    </tr>


                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        {{$user->links()}}
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
