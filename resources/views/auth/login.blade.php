@extends('layouts.memberNav')

@section('content')
<div class="preloader">
    <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
    </div>
</div>
<!-- end preloader -->

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-lg-9">
                <form novalidate class="wpo-accountWrapper {{ ($errors->any()) ? 'was-validated' : 'needs-validation' }}" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="wpo-accountForm form-style">
                        <div class="fromTitle">
                            <h2>เข้าสู่ระบบ</h2>
                            <p>เข้าสู่ระบบด้วยบัญชีของท่าน</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <label>Email</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="ที่อยู่อีเมล์" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label >Password</label>
                                    <input class="pwd6" type="password" placeholder="รหัสผ่าน"  value="" name="password">
                                </div>
                                <span class="input-group-btn">
                                    <button class="btn btn-default reveal6" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                </span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="check-box-wrap">
                                    <div class="input-box">
                                        <input type="checkbox" id="fruit4" name="fruit-4" value="Strawberry">
                                        <label for="fruit4">Remember Me</label>
                                    </div>
                                    <div class="forget-btn">
                                        <a href="forgot.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="submit" class="wpo-accountBtn">Login</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
