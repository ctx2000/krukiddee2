@extends('layouts.memberNav')

@section('content')
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
@endsection
