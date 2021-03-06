@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">สมัครสมาชิก(ครู)</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ชื่อ</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">นามสกุล</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text"
                                    class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                    name="lastname" value="{{ $lastname ?? old('lastname') }}" required autofocus>
                                @if ($errors->has('lastname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">อีเมล์</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">หมายเลขโทรศัพท์</label>
                            <div class="col-md-6">
                                <input id="tel" type="text"
                                    class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel"
                                    value="{{ $tel ?? old('tel') }}" required autofocus>
                                @if ($errors->has('tel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="schoolname" class="col-md-4 col-form-label text-md-right">ชื่อโรงเรียน</label>
                            <div class="col-md-6">
                                <input id="schoolname" type="text"
                                    class="form-control{{ $errors->has('schoolname') ? ' is-invalid' : '' }}"
                                    name="schoolname" value="{{ $schoolname ?? old('schoolname') }}" required autofocus>
                                @if ($errors->has('schoolname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('schoolname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">ที่อยู่โรงเรียน</label>
                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                    name="address" value="{{ $address ?? old('address') }}" required autofocus>
                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_card"
                                class="col-md-4 col-form-label text-md-right">เลขบัตรประจำตัวประชาชน</label>
                            <div class="col-md-6">
                                <input id="id_card" type="text"
                                    class="form-control{{ $errors->has('id_card') ? ' is-invalid' : '' }}"
                                    name="id_card" value="{{ $id_card ?? old('id_card') }}" required autofocus>
                                @if ($errors->has('id_card'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_card') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"
                                for="pic_id_card">เลือกภาพใบกระกอบวิชาชีพ</label>
                            <div class="col-md-6">
                                <div class="custom-file">

                                    <input type="file" class="" id="picture" name="pic_id_card">
                                    @if ($errors->has('pic_id_card'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pic_id_card') }}</strong>
                                </span>
                                @endif
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่าน</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่าน</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input " id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">กรุณายอมรับ<a href="#">ข้อกำหนดและการใช้งาน</a> </label>
                                </div>
                            </div>
                        </div>
                        <input id="type" type="hidden" name="type" value="3">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    สมัครสมาชิกครู
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
