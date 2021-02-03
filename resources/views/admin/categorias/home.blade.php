@extends('admin.master')

@section('title')
    Categorias
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/categorias/0') }}"><i class="fas fa-folder-open"></i>  Categorias</a>
    </li>
    
@endsection
@section('content') 
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-plus"></i> Agregar Categoria</h2>
                </div>
                <div class="inside">
                @if ( getValuesJson(Auth::user()->permisos, 'categoria_add') )
                    {!! Form::open(['url' => '/admin/categorias/add']) !!}

                    <label for="title">Nombre:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    @error('name')
                    <div class="input-group mtop16">
                        <div class="alert alert-danger" >{{$message}}</div>
                    </div>       
                    @enderror

                    <label for="modulo" class="mtop16">Módulo:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                        {!! Form::select('modulo', getModuleArray(), 0, ['class' => 'form-select',]) !!}
                    </div>

                    <label for="icon" class="mtop16">Ícono:</label>
                    <div class="input-group">
                        <span class="input-group-text" id="ca" style="font-size: 30px"></span>
                        {!! Form::text('icon', null, ['class' => 'form-control', 'id' => 'icon', 'hidden' => 'true']) !!}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-secondary" id="myInput" style="font-size: 17px">
                            Escoger ícono
                        </button>
                    </div>
                    @error('icon')
                    <div class="input-group mtop16">
                        <div class="alert alert-danger" >{{$message}}</div>
                    </div>       
                    @enderror
                    <div class="modal" id="myModal" style="z-index: 9999999;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Lista de íconos</h5>
                              <button type="button" class="btn-close" id="close"></button>
                            </div>
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Color: <input type="color" class="form-color" id="color"></h5>
                            </div>
                            <div class="modal-body">
                              <div class="row" style="font-size: 40px">
                                @foreach (getIcono() as $key => $value)
                                <div class="col-md-2">
                                    <a href="#" class="icomer" data-objecto="{{$key}}" data-code="{{$value}}" style="color: #000;"><i class="{{ $value }}"></i></a>
                                </div>
                                @endforeach
                              </div>
                            </div>
                          </div>
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
        <div class="col-md-8">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-folder-open"></i> Categorias</h2>
                </div>
                <div class="inside">
                    <nav class="nav nav-pills">
                        @foreach (getModuleArray() as $m => $k)
                            <a href="{{ url('/admin/categorias/'.$m) }} " class="nav-link"><i class="fas fa-list"></i> {{$k}}</a>
                        @endforeach
                    </nav>
                   <table class="table mtop16">
                         <thead>
                            <tr>
                                <td width="32" ></td>
                                <td>Nombre</td>
                                <td width="140"></td>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($cats as $cat)
                            <tr>
                                <td style="font-size: 2em">{!! htmlspecialchars_decode($cat->icon) !!}</td>
                                <td>{{$cat->name}}</td>
                                <td>
                                    <div class="opts">
                                    @if ( getValuesJson(Auth::user()->permisos, 'categoria_edit') )
                                        <a href="{{ url('/admin/categorias/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endif
                                    @if ( getValuesJson(Auth::user()->permisos, 'categoria_delete') )
                                        <a href="{{ url('/admin/categorias/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
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