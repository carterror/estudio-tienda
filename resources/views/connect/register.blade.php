@extends('connect.master')

@section('title')
    Registrarse
@endsection

@section('content')
    <div class="box box_register shadow">
    <div class="header">
    <a href="{{ url('/')}}">
        <img src="{{ url('/static/images/banner.png') }}">
    </a>
    </div>
    <div class="inside">
    {!! Form::open(['url'=> '/register']) !!}
    
    <label for="name">Nombre:</label>
    <div class="input-group">
    <span class="input-group-text"><i class="fas fa-user"></i></span>
    {!! Form::text("name", null, ["class"=>"form-control", "required"]) !!}
    </div>
    @error('name')
    <div class="input-group mtop16"  style="width: 100%">
        <span class="input-group-text alert alert-danger"><i class="far fa-user"></i></span>
        <div class="alert alert-danger" style="width: 88%">{{$message}}</div>
    </div>      
    @enderror

    <label for="email" class="mtop16">Correo Eléctronico</label>
    <div class="input-group">
    <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
    {!! Form::email("email", null, ["class"=>"form-control", "required"]) !!}
    </div>
    @error('email')
    <div class="input-group mtop16"  style="width: 100%">
        <span class="input-group-text alert alert-danger"><i class="far fa-envelope-open"></i></span>
        <div class="alert alert-danger" style="width: 88%">{{$message}}</div>
    </div>       
    @enderror

    <label for="password" class="mtop16">Contraseña: </label>
    <div class="input-group">
    <span class="input-group-text"><i class="fas fa-lock"></i></span>
    {!! Form::password("password", ["class"=>"form-control", "required", 'id' => 'pass']) !!}
    <div class="input-group-text" id="icon"><a id="show" onclick="showpass()"><i class="far fa-eye"></i></a></div>
    </div>
    @error('password')
    <div class="input-group mtop16"  style="width: 100%">
        <span class="input-group-text alert alert-danger"><i class="fas fa-lock-open"></i></span>
        <div class="alert alert-danger" style="width: 88%">{{$message}}</div>
    </div>         
    @enderror

    <label for="cpassword" class="mtop16">Confirmar Contraseña: </label>
    <div class="input-group">
    <span class="input-group-text"><i class="fas fa-lock"></i></span>
    {!! Form::password("cpassword", ["class"=>"form-control", "required", 'id' => 'passc']) !!}
    <div class="input-group-text" id="icon"><a id="showc" onclick="showpassc()"><i class="far fa-eye"></i></a></div>
    </div>
    @error('cpassword')
    <div class="input-group mtop16"  style="width: 100%">
        <span class="input-group-text alert alert-danger"><i class="fas fa-lock-open"></i></span>
        <div class="alert alert-danger" style="width: 88%">{{$message}}</div>
    </div>        
    @enderror

    {!! Form::submit("Registrarse", ["class" => "btn btn-success mtop16"]) !!}
    {!! Form::close() !!}

    @include('validate')
    
    <div class="footer mtop16">
       <a href="{{ url('/login')}}">Si ya tienes cuenta, Ingresar</a>
    </div>

    </div>
</div>
@endsection
