<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-folder-open"></i>  Módulo de Categorias</h2>
        </div>
        <div class="inside">
        
            <div class="form-check">               
                {!! Form::checkbox('categoria', 'true', getValuesJson($users->permisos, 'categoria'), ['class' => 'form-check-input', "id" => "check-categoria"]) !!}
                <label class="form-check-label" for="check-categoria">Ver Categorías </label>
            </div>
            <div class="form-check">                
                {!! Form::checkbox('categoria_add', 'true', getValuesJson($users->permisos, 'categoria_add'), ['class' => 'form-check-input', "id" => "check-categoria_add"]) !!}
                <label class="form-check-label" for="check-categoria_add">Añadir Categorías</label>
            </div>
            <div class="form-check">                
                {!! Form::checkbox('categoria_edit', 'true', getValuesJson($users->permisos, 'categoria_edit'), ['class' => 'form-check-input', "id" => "check-categoria_edit"]) !!}
                <label class="form-check-label" for="check-categoria_edit">Editar Categorías</label>
            </div>
            <div class="form-check">               
                {!! Form::checkbox('categoria_delete', 'true', getValuesJson($users->permisos, 'categoria_delete'), ['class' => 'form-check-input', "id" => "check-categoria_delete"]) !!}
                <label class="form-check-label" for="check-categoria_delete">Eliminar Categorías</label>
            </div>

        </div>
    </div>
</div>