<!DOCTYPE html>
<html>
<head>
  <title>@stack('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  {!! Html::style('admin/assets/fonts/feather-font/css/iconfont.css') !!}
  {!! Html::style('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
  {!! Html::style('admin/assets/plugins/sweetalert2/sweetalert2.min.css') !!}
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  {!! Html::style('admin/css/app.css') !!}
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  {!! Html::script('admin/assets/js/spinner.js') !!}

  <div class="main-wrapper sidebar-dark" id="app">
    @include('layouts.teacher.sidebar')
    <div class="page-wrapper">
      @include('layouts.teacher.header')
      <div class="page-content">
        @yield('content')
      </div>
      @include('layouts.teacher.footer')
    </div>
  </div>

    <!-- base js -->
    {{-- {!! Html::script('admin/js/app.js') !!} --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    {!! Html::script('admin/assets/plugins/feather-icons/feather.min.js') !!}
    {!! Html::script('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}
    {!! Html::script('/admin/assets/plugins/sweetalert2/sweetalert2.min.js') !!}
    {!! Html::script('/admin/assets/plugins/promise-polyfill/polyfill.min.js') !!}
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    {!! Html::script('admin/assets/js/template.js') !!}
    <!-- end common js -->

    @stack('custom-scripts')
    @include('sweetalert::alert')
</body>
</html>
