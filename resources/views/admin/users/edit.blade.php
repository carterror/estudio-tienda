@extends('admin.master')

@section('title')
    Editar Usuarios
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/all') }}"><i class="fas fa-user-friends"></i>  Usuarios</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/all') }}"><i class="fas fa-user"></i>  Información</a>
    </li>
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-user">
        <div class="row">
            <div class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-user"></i>  Información</h2>
                    </div>
                    <div class="inside">
                        <div class="mini-perfil">
                            @if (is_null($users->avatar))
                                <img class="avatar" src="{{ url('/static/images/default_avatar.png') }}" alt="">
                            @else
                                <img class="avatar" src="{{ url('/uploads/usuarios/'.$users->id.'/t_'.$users->avatar) }}" alt=""> 
                            @endif
                            <div class="info">
                                <span class="title"><i class="fas fa-address-card"></i> Nombre:</span>
                                <span class="text">{{$users->name}}</span>
                                <span class="title"><i class="fas fa-user-shield"></i> Tipo de usuario:</span>
                                <span class="text">{{ getRoleUserArray(null, $users->role) }}</span>
                                <span class="title"><i class="fas fa-user-tie"></i> Estado de cuenta:</span>
                                <span class="text">{{ getStatusUserArray(null, $users->status) }}</span>
                                <span class="title"><i class="fas fa-envelope"></i> Correo Electrónico:</span>
                                <span class="text">{{$users->email}}</span>
                                <span class="title"><i class="fas fa-calendar-alt"></i> Fecha de Registro:</span>
                                <span class="text">{{$users->created_at}}</span>         
                            
                            </div>
                            @if ( getValuesJson(Auth::user()->permisos, 'usuarios_banned') )
                                @if ($users->status=="100")
                                    <a href="{{ url('/admin/users/'.$users->id.'/banned') }}" class="btn btn-success">Quitar Suspención</a>    
                                @else
                                    <a href="{{ url('/admin/users/'.$users->id.'/banned') }}" class="btn btn-danger">Suspender Usuario</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-user-edit"></i>  Editar Información</h2>
                    </div>
                    <div class="inside">
                        @if ( getValuesJson(Auth::user()->permisos, 'usuarios_edit') )
                            {!! Form::open(['url' => '/admin/users/'.$users->id.'/edit']) !!}
                            <div class="row">
                                  <div class="col-md-6">
                                    <label for="icon">Tipo de usuario:</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-keyboard"></i></span>
                                        {!! Form::select('tipo', getRoleUserArray('list', null), $users->role, ['class' => 'form-select']) !!}
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!} 
                                  </div>
                            </div>   
                            
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection