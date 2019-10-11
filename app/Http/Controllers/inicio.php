<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
session_start();
class inicio extends Controller
{
    public function recibirRut(Request $request)
    {	
    	$rut = $request->input("rut");
	    $datos = DB::table('funcionarios')
	     ->select('*')
	     ->where('rutFunc', '=', $rut)
	     ->get();

	     if(count($datos) == 0){
	     	 $rutinvalido = 1;
            return view('vistasSolicitudesSoporte.ingresar',
                ['rutIngresado' =>$rut,
                 'rutinvalido' => $rutinvalido
            ]);
	     }else{
			    
		    	$_SESSION["rut"]=$rut;
		    	$numero_solicitudes = cargar_datos($rut);
                $_SESSION["id_usuario"]=$numero_solicitudes[0];
    		return view('inicio',[
    		'soportes' => $numero_solicitudes[1],
    		'id'=>$numero_solicitudes[0],
            'incidencias'=>$numero_solicitudes[6],
    		'soportes_terminados'=> $numero_solicitudes[2],
    		'soportes_pendientes'=> $numero_solicitudes[3],
            'servicios_pendientes'=>$numero_solicitudes[4],
            'servicios_terminados'=>$numero_solicitudes[5]
    	]);
	     }
    }

    public function salir(){
        
        session_destroy();
        $rut = '';
        $rutinvalido = '';
        return view('vistasSolicitudesSoporte.ingresar',
                ['rutIngresado' =>$rut,
                 'rutinvalido' => $rutinvalido
            ]);
    }

    public function volver_inicio(Request $request)
    {	

    	
        $rut = $_SESSION['rut'];
    	$numero_solicitudes = cargar_datos($rut);
    	return view('inicio',[
    		'soportes' => $numero_solicitudes[1],
    		'id'=>$numero_solicitudes[0],
            'incidencias'=>$numero_solicitudes[6],
    		'soportes_terminados'=> $numero_solicitudes[2],
    		'soportes_pendientes'=> $numero_solicitudes[3],
             'servicios_pendientes'=>$numero_solicitudes[4],
            'servicios_terminados'=>$numero_solicitudes[5]
    	]);
    }

     public function mostrar_pedidos_soportes(Request $request)
    {	
    	
    	$id = $request->input("id");
    	$pedidos = DB::table('solicitudsoportes')
            ->select('*')
            ->join('hardwares', 'hardwares.idHard', '=', 'solicitudsoportes.hardSop')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcSolicSop')
            ->join('estados', 'estados.idEstado', '=', 'solicitudsoportes.estadoSop')
            ->where([['idFunc','=',$id ],['estadoSop','15']])
            ->orWhere([['idFunc', $id],['estadoSop','16']])
            ->orWhere([['idFunc', $id],['estadoSop','17']])
          ->get();
    	
          return view('mostrar_pedidos_soporte',[
          	'datosSolicitudes'=>$pedidos
          ]);


    }

    public function verDetalleSoporte(Request $request){
    	$mostrar_recepcion = 0;
    	$idFunc = $request->input("idFunc");
    	$idSop = $request->input("idSop");
    	 $pedidos = DB::table('solicitudsoportes')
            ->select('idSolSop','fecCreaSop','solicitudSop','numSerieHard','modelo','marca')
            ->join('hardwares', 'hardwares.idHard', '=', 'solicitudsoportes.hardSop')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcSolicSop')
            ->where([
                ['idFunc','=',$idFunc],
                ['idSolSop','=',$idSop]
            ])
          ->get(); 


         $adjuntos =  DB::table('documentos')
         ->where([
                ['subnivelDoc','=',$idSop],
                ['nivelDoc','=','soporte']
            ])
         ->get();
         return view('mostrar_pedidos_soporte_detalle',[
          	'infoSoli'=>$pedidos,
          	'mostrar_recepcion'=>$mostrar_recepcion,
            'adjuntos'=>$adjuntos
          ]);


    }
        public function verDetalleSoporteTerminado(Request $request){

    	$idFunc = $request->input("idFunc");
    	$idSop = $request->input("idSop");
    	$pedidos = DB::table('solicitudsoportes')
            ->select('solicitudsoportes.idSolSop','fecCreaSop','solicitudSop','numSerieHard','modelo','marca','nombreTev','obsEval','obsSoftSop')
            ->join('hardwares', 'hardwares.idHard', '=', 'solicitudsoportes.hardSop')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcSolicSop')
            ->join('evaluaciones_soportes', 'evaluaciones_soportes.idSolSop', '=' ,'solicitudsoportes.idSolSop')
            ->join('tipos_evaluacion', 'tipos_evaluacion.idTev', '=' ,'evaluaciones_soportes.calificacionEval')
            ->where([
                ['solicitudsoportes.funcSolicSop','=',$idFunc],
                ['solicitudsoportes.idSolSop','=',$idSop],
                ['evaluaciones_soportes.tipoEval','=','soporte']
            ])
          ->get(); 
        $personal_informatica = DB::table('solicitudsoportes')
        ->select('nombresFunc','paternoFunc','maternoFunc','anexoFunc')
        ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcRespoSop')
        ->where([['solicitudsoportes.idSolSop','=',$idSop]])
        ->get();    
         return view('mostrar_soportes_terminados_detalle',[
          	'infoSoli'=>$pedidos,
            'personal_informatica'=>$personal_informatica
          ]);


    }


    public function verDetalleServicioTerminado(Request $request){
        
        $idFunc = $request->input("idFunc");
        $idServ = $request->input("idServ");
        $pedidos = DB::table('solicitud_servicio')
            ->select('*')
            ->join('servicio', 'servicio.idServ', '=', 'solicitud_servicio.idServ')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->join('evaluaciones_soportes', 'evaluaciones_soportes.idSolSop', '=' ,'solicitud_servicio.idSolServ')
            ->join('tipos_evaluacion', 'tipos_evaluacion.idTev', '=' ,'evaluaciones_soportes.calificacionEval')
            ->join('estados','estados.idEstado', '=' ,'solicitud_servicio.estadoSolServ')
            ->where([
                ['solicitud_servicio.funcSolServ','=',$idFunc],
                ['solicitud_servicio.idSolServ','=',$idServ],
                ['evaluaciones_soportes.tipoEval','=','servicio']
            ])
          ->get(); 

        $adjuntos =  DB::table('documentos')
         ->where([
                ['subnivelDoc','=',$idServ],
                ['nivelDoc','=','servicio']
            ])
         ->get();
 
        
        $personal_informatica = DB::table('solicitud_servicio')
        ->select('nombresFunc','paternoFunc','maternoFunc','anexoFunc')
        ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcRespoSolServ')
        ->where([['solicitud_servicio.idSolServ','=',$idServ]])
        ->get();   
         return view('mostrar_pedidos_servicios_detalles',[
            'infoSoli'=>$pedidos,
            'mostrar_recepcion'=>'0',
            'adjuntos'=>$adjuntos,
            'personal_informatica'=>$personal_informatica
          ]);


    }


    public function mostrar_soportes_terminados(Request $request)
    {	
    	$id = $request->input('id');
    	$evaluados = DB::table('solicitudsoportes')
            ->select('*')
            ->join('hardwares', 'hardwares.idHard', '=', 'solicitudsoportes.hardSop')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcSolicSop')
            ->where([['idFunc','=',$id ],['estadoSop','18']])
            ->orWhere([['funcSolicSop', $id],['estadoSop','19']])
            ->get();
         
         return view('mostrar_soportes_terminados',[
          	'datosSolicitudes'=>$evaluados
          ]);
    }


    public function mostrar_servicios_terminados(Request $request)
    { 

        $id = $request->input("id");
        $pedidos = DB::table('solicitud_servicio')
            ->select('*')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->join('estados', 'estados.idEstado', '=', 'solicitud_servicio.estadoSolServ')
            ->join('servicio','servicio.idServ','=','solicitud_servicio.idServ')
            ->where([['funcSolServ','=',$id ],['estadoSolServ','18']])
            ->orWhere([['funcSolServ', $id],['estadoSolServ','19']])
          ->get();
        

          return view('mostrar_servicios_terminados',[
            'datosSolicitudes'=>$pedidos
          ]);


    }

    public function mostrar_pedidos_servicios(Request $request)
    {   
        
        $id = $request->input("id");
        $pedidos = DB::table('solicitud_servicio')
            ->select('*')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->join('estados', 'estados.idEstado', '=', 'solicitud_servicio.estadoSolServ')
            ->join('servicio','servicio.idServ','=','solicitud_servicio.idServ')
            ->where([['funcSolServ','=',$id ],['estadoSolServ','15']])
            ->orWhere([['funcSolServ', $id],['estadoSolServ','16']])
            ->orWhere([['funcSolServ', $id],['estadoSolServ','17']])
          ->get();
          return view('mostrar_pedidos_servicios',[
            'datosSolicitudes'=>$pedidos
          ]);


    }

        public function verDetalleSolicitudServicio(Request $request){

        $id_funcionario = $_SESSION["id_usuario"];
        $mostrar_recepcion = 0;
        $idFunc = $request->input("idFunc");
        $idSolServ = $request->input("idSolServ");
        $pedidos = DB::table('solicitud_servicio')
            ->select('*')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->join('servicio','servicio.idServ','=','solicitud_servicio.idServ')
            ->join('estados','estados.idEstado','=','solicitud_servicio.estadoSolServ')
            ->where([
                ['idFunc','=',$id_funcionario],
                ['idSolServ','=',$idSolServ]
            ])
          ->get(); 

         $adjuntos =  DB::table('documentos')
         ->where([
                ['subnivelDoc','=',$idSolServ],
                ['nivelDoc','=','servicio']
            ])
         ->get();

        $personal_informatica = DB::table('solicitud_servicio')
        ->select('nombresFunc','paternoFunc','maternoFunc','anexoFunc')
        ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcRespoSolServ')
        ->where([['solicitud_servicio.idSolServ','=',$idSolServ]])
        ->get();
        
         return view('mostrar_pedidos_servicios_detalles',[
            'infoSoli'=>$pedidos,
            'mostrar_recepcion'=>$mostrar_recepcion,
            'adjuntos'=>$adjuntos,
            'personal_informatica'=>$personal_informatica
          ]);


    }
       

}

     function cargar_datos($rut){
     	$arrayDatos = array();
     	$datos = DB::table('funcionarios')
	     ->select('idFunc')
	     ->where('rutFunc', '=', $rut)
	     ->get();
    	$user = DB::table('funcionarios')->where('rutFunc', $rut)->first();
    	$idFunc = $user->idFunc;
    	$solicitudes = DB::table('solicitudsoportes')->where([['funcSolicSop', $idFunc],['estadoSop',1]])->count();
    	$solicitudes_pendientes = DB::table('solicitudsoportes')
        ->where([['funcSolicSop', $idFunc],['estadoSop','15']])
        ->orWhere([['funcSolicSop', $idFunc],['estadoSop','16']])
        ->orWhere([['funcSolicSop', $idFunc],['estadoSop','17']])
        ->count();
    	$solicitudes_terminadas = DB::table('solicitudsoportes')
        ->where([['funcSolicSop', $idFunc],['estadoSop','18']])
        ->orWhere([['funcSolicSop', $idFunc],['estadoSop','19']])
        ->count();

        $servicios_pendientes = DB::table('solicitud_servicio')
        ->where([['funcSolServ', $idFunc],['estadoSolServ','15']])
        ->orWhere([['funcSolServ', $idFunc],['estadoSolServ','16']])
        ->orWhere([['funcSolServ', $idFunc],['estadoSolServ','17']])
        ->count();

        $servicios_terminados = DB::table('solicitud_servicio')
        ->where([['funcSolServ', $idFunc],['estadoSolServ','18']])
        ->orWhere([['funcSolServ', $idFunc],['estadoSolServ','19']])
        ->count();

        $mostrar_incidencias = DB::table('incidencias')
        ->select('*')
        ->join('sistema', 'sistema.id_sis', '=', 'incidencias.servAfectado')
        ->where('publicaIncid', '=', '1')
        ->get();
    	array_push($arrayDatos,$idFunc,$solicitudes,$solicitudes_terminadas,$solicitudes_pendientes,$servicios_pendientes,$servicios_terminados,$mostrar_incidencias);
    	return $arrayDatos;
    }


    function cargar_datos_pedidos($id){

    	$pedidos = DB::table('solicitudsoportes')
            ->select('*')
            ->join('hardwares', 'hardwares.idHard', '=', 'solicitudsoportes.hardSop')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitudsoportes.funcSolicSop')
            ->where([
                ['idFunc','=',$id ]
            ])
          ->get();
        return $pedidos;
}