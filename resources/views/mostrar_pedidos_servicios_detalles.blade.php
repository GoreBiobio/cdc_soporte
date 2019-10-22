<script type="text/javascript">

    jQuery(function($) {

    $( ".bs-wizard-step" ).addClass( "disabled" );
    var estado = '{{$infoSoli[0]->idEstado}}';

    if(estado == 15 || estado == 16 ||estado == 17 || estado == 18 || estado == 19){

        $( "#padso_1" ).removeClass( "disabled" );
        $( "#padso_1" ).addClass( "complete" );  
        
    }

    if(estado == 16 ||estado == 17 || estado == 18 || estado == 19){
        $( "#padso_2" ).removeClass( "disabled" );
        $( "#padso_2" ).addClass( "complete" ); 
    }

     if(estado == 17 || estado == 18 || estado == 19){
        $( "#padso_3" ).removeClass( "disabled" );
        $( "#padso_3" ).addClass( "complete" );     
    }

      if(estado == 18 || estado == 19){
        $( "#padso_4" ).removeClass( "disabled" );
        $( "#padso_4" ).addClass( "complete" );     
    }

    if(estado == 19){
        $( "#padso_5" ).removeClass( "disabled" );
        $( "#padso_5" ).addClass( "complete" );     
    }


    });
    function enviarEvaluacionServicio() {



        if ($('#obs').val() == '') {

            var x = function callback() {
                $('#formEvaluacionServicio').submit();

            }
            confirmar('Esta Seguro de enviar la evaluación sin Observación?', x);

        } else {
            var x = function callback() {
                $('#formEvaluacionServicio').submit();

            }
            confirmar('Esta Seguro de enviar la evaluación del Servicio?', x);

        }

    }


</script>
<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-lg-6">
                <div class="form-group">
                    <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">Servicio</label>
                    <label class="col-sm-9 col-xs-12">{{$infoSoli[0]->servicio}}</label>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6">
                <div class="form-group">
                    <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">Fecha</label>
                    <label class="col-sm-9 col-xs-12">{{ date('d-m-Y', strtotime($infoSoli[0]->fecCreaSolServ))}}</label>
                </div>
            </div>
            <div class="clearfix "></div>
            <div class="col-xs-12 col-lg-6">
                <div class="form-group">
                    <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">Hora</label>
                    <label class="col-sm-9 col-xs-12">{{ date('H:i', strtotime($infoSoli[0]->fecCreaSolServ))}}</label>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6">
                <div class="form-group">
                    <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">Estado </label>
                    <label class="col-sm-9 col-xs-12">{{$infoSoli[0]->nombreEstado}}</label>
                </div>
            </div>
            <div class="clearfix "></div>
        </div>
    </div>
</div>
   <div class="row">     
        
            <div class="row bs-wizard" style="border-bottom:0;">
                <div class="col-xs-1"></div>
                <div class="col-xs-2 bs-wizard-step " id="padso_1">
                  <div class="text-center bs-wizard-stepnum">1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Ingreso de Solicitud</div>
                </div>
                
                <div class="col-xs-2 bs-wizard-step " id="padso_2">
                  <div class="text-center bs-wizard-stepnum">2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Asignado a profesional Informática</div>
                </div>
                
                <div class="col-xs-2 bs-wizard-step " id="padso_3">
                  <div class="text-center bs-wizard-stepnum">3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center" id="padso_1">Soporte Realizado</div>
                </div>
                
                <div class="col-xs-2 bs-wizard-step " id="padso_4">
                  <div class="text-center bs-wizard-stepnum">4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Soporte Evaluado</div>
                </div>
                <div class="col-xs-2 bs-wizard-step " id="padso_5">
                  <div class="text-center bs-wizard-stepnum">5</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Soporte Archivado</div>
                </div>
                <div class="col-xs-1"></div>
            </div>
    </div>        
</div>


           
<div class="box-body">
  <div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
      <div class="box-header with-border">
        <h4 class="box-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
            <i class="fa fa-fw fa-commenting-o"></i> Ver Motivo de Solitud
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
        <div class="box-body">
          {{$infoSoli[0]->solicitudServ}}
        </div>
      </div>
    </div>
    <div class="panel box box-info">
      <div class="box-header with-border">
        <h4 class="box-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" class="collapsed">
           <i class="fa fa-fw fa-file-o"></i> Ver Documentos Adjuntos
          </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
        <div class="box-body">
          @if (isset($adjuntos) and count($adjuntos)>0)
            <div class="box">
                <div class="box-body">
                    adjuntos: 
                    @foreach ($adjuntos as $indexKey => $adjuntos)
                    <a href="/adjuntos/solicitudes/{{$adjuntos->rutaDoc}}" target="_blank">
                        <button class="btn btn-xs btn-primary"><i class="fa fa-file-o"></i>
                            {{$adjuntos->nombreDoc}}
                        </button>
                    </a>
                    @endforeach
                 </div>
            </div>
            @else
            <p>Solicitud sin adjuntos</p>      
             @endif
        </div>
      </div>
    </div>
    @if(isset($personal_informatica) and count($personal_informatica)>0)
    <div class="panel box box-primary">
      <div class="box-header with-border">
        <h4 class="box-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="false" class="collapsed">
            <i class="fa fa-fw fa-pencil-square-o"></i> Ver Observación Unidad Informática
          </a>
        </h4>
      </div>
      <div id="collapseOne2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
        <div class="box-body">
          <p style="color:#3c8dbc;">Observación:</p>
          <p>{{$infoSoli[0]->obsCierreSolServ}}</p>
          <p style="color:#3c8dbc;">Atentido por:</p>
          <p>{{$personal_informatica[0]->nombresFunc}} {{$personal_informatica[0]->paternoFunc}} {{$personal_informatica[0]->maternoFunc}}</p>
        </div>
      </div>
    </div>
    @endif
    @if(isset($evaluacion) and count($evaluacion)>0)
    <div class="panel box box-success">
      <div class="box-header with-border">
        <h4 class="box-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" class="collapsed">
            <i class="fa fa-fw fa-balance-scale"></i> Ver Evaluación a Solicitud
          </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
        <div class="box-body">
          <b>Calificación:</b>
          <p>{{$evaluacion[0]->nombreTev}}</p> 
          <b>Observacion:</b>
          @if($evaluacion[0]->obsEval != '')
          <p>{{$evaluacion[0]->obsEval}}</p> 
          @else
          <p>Sin Observación</p>
          @endif
        </div>
      </div>
    </div>
    @endif
  </div>
</div>


@if($mostrar_recepcion ==1)
    <form class="form-horizontal" action="enviaCalificacionServicio" method="post" id="formEvaluacionServicio">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="{{$infoSoli[0]->idSolServ}}">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-check-circle"></i> Calificar</h3>
                <div class="box-header margenb5 pull-right hidden-print">
                    <a onclick="enviarEvaluacionServicio();" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-send"></span> Enviar Calificación de la Solicitud y Resuelvo
                    </a>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <div class="col-sm-12">
                        <center><p><br><strong>Recuerde: </strong>Su calificación y observaciones son importantes para
                                nosotros.
                                <br>Unidad Informática - Gobierno Regional del Biobío &copy 2019</p></center>
                    </div>
                    <label class="col-sm-3 control-label">Calificación Soporte</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="tipo_evaluacion_servicio" id="tipo_evaluacion_servicio">
                            @foreach($tipos_evaluacion as $tipos_evaluacion)
                                <option value="{{$tipos_evaluacion->idTev}}">{{$tipos_evaluacion->nombreTev}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Observación al Soporte</label>

                    <div class="col-sm-8">
                        <textarea class="form-control" rows="3" name="obs" id="obs"></textarea>
                    </div>
                    <br><br>
                </div>
            </div>

        </div>
    </form>
@endif



<!-- /.box-header -->

