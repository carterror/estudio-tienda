@extends('connect.master')

@section('title')
    Login
@endsection

@section('content')
    <div class="box box_reset shadow">
    <div class="header">
    <a href="{{ url('/')}}">
        <img src="{{ url('/static/images/banner.png') }}">
    </a>
    </div>
    <div class="inside">
    {!! Form::open(['url'=> '/reset']) !!}

    <label for="email">Correo Eléctronico</label>
    <div class="input-group">
    <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
    {!! Form::email("email", $email, ["class"=>"form-control"]) !!}
    </div>
    @error('email')
    <div class="input-group mtop16"  style="width: 100%">
        <span class="input-group-text alert alert-danger"><i class="far fa-envelope-open"></i></span>
        <div class="alert alert-danger" style="width: 88%">{{$message}}</div>
    </div>       
    @enderror
    <label for="code" class="mtop16">Código de recuperación</label>
    <div class="input-group">
    <span class="input-group-text"><i class="fas fa-lock"></i></span>
    @if (isset($_GET['code']))
        {!! Form::number("code", $_GET['code'], ["class"=>"form-control"]) !!}
    @else
        {!! Form::number("code", null, ["class"=>"form-control"]) !!}
    @endif
    
    </div>
    @error('code')
    <div class="input-group mtop16"  style="width: 100%;">
        <span class="input-group-text alert alert-danger"><i class="fas fa-lock"></i></span>
        <div class="alert alert-danger" style="width: 88%">{{$message}}</div>
    </div>       
    @enderror

    <label for="pass" class="mtop16">Nueva Contraseña:</label>
    <div class="input-group">
    <span class="input-group-text"><i class="fas fa-lock-open"></i></span>
    {!! Form::password("pass", ["class"=>"form-control", 'id' => 'pass', 'required']) !!}
    <div class="input-group-text" id="icon"><a id="show" onclick="showpass()"><i class="far fa-eye"></i></a></div>
    </div>
    @error('pass')
    <div class="input-group mtop16"  style="width: 100%">
        <span class="input-group-text alert alert-danger"><i class="fas fa-lock"></i></span>
        <div class="alert alert-danger" style="width: 88%">{{$message}}</div>
    </div>       
    @enderror

    {!! Form::submit("Enviar Nueva Contraseña", ["class" => "btn btn-success mtop16", "style" => "margin-top: 25px;"]) !!}
    {!! Form::close() !!}

    @include('validate')
    
    <div class="footer mtop16">
        <a href="{{ url('/register')}}">¿No tienes una cuenta?, Registrate</a>
        <a href="{{ url('/login')}}">Ingresar a mi cuenta</a>
    </div>
    </div>

</div>
@endsection