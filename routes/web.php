 <?php

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

//Estoy pasando a traves de la Url el nombre o el dato 'permiso/{nombre}' es obligatorio, con el signo ?'permiso/{nombre?}' es opcional
//asi con el 'PermisoController@index' estoy accediendo al nombre del controlador('PermisoController)anexando el metodo (@index')
//Route::get('permiso/{nombre}/{slug?}', 'PermisoController@index');
//Dando un nombre a la ruta para acceder al controlador
//Route::get('admin/sistema/permiso', 'PermisoController@index')->name('permiso');
//Dando un nombre a la ruta con una expresion Regular
/*Route::get('permiso/{nombre}/{id?}', function($nombre,$id=false){
    return $nombre.'-'.$id;
})->where( 'nombre','[A-Za-z]+')->where('id','[0-9]+')->name('permiso');*/

//Ruta Principal
Route::get('/','InicioController@index')->name('inicio');
Route::get('seguridad/login','Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login','Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout','Seguridad\LoginController@logout')->name('logout');
//Ruta de acceso del administrador por medio de grupos para poner prefijos
Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','superadmin']], function () {
    /*Seccion de la rutas Get de Usuarios*/
    Route::get('', 'AdminController@index');
    /*Seccion para la Rutas GET de admin/permiso */
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear-permiso');
    Route::get('permiso/guardar', 'PermisoController@guardar')->name('guardar-permiso');
    Route::get('permiso/mostrar', 'PermisoController@mostrar')->name('mostrar-permiso');
    Route::get('permiso/editar', 'PermisoController@editar')->name('editar-permiso');
    Route::get('permiso/actualizar', 'PermisoController@actualizar')->name('actualizar-permiso');
    Route::get('permiso/eliminar', 'PermisoController@eliminar')->name('eliminar-permiso');
    /*Seccion para la Rutas GET/POST de admin/menu */
    Route::get('menu', 'MenuController@index')->name('menu');  /*Seccion para la Ruta GET de admin/menu */
    Route::get('menu/crear', 'MenuController@crear')->name('crear-menu');
    Route::post('menu', 'MenuController@guardar')->name('guardar-menu');/*Seccion para la Ruta POST de admin/menu */
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar-orden');/*Ruta para guardar el orden del Menu para la Ruta POST admin/menu*/
    /*Seccion para las Rutas de ROL */
    Route::get('rol', 'RolController@index')->name('rol');  /*Seccion para la Ruta GET de admin/rol */
    Route::get('rol/crear', 'RolController@crear')->name('crear_rol');
    Route::post('rol', 'RolController@guardar')->name('guardar_rol');/*Seccion para la Ruta POST de admin/rol   */
    Route::get('rol/{id}/editar', 'RolController@editar')->name('editar_rol');
    Route::put('rol/{id}', 'RolController@actualizar')->name('actualizar_rol');
    Route::delete('rol/{id}','RolController@eliminar')->name('eliminar_rol');
    /*Seccion para las Rutas de Menu_Rol*/
    Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol');  /*Seccion para la Ruta GET de admin/rol */
    Route::post('menu-rol','MenuRolController@guardar')->name('guardar_menu_rol');/*Seccion para la Ruta POST de admin/rol   */
});


