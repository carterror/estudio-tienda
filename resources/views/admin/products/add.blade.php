@extends('admin.master')

@section('title')
    Agregar Productos
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products/all') }}"><i class="fas fa-boxes"></i>  Productos</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products/add') }}"><i class="fas fa-plus"></i> Agregar Producto</a>
    </li>
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-plus"></i> Agregar Producto</h2>
        </div>
        <div class="inside">
            {!! Form::open(['url' => '/admin/products/add', 'files' => true ]) !!}
            <div class="row">

                <div class="col-md-6">
                    <label for="title">Nombre del Producto:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="categoria">Categoría</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                         {!! Form::select('categoria', $cats, 0, ['class' => 'form-select']) !!}   
                    </div>  
                </div>
                <div class="col-md-3">
                    <label for="title">Imagen:</label>
                    <div class="form-file">
                        {!! Form::file('img', ['class' => 'form-control', 'id' => 'customFile', 'accept' => 'image/*', 'aria-label' => 'Subir']) !!}
                    </div>
                </div>
            </div>

            <div class="row mtop16">

                <div class="col-md-3">
                        <label for="price">Precio:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                            {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                        </div>            
                </div>
                <div class="col-md-3">
                    <label for="endescuento">¿En descuento?</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                        {!! Form::select('endescuento', ['0' => 'No', '1' => 'Si'], 0, ['class' => 'form-select',]) !!}
                    </div>            
                </div>
                <div class="col-md-3">
                    <label for="descuento">Descuento</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                        {!! Form::number('descuento', 0.01, ['class' => 'form-control', 'min' => '0.00','step' => 'any']) !!}
                    </div>            
                </div>
            </div>
            
            <div class="row mtop16">
                <div class="col-md-3">
                        <label for="inventario">Inventario:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                            {!! Form::number('inventario', 0, ['class' => 'form-control', 'min' => '0', 'step' => 'any']) !!}
                        </div>            
                </div>
                <div class="col-md-3">
                    <label for="codigo">Código del producto</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                            {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
                    </div>            
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-12">
                    <label for="content">Descripción</label>
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor']) !!}
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-12">
                    {!! Form::submit('Guardar', ['class' => "btn btn-success"]) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection