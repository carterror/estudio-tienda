<div class="sidebar shadow">

    <div class="section-top">
        <div class="logo">
        <img src="{{ url('static/images/bannerA.png') }}" alt="logo" class="img-fluid">
        </div>
        <div class="row user">
            <div class="col-md-12">
            <b><span class="subtitle">Hola:</span> 
            <a href="{{ url('logout') }}" data-toggle="tooltip" data-placement="top" title="Desconectarse">
                <i class="fas fa-sign-out-alt" ></i>
            </a>
            <div class="name">
                {{ Auth::user()->name}}
           </div>
            <div class="email text-final-linea">{{ Auth::user()->email}}</div>
        </div></b>
    </div>
    </div>
    <div class="main">
        <ul>
            @if ( getValuesJson(Auth::user()->permisos, 'inicio') ) 
            <li>
            <a href="{{ url('/admin') }}" class="lk-inicio"><i class="fas fa-home"> </i>  Inicio</a>
            </li>
            @endif
            @if ( getValuesJson(Auth::user()->permisos, 'categoria') ) 
            <li>
                <a href="{{ url('/admin/categorias/0') }}" class="lk-categoria lk-categoria_edit text-final-linea" ><i class="fas fa-folder-open"></i>  Categorias</a>
            </li>
            @endif
            @if ( getValuesJson(Auth::user()->permisos, 'ordenes') )
            <li>
                <a href="{{ url('/admin/ordenes') }}" class="lk-ordenes" ><i class="fas fa-clipboard-list"></i>  Órdenes</a>
            </li>
            @endif
            @if ( getValuesJson(Auth::user()->permisos, 'productos') )
            <li>
                <a href="{{ url('/admin/products/all') }}" class="lk-producto_add lk-producto_edit lk-productos lk-producto_galeria_add text-final-linea lk-producto_buscar" ><i class="fas fa-boxes"></i>  Productos</a>
            </li>
            @endif            
            @if ( getValuesJson(Auth::user()->permisos, 'usuarios') ) 
            <li>
                <a href="{{ url('/admin/users/all') }}" class="lk-usuarios lk-usuarios_edit lk-usuarios_banned lk-usuarios_permisos" ><i class="fas fa-user-friends"></i>  Usuarios</a>
            </li>
            @endif
            @if ( getValuesJson(Auth::user()->permisos, 'slider') ) 
            <li>
                <a href="{{ url('/admin/slider') }}" class=" lk-slider"><i class="fas fa-images"></i>  Slider</a>
            </li>
            @endif
            @if ( getValuesJson(Auth::user()->permisos, 'config') ) 
            <li>
                <a href="{{ url('/admin/config') }}" class="text-final-linea lk-config"><i class="fas fa-tools"></i>  Configuración</a>
            </li>
            @endif
        </ul>
    </div>
</div>