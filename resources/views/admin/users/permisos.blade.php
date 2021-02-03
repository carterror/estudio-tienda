@extends('admin.master')

@section('title')
    Permisos Usuarios
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/all') }}"><i class="fas fa-user-friends"></i>  Usuarios</a>
    </li>
    <li class="breadcrumb-item">
    <a href="{{ url('/admin/users/'.$users->id.'/permisos') }}"><i class="fas fa-cogs"></i>  Permisos del Usuario: {{ $users->name }} ({{ getRoleUserArray(null, $users->role) }})</a>
    </li>
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-user">
        {!! Form::open(['url'=> '/admin/users/'.$users->id.'/permisos']) !!}

        <div class="row">
            @foreach (UserPermisos() as $key => $value)

            <div class="col-md-4 d-flex mb16">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">{!! $value['icon'] !!}  Módulo de {!! $value['title'] !!}</h2>
                    </div>
                    <div class="inside">
                        @foreach ($value['permisos'] as $k => $v)
                        <div class="form-check form-switch">         
                            {!! Form::checkbox($k, 'true', getValuesJson($users->permisos, $k), ['class' => 'form-check-input', "value" => "", "id" => "check-$k"]) !!}
                            <label class="form-check-label" for="check-{{$k}}">{{$v}}</label> 
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
                
            @endforeach
        </div>
        <div class="row">   
            <div class="col-md-12">
                <div class="panel shadow">
                    <div class="inside">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>

        </div>

        {!! Form::close() !!}

    </div>  
</div>
@endsection