<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\ConfigController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/admin')->group(function(){

    Route::get('/', [AdminController::class, 'getAdmin'])->name('inicio');

    //Configuraciones
    Route::get('/config', [ConfigController::class, 'getConfig'])->name('config');
    Route::post('/config', [ConfigController::class, 'postConfig'])->name('config');

    Route::get('/slider', [ConfigController::class, 'getSlider'])->name('slider');
    Route::post('/slider/add', [ConfigController::class, 'postSliderAdd'])->name('slider_add');
    Route::get('/slider//edit', [ConfigController::class, 'getSliderEdit'])->name('slider_edit');
    Route::get('/slider/{id}/delete', [ConfigController::class, 'getSliderDelete'])->name('slider_delete');


    Route::get('/ordenes', [OrdenesController::class, 'getOrdenes'])->name('ordenes');

    //Usuario
    Route::get('/users/{estado}', [UserController::class, 'getUsers'])->name('usuarios');
    Route::get('/users/{id}/edit', [UserController::class, 'getUsersEdit'])->name('usuarios_edit');
    Route::post('/users/{id}/edit', [UserController::class, 'postUsersEdit'])->name('usuarios_edit');
    Route::get('/users/{id}/banned', [UserController::class, 'getUsersBan'])->name('usuarios_banned');
    
    Route::get('/users/{id}/permisos', [UserController::class, 'getUsersPermisos'])->name('usuarios_permisos');
    Route::post('/users/{id}/permisos', [UserController::class, 'postUsersPermisos'])->name('usuarios_permisos');

    //Productos
    Route::get('/products/add', [ProductsController::class, 'getProductsAdd'])->name('producto_add');
    Route::post('/products/add', [ProductsController::class, 'postProductsAdd'])->name('producto_add');
    
    Route::get('/products/{id}/edit', [ProductsController::class, 'getProductsEdit'])->name('producto_edit');
    Route::post('/products/{id}/edit', [ProductsController::class, 'postProductsEdit'])->name('producto_edit');

    Route::get('/products/{id}/delete', [ProductsController::class, 'postProductsDelete'])->name('producto_delete');
    Route::get('/products/{id}/restaurar', [ProductsController::class, 'postProductsRestaurar'])->name('producto_restaurar');
    Route::get('/products/{id}/eliminar', [ProductsController::class, 'postProductsEliminar'])->name('producto_eliminar');

    Route::post('/products/{id}/galeria/add', [ProductsController::class, 'postProductsGaleriaAdd'])->name('producto_galeria_add');
    Route::get('/products/{id}/galeria/{gid}/delete', [ProductsController::class, 'postProductsGaleriaDelete'])->name('producto_galeria_delete');
    
    Route::post('/products/buscar', [ProductsController::class, 'postProductsBuscar'])->name('producto_buscar');

    Route::get('/products/{estado}', [ProductsController::class, 'getHome'])->name('productos');

    
    //Categorias
    Route::get('/categorias/{modulo}', [CategoriasController::class, 'getHome'])->name('categoria');
    Route::post('/categorias/add', [CategoriasController::class, 'postCategoryAdd'])->name('categoria_add');
    Route::get('/categorias/{id}/edit', [CategoriasController::class, 'getCategoryEdit'])->name('categoria_edit');
    Route::post('/categorias/{id}/edit', [CategoriasController::class, 'postCategoryEdit'])->name('categoria_edit');
    Route::get('/categorias/{id}/delete', [CategoriasController::class, 'postCategoryDelete'])->name('categoria_delete');


});

