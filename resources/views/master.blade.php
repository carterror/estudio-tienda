<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="width=device-width, initial-scale=1,  shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=0"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <meta name="currency" content="{{config('ventagran.currency', '$') }}">
    <title>{{config('ventagran.name', env('APP_NAME')) }} - @yield('title')</title>
    <link rel = "icon" type = "image/x-icon" href = "{{ url('/favicon.ico') }}">
    <link rel="stylesheet" href="{{ url('/bootstrap/dist/css/bootstrap.min.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ url('/fancybox/dist/jquery.fancybox.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ url('/static/css/modal.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ url('/static/css/style.css?v='.time()) }}">
    <style>
            .carousel-caption::-webkit-scrollbar {
                width: 7px;
                background: #1a1a2717;
                transition: .6s;
            }
            .carousel-caption::-webkit-scrollbar-thumb {
                background: #e1712762;
                transition: .6s;
                border-radius: 100px;
            }
            .carousel-caption::-webkit-scrollbar-thumb:hover {
                background: #e17127d3;
                transition: .6s;
            }
    </style>
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ url('/static/images/banner1.png') }}" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home" id="icono"></i> <span>Inicio</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-store-alt" id="icono"></i> <span>Tienda</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-shopping-cart" id="icono"></i> <span class="carnumber">0</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-id-card-alt" id="icono"></i> <span>Sobre Nosotros</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-envelope-open" id="icono"></i> <span>Contacto</span></a>
              </li>
              @if (Auth::guest())
                <li class="nav-item link-acc">
                    <a class="nav-link btn" href="{{ url('/login') }}"><i class="fas fa-fingerprint" ></i> Ingresar</a>
                    <a class="nav-link btn" href="{{ url('/register') }}"><i class="fas fa-user-circle"></i> Registrarse</a>
                </li> 
              @else
                <li class="nav-item btn-group dropstart link-user link-acc">
                  <a type="button" class="btn link-acc link-user">
                    @if (is_null(Auth::user()->avatar))
                    <i class="fas fa-user-circle"></i>  
                    @else
                    <img src="{{ url('/uploads/usuarios/'.Auth::user()->id.'/t_'.Auth::user()->avatar) }}" alt=""> 
                    @endif    
                   {{ Auth::user()->name}}
                  </a>
                  <a class="btn link-acc link-user dropdown-toggle dropdown-toggle-split" id="navbarDropdown" role="button" data-toggle="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                  </a>
                   <span class="visually-hidden">Botón</span>
                   <ul class="dropdown-menu shadow">
                    <li><a class="dropdown-item" href="{{url('/user/edit')}}"><i class="fas fa-address-card"></i> Editar Información</a></li>
                    <li><a class="dropdown-item" href="{{url('/user/favorite')}}"><i class="fas fa-heart"></i> Favoritos</a></li>
                    @if (Auth::user()->role == "1")
                      <li><a class="dropdown-item" id="logout" href="{{url('/admin')}}"><i class="fas fa-chalkboard-teacher"></i> Administración</a></li>
                    @endif
                    <li><a class="dropdown-item" id="logout" href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
                  </ul>
                </li> 
              @endif
            </ul>
          </div>
        </div>
      </nav>

      
      <div class="wrapper">
        @include('validate')
        <div class="container">
          @section('content')  
          @show
        </div>
      </div>
    <script src="{{ url('/fontawesome/js/all.js') }}"></script>
    <script src="{{ url('/static/jquery.js') }}"></script>
    <script src="{{ url('/fancybox/dist/jquery.fancybox.js') }}"></script>
    {{-- <script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script> --}}
    <script src="{{ url('/static/sweetalert.min.js') }}"></script>
    <script src="{{ url('/static/js/java.js?v='.time()) }}"></script>
    <script src="{{ url('/static/js/pass.js?v='.time()) }}"></script>

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