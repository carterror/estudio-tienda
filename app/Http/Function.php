<?php

function getValuesJson($json, $key){
    if($json == null):
        return null;
    else:
        $json = $json;
        $json = json_decode($json, true);
        if(array_key_exists($key, $json)): 
            return $json[$key];
        else: 
            return null;
        endif;
    endif;      
    
}


function getModuleArray()
{
    $a = [
        '0' => 'Productos',
        '1' => 'Asistencia',
        '2' => 'BTC',
    ];

    return $a;
        
}


function getRoleUserArray($modo, $id)
{
    
    $role = [
        '0' => 'Cliente',
        '1' => 'Vendedor',
    ];

    if(!is_Null($modo)):
        return $role;
    else:
        return $role[$id];
    endif;
        
}

function getStatusUserArray($modo, $id)
{
    $status = [
        '0' => 'Registrada',
        '1' => 'Activada',
        '100' => 'Suspendida',
    ];

    if(!is_Null($modo)):
        return $status;
    else:
        return $status[$id];
    endif;
        
}

function UserPermisos()
{
    $p = [
        'inicio' => [
            'icon' => '<i class="fas fa-home"></i>',
            'title' => 'Módulo Inicial',
            'permisos' => [
                'inicio' => 'Ver inicio',
                'stats' => 'Ver estadísticas rápidas',
                'statsd' => 'Ver estadísticas de venta',
            ]
        ],

        'productos' => [
            'icon' => '<i class="fas fa-boxes"></i>',
            'title' => 'Módulo de Productos',
            'permisos' => [
                'productos' => 'Ver listado de productos',
                'producto_add' => 'Buscar Productos',
                'producto_edit' => 'Añadir Productos',
                'producto_delete' => 'Editar Productos',
                'producto_restaurar' => 'Enviar Productos a la Papelera',
                'producto_eliminar' => 'Restaurar Productos',
                'producto_galeria_add' => 'Eliminar Productos',
                'producto_galeria_delete' => 'Agregar imágenes a la galería',
                'producto_buscar' => 'Eliminar imágenes a la galería',
            ]
        ],

        'categoria' => [
            'icon' => '<i class="fas fa-folder-open"></i>',
            'title' => 'Módulo de Categorias',
            'permisos' => [
                'categoria' => 'Ver Categorías',
                'categoria_add' => 'Añadir Categorías',
                'categoria_edit' => 'Editar Categorías',
                'categoria_delete' => 'Eliminar Categorías',
            ]
        ],

        'usuarios' => [
            'icon' => '<i class="fas fa-user-friends"></i>',
            'title' => 'Módulo de Usuarios',
            'permisos' => [
                'usuarios' => 'Ver Usuarios',
                'usuarios_edit' => 'Editar Usuarios',
                'usuarios_banned' => 'Suspender Usuarios',
                'usuarios_permisos' => 'Editar Permisos',
            ]
        ],
        'config' => [
            'icon' => '<i class="fas fa-tools"></i>',
            'title' => 'Módulo de Configuraciones',
            'permisos' => [
                'config' => 'Ver Configuraciones',
            ]
        ],
        'ordenes' => [
            'icon' => '<i class="fas fa-clipboard-list"></i>',
            'title' => 'Módulo de Órdenes',
            'permisos' => [
                'ordenes' => 'Ver Órdenes',
            ]
        ],
        'slider' => [
            'icon' => '<i class="far fa-images"></i>',
            'title' => 'Módulo de Slider',
            'permisos' => [
                'slider' => 'Ver Slider',
                'slider_add' => 'Añadir Slider',
                'slider_edit' => 'Editar Slider',
                'slider_delete' => 'Eliminar Slider',
            ]
        ],
    ];

    return $p;
}

function getUserNace()
{
    $anno = date('Y');
    $em = $anno-18;
    $ev = $anno-70;
    $e = ($em + $ev)/2;

    $fm = $em."-01-01";
    $fv = $ev."-01-01";
    $fe = $e."-01-01";

    return [$fm, $fv, $fe];
}

function getIcono()
{
    $i = [
        '0' => 'fas fa-phone',
        '1' => 'fas fa-tablet',
        '2' => 'fas fa-wine-bottle',
        '3' => 'far fa-keyboard',
        '4' => 'far fa-keyboard',
        '5' => 'far fa-keyboard',
        '6' => 'far fa-keyboard',
        '7' => 'far fa-keyboard',
        '8' => 'far fa-keyboard',
        '9' => 'far fa-keyboard',
        '10' => 'far fa-keyboard',
        '11' => 'far fa-keyboard',
        '12' => 'far fa-keyboard',
       ];

    return $i;
}