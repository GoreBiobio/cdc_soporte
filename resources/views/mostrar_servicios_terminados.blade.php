<script type="text/javascript">

 $(document).ready(function() {

   $('#tablapedidos').DataTable({
     responsive: true,
     language: {
         url: 'js/es-ar.json' //Ubicacion del archivo con el json del idioma.
     }
 });
});
</script> 
<h2 class="h2mover">Soportes Terminados</h2>
<div class="box cambiarTamano">
<div class="box-body">
              <div class="table-responsive">
                <table class="table no-marginx " id="tablapedidos">
                  <thead>
                  <tr>
                    <th>Ticket</th>
                    <th>Fecha Solicitud</th>
                    <th>Hora Solicitud</th>
                    <th>Servicio</th>
                    <th>ver solicitud</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datosSolicitudes as $indexKey => $datosSolicitudes)
                  @if ($datosSolicitudes->estadoSolServ != 3)
                  <tr>
                    <td>{{$datosSolicitudes->idSolServ}}</td>
                    <td>{{ date('d-m-Y', strtotime($datosSolicitudes->fecCreaSolServ)) }}</td>
                    <td>{{ date('H:i', strtotime($datosSolicitudes->fecCreaSolServ)) }}</td>
                    <td>{{$datosSolicitudes->servicio}}</td>
                    <td>    
                      <span type="button" class="btn btn-primary btn-md" onclick="cargar_datos_modal('Servicio Terminado','idFunc|idServ','{{$datosSolicitudes->funcSolServ}}|{{$datosSolicitudes->idSolServ}}','verDetalleServicioTerminado');">
                       <i class="blue ace icon fa fa-expand"></i>
                      </span>
                     
                    </td>
                   <td>
                    Terminado
                  </td>
                  </tr>
                  @endif
                  @endforeach 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
</div> 


<div class="modal in printable" id="modal" >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="modal-title"></h4>
          </div>
          <div class="modal-body" id = "modal-body">
          </div>
          <div class="modal-footer">          
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->             