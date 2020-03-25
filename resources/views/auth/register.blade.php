@extends('layouts.memberNav')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-lg-9">
            <form class="wpo-accountWrapper" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="wpo-accountForm form-style">
                    <div class="fromTitle">
                        <h2>สมัครสมาชิก</h2>
                        <p>หากคุณต้องการร่วมบริจาค</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <label for="name">Full Name</label>
                            <input id="name" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                value="{{ old('name') }}" required autofocus>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label for="name">Last Name</label>
                            <input id="lastname" type="text"
                                class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname"
                                value="{{ $lastname ?? old('lastname') }}" required autofocus>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label>Email</label>
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                value="{{ old('email') }}" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label>Tel</label>
                            <input id="tel" type="text"
                                class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel"
                                value="{{ $tel ?? old('tel') }}" required autofocus>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <label>Address</label>
                            <input id="address" type="text"
                                class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                                value="{{ $address ?? old('address') }}" required autofocus>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>
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
                        <input id="type" type="hidden"  name="type" value="1">
                        <input id="schoolname" type="hidden"  name="schoolname" value="0">
                        <input id="pic_id_card" type="hidden"  name="pic_id_card" value="0">
                        <input id="id_card" type="hidden"  name="id_card" value="1010101010101">
                        <div class="col-lg-12 col-md-12 col-12">
                            <button type="submit" class="wpo-accountBtn"> สมัครสมาชิก</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

@endsection
