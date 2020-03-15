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
                            <h3>หัวข้อ </h3>
                        </div>
                        <div class="card-body">
                            {{-- คอนเท้น --}}
                            @foreach ($stu as $s)
                            {{$s->name.''.$s->lastname}}
                            <table class="table">
                                <tr>
                                    <th>ราคา</th>
                                </tr>
                                @foreach ($donation as $d)
                                @if ($s->id == $d->student_id )


                                <tr>
                                    <td>{{$d->price}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection
