@extends('layouts.memberNav')

@section('content')
<div class="">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                {{-- <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div> --}}
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3>หัวข้อ </h3>
                        </div>
                        <div class="card-body">
                            {{-- คอนเท้น --}}
                            <table class="table">
                                <tr>
                                    <th>ชื่อ</th>

                                    <th>ที่อยู่</th>
                                    <th>ตัวเลือก</th>
                                </tr>


                                @foreach ($student as $s)
                                @if ($s->closeDonate > now())
                                <tr>


                                    <td>{{$s->name}}</td>
                                    <td>{{$s->address}}</td>
                                    <td>
                                        <?php
                                            $id =[
                                                'id' =>$s->id,
                                            ];
                                            $id= Crypt::encrypt($id);
                                        ?>

                                        @if ($s->level == '1')
                                        <a href="{{route('donation.edit',['id'=>$id])}}"
                                            class="btn btn-outline-primary">donate</a>
                                        @elseif ($s->level == '2')
                                        <a href="{{route('donation.edit',['id'=>$id])}}"
                                            class="btn btn-outline-success">donate</a>
                                        @elseif ($s->level == '3')
                                        <a href="{{route('donation.edit',['id'=>$id])}}"
                                            class="btn btn-outline-warning">donate</a>
                                        @else
                                        <a href="{{route('donation.edit',['id'=>$id])}}"
                                            class="btn btn-outline-danger">donate</a>
                                        @endif

                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>


@endsection
