<!DOCTYPE html>
<html>
<head>
  <title>Krukidee | Administrator Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  {!! Html::style('admin/assets/fonts/feather-font/css/iconfont.css') !!}
  {!! Html::style('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  {!! Html::style('admin/css/app.css') !!}
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  {!! Html::script('admin/assets/js/spinner.js') !!}

  <div class="main-wrapper" id="app">
    <div class="page-wrapper full-page">
      @yield('content')
    </div>
  </div>

    <!-- base js -->
    {!! Html::script('admin/js/app.js') !!}
    {!! Html::script('admin/assets/plugins/feather-icons/feather.min.js') !!}
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    {!! Html::script('admin/assets/js/template.js') !!}
    <!-- end common js -->

    @stack('custom-scripts')
</body>
</html>
