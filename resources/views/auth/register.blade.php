@extends('layouts.memberNav')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
        </div>
        <div class="col-lg-9">
            <form class="wpo-accountWrapper" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="wpo-accountForm form-style">
                    <div class="fromTitle">
                        <h2>สมัครสมาชิก</h2>
                        <p>หากคุณต้องการร่วมบริจาค</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">
                                Full Name
                            </label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                required autofocus>
                                @if ($errors->has('name'))

                            <h5 class="error text-danger">{{ $errors->first('name') }}</h5>

                            @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 {{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="name">Last Name</label>
                            <input id="lastname" type="text" class="form-control" name="lastname"
                                value="{{ $lastname ?? old('lastname') }}" required autofocus>
                                @if ($errors->has('lastname'))

                            <h5 class="error text-danger">{{ $errors->first('lastname') }}</h5>

                            @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                required>
                            @if ($errors->has('email'))

                            <h5 class="error text-danger">{{ $errors->first('email') }}</h5>

                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-12 {{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label>Tel</label>
                            <input id="tel" type="text" class="form-control" name="tel" value="{{ $tel ?? old('tel') }}"
                                required autofocus>
                                @if ($errors->has('tel'))

                            <h5 class="error text-danger">{{ $errors->first('tel') }}</h5>

                            @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 {{ $errors->has('Address') ? ' has-error' : '' }}">
                            <label>Address</label>
                            <input id="Address" type="text" class="form-control" name="Address"
                                value="{{ $Address ?? old('Address') }}" required autofocus>
                                @if ($errors->has('Address'))

                            <h5 class="error text-danger">{{ $errors->first('Address') }}</h5>

                            @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))

                            <h5 class="error text-danger">{{ $errors->first('password') }}</h5>

                            @endif
                            </div>
                            <span class="input-group-btn">
                                <button class="btn btn-default reveal3" type="button"><i
                                        class="glyphicon glyphicon-eye-open"></i></button>
                            </span>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                            <span class="input-group-btn">
                                <button class="btn btn-default reveal2" type="button"><i
                                        class="glyphicon glyphicon-eye-open"></i></button>
                            </span>
                        </div>
                        <input id="type" type="hidden" name="type" value="1">
                        <input id="schoolname" type="hidden" name="schoolname" value="0">
                        <input id="pic_id_card" type="hidden" name="pic_id_card" value="0">
                        <input id="id_card" type="hidden" name="id_card" value="1010101010101">
                        <div class="col-lg-12 col-md-12 col-12">
                            <button type="submit" class="wpo-accountBtn"> สมัครสมาชิก</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
@if ($errors->any())


<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
<script src="{{asset('js/sweetalert2.min.js')}}"></script>
<script>
    Swal.fire({
  icon: 'error',
  title: 'ไม่สามารถสมัครสมาชิกได้',
  text: 'กรุณาตรวจสอบข้อมูลการสมัคร',
  footer: 'มีชื่อผู้ใช้แล้ว? <a href="{{ route('login') }}"> เข้าสู่ระบบ</a>',
  showConfirmButton: false,
  showCloseButton: true,
})

</script>
@endif
<script>
    $(document).ready(function(){

  $('#tel').mask('000-000-0000');
});
</script>
@endsection
