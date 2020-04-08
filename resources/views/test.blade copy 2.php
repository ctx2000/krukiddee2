@extends('layouts/teacherNav')
@section('content')


<link href="{{asset('css/summernote-bs4.css')}}" rel="stylesheet">
<script src="{{asset('js/summernote-bs4.min.js')}}"></script>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <textarea name="messageInput" class="summernote"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>


            </div>
        </div>
</div>
</section>
<script>
    $(document).ready(function() {
$('.summernote').summernote();
});
</script>
@endsection
