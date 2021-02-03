@extends('admin.master')

@section('title')
    Categorias
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/categorias/0') }}"><i class="fas fa-folder-open"></i>  Categorias</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/categorias/'.$cat->id.'/edit') }}"><i class="fas fa-edit"></i> Editar Categoria</a>
    </li>
    
@endsection
@section('content') 
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-edit"></i> Editar Categoria</h2>
                </div>
                <div class="inside">
                    {!! Form::open(['url' => '/admin/categorias/'.$cat->id.'/edit', 'class' => 'needs-validation']) !!}

                    <label for="title">Nombre:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                        {!! Form::text('name', $cat->name, ['class' => 'form-control', 'required']) !!}
                    </div>
                    @error('name')
                    <div class="input-group mtop16">
                        <div class="alert alert-danger" >{{$message}}</div>
                    </div>       
                    @enderror

                    <label for="modulo" class="mtop16">Módulo:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                        {!! Form::select('modulo', getModuleArray(), $cat->module, ['class' => 'form-select',]) !!}
                    </div>
                    <label for="icon" class="mtop16">Ícono:</label>
                    <div class="input-group">
                        <span class="input-group-text" id="ca" style="font-size: 30px">{!! htmlspecialchars_decode($cat->icon) !!}</span>
                        {!! Form::text('icon', $cat->icon, ['class' => 'form-control', 'id' => 'icon', 'hidden' => 'true']) !!}
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
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16' ]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Modal -->
  
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
@endsection