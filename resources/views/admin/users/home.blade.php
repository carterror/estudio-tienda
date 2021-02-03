@extends('admin.master')

@section('title')
    Usuarios
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users/all') }}"><i class="fas fa-user-friends"></i>  Usuarios</a>
    </li>
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fas fa-user-friends"></i>  Usarios</h2>
                <ul>
                    <li>
                        <a href=""><i class="fas fa-filter"></i> Filtrar <i class="fas fa-chevron-down"></i></a>
                        <ul class="menu">
                            <li><a class="" href="{{ url('/admin/users/all') }}"><i class="fas fa-list"></i> Todos</a></li>
                            <li><a class="" href="{{ url('/admin/users/0') }}"><i class="fas fa-unlink"></i> No Verificados</a></li>
                            <li><a class="" href="{{ url('/admin/users/1') }}"><i class="fas fa-user-check"></i> Verificados</a></li>
                            <li><a class="" href="{{ url('/admin/users/100') }}"><i class="fas fa-handshake-slash"></i> Suspendidos</a></li>
                       </ul>
                    </li>
                </ul>
            </div>
            <div class="inside">
                <div class="table-responsive">
                    <table class="table mtop16">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td></td>
                                <td>Nombre</td>
                                <td>Correo</td>
                                <td>Estado</td>
                                <td>Cuenta</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td width="50">{{$user->id}}</td>
                                    <td width="60">
                                        @if (is_null($user->avatar))
                                            <img class="rounded" width="100%" src="{{ url('/static/images/default_avatar.png') }}" alt="">
                                        @else
                                            <img class="rounded" width="100%" src="{{ url('/uploads/usuarios/'.$user->id.'/t_'.$user->avatar) }}" alt=""> 
                                        @endif
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{ getStatusUserArray(null, $user->status) }}</td>
                                    <td>{{ getRoleUserArray(null, $user->role) }}</td>
                                    <td>
                                        <div class="opts">
                                        @if ( getValuesJson(Auth::user()->permisos, 'usuarios_edit') )
                                            <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                        @if ( getValuesJson(Auth::user()->permisos, 'usuarios_permisos') )
                                            <a href="{{ url('/admin/users/'.$user->id.'/permisos') }}" data-toggle="tooltip" data-placement="top" title="Permisos de Usuario">
                                                <i class="fas fa-cogs"></i>
                                            </a>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <td colspan="6"> {{ $users->render() }}</td>
                                </tr>
                            </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection