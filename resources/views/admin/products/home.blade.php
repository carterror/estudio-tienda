@extends('admin.master')

@section('title')
    Productos
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products/all') }}"><i class="fas fa-boxes"></i>  Productos</a>
    </li>
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-boxes"></i>  Productos</h2>
                <ul>
                    <li>
                        <a id="btn_search"><i class="fas fa-search"></i> Buscar</a>
                        <ul id='form_search'>
                            {!! Form::open(['url' => '/admin/products/buscar']) !!}
                            <li>
                                {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar', 'required']) !!} 
                            </li>

                            <li>
                                {!! Form::select('filtro',['0' => 'Nombre', '1' => 'Código'], 'Filtrar', ['class' => 'form-select', 'placeholder' => 'Filtrar', 'required']) !!} 
                            </li>

                            <li>
                                {!! Form::submit('Buscar', ['class' => 'btn btn-primary', 'style' => "width: 100%;"]) !!} 
                            </li>
                            {!! Form::close() !!}
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="">Filtrar <i class="fas fa-chevron-down"></i></a>
                        <ul class="menu">
                            <li><a href="{{ url('/admin/products/all') }}" class=""><i class="fas fa-list-ul"></i> Todos</a></li>
                            <li><a href="{{ url('/admin/products/1') }}" class=""><i class="fas fa-globe"></i> Público</a></li>
                            <li><a href="{{ url('/admin/products/0') }}" class=""><i class="fas fa-eraser"></i> Borrador</a></li>
                            <li><a href="{{ url('/admin/products/reci') }}" class=""><i class="fas fa-trash-restore"></i> Papelera</a></li>
                        </ul>
                    </li>
                    @if ( getValuesJson(Auth::user()->permisos, 'producto_add') ) 
                    <li>
                        <a href="{{ url('/admin/products/add') }}" class=""><i class="fas fa-plus"></i> Agregar Producto</a>
                    </li>
                    @endif
                </ul>
            
        </div>
        <div class="inside">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr >
                        <td>ID</td>
                        <td></td>
                        <td>Nombre</td>
                        <td>Categoria</td>
                        <td>Precio</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($producto as $p)
                            <tr>
                                <td width="50">{{ $p->id }}</td>
                                <td width="75">
                                    <a href="{{ url('/uploads//'.$p->file_path.'/'.$p->image) }}" data-fancybox="gallery">
                                        <img class="img-thumbnail" src="{{ url('/uploads//'.$p->file_path.'/t_'.$p->image) }}" alt="{{ $p->name }}"> 
                                    </a>
                                </td>
                                <td>@if ($p->estado == "0") <i class="fas fa-eraser" data-toggle="tooltip" data-placement="top" title="Borrador"></i> @endif {{ $p->name }} </td>
                                <td>{{ $p->cat->name }}</td>
                                <td>{{ $p->precio }}</td>
                                <td>
                                    <div class="opts">
                                        @if ( getValuesJson(Auth::user()->permisos, 'producto_edit') )
                                            @if (is_null($p->deleted_at))
                                                <a href="{{ url('/admin/products/'.$p->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @else
                                                <a href="#" data-object="{{ $p->id }}" data-path="admin/products" data-action="eliminar" class="btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            @endif
                                        
                                        @endif
                                        @if ( getValuesJson(Auth::user()->permisos, 'producto_delete') )
                                            @if (is_null($p->deleted_at))
                                                <a href="#" data-object="{{ $p->id }}" data-path="admin/products" data-action="delete" class="btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            @else
                                                <a href="#" data-object="{{ $p->id }}" data-path="admin/products" data-action="restaurar" class="btn-delete" data-toggle="tooltip" data-placement="top" title="Restaurar">
                                                    <i class="fas fa-trash-restore"></i>
                                                </a>
                                            @endif
                                        
                                        @endif
                                    </div>
                                </td>
                            </tr> 
                        @endforeach
                        <tfoot>
                            <tr>
                            <td colspan="6" class="paginate"> {!! $producto->render() !!} </td>
                            </tr>
                        </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
