@extends('layouts.admin.master-auth')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">
            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">Kru<span>Kiddee</span></a>
              <h5 class="text-muted font-weight-normal mb-4">ยินดีต้อนรับ! เข้าสู่ระบบด้วยอีเมลของคุณ.</h5>
            <form class="forms-sample" action="{{route('admin.login')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">อีเมล</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">รหัสผ่าน</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary btn-block mb-2 mb-md-0">เข้าสู่ระบบ</button>
                </div>
                <a href="{{ url('/auth/register') }}" class="d-block mt-3 text-muted">เข้าสู่ระบบไม่ได้ ? <span class="text-primary">ลืมรหัสผ่าน</span></a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
