<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="width=device-width, initial-scale=1,  shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <title>{{config('ventagran.name', env('APP_NAME')) }} - @yield('title')</title>

    <link rel="stylesheet" href="{{ url('/bootstrap/dist/css/bootstrap.min.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ url('/fancybox/dist/jquery.fancybox.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ url('/static/css/modal.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ url('/static/css/connect.css?v='.time()) }}">

</head>
<body>

    @section('content')  
    @show

    <script src="{{ url('/fontawesome/js/all.js') }}"></script>
    <script src="{{ url('/static/jquery.js') }}"></script>
    <script src="{{ url('/static/js/pass.js') }}"></script>
    <script src="{{ url('/fancybox/dist/jquery.fancybox.js') }}"></script>
    {{-- <script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script> --}}
    <script src="{{ url('/static/sweetalert.min.js') }}"></script>
    <script src="{{ url('/static/js/java.js?v='.time()) }}"></script>
    <script> 
        $('.alert').slideDown();
        setTimeout(function(){ $('.alert').slideUp();}, 10000);
    </script>
    <script src="{{ url('/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</body>
</html>