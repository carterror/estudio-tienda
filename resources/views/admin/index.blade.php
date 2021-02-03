@extends('admin.master')

@section('title')
    Admin
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fas fa-home"> </i>  Inicio</h2>
            </div>
            <div class="inside">
                <p>Bienvenido al sistema de administración de la plataforma de ventas, {{ env('APP_NAME') }}.
                    <p>Desarrollada con el fin de facilitar a nuestro cliente las diferentes opciones necesarias, para la administración, de la plataforma.
            </div>
        </div>
        </div>
    </div>
    @if ( getValuesJson(Auth::user()->permisos, 'stats') )
        <div class="row mtop16">
            <div class="col-md-12">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-chart-bar"> </i>  Estadisticas Rápidas</h2>
                </div>
            </div>
            </div>
        </div>
        <div class="row mtop16">
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-users"> </i> Usuarios Registrados</h2>
                    </div>
                    <div class="inside">
                        <div class="big-count">
                            {{$users}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-boxes"></i>  Productos Listados</h2>
                    </div>
                    <div class="inside">
                        <div class="big-count">
                            {{$product}}
                        </div>
                    </div>
                </div>
            </div>
            @if ( getValuesJson(Auth::user()->permisos, 'statsd') )
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-shopping-basket"> </i>  Ordenes Hoy</h2>
                    </div>
                    <div class="inside">
                        <div class="big-count">
                            0
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-credit-card"> </i>  Facturado Hoy</h2>
                    </div>
                    <div class="inside">
                        <div class="big-count">
                            0
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    @endif
    
</div>
@endsection