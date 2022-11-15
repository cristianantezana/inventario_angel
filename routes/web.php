<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;
use App\Models\Persona;
use App\Models\Catalogo;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DevolucionController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\PromotorController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
use App\Models\Usuario;

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
Route::post('usuarios/login',[UsuarioController::class, 'login'] )->name('usuarios.login');
Route::get('/', function () {
    return view('panel');

});
/*Rutas Personas */
Route::get('personas/index',[PersonaController::class, 'index'])->name('personas.index');
Route::get('personas/create',[PersonaController::class, 'create'])->name('personas.create');
Route::post('personas/buscar',[PersonaController::class, 'buscar'])->name('personas.buscar');
Route::post('personas/store',[PersonaController::class, 'store'])->name('personas.store');
Route::get('personas/{id}/edit',[PersonaController::class, 'edit'])->name('personas.edit');
Route::put('personas/update/{id}',[PersonaController::class, 'update'])->name('personas.update');
Route::get('personas/{id}/show',[PersonaController::class, 'show'])->name('personas.show');
Route::delete('personas/destroy/{id}',[PersonaController::class, 'destroy'])->name('personas.destroy');

/*Rutas Catalogos */
Route::get('catalogos/index',[CatalogoController::class, 'index'])->name('catalogos.index');
Route::get('catalogos/create',[CatalogoController::class, 'create'])->name('catalogos.create');
Route::post('catalogos/store',[CatalogoController::class, 'store'])->name('catalogos.store');
Route::get('catalogos/{id}/edit',[CatalogoController::class, 'edit'])->name('catalogos.edit');
Route::put('catalogos/update',[CatalogoController::class, 'update'])->name('catalogos.update');
Route::get('catalogos/{id}/show',[CatalogoController::class, 'show'])->name('catalogos.show');
Route::get('catalogos/{id}/destroy',[CatalogoController::class, 'destroy'])->name('catalogos.destroy');

/*Rutas Categorias */
Route::get('categorias/index',[CategoriaController::class, 'pepe'])->name('categorias.index');
Route::get('categorias/create',[CategoriaController::class, 'create'])->name('categorias.create');
Route::post('categorias/store',[CategoriaController::class, 'store'])->name('categorias.store');
Route::get('categorias/{id}/edit',[CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('categorias/update',[CategoriaController::class, 'update'])->name('categorias.update');
Route::get('categorias/table',[CategoriaController::class, 'table'])->name('categorias.table');
Route::get('categorias/{id}/destroy',[CategoriaController::class, 'destroy'])->name('categorias.destroy');

/*Rutas Clientes */
Route::get('clientes/index',[ClienteController::class, 'index'])->name('clientes.index');
Route::get('clientes/create',[ClienteController::class, 'create'])->name('clientes.create');
Route::post('clientes/store',[ClienteController::class, 'store'])->name('clientes.store');
Route::get('clientes/{id}/edit',[ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/update',[ClienteController::class, 'update'])->name('clientes.update');
Route::get('clientes/{id}/show',[ClienteController::class, 'show'])->name('clientes.show');
Route::get('clientes/{id}/destroy',[ClienteController::class, 'destroy'])->name('clientes.destroy');

/*Rutas Compras */
Route::get('compras/index',[CompraController::class, 'index'])->name('compras.index');
Route::get('compras/create',[CompraController::class, 'create'])->name('compras.create');
Route::post('compras/store',[CompraController::class, 'store'])->name('compras.store');
Route::get('compras/{id}/edit',[CompraController::class, 'edit'])->name('compras.edit');
Route::put('compras/update',[CompraController::class, 'update'])->name('compras.update');
Route::get('compras/{id}/show',[CompraController::class, 'show'])->name('compras.show');
Route::get('compras/{id}/destroy',[CompraController::class, 'destroy'])->name('compras.destroy');

/*Rutas Devoluciones */
Route::get('devoluciones/index',[DevolucionController::class, 'index'])->name('devoluciones.index');
Route::get('devoluciones/create',[DevolucionController::class, 'create'])->name('devoluciones.create');
Route::post('devoluciones/store',[DevolucionController::class, 'store'])->name('devoluciones.store');
Route::get('devoluciones/{id}/edit',[DevolucionController::class, 'edit'])->name('devoluciones.edit');
Route::put('devoluciones/update',[DevolucionController::class, 'update'])->name('devoluciones.update');
Route::get('devoluciones/{id}/show',[DevolucionController::class, 'show'])->name('devoluciones.show');
Route::get('devoluciones/{id}/destroy',[DevolucionController::class, 'destroy'])->name('devoluciones.destroy');

/*Rutas Medidas */
Route::get('medidas/index',[MedidaController::class, 'index'])->name('medidas.index');
Route::get('medidas/create',[MedidaController::class, 'create'])->name('medidas.create');
Route::post('medidas/store',[MedidaController::class, 'store'])->name('medidas.store');
Route::get('medidas/{id}/edit',[MedidaController::class, 'edit'])->name('medidas.edit');
Route::put('medidas/update',[MedidaController::class, 'update'])->name('medidas.update');
Route::get('medidas/{id}/show',[MedidaController::class, 'show'])->name('medidas.show');
Route::get('medidas/{id}/destroy',[MedidaController::class, 'destroy'])->name('medidas.destroy');

/*Rutas Pedidos */
Route::get('pedidos/index',[PedidoController::class, 'index'])->name('pedidos.index');
Route::get('pedidos/create',[PedidoController::class, 'create'])->name('pedidos.create');
Route::post('pedidos/store',[PedidoController::class, 'store'])->name('pedidos.store');
Route::get('pedidos/{id}/edit',[PedidoController::class, 'edit'])->name('pedidos.edit');
Route::put('pedidos/update',[PedidoController::class, 'update'])->name('pedidos.update');
Route::get('pedidos/{id}/show',[PedidoController::class, 'show'])->name('pedidos.show');
Route::get('pedidos/{id}/destroy',[PedidoController::class, 'destroy'])->name('pedidos.destroy');

/*Rutas Presentaciones */
Route::get('presentaciones/index',[PresentacionController::class, 'index'])->name('presentaciones.index');
Route::get('presentaciones/create',[PresentacionController::class, 'create'])->name('presentaciones.create');
Route::post('presentaciones/store',[PresentacionController::class, 'store'])->name('presentaciones.store');
Route::get('presentaciones/{id}/edit',[PersonaController::class, 'edit'])->name('presentaciones.edit');
Route::put('presentaciones/update',[PresentacionController::class, 'update'])->name('presentaciones.update');
Route::get('presentaciones/{id}/show',[PresentacionController::class, 'show'])->name('presentaciones.show');
Route::get('presentaciones/{id}/destroy',[PresentacionController::class, 'destroy'])->name('presentaciones.destroy');

/*Rutas Productos */
Route::get('productos/index',[ProductoController::class, 'index'])->name('productos.index');
Route::get('productos/create',[ProductoController::class, 'create'])->name('productos.create');
Route::post('productos/store',[ProductoController::class, 'store'])->name('productos.store');
Route::get('productos/{id}/edit',[ProductoController::class, 'edit'])->name('productos.edit');
Route::put('productos/update',[ProductoController::class, 'update'])->name('productos.update');
Route::get('productos/{id}/show',[ProductoController::class, 'show'])->name('productos.show');
Route::get('productos/{id}/destroy',[ProductoController::class, 'destroy'])->name('productos.destroy');

/*Rutas Promociones */
Route::get('promociones/index',[PromocionController::class, 'index'])->name('promociones.index');
Route::get('promociones/create',[PromocionController::class, 'create'])->name('promociones.create');
Route::post('promociones/store',[PromocionController::class, 'store'])->name('promociones.store');
Route::get('promociones/{id}/edit',[PromocionController::class, 'edit'])->name('promociones.edit');
Route::put('promociones/update',[PromocionController::class, 'update'])->name('promociones.update');
Route::get('promociones/{id}/show',[PromocionController::class, 'show'])->name('promociones.show');
Route::get('promociones/{id}/destroy',[PromocionController::class, 'destroy'])->name('promociones.destroy');

/*Rutas Promotores */
Route::get('promotores/index',[PromotorController::class, 'index'])->name('promotores.index');
Route::get('promotores/create',[PromotorController::class, 'create'])->name('promotores.create');
Route::post('promotores/store',[PromotorController::class, 'store'])->name('promotores.store');
Route::get('promotores/{id}/edit',[PromotorController::class, 'edit'])->name('promotores.edit');
Route::put('promotores/update',[PromotorController::class, 'update'])->name('promotores.update');
Route::get('promotores/{id}/show',[PromotorController::class, 'show'])->name('promotores.show');
Route::get('promotores/{id}/destroy',[PromotorController::class, 'destroy'])->name('promotores.destroy');

/*Rutas Proveedores */
Route::get('proveedores/index',[ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('proveedores/create',[ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('proveedores/store',[ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('proveedores/{id}/edit',[ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('proveedores/update',[ProveedorController::class, 'update'])->name('proveedores.update');
Route::get('proveedores/{id}/show',[ProveedorController::class, 'show'])->name('proveedores.show');
Route::get('proveedores/{id}/destroy',[ProveedorController::class, 'destroy'])->name('proveedores.destroy');

/*Rutas Roles */
Route::get('roles/index',[RolController::class, 'index'])->name('roles.index');
Route::get('roles/create',[RolController::class, 'create'])->name('roles.create');
Route::post('roles/store',[RolController::class, 'store'])->name('roles.store');
Route::get('roles/{id}/edit',[RolController::class, 'edit'])->name('roles.edit');
Route::put('roles/update',[RolController::class, 'update'])->name('roles.update');
Route::get('roles/{id}/show',[RolController::class, 'show'])->name('roles.show');
Route::get('roles/{id}/destroy',[RolController::class, 'destroy'])->name('roles.destroy');

/*Rutas Usuarios */
Route::get('usuarios/index',[UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('usuarios/create',[UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('usuarios/store',[UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('usuarios/{id}/edit',[UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('usuarios/update',[UsuarioController::class, 'update'])->name('usuarios.update');
Route::get('usuarios/{id}/show',[UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('usuarios/{id}/destroy',[UsuarioController::class, 'destroy'])->name('usuarios.destroy');

/*Rutas Vehiculos */
Route::get('vehiculos/index',[VehiculoController::class, 'index'])->name('vehiculos.index');
Route::get('vehiculos/create',[VehiculoController::class, 'create'])->name('vehiculos.create');
Route::post('vehiculos/store',[VehiculoController::class, 'store'])->name('vehiculos.store');
Route::get('vehiculos/{id}/edit',[VehiculoController::class, 'edit'])->name('vehiculos.edit');
Route::put('vehiculos/update',[VehiculoController::class, 'update'])->name('vehiculos.update');
Route::get('vehiculos/{id}/show',[VehiculoController::class, 'show'])->name('vehiculos.show');
Route::get('vehiculos/{id}/destroy',[VehiculoController::class, 'destroy'])->name('vehiculos.destroy');
