<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="width=device-width, initial-scale=1,  shrink-to-fit=no">
    <link rel = "icon" type = "image/x-ico" href = "{{ url('/static/images/ventagran2.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <title>{{env('APP_NAME')}} - @yield('title')</title>
    
    <link rel="stylesheet" href="{{ url('/bootstrap/dist/css/bootstrap.min.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ url('/fancybox/dist/jquery.fancybox.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ url('/static/css/admin.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ url('/static/css/modal.css?v='.time()) }}">
</head>
<body>
    <div class="wrapper">
        <div class="col1">@include('admin.sidebar')</div>
        <div class="col2">
            <nav class="navbar navbar-expand shadow">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/')}}" class="nav-link"><i class="fas fa-home"> </i>  Front Page</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin')}}" class="nav-link"><i class="fas fa-chalkboard-teacher"> </i>  Administración</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="page">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb shadow">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/admin')}}"><i class="fas fa-home"> </i>  Inicio</a>
                            </li>
                            @section('breadcrumb')
                            @show
                        </ol>
                    </nav>
                </div>
                
                    @include('validate')  

                    @section('content') 
                    @show
            </div>
        </div>
    </div>
    <script src="{{ url('/fontawesome/js/all.js') }}"></script>
    <script src="{{ url('/static/jquery.js') }}"></script>
    <script src="{{ url('/fancybox/dist/jquery.fancybox.js') }}"></script>
    <script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('/static/sweetalert.min.js') }}"></script>
    <script src="{{ url('/static/js/admin.js?v='.time()) }}"></script>
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
        <script>
            $(document).ready(function() {
            var myCarousel = document.querySelector('#myCarousel');
            var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 3000,
            wrap: false
            });
        });
        </script>

</body>
</html>