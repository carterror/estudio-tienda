@extends('master')

@section('title')
    Editar mi Perfil
@endsection

@section('content')
    <div class="row mtop32">
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="far fa-user"></i> Editar Avatar</h2>
                </div>
                <div class="inside">
                    {!! Form::open(['url' => '/user/edit/avatar', 'id' => 'form_avatar', 'files' => true]) !!}
                            <div class="edit_avatar">
                                <a href="#" id="btn_avatar_edit">
                                    <div class="overlay" id="overlay_avatar"><i class="fas fa-camera"></i></div>
                                        @if (is_null(Auth::user()->avatar))
                                            <img class="img-thumbnail" src="{{ url('/static/images/default_avatar.png') }}" alt="asd"> 
                                        @else
                                            <img class="img-thumbnail" src="{{ url('/uploads/usuarios/'.Auth::user()->id.'/t_'.Auth::user()->avatar) }}" alt=""> 
                                        @endif 
                                </a> 
                                <div class="form-file mtop16">
                                    {!! Form::file('image', ['class' => 'form-file', 'id' => 'image_avatar_edit', 'accept' => 'image/*', 'aria-label' => 'Subir', 'hidden' => 'false']) !!}
                                </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="panel shadow mtop32">
                <div class="header">
                    <h2 class="title"><i class="fas fa-fingerprint"></i> Cambiar Contraseña </h2>
                    <div data-toggle="tooltip" data-placement="top" title="Ver Contraseñas" style="float: right;" class="opst" id="icon"><a class="btn btn-primary" id="show" onclick="showpass()"><i class="far fa-eye"></i></a></div>
                </div>
                <div class="inside">
                    {!! Form::open(['url' => '/user/edit/pass']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Contraseña actual:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::password('passa', ['class' => 'form-control', 'id' => 'pass', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mtop16">
                        <div class="col-md-12">
                            <label for="title">Nueva Contraseña:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::password('pass', ['class' => 'form-control', 'id' => 'pass1', 'min' => '8', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mtop16">
                        <div class="col-md-12">
                            <label for="title">Confirmar Contraseña:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::password('passc', ['class' => 'form-control', 'id' => 'pass2', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mtop16">
                        <div class="col-md-12">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-address-card"></i> Editar Información</h2>
                </div>
                <div class="inside">
                    {!! Form::open(['url' => '/user/edit/info']) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <label for="title">Nombre:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::text('name', Auth::user()->name, ['class' => 'form-control']) !!}
                            </div>
                            </div>
                            <div class="col-md-8">
                                <label for="title">Correo Electrónico:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::text('email', Auth::user()->email, ['class' => 'form-control', 'disabled']) !!}
                            </div>
                            </div>
                        </div>
                        <div class="row mtop16">
                            <div class="col-md-4">
                                <label for="title">Apellidos:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
                            </div>
                            </div>
                            <div class="col-md-2">
                                <label for="title">Género Masculino:</label>
                                <div class="form-check text-final-linea">
                                    @if(Auth::user()->genero == "1")  
                                    {!! Form::radio('genero', 1, 1, ['class' => 'form-check-input', 'id' => 'flexRadioGenero1']) !!}
                                    @else   
                                    {!! Form::radio('genero', 1, null, ['class' => 'form-check-input', 'id' => 'flexRadioGenero1']) !!}
                                    @endif
                                    <label class="form-check-label" for="flexRadioGenero1">
                                      Masculino
                                    </label>
                                </div>

                                </div>
                                <div class="col-md-2">
                                    <label for="title">Género Femenino:</label>
                                    <div class="form-check">
                                        @if(Auth::user()->genero == "2")  
                                        {!! Form::radio('genero', 2, 1, ['class' => 'form-check-input', 'id' => 'flexRadioGenero2']) !!}
                                        @else   
                                        {!! Form::radio('genero', 2, null, ['class' => 'form-check-input', 'id' => 'flexRadioGenero2']) !!}
                                        @endif
                                    <label class="form-check-label text-final-linea" for="flexRadioGenero2">
                                        Femenino
                                    </label>
                                </div>
                                </div>
                            <div class="col-md-4">
                                <label for="icon">Fecha de Nacimiento:</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                        {!! Form::date('nace', Auth::user()->nacimiento, ['class' => 'form-control', 'min' => getUserNace()[1], 'max' => getUserNace()[0], 'onclick' =>"this.value = '2000-01-01';", 'required']) !!}
                                    </div>
                            </div>
                            </div> 
                            <div class="row mtop16">
                            <div class="col-md-4">
                                <label for="icon">Número de teléfono:</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                        {!! Form::number('phone', Auth::user()->phone, ['class' => 'form-control', 'minlength' => '8', 'maxlength' => '15', 'required']) !!}
                                    </div>
                            </div> 
                            </div>
                        <div class="row mtop16">
                            <div class="col-md-12">
                                <label for="icon">Dirección Particular:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                    {!! Form::textarea('direccion', Auth::user()->direccion, ['class' => 'form-control', 'style' => 'height: 100px']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row mtop16">
                            <div class="col-md-12">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection