<script type="text/javascript">
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

<div class="box-body">
  <div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
      <div class="box-header with-border">
        <h4 class="box-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
            Ver Motivo de Solitud
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
        <div class="box-body">
          {{$infoSoli[0]->solicitudServ}}
        </div>
      </div>
    </div>

    @if($mostrar_recepcion ==1)
    <div class="panel box box-primary">
      <div class="box-header with-border">
        <h4 class="box-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="false" class="collapsed">
            Ver Observación Unidad Informática
          </a>
        </h4>
      </div>
      <div id="collapseOne2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
        <div class="box-body">
          <p style="color:#3c8dbc;">Observación:</p>
          <p>{{$infoSoli[0]->obsSolServ}}</p>
          <p style="color:#3c8dbc;">Atentido por:</p>
          <p>{{$personal_informatica[0]->nombresFunc}} {{$personal_informatica[0]->paternoFunc}} {{$personal_informatica[0]->maternoFunc}}</p>
        </div>
      </div>
    </div>
    @endif
     <div class="panel box box-info">
      <div class="box-header with-border">
        <h4 class="box-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" class="collapsed">
           Ver Documentos Adjuntos
          </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
        <div class="box-body">
          @if (count($adjuntos)>0)
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

