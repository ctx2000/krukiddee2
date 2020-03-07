@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                    <table class="table">
                        <tr>
                            <th>ชื่อ</th>
                            <th>ตัวเลือก</th>
                        </tr>


                        @foreach ($student as $s)
                        <tr>


                            <td>{{$s->name}}</td>
                            <td>
                                @if ($s->level == '1')
                                <a href="" class="btn btn-outline-primary">donate</a>
                                @elseif ($s->level == '2')
                                <a href="" class="btn btn-outline-success">donate</a>
                                @elseif ($s->level == '3')
                                <a href="" class="btn btn-outline-warning">donate</a>
                                @else
                                <a href="" class="btn btn-outline-danger">donate</a>

                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
