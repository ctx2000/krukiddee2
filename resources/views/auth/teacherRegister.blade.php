@extends('layouts.memberNav')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-lg-9">

            <form novalidate class="wpo-accountWrapper" method="POST" action="{{ route('register') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="wpo-accountForm form-style">
                    <div class="fromTitle">
                        <h2>สมัครสมาชิก</h2>
                        <p>หากคุณเป็นครูและต้องการร่วมกับเรา</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <label for="name">Full Name</label>
                            <input id="name" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label for="name">Last Name</label>
                            <input id="lastname" type="text"
                                class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname"
                                value="{{ $lastname ?? old('lastname') }}" required autofocus>
                                @if ($errors->has('lastname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label>Email</label>
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label>Tel</label>
                            <input id="tel" type="text"
                                class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel"
                                value="{{ $tel ?? old('tel') }}" required autofocus>
                                @if ($errors->has('tel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label>School Name</label>
                            <input id="schoolname" type="text"
                                class="form-control{{ $errors->has('schoolname') ? ' is-invalid' : '' }}"
                                name="schoolname" value="{{ $schoolname ?? old('schoolname') }}" required autofocus>
                                @if ($errors->has('schoolname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('schoolname') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label for="name">School Address</label>
                            <input id="Address" type="text"
                                class="form-control{{ $errors->has('Address') ? ' is-invalid' : '' }}" name="Address"
                                value="{{ $Address ?? old('Address') }}" required autofocus>
                                @if ($errors->has('Address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Address') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label for="name">ID card number</label>
                            <input id="id_card" type="text"
                                class="form-control{{ $errors->has('id_card') ? ' is-invalid' : '' }}" name="id_card"
                                value="{{ $id_card ?? old('id_card') }}" required autofocus>
                                @if ($errors->has('id_card'))
                                <span class="invalid-feedback" role="alert">
                                    <h5 style="color=red;">{{ $errors->first('id_card') }}</h5>
                                </span>
                                @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label for="name">ID card picture</label>
                            <div class="custom-file">
                                <input type="file" class="" id="picture" name="pic_id_card">
                                @if ($errors->has('pic_id_card'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pic_id_card') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>
                                    @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
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
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="check-box-wrap">
                                <div class="input-box">
                                    <input type="checkbox" id="fruit4" name="fruit-4" value="Strawberry">
                                    <label for="fruit4">ยอมรับ <a href="#">ข้อกำหนดและเงื่อนไขการใช้งาน</a> </label>
                                </div>

                            </div>
                        </div>
                        <input id="type" type="hidden" name="type" value="2">
                        <div class="col-lg-12 col-md-12 col-12">
                            <button type="submit" class="wpo-accountBtn">สมัครสมาชิกครู</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    $(document).ready(function(){

//   $('#tel').mask('000-000-0000');
//   $('#id_card').mask('0 0000 00000 00 0');
});
</script>
@endsection
