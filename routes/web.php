<?php
use App\Exports\ServicioExport;
use App\Exports\UsersExport;
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
//Route::get('notification', 'HomeController@notification');


route::get('/ingresar', 'pruebas@ingresar');
route::get('/seleccion', 'pruebas@seleccion');
route::get('/hola', 'pruebas@hola');
route::get('/pruebamodal', 'pruebas@mostrarAlgo');
route::get('/solicitaServicio', 'solicitud_servicio@solicitaServicio');
route::get('/solicitaSoporte', 'solicitudSoporte@solicitaSoporte');
route::post('/ingresaSolicitudServicio', 'solicitud_servicio@ingresaSolicitudServicio');
route::post('/validarPin', 'solicitud_servicio@validarPin');
route::get('/recepcionarSolicitud', 'solicitudSoporte@recepcionaSolicitud');
route::get('/recepcionarSolicitudServicio', 'solicitudSoporte@recepcionaSolicitudServicio');
route::post('/enviaCalificacion', 'solicitudSoporte@enviaCalificacion');
route::post('/enviaCalificacionServicio', 'solicitudSoporte@enviaCalificacionServicio');
route::get('/dinamicos', 'pruebas@dinamicos');
route::get('/prueba', 'pruebas@algo');
route::get('/salir', 'inicio@salir');
//route::post('/recibeRun', 'pruebas@validarExisteUsuario');

route::post('/recibeSolicitud', 'solicitudSoporte@ingresaSolicitud');
route::post('/anulaSolicitudSoporte', 'solicitudSoporte@anularSolicitud');
route::get('/verAsignado', 'solicitudSoporte@verAsignado');
route::post('/recibeSolicitudServicio', 'solicitudSoporte@enviaSolicitudServicio');
route::post('/anularSolicitudServicio', 'solicitudSoporte@anularSolicitudServicio');

route::get('/solicitudes', 'administrarSolicitudes@inicio');
route::post('/buscarSolicitud', 'administrarSolicitudes@buscaSolicitudes');
route::post('/admSolicitud', 'administrarSolicitudes@administar');
route::post('/enviaProfesional', 'administrarSolicitudes@asignarProdesional');





route::post('/recibeRun', 'inicio@recibirRut');
route::get('/recibeRun', 'pruebas@validarExisteUsuario');
route::get('/recibeRunInicio', 'inicio@volver_inicio');
route::get('/consulta_soportes_pedidos', 'inicio@mostrar_pedidos_soportes');
route::get('/consulta_soportes_terminados','inicio@mostrar_soportes_terminados');
route::get('/consulta_servicios_terminados','inicio@mostrar_servicios_terminados');
route::get('/verDetalleSoporte','inicio@verDetalleSoporte');
route::get('/verDetalleSoporteTerminado','inicio@verDetalleSoporteTerminado');
route::get('/verDetalleServicioTerminado','inicio@verDetalleServicioTerminado');
route::get('/consulta_servicios_pedidos', 'inicio@mostrar_pedidos_servicios');
route::get('/verDetalleSolicitudServicio', 'inicio@verDetalleSolicitudServicio');



/*inicio permisos*/
/*
route::get('/registrar_cometido', 'CometidosController@registrarCometido');
route::get('/cometido_funcional', 'CometidosController@cometidoFuncional');
route::get('/gestionar_cometido_funcional', 'CometidosController@gestionarCometidoFuncional');
route::get('/cargar_valor_cometido', 'CometidosController@cargarValorCometido');
route::get('/carga_provincia', 'CometidosController@carga_provincia');
route::get('/carga_provincia_seleccionada', 'CometidosController@carga_provincia_seleccionada');
route::get('/carga_comuna', 'CometidosController@carga_comuna');
route::get('/carga_comuna_seleccionada', 'CometidosController@carga_comuna_seleccionada');
route::get('/comprobar_viatico', 'CometidosController@comprobar_viatico');
route::get('/carga_valores', 'CometidosController@carga_valores');
route::post('/envia_viatico', 'CometidosController@envia_viatico');
route::get('/excel_cometidos', 'CometidosController@excel_cometidos');
route::get('cometido-pdf', 'CometidosController@pdf_cometido');
route::get('pdf_cometido_ver', 'CometidosController@pdf_cometido_ver');
route::get('consulta_cometido', 'CometidosController@consulta_cometido');
route::get('consulta_cometido_modal', 'CometidosController@consulta_cometido_modal');
route::get('consultar_cometido_modal', 'CometidosController@consultar_cometido_modal');
route::post('busca_cometidos','CometidosController@busca_cometidos');



route::get('/permisos', 'PermisosController@permisos');
route::get('/solicitar_permiso_administrativo', 'PermisosController@permiso_administrativo');
route::get('/solicitar_feriado_legal','PermisosController@registra_feriado');
route::post('/guarda_solicitud_feriado_legal','PermisosController@guardar_solicitud_feriado_legal');
route::post('/guarda_solicitud_permiso_administrativo','PermisosController@guardar_solicitud_permiso_administrativo');
route::get('/anular_solicitud_permiso_administrativo','PermisosController@anular_solicitud_permiso_administrativo');
route::get('/anular_solicitud_feriado_legal','PermisosController@anular_solicitud_feriado_legal');
route::get('/gestionar_solicitudes_permisos','PermisosController@gestionar_solicitudes_permisos');
route::get('/solicitar_descanso_complementario','PermisosController@solicitar_descanso_complementario');
route::post('/guarda_solicitud_descanso_complementario','PermisosController@guarda_solicitud_descanso_complementario');






route::get('/feriado_legal', 'PermisosController@feriado_legal');


/*fin permisos*/

*/
route::get('/descargar2', 'pruebas@excel')->name('export_excel.excel');


Route::get('/descargar', function () {
	//return Excel::download(new ServicioExport(17), 'servicio.xlsx');
	return (new ServicioExport(17))->download('servicio.xlsx');

});

Route::get('/marca', function () {
	$marca = App\marca::all(); 
	dd($marca);
});

Route::get('/marca/{id}', function ($id){
	$marcass = App\Marca::where('marcas_idMarca','=',$id)->get();
	dd($marcass);


	$result = User::join('contacts', 'users.id',   '=', 'contacts.user_id')
	->join('orders', 'users.id', '=', 'orders.user_id')
	->select('users.id', 'contacts.phone', 'orders.price')
	->get();
	});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

