@extends('admin.master')

@section('title')
    Slider
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/slider') }}"><i class="far fa-images"></i>  Slider</a>
    </li>
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-plus"></i> Agregar Slider</h2>
                </div>
                <div class="inside">
                @if ( getValuesJson(Auth::user()->permisos, 'slider_add') )
                    {!! Form::open(['url' => '/admin/slider/add', 'files' => true]) !!}

                    <label for="title">Título:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <label for="estado" class="mtop16">Estado:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                        {!! Form::select('estado', ['0' => 'Visible', '1' => 'No Visible'], 0, ['class' => 'form-select',]) !!}
                    </div>
                    <label for="orden" class="mtop16">Órden de Aparición:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                            {!! Form::number('orden', null, ['class' => 'form-control', 'min' => '0', 'step' => 'any']) !!}
                        </div>
                    <label for="img" class="mtop16">Imagen:</label>
                    <div class="form-file">
                        {!! Form::file('img', ['class' => 'form-control', 'accept' => 'image/*']) !!}
                    </div>
                    <div class="row mtop16">
                        <div class="col-md-12">
                            <label for="content">Descripción</label>
                            {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor']) !!}
                        </div>
                    </div>

                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16' ]) !!}
                    {!! Form::close() !!}
                @else    
                    <div class="input-group mtop16">
                        <div class="alert alert-danger">Su cuenta no posee dichos privilegios</div>
                    </div>
                @endif
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-images"></i> Sliders</h2>
                </div>
                <div class="inside">
                   <table class="table mtop16">
                         <thead>
                            <tr>
                                <td width="140px"></td>
                                <td>Titulo</td>
                                <td>Descripción</td>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($slider as $s)
                            <tr @if ($s->status =="1")
                                class="alert-danger"
                            @endif>
                                <td width="140px">
                                    <a href="{{ url('/uploads//'.$s->file_path.'/'.$s->imagen) }}" data-fancybox="gallery">
                                        <img class="img-thumbnail" src="{{ url('/uploads//'.$s->file_path.'/'.$s->imagen) }}" alt="{{ $s->name }}"> 
                                    </a>
                                </td>
                                <td><div class="slider-content"><span>{{$s->title}}</span><br>{!! html_entity_decode($s->content) !!}</div></td>
                                <td>
                                    <div class="opts">
                                    @if ( getValuesJson(Auth::user()->permisos, 'slider_edit') )
                                        <a href="#" data-object="{{$s->id}}" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endif
                                    @if ( getValuesJson(Auth::user()->permisos, 'slider_delete') )
                                        <a href="#" data-object="{{$s->id}}" data-path="admin/slider" data-action="delete" class="btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    @endif
                                    </div>
                                </td>
                            </tr>   
                            @endforeach
                         </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection