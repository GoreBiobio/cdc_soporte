@extends('adminlte::layouts.app')
@section('htmlheader_title')
@section('contentheader_title', 'Consola de Solicitudes de Soportes')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <script type="text/javascript">

        function enviarSolicitud(indice) {
            var x = function callback() {
                var soporte = $("#soporte" + indice).val();
                if (soporte != '') {
                    $("#indice").val(indice);
                    $("#equipo").submit();
                    return;
                } else {
                    makeGritter("Advertencia", "Debe ingresar un Motivo", "warning");

                }

            }
            confirmar('Esta Seguro de enviar Solicitud Soporte?', x);
        }

        function alunarSolicitudServicio(indice) {

            var x = function callback() {
                $('#equipo').attr('action', 'anularSolicitudServicio');
                $("#id_anula_servicio").val(indice);
                $("#equipo").submit();
            }
            confirmar('Esta Seguro de anular solicitud de servicio?', x);
        }

        function enviarSolicitudServicio(indiceServ) {
            var x = function callback() {
                var servicio = $("#servicio" + indiceServ).val();
                if (servicio != '') {
                    $("#indice").val(indiceServ);
                    $('#equipo').attr('action', 'recibeSolicitudServicio');
                    $("#equipo").submit();

                } else {
                    $.notify("Debe Ingresar Motivo", "warn");
                }

            }
            confirmar('Esta Seguro de enviar Solicitud Servicio?', x);
        }


          function actualizar(){location.reload(true);}
//Función para actualizar cada 4 segundos(4000 milisegundos)
             setInterval("actualizar()",600000);

    </script>

    <div class='notifications bottom-right'></div>

 <div class="callout {{$color}}">
    <h4><i class="icon fa {{$icono}}"></i> Incidencias Activas de Informática</h4>
    <p class="text-primary" style="color:#fbffff;">
        <marquee behavior="Slide" direction="left">
           @if($bien == "1")
              <i class="fa fa-fw fa-check-circle"></i>{{$incidencias[0]->descIncid}} [{{$hoy}}]
           @else
            @foreach ($incidencias as $indexKey => $incidencia)<i class="fa fa-exclamation"></i> {{$incidencia->nombre_sis}}
            [{{ date('d-m-Y', strtotime($incidencia->fecIncid)) }}] : {{$incidencia->descIncid}}
            @endforeach
            @endif
            </marquee>
    </p>
</div>



    <form class="form-horizontal noenter" name="equipo" id="equipo" method="post" action="recibeSolicitud">
        {{ csrf_field() }}
        <input type="hidden" name="indice" id="indice">
        <input type="hidden" name="idFunc" value="{{$datosUsuario[0]->idFunc}}">
        <input type="hidden" name="id_anula" id="id_anula">
        <input type="hidden" name="id_anula_servicio" id="id_anula_servicio">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user-circle-o"></i> Antecedentes del Funcionario</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @foreach ($datosUsuario as $datosUsuario)
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">RUT</label>
                                        <label class="col-sm-7 col-xs-12">{{$datosUsuario->rutFunc}} </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">NOMBRE</label>
                                        <label class="col-sm-9 col-xs-12">{{$datosUsuario->nombresFunc}}  {{$datosUsuario->paternoFunc}} {{$datosUsuario->maternoFunc}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">ANEXO</label>
                                        <label class="col-sm-9 col-xs-12">{{$datosUsuario->anexoFunc}}</label>
                                    </div>
                                </div>
                                <div class="clearfix "></div>
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">DEPTO / UNIDAD</label>
                                        <label class="col-sm-9 col-xs-12">{{$datosUsuario->departamento}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">DIVISIÓN</label>
                                        <label class="col-sm-9 col-xs-12">{{$datosUsuario->division}}</label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-xs-12 " style="color:#3c8dbc;">ESTAMENTO</label>
                                        <label class="col-sm-9 col-xs-12"></label>
                                    </div>
                                </div>
                                <div class="clearfix "></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <!-- DIRECT CHAT -->
                <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-keyboard-o"></i> Hardware Asignado al Usuario</h3>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($datosHard as $indexKey => $datosHard)
                                    <tr>
                                        <td>{{$datosHard->idHard}} <input type="hidden" name="idHard{{$indexKey}}"
                                                                          value="{{$datosHard->idHard}}"></td>
                                        <td>{{$datosHard->compModelo}}</td>
                                        <td>{{$datosHard->marca}}</td>
                                        <td>{{$datosHard->modelo}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                    onclick="cargar_datos_modal('Solicitar Soporte - {{$datosHard->marca}} {{$datosHard->modelo}}','id_hard','{{$datosHard->idHard}}','solicitaSoporte');">
                                                Solicitar Soporte de Hardware
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$datosHard->idHard}}" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabelmyModal{{$datosHard->idHard}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Solicitud
                                                        para equipo {{$datosHard->modelo}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="inputPassword3" class="col-sm-2 control-label">Urgencia</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control"
                                                                        name="criticidad{{$indexKey}}">
                                                                    <option value="1">Baja</option>
                                                                    <option value="2">Media</option>
                                                                    <option value="3">Alta</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-2 control-label">Detalle
                                                                de Solicitud</label>

                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" id="soporte{{$indexKey}}"
                                                                          name="soporte{{$indexKey}}"
                                                                          rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal"><i class="fa fa-close"></i> Cerrar
                                                            y No Enviar
                                                        </button>
                                                        <button type="button" onclick="enviarSolicitud({{$indexKey}})"
                                                                class="btn btn-primary"><i class="fa fa-send-o"></i>
                                                            Enviar a Informática
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer-->
                </div>
                <!--/.direct-chat -->
            </div>
            <div class="col-md-6">
                <!-- DIRECT CHAT -->
                <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-server"></i> Servicios Generales</h3>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Servicio</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tiposServicios as $indexKeySer => $tiposServicios)
                                    <tr>
                                        <td>
                                            {{$tiposServicios->servicio}}
                                            <input type="hidden" name="idserv{{$indexKeySer}}"
                                                   value="{{$tiposServicios->idServ}}">
                                        </td>
                                        <td>
                                            <button type="button"
                                                    @if (($tiposServicios->ind_critico == '1' and $jefatura != 'SI'))
                                                    disabled data-toggle="tooltip" data-placement="top"
                                                    title="Debe Solicitar con jefatura directa"
                                                    @endif class="btn btn-danger btn-xs" data-toggle="modal"
                                                    onclick="cargar_datos_modal('Solicitar Servicio - {{$tiposServicios->servicio}}','id_func|id_serv','{{$id_usuario}}|{{$tiposServicios->idServ}}','solicitaServicio');">
                                                Solicitar Soporte de Servicio
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modalServ{{$tiposServicios->idServ}}" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabelmyModal{{$tiposServicios->idServ}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Solicitud
                                                        Servicio: {{$tiposServicios->servicio}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="inputPassword3" class="col-sm-2 control-label">Urgencia</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control"
                                                                        name="criticidadServ{{$indexKeySer}}">
                                                                    <option value="1">Baja</option>
                                                                    <option value="2">Media</option>
                                                                    <option value="3">Alta</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-2 control-label">Detalle
                                                                de Solicitud</label>

                                                            <div class="col-sm-10">
                                                                <textarea class="form-control"
                                                                          id="servicio{{$indexKeySer}}"
                                                                          name="servicio{{$indexKeySer}}"></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cerrar y No Enviar
                                                        </button>
                                                        <button type="button"
                                                                onclick="enviarSolicitudServicio({{$indexKeySer}})"
                                                                class="btn btn-primary">Enviar a Informática
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <h2 class="page-header"><i class="fa fa-edit"></i> Solicitudes de Soporte</h2>

        <!--desde aqui-->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Soportes de Hardware</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Soportes de Servicio</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box-header with-border">
                        <h3 class="box-title">Soportes de Hardware</h3>
                    </div>
                    <!-- /.box-header -->
                    @if (isset($datosSolicitudes))
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin tabladinamica" id="tablaSoportes">
                                    <thead>
                                    <tr>
                                        <th>N° Ticket</th>
                                        <th>Fecha Solicitud</th>
                                        <th>Hora Solicitud</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Ver Solicitud</th>
                                        <th>Estado</th>
                                        <th style="text-align: center;">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($datosSolicitudes as $indexKey => $datosSolicitudes)
                                        @if ($datosSolicitudes->estadoSop == 15 || $datosSolicitudes->estadoSop == 16 || $datosSolicitudes->estadoSop == 17)
                                            <tr>
                                                <td><b>{{$datosSolicitudes->idSolSop}}</b></td>
                                                <td>{{ date('d-m-Y', strtotime($datosSolicitudes->fecCreaSop)) }}</td>
                                                <td>{{ date('H:i', strtotime($datosSolicitudes->fecCreaSop)) }}</td>
                                                <td>{{$datosSolicitudes->tipoHard}}</td>
                                                <td>{{$datosSolicitudes->marca}}</td>
                                                <td>{{$datosSolicitudes->modelo}}</td>
                                                <td>
                                                    <center><span type="button" class="btn btn-primary btn-xs"
                                                                  data-toggle="modal"
                                                                  onclick="cargar_datos_modal('Antecedentes Solicitud','idSop','{{$datosSolicitudes->idSolSop}}','verDetalleSoporte');">
                       <i class="blue ace icon fa fa-pencil-square-o"></i>
                      </span></center>
                                                </td>
                                                <td>

                                                    @if ($datosSolicitudes->estadoSop == 16 || $datosSolicitudes->estadoSop == 17)
                                                        <span type="button" class="btn btn-primary btn-xs"
                                                              onclick="cargar_datos_modal('Funcionario Informática:','id_func','{{$datosSolicitudes->funcRespoSop}}','verAsignado');">
                                                       {{$datosSolicitudes->nombreEstado}}
                                                      </span>
                                                    @else
                                                        {{$datosSolicitudes->nombreEstado}}
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if(($datosSolicitudes->estadoSop == 15) && ($datosSolicitudes->funcRespoSop == null) )
                                                        <a type="button" class="btn btn-danger btn-xs" alt="anular"
                                                           rel="{{$datosSolicitudes->idSolSop}}">Anular Solicitud</a>
                                                    @endif
                                                    @if($datosSolicitudes->estadoSop == 17)
                                                        <a type="button" class="btn btn-success btn-xs"
                                                           alt="recepcionar"
                                                           rel="{{$datosSolicitudes->idSolSop}}"
                                                           onclick="cargar_datos_modal('Recepcionar Solicitud','id_solicitud|id_funcionario','{{$datosSolicitudes->idSolSop}}|{{$datosSolicitudes->idFunc}}','recepcionarSolicitud')">Finalizar
                                                            y Evaluar</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    @endif
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="box-header with-border">
                        <h3 class="box-title">Soportes de Servicio</h3>
                    </div>
                    @if (isset($pedidoServicios))
                        <div class="box-body">
                            <table class="table no-margin tabladinamica" id="tablaSoportes">
                                <thead>
                                <tr>
                                    <th>N° Ticket</th>
                                    <th>Fecha Solicitud</th>
                                    <th>Hora Solicitud</th>
                                    <th>Sevicio</th>
                                    <th>Ver Solicitud</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($pedidoServicios as $indexSoliSoporte => $pedidoServicios)
                                    @if ($pedidoServicios->estadoSolServ == 15 || $pedidoServicios->estadoSolServ == 16 || $pedidoServicios->estadoSolServ == 17)

                                        <tr>
                                            <td><strong>{{$pedidoServicios->idSolServ}}</strong></td>
                                            <td>{{ date('d-m-Y', strtotime($pedidoServicios->fecCreaSolServ)) }}</td>
                                            <td>{{ date('H:i', strtotime($pedidoServicios->fecCreaSolServ)) }}</td>
                                            <td>{{$pedidoServicios->servicio}}</td>
                                            <td>
                                                <center><span type="button" class="btn btn-primary btn-xs"
                                                              data-toggle="modal"
                                                              onclick="cargar_datos_modal('Antecedentes Solicitud','idFunc|idSolServ','{{$id_usuario}}|{{$pedidoServicios->idSolServ}}','verDetalleSolicitudServicio');">
                       <i class="blue ace icon fa fa-pencil-square-o"></i>
                      </span></center>
                                            </td>
                                            <td>
                                                @if ($pedidoServicios->estadoSolServ == 16 || $pedidoServicios->estadoSolServ  == 17)
                                                    <span type="button" class="btn btn-primary btn-xs"
                                                          onclick="cargar_datos_modal('Funcionario Informática:','id_func','{{$pedidoServicios->funcRespoSolServ}}','verAsignado');">
                                                       {{$pedidoServicios->nombreEstado}}
                                                      </span>
                                                @else
                                                    {{$pedidoServicios->nombreEstado}}
                                                @endif

                                            </td>
                                            <td>

                                                @if(($pedidoServicios->estadoSolServ == 15) && ($pedidoServicios->funcRespoSolServ == null) )
                                                    <a type="button" class="btn btn-danger btn-xs" alt=""
                                                       onclick="alunarSolicitudServicio({{$pedidoServicios->idSolServ}})">Anular
                                                        Solicitud</a>
                                                @endif
                                                @if($pedidoServicios->estadoSolServ == 17)
                                                    <a type="button" class="btn btn-success btn-xs"
                                                       alt="recepcionar_sevicio"
                                                       rel="{{$pedidoServicios->idSolServ}}"
                                                       onclick="cargar_datos_modal('Recepcionar Solicitud Servicio','id_solicitud|id_funcionario','{{$pedidoServicios->idSolServ}}|{{$pedidoServicios->idFunc}}','recepcionarSolicitudServicio')">Finalizar
                                                        y Evaluar</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="myModalserv{{$indexSoliSoporte}}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="myModalLabelmyModal{{$tiposServicios->idServ}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Solicitud Servicio
                                                            Para {{$pedidoServicios->servicio}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="col-sm-2 col-xs-12 "
                                                                           style="color:#3c8dbc;">Detalle de la
                                                                        Solicitud</label>
                                                                    <label class="col-sm-10 col-xs-12">
                                                                        <p>{{$pedidoServicios->solicitudServ}}</p>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label class="col-sm-2 col-xs-12 "
                                                                           style="color:#3c8dbc;">Urgencia</label>
                                                                    <label class="col-sm-10 col-xs-12">
                                                                        @if($pedidoServicios->estadoCritSolServ == 1)
                                                                            Baja
                                                                        @elseif($pedidoServicios->estadoCritSolServ == 2)
                                                                            Media
                                                                        @elseif($pedidoServicios->estadoCritSolServ == 3)
                                                                            Alta
                                                                        @endif
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cerrar
                                                            </button>
                                                        <!--<button type="button" onclick="modificarSolicitudServicio({{$indexKeySer}})" class="btn btn-primary">Modificar</button>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
        <!--haste aqui-->
    </form>


    <div class="modal in printable" id="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="modal-title"></h4>
                </div>
                <div class="modal-body" id="modal-body">
                </div>
                <div class="modal-footer">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
