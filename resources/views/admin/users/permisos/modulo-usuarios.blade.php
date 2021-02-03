<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-user-friends"></i>  Módulo de Usuarios</h2>
        </div>
        <div class="inside">
            <div class="form-check">
                {!! Form::checkbox('usuarios', 'true', getValuesJson($users->permisos, 'usuarios'), ['class' => 'form-check-input', "id" => "check-usuarios"]) !!}
                <label class="form-check-label" for="check-usuarios">Ver Usuarios</label>
            </div>
            <div class="form-check">
                {!! Form::checkbox('usuarios_edit', 'true', getValuesJson($users->permisos, 'usuarios_edit'), ['class' => 'form-check-input', "id" => "check-usuarios_edit"]) !!}
                <label class="form-check-label" for="check-usuarios_edit">Editar Usuarios</label>
            </div>
            <div class="form-check">
                {!! Form::checkbox('usuarios_banned', 'true', getValuesJson($users->permisos, 'usuarios_banned'), ['class' => 'form-check-input', "id" => "check-usuarios_banned"]) !!}
                <label class="form-check-label" for="check-usuarios_banned">Suspender Usuarios</label>
            </div>
            <div class="form-check">
                {!! Form::checkbox('usuarios_permisos', 'true', getValuesJson($users->permisos, 'usuarios_permisos'), ['class' => 'form-check-input', "id" => "check-usuarios_permisos"]) !!}
                <label class="form-check-label" for="check-usuarios_permisos">Editar Permisos de Usuarios</label>
            </div> 
        </div>
    </div>
</div>