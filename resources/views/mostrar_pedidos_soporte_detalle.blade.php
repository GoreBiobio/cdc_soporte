<script type="text/javascript">
    function enviarEvaluacion() {
        if ($('#obs').val() == '') {

            var x = function callback() {
                $('#formEvaluacion').submit();

            }
            confirmar('Esta Seguro de enviar la evaluación sin Observación?', x);

        } else {
            var x = function callback() {
                $('#formEvaluacion').submit();

            }
            confirmar('Esta Seguro de enviar la evaluación del Soporte?', x);

        }

    }


</script>


<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-lg-6">
                <div class="form-group">
                    <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">Marca</label>
                    <label class="col-sm-9 col-xs-12">{{$infoSoli[0]->marca}}</label>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6">
                <div class="form-group">
                    <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">Modelo</label>
                    <label class="col-sm-9 col-xs-12">{{$infoSoli[0]->modelo}}</label>
                </div>
            </div>
            <div class="clearfix "></div>
            <div class="col-xs-12 col-lg-6">
                <div class="form-group">
                    <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">N° de Serie</label>
                    <label class="col-sm-9 col-xs-12">{{$infoSoli[0]->numSerieHard}}</label>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6">
                <div class="form-group">
                    <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">Fecha - Hora</label>
                    <label class="col-sm-9 col-xs-12">{{ date('d-m-Y h:i:s', strtotime($infoSoli[0]->fecCreaSop))}}</label>
                </div>
            </div>
            <div class="clearfix "></div>
        </div>
    </div>

    <div class="box-body">
        <div class="box-group" id="accordion">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                           class="collapsed">
                            Ver Motivo de Solitud <i class="fa fa-flag-checkered"></i>
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        {{$infoSoli[0]->solicitudSop}}
                    </div>
                </div>
            </div>
        </div>
            <div class="panel box box-info">
      <div class="box-header with-border">
        <h4 class="box-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" class="collapsed">
            Documentos Adjuntos
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
<!-- /.box-header -->

@if($mostrar_recepcion ==1)
    <form class="form-horizontal" action="enviaCalificacion" method="post" id="formEvaluacion">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="{{$infoSoli[0]->idSolSop}}">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-check-circle"></i> Calificar</h3>
                <div class="box-header margenb5 pull-right hidden-print">
                    <a onclick="enviarEvaluacion();" class="btn btn-success btn-xs">
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
                        <select class="form-control" name="tipo_evaluacion" id="tipo_evaluacion">
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
<!-- /.box-body -->


