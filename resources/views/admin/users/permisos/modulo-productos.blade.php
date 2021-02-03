<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-boxes"></i>  Módulo de Productos</h2>
        </div>
        <div class="inside">
            <div class="form-check">
                {!! Form::checkbox('productos', 'true', getValuesJson($users->permisos, 'productos'), ['class' => 'form-check-input', "id" => "check-productos"]) !!}
                <label class="form-check-label" for="check-productos">Ver listado de productos</label>
            </div>
            <div class="form-check" style="display: none;">
                {!! Form::checkbox('producto_buscar', 'true',  getValuesJson($users->permisos, 'productos'),  ['class' => 'form-check-input', "id" => "check-producto_buscar"]) !!}
                <label class="form-check-label" for="check-producto_buscar">Buscar Productos</label>
            </div>
            <div class="form-check">
                {!! Form::checkbox('producto_add', 'true', getValuesJson($users->permisos, 'producto_add'), ['class' => 'form-check-input', "id" => "check-producto_add"]) !!}
                <label class="form-check-label" for="check-producto_add">Añadir Productos</label>
            </div>
            <div class="form-check">
                {!! Form::checkbox('producto_edit', 'true', getValuesJson($users->permisos, 'producto_edit'), ['class' => 'form-check-input', "id" => "check-producto_edit"]) !!}
                <label class="form-check-label" for="check-producto_edit">Editar Productos</label>
            </div>
            <div class="form-check">
                {!! Form::checkbox('producto_delete', 'true', getValuesJson($users->permisos, 'producto_delete'), ['class' => 'form-check-input', "id" => "check-producto_delete"]) !!}
                <label class="form-check-label" for="check-producto_delete">Enviar Productos a la Papelera</label>
            </div>
            <div class="form-check" style="display: none;">
                {!! Form::checkbox('producto_restaurar', 'true',  getValuesJson($users->permisos, 'producto_delete'),  ['class' => 'form-check-input', "id" => "check-producto_restaurar"]) !!}
                <label class="form-check-label" for="check-producto_restaurar">Restaurar Productos</label>
            </div>
            <div class="form-check" style="display: none;">
                {!! Form::checkbox('producto_eliminar', 'true',  getValuesJson($users->permisos, 'producto_delete'),  ['class' => 'form-check-input', "id" => "check-producto_eliminar"]) !!}
                <label class="form-check-label" for="check-producto_eliminar">Eliminar Productos</label>
            </div>
            <div class="form-check">
                {!! Form::checkbox('producto_galeria_add', 'true', getValuesJson($users->permisos, 'producto_galeria_add'), ['class' => 'form-check-input', "id" => "check-producto_galeria_add"]) !!}
                <label class="form-check-label" for="check-producto_galeria_add">Agregar imágenes a la galería</label>
            </div>
            <div class="form-check">
                {!! Form::checkbox('producto_galeria_delete', 'true', getValuesJson($users->permisos, 'producto_galeria_delete'), ['class' => 'form-check-input', "id" => "check-producto_galeria_delete"]) !!}
                <label class="form-check-label" for="check-producto_galeria_delete">Eliminar imágenes a la galería</label>
            </div>
        </div>
    </div>
</div>