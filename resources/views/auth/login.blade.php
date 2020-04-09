<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>{{env('app.name')}}</title>

    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{asset('css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{asset('css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{asset('css/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{asset('css/nice-select.css') }}" rel="stylesheet">
    <link href="{{asset('css/signup.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <!-- start preloader -->
    <div class="preloader">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
    <!-- end preloader -->
    <div class="wpo-login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form novalidate
                        class="wpo-accountWrapper"
                        method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="wpo-accountInfo">
                            <div class="wpo-accountInfoHeader">
                                <a href="{{route('donation.index')}}"><img src="{{asset('storage/cover/2.png')}}"  alt=""></a>
                                    <a class="wpo-accountBtn" href="{{route('register')}}">
                                        <span class="">สมัครสมาชิก</span>
                                    </a>
                            </div>
                            <div class="image">
                                <img src="assets/images/login.svg" alt="">
                            </div>
                            <div class="back-home">
                                <a class="wpo-accountBtn" href="{{route('donation.index')}}">
                                    <span class="">กลับหน้าหลัก</span>
                                </a>
                            </div>
                        </div>

                        <div class="wpo-accountForm form-style">
                            <div class="fromTitle">
                                <h2>เข้าสู่ระบบ</h2>
                                <p>เข้าสู่ระบบด้วยบัญชีของท่าน</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" id="inputError" name="email" class="form-control "
                                            placeholder="ที่อยู่อีเมล์" required>

                                        {{-- @if ($errors->has('email'))
                                    <h5 class="error text-danger">
                                        {{ $errors->first('email') }}
                                        </h5>
                                        @endif --}}
                                    </div>
                                    {{-- <span class="input-group-btn">
                                    <button class="btn btn-default reveal6" type="button"><i
                                            class="	fa fa-remove" style="font-size:25px;color:#d9534f"></i></button>
                                </span>
                                <h5 class="error text-danger">
                                    resr
                                </h5> --}}



                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="pwd6" type="password" placeholder="รหัสผ่าน" value="" name="password">
                                    </div>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default reveal6" type="button"><i
                                                class="glyphicon glyphicon-eye-open"></i></button>
                                    </span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="check-box-wrap">
                                        {{-- <div class="input-box">
                                            <input type="checkbox" id="fruit4" name="fruit-4" value="Strawberry">
                                            <label for="fruit4">Remember Me</label>
                                        </div> --}}
                                        <div class="forget-btn">
                                            <a href="forgot.html">ลืมรหัสผ่าน?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <button type="submit" class="wpo-accountBtn">เข้าสู่ระบบ</button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @if ($errors->any() || session('feedback') != null)


    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script>
        Swal.fire({
  icon: 'error',
  title: 'ไม่สามารถเข้าสู่ระบบได้',
  text: 'อีเมลล์หรือรหัสผ่านไม่ถูกต้อง',
  footer: 'ยังไม่เป็นสมาชิก? <a href="{{ route('register') }}">สมัครสมาชิก</a>',
  showConfirmButton: false,
  showCloseButton: true,
})

    </script>
    @endif
</body>

</html>
