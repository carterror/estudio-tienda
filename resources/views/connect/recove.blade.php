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
    {!! Form::open(['url'=> '/recover']) !!}

    <label for="email">Correo Eléctronico</label>
    <div class="input-group">
    <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
    {!! Form::email("email", null, ["class"=>"form-control"]) !!}
    </div>
    @error('email')
    <div class="input-group mtop16"  style="width: 100%">
        <span class="input-group-text alert alert-danger"><i class="far fa-envelope-open"></i></span>
        <div class="alert alert-danger" style="width: 88%">{{$message}}</div>
    </div>       
    @enderror

    {!! Form::submit("Recuperar Contraseña", ["class" => "btn btn-success mtop16"]) !!}
    {!! Form::close() !!}

    @include('validate')
    
    <div class="footer mtop16">
        <a href="{{ url('/register')}}">¿No tienes una cuenta?, Registrate</a>
        <a href="{{ url('/login')}}">Ingresar a mi cuenta</a>
    </div>
    </div>

</div>
@endsection