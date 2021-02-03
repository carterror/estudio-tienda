@extends('admin.master')

@section('title')
    Configuración
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/all') }}"><i class="fas fa-tools"></i>  Configuraciones</a>
    </li>
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fas fa-tools"></i>  Configuraciones</h2>
            </div>
            <div class="inside">
                {!! Form::open(['url' => '/admin/config']) !!}

                <div class="row">
                    <div class="col-md-4">
                        <label for="title">Nombre de la Tienda:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                            {!! Form::text('name', Config::get('ventagran.name', null), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="title">Moneda:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                            {!! Form::text('currency', Config::get('ventagran.currency', null), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                    <label for="icon">Número de teléfono:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                            {!! Form::number('phone', Config::get('ventagran.phone', null), ['class' => 'form-control', 'minlength' => '8', 'maxlength' => '15', 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="row mtop16">
                    <div class="col-md-4">
                        <label for="title">Ubicaciones:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                            {!! Form::text('ubicacion', Config::get('ventagran.ubicacion', null), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="categoria">Modo Mantenimiento:</label>
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                         {!! Form::select('mantenimiento', ['0' => 'Desactivado', '1' => 'Activado'], Config::get('ventagran.mantenimiento', null), ['class' => 'form-select']) !!}   
                    </div>
                    </div>
                </div>
                <hr style="background-color: #288feb; height: 2px;">
                <div class="row mtop16">
                    <div class="col-md-4">
                        <label for="title">Productos a mostrar por página:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                            {!! Form::text('product_pag', Config::get('ventagran.product_pag', null), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row mtop16">
                    <div class="col-md-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
</div>
@endsection