<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DB;
use App\solicitud_servicio;
use App\solicitudsoportes;

class solicitudSoporte extends Controller
{

    public function solicitaSoporte(Request $request){
    $id_func = $request->input("id_func");  
    $id_hard = $request->input("id_hard");
        return view('vistasSolicitudesSoporte.ingresaSoporte',[
        'id_func'=>$id_func,
        'id_hard'=>$id_hard]);


    }

    public function ingresaSolicitud(Request $request)
    {

    	$fecha = new DateTime;

    	$soporte = $request->input("soporte");
    	$criticidad = $request->input("criticidad");
    	$id_hard = $request->input("id_hard");
    	$id_func = $request->input("id_usuario");
    	$algo = "1";
    	$estadoSop = "15";

      $solicitud_soporte = new solicitudsoportes;

      $solicitud_soporte->fecCreaSop = $fecha;
      $solicitud_soporte->solicitudSop = $soporte;
      $solicitud_soporte->hardSop = $id_hard;
      $solicitud_soporte->tipoSopD = $algo;
      $solicitud_soporte->estadoCritSop = $criticidad;
      $solicitud_soporte->estadoSop=$estadoSop;
      $solicitud_soporte->funcSolicSop=$id_func;
      $solicitud_soporte->tipoSopB='Pendiente';
      $solicitud_soporte->tipoSopC='Pendiente';

      $solicitud_soporte->save();

      $ultimoIngresado = $solicitud_soporte->id; 
      $tipo = 'soporte';
      $annio = date("Y");
      $file = $request->file('file_soporte');
      


      if(isset($file)){
        
        foreach ($file as $key => $value) {
        $nombre = $file[$key]->getClientOriginalName();
        $archivo = $file[$key];
        $adjunto = $annio . '-' . $tipo . '-' . time() . '-' . $nombre;
         DB::table('documentos')->insert([
              'nombreDoc' => $nombre,
              'fecCargaDoc' => $fecha,
              'rutaDoc' => $adjunto,
              'nivelDoc' => $tipo,
              'subnivelDoc' => $ultimoIngresado,
              'funcEntregaDoc'=>$id_func
          ]); 

          \Storage::disk('local')->put($adjunto,  \File::get($archivo));
        } 

      }

       session()->put('success','Se ha ingresado su solicitud con exito.');
       return back();      
        $id_func = $id_func;
        $datos = datosFuncionariosId($id_func);
        $datosHard = datosHard($id_func);
        $pedidos = retornaSolicitudes($id_func);
        $tiposServ = retornaTiposServicios();
        $pedidoServicios = buscarSolicitudesServicios($id_func);

          return view('vistasSolicitudesSoporte.listadoHard',
            ['datosUsuario'=> $datos,
             'datosHard'=>$datosHard,
             'datosSolicitudes'=>$pedidos,
             'tiposServicios'=>$tiposServ,
             'pedidoServicios'=>$pedidoServicios,
             'id_usuario'=>$id_func
        ]);
    }
    public function anularSolicitud(Request $request)
    {
        $id_anula = $request->input("id_anula");
        $id_func = $request->input("idFunc");
        $estado=20;
          DB::table('solicitudsoportes')
          ->where('idSolSop', '=',$id_anula)
          ->update(['estadoSop' => $estado]);
        session()->put('success','Se ha anulado la solicitud.');
        return back();

        $datos = datosFuncionariosId($id_func);
        $datosHard = datosHard($id_func);
        $pedidos = retornaSolicitudes($id_func);
        $tiposServ = retornaTiposServicios();
        $pedidoServicios = buscarSolicitudesServicios($id_func);   
        session()->put('success','Se ha anulado la solicitud.');
              return view('vistasSolicitudesSoporte.listadoHard',
                ['datosUsuario'=> $datos,
                 'datosHard'=>$datosHard,
                 'datosSolicitudes'=>$pedidos,
                 'tiposServicios'=>$tiposServ,
                 'pedidoServicios'=>$pedidoServicios,
                 'id_usuario'=>$id_func
            ]);  

    }

    public function enviaSolicitudServicio_antigua(Request $request)
    {
          //dd($_POST);
          $indice = $request->input("indice");
          $fecha = new DateTime;

          $servicio = $request->input("servicio".$indice);
          $criticidad = $request->input("criticidadServ".$indice);
          $id_serv = $request->input("idserv".$indice);
          $id_func = $request->input("idFunc");
          $estadoSolServ = "1";
          DB::table('solicitud_servicio')->insert([
                'fecCreaSolServ' => $fecha,
                'solicitudServ' => $servicio,
                'idServ' => $id_serv,
                'estadoCritSolServ' => $criticidad,
                'estadoSolServ' => $estadoSolServ,
                'funcSolServ'=>$id_func
            ]);


        $id_func = $id_func;
        $datos = datosFuncionariosId($id_func);
        $datosHard = datosHard($id_func);
        $pedidos = retornaSolicitudes($id_func);
        $tiposServ = retornaTiposServicios();
        $pedidoServicios = buscarSolicitudesServicios($id_func);
        session()->put('success','Se ha ingresado su solicitud con exito.');
              return view('vistasSolicitudesSoporte.listadoHard',
                ['datosUsuario'=> $datos,
                 'datosHard'=>$datosHard,
                 'datosSolicitudes'=>$pedidos,
                 'tiposServicios'=>$tiposServ,
                 'pedidoServicios'=>$pedidoServicios,
                 'id_usuario'=>$id_func
            ]);


    }

    public function enviaSolicitudServicio(Request $request)
    {

          $fecha = new DateTime;

          $servicio = $request->input("motivo_solicitud_servicio");
          $criticidad = $request->input("criticidad");
          $id_serv = $request->input("id_servicio");
          $id_func = $request->input("id_usuario");
          $estadoSolServ = "15";
          
          $solicitud = new solicitud_servicio;
          $solicitud->fecCreaSolServ = $fecha;
          $solicitud->solicitudServ = $servicio;
          $solicitud->idServ = $id_serv;
          $solicitud->estadoCritSolServ = $criticidad;
          $solicitud->estadoSolServ = $estadoSolServ;
          $solicitud->funcSolServ=$id_func;

          $solicitud->save();
      
          $ultimoIngresado = $solicitud->id; 
          $tipo = 'servicio';
          $annio = date("Y");
          $file = $request->file('file');

          if(isset($file)){

              foreach ($file as $key => $value) {
              $nombre = $file[$key]->getClientOriginalName();
              $archivo = $file[$key];
              $adjunto = $annio . '-' . $tipo . '-' . time() . '-' . $nombre;
               DB::table('documentos')->insert([
                    'nombreDoc' => $nombre,
                    'fecCargaDoc' => $fecha,
                    'rutaDoc' => $adjunto,
                    'nivelDoc' => $tipo,
                    'subnivelDoc' => $ultimoIngresado,
                    'funcEntregaDoc'=>$id_func
                ]); 

                \Storage::disk('local')->put($adjunto,  \File::get($archivo));
            } 

          }
        session()->put('success','Se ha ingresado su solicitud con exito.');
        return back(); 
        $id_func = $id_func;
        $datos = datosFuncionariosId($id_func);
        $datosHard = datosHard($id_func);
        $pedidos = retornaSolicitudes($id_func);
        $tiposServ = retornaTiposServicios();
        $pedidoServicios = buscarSolicitudesServicios($id_func);
        session()->put('success','Se ha ingresado su solicitud de servicio con exito.');
              return view('vistasSolicitudesSoporte.listadoHard',
                ['datosUsuario'=> $datos,
                 'datosHard'=>$datosHard,
                 'datosSolicitudes'=>$pedidos,
                 'tiposServicios'=>$tiposServ,
                 'pedidoServicios'=>$pedidoServicios,
                 'id_usuario'=>$id_func
            ]);
    }

  public function anularSolicitudServicio(Request $request)
    {

        $id_anula = $request->input("id_anula_servicio");
        $id_func = $request->input("idFunc");
        $estado=20;
          DB::table('solicitud_servicio')
          ->where('idSolServ', '=',$id_anula)
          ->update(['estadoSolServ' => $estado]);
        session()->put('success','Se ha anulado su solicitud con exito.');
        return back();
        $datos = datosFuncionariosId($id_func);
        $datosHard = datosHard($id_func);
        $pedidos = retornaSolicitudes($id_func);
        $tiposServ = retornaTiposServicios();
        $pedidoServicios = buscarSolicitudesServicios($id_func);  

              return view('vistasSolicitudesSoporte.listadoHard',
                ['datosUsuario'=> $datos,
                 'datosHard'=>$datosHard,
                 'datosSolicitudes'=>$pedidos,
                 'tiposServicios'=>$tiposServ,
                 'pedidoServicios'=>$pedidoServicios,
                 'id_usuario'=>$id_func
            ]); 

    }

    public function recepcionaSolicitud(Request $request){

      $idFunc = $request->input("id_funcionario");
      $idSop = $request->input("id_solicitud");
      $mostrar_recepcion = 1;
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
        $tipos_evaluacion = DB::table('tipos_evaluacion')
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
            'tipos_evaluacion'=>$tipos_evaluacion,
            'adjuntos'=>$adjuntos
          ]);

    }

    public function recepcionaSolicitudServicio(Request $request){



      $idFunc = $request->input("id_funcionario");
      $idServ = $request->input("id_solicitud");
 
      $mostrar_recepcion = 1;
      $pedidos = DB::table('solicitud_servicio')
            ->select('*')
            ->join('servicio', 'servicio.idServ', '=', 'solicitud_servicio.idServ')
            ->join('funcionarios', 'funcionarios.idFunc', '=', 'solicitud_servicio.funcSolServ')
            ->join('estados', 'estados.idEstado', '=', 'solicitud_servicio.estadoSolServ')
            ->where([
                ['solicitud_servicio.funcSolServ','=',$idFunc],
                ['solicitud_servicio.idSolServ','=',$idServ]
            ])
          ->get();
        
        $tipos_evaluacion = DB::table('tipos_evaluacion')
        ->get();

        $adjuntos =  DB::table('documentos')
         ->where([
                ['subnivelDoc','=',$idServ],
                ['nivelDoc','=','servicio']
            ])
         ->get();
         return view('mostrar_pedidos_servicios_detalles',[
            'infoSoli'=>$pedidos,
            'mostrar_recepcion'=>$mostrar_recepcion,
            'tipos_evaluacion'=>$tipos_evaluacion,
            'adjuntos'=>$adjuntos
          ]);

    }

    public function enviaCalificacion(Request $request){
      $fecha = new DateTime;
      $idSop = $request->input("id");
      $tipo_evaluacion = $request->input("tipo_evaluacion");
      $obs = $request->input("obs");
      DB::table('solicitudsoportes')
      ->where('idSolSop', '=',$idSop)
      ->update(['estadoSop' => '18']);

      DB::table('evaluaciones_soportes')->insert([
        'calificacionEval' => $tipo_evaluacion,
        'obsEval' => $obs,
        'fechaEval' => $fecha,
        'idSolSop' => $idSop,
        'tipoEval' =>'soporte'
      ]);
      session()->put('success','Se ha evaluado su solicitud con exito.');
      return back();   

    }


    public function enviaCalificacionServicio(Request $request){

      $fecha = new DateTime;
      $idSop = $request->input("id");
      $tipo_evaluacion = $request->input("tipo_evaluacion_servicio");
      $obs = $request->input("obs");
      DB::table('solicitud_servicio')
      ->where('idSolServ', '=',$idSop)
      ->update(['estadoSolServ' => '18']);

      DB::table('evaluaciones_soportes')->insert([
        'calificacionEval' => $tipo_evaluacion,
        'obsEval' => $obs,
        'fechaEval' => $fecha,
        'idSolSop' => $idSop,
        'tipoEval' =>'servicio'
      ]);
      session()->put('success','Se ha evaluado su solicitud con exito.');
      return back();   

    }

    public function verAsignado(Request $request){
       $idFunc = $request->input("id_func");
       $pedidos = DB::table('funcionarios')
            ->select('*')
            ->where([
                ['idFunc','=',$idFunc]
            ])
          ->get();
       echo "<h2 style='color: rgb(60, 141, 188);'>".$pedidos[0]->nombresFunc." ".$pedidos[0]->paternoFunc." ".$pedidos[0]->maternoFunc."</h2>";   

    }
    
  }

  function datosFuncionariosId ($id_func){

  $datos = DB::table('funcionarios')
             ->select('*')
             ->join('departamentos','departamentos.idDepto','=','funcionarios.departamentos_idDepto')
             ->join('divisiones','divisiones.idDiv','=','departamentos.divisiones_idDiv')
             ->where('idFunc', '=', $id_func)
             ->get();
  return $datos;          

}

function datosHard($id_func){

  $datosHard = DB::table('funcionarios')
  ->join('comodatos', 'funcionarios.idFunc', '=', 'comodatos.funcRecibeComod')
  ->join('hardwares', 'hardwares.idHard', '=', 'comodatos.hardwares_idHard')
  ->join('modelos','modelos.idModelo','=','hardwares.modelos_idModelo')
  ->join('marcas','marcas.idMarca','=','modelos.marcas_idMarca')
  ->where([
      ['idFunc','=',$id_func],
      ['estadoComod','Activo']
  ])
->get();
return $datosHard;
}

function retornaSolicitudes($id_func){
  $pedidos = DB::table('solicitudsoportes')
            ->select('*')
            ->join('hardwares', 'hardwares.idHard', '=', 'solicitudsoportes.hardSop')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->where([
                ['funcSolicSop','=',$id_func]
            ])
          ->get();
  return $pedidos;

}
function retornaTiposServicios(){

  $tiposServicios= DB::table('servicio')
            ->select('idServ','servicio')
          ->get();
  return $tiposServicios;        
}

function buscarSolicitudesServicios($id_func){

    $soliServicios = DB::table('solicitud_servicio')
            ->select('*')
            ->join('servicio', 'servicio.idServ', '=', 'solicitud_servicio.idServ')
            ->where([
                ['funcSolServ','=',$id_func]
            ])
          ->get();  
      
  return $soliServicios;        
}



