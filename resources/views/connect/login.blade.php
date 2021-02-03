@extends('connect.master')

@section('title')
    Login
@endsection

@section('content')
    <div class="box box_login shadow">
    <div class="header">
    <a href="{{ url('/')}}">
        <img src="{{ url('/static/images/banner.png') }}">
    </a>
    </div>
    <div class="inside">
    {!! Form::open(['url'=> '/login']) !!}

    <label for="email">Correo Eléctronico</label>
    <div class="input-group">
        <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
    @if (isset($_GET['email']))
        {!! Form::email("email", $_GET['email'], ["class"=>"form-control"]) !!}
    @else
        {!! Form::email("email", null, ["class"=>"form-control"]) !!}
    @endif
    
    </div>
    @error('email')
    <div class="input-group mtop16"  style="width: 100%">
            <span class="input-group-text alert alert-danger"><i class="far fa-envelope-open"></i></span>
        <div class="alert alert-danger" style="width: 88%">{{$message}}</div>
    </div>       
    @enderror

    <label for="email" class="mtop16">Contraseña: </label>   
    <div class="input-group">
    <span class="input-group-text"><i class="fas fa-lock"></i></span>
    {!! Form::password("password", ["class"=>"form-control", 'id' => 'pass']) !!}
    <div class="input-group-text" id="icon"><a id="show" onclick="showpass()"><i class="far fa-eye"></i></a></div>
    </div>
    @error('password')
    <div class="input-group mtop16"  style="width: 100%">
        <span class="input-group-text alert alert-danger"><i class="fas fa-lock-open"></i></span>
        <div class="alert alert-danger" style="width: 88%">{{$message}}</div>
    </div>       
    @enderror

    {!! Form::submit("Ingresar", ["class" => "btn btn-success mtop16"]) !!}
    {!! Form::close() !!}

    @include('validate')
    
    <div class="footer mtop16">
        <a href="{{ url('/register')}}">¿No tienes una cuenta?, Registrate</a>
        <a href="{{ url('/recover')}}">Recuperar contraseña</a>
    </div>
    </div>

</div>
@endsection