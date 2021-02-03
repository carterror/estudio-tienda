@extends('master')

@section('title')
    Inicio
@endsection

@section('content')
<section>
    <div class="home_action_bar shadow">
        <div class="row">
            <div class="col-md-3">
                <div class="categoria">
                    <a href="" class="btn btn-secondary"><i class="fas fa-stream"></i> Categorias</a>
                    <ul class="shadow">
                        @foreach ($categorias as $c)
                            <li>
                                <a href="{{ url('/tienda/categoria/'.$c->id.'/'.$c->slug) }}" style="font-size: 20px;">{!! htmlspecialchars_decode($c->icon) !!} <span style="font-size: 15px;">{{$c->name}}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                {!! Form::open(['url' => '/buscar']) !!}
            <div class="row">
                <div class="input-group">
                    <i class="fas fa-search"></i>
                    {!! Form::text('busca', null, ['class' => 'form-control', 'placeholder' => '¿Buscas Algo?']) !!}
        
                {!! Form::submit('Buscar', ['class' => 'btn btn-secondary']) !!}
            </div>
            </div>
                {!! Form::close() !!}
        
            </div>
        </div>
    </div>
</section>
<section>
        @include('componentes.slider-home')
</section>
<section>
    <div class="mtop32 productos" id="productos">
    </div>
        <div class="load_more_product">
            <a href="#" class="btn btn-info" id="load_more_product">Cargar más productos</a>
        </div>
</section>
@endsection

