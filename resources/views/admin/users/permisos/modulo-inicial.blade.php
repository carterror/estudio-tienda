<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-home"></i>  Módulo Inicial</h2>
        </div>
        <div class="inside">
            <div class="form-check">         
                {!! Form::checkbox('inicio', 'true', getValuesJson($users->permisos, 'inicio'), ['class' => 'form-check-input', "value" => "", "id" => "check-inicio"]) !!}
                <label class="form-check-label" for="check-inicio">Ver inicio</label> 
            </div>
            <div class="form-check">               
                {!! Form::checkbox('stats', 'true', getValuesJson($users->permisos, 'stats'), ['class' => 'form-check-input', "id" => "check-stats"]) !!}
                <label class="form-check-label" for="check-stats">Ver estadísticas rápidas</label>
            </div>
            <div class="form-check">                
                {!! Form::checkbox('statsd', 'true', getValuesJson($users->permisos, 'statsd'), ['class' => 'form-check-input', "id" => "check-statsd"]) !!}
                <label class="form-check-label" for="check-statsd">Ver estadísticas de venta</label>
            </div>
        </div>
    </div>
</div>