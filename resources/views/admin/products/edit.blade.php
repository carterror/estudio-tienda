@extends('admin.master')

@section('title')
    Editar Productos
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products/all') }}"><i class="fas fa-boxes"></i>  Productos</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products'.$p->id.'/edit') }}"><i class="fas fa-edit"></i> Editar Producto</a>
    </li>
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-edit"></i> Editar Producto</h2>
                </div>
                <div class="inside">
                    {!! Form::open(['url' => '/admin/products/'.$p->id.'/edit', 'files' => true ]) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title">Nombre del Producto:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::text('name', $p->name, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="categoria">Categoría</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::select('categoria', $cats, $p->categoria_id, ['class' => 'form-select']) !!}   
                            </div>  
                        </div>
                        <div class="col-md-3">
                            <label for="title">Imagen:</label>
                            <div class="form-file">
                                {!! Form::file('img', ['class' => 'form-control', 'accept' => 'image/*', 'aria-label' => 'Subir']) !!}
                            </div>
                        </div>

                    </div>

                    <div class="row mtop16">

                        <div class="col-md-3">
                                <label for="price">Precio:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                    {!! Form::number('price', $p->precio, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                                </div>            
                        </div>
                        <div class="col-md-3">
                            <label for="endescuento">¿En descuento?</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::select('endescuento', ['0' => 'No', '1' => 'Si'], $p->in_discount, ['class' => 'form-select',]) !!}
                            </div>            
                        </div>
                        <div class="col-md-3">
                            <label for="descuento">Descuento</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::number('descuento', $p->discount, ['class' => 'form-control', 'min' => '0.00','step' => 'any']) !!}
                            </div>            
                        </div>
                        <div class="col-md-3">
                            <label for="estado">Estado:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                {!! Form::select('estado', ['0' => 'Borrador', '1' => 'Público'], $p->in_discount, ['class' => 'form-select',]) !!}
                            </div> 
                        </div>      
                    </div>
                    <div class="row mtop16">
                        <div class="col-md-3">
                                <label for="inventario">Inventario:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                    {!! Form::number('inventario', $p->inventario, ['class' => 'form-control', 'min' => '0', 'step' => 'any']) !!}
                                </div>            
                        </div>
                        <div class="col-md-3">
                            <label for="codigo">Código del producto</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                    {!! Form::text('codigo', $p->codigo, ['class' => 'form-control']) !!}
                            </div>            
                        </div>
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-12">
                            <label for="content">Descripción</label>
                            {!! Form::textarea('content', $p->contenido, ['class' => 'form-control', 'id' => 'editor']) !!}
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
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-image"></i> Imagen</h2>
                </div>
                <div class="inside">
                    <a href="{{ url('/uploads//'.$p->file_path.'/'.$p->image) }}" data-fancybox="gallery">
                        <img class="img-thumbnail" src="{{ url('/uploads//'.$p->file_path.'/'.$p->image) }}" alt="{{ $p->name }}"> 
                    </a>
                </div>
            </div>

            <div class="panel shadow mtop16">
                <div class="header">
                    <h2 class="title"><i class="fas fa-images"></i> Galeria</h2>
                </div>
                @if ( getValuesJson(Auth::user()->permisos, 'producto_galeria_add') )
                    <div class="inside galeria">
                        {!! Form::open(['url' => '/admin/products/'.$p->id.'/galeria/add', 'id' => 'form_product_gallery' , 'files' => true]) !!}

                        {!! Form::file('file_image', ['id' => 'product_file_image', 'style' => 'display: none;', 'accept' => 'image/*', 'required']) !!}

                        {!! Form::close() !!}
                        <div class="btn-submit">
                            <a id="btn_product_file_image"><i class="fas fa-plus"></i></a>
                        </div>
                        @endif
                        
                        <div class="tumbs">
                            @foreach ($p->getGaleria as $img)
                                <div class="tumb">
                                    @if ( getValuesJson(Auth::user()->permisos, 'producto_galeria_delete') )
                                    <a href="{{ url('/admin/products/'.$p->id.'/galeria//'.$img->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar" id="icon">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    @endif
                                    <a href="{{ url('/uploads//'.$img->file_path.'/'.$img->file_name) }}" data-fancybox="gallery">
                                        <img class="img-thumbnail" src="{{ url('/uploads//'.$img->file_path.'/t_'.$img->file_name) }}" alt="">
                                    </a>    
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection