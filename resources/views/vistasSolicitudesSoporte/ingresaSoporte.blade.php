<script type="text/javascript">
      jQuery(function($) {
      $(document).on('click', 'span[rel="borrarAdjunto"]' , function(e){
        $(this).parent().parent().remove();
    })

    });

    function agregarAdjuntoSop(){

    var $divs = $(".adjunta_soporte").toArray().length;
    if($divs < 6){
      var agrega = $("#adjunta_soporte").html();
      $("#soporteAdjuntos").append(agrega);
    }
   


  }

  function enviaSoporte(){
    var envia_soporte = true;
    var motivo_soporte = $("#soporte").val();

    if(motivo_soporte == ''){
        makeGritter("Advertencia", "Recuerde ingresar motivo de la solicitud", "warning");
        return;

      } 

    var x = function callback(){
        $("#soporte_form").submit();
    }

    confirmar('Esta Seguro de enviar Solicitud Soporte?',x);
  }
</script>


<form class="form-horizontal" name="soporte_form" id="soporte_form" method="post" action="recibeSolicitud" enctype="multipart/form-data">
    {{ csrf_field() }}
  <input type="hidden" name="id_hard" value="{{$id_hard}}">
  <div class="box-body" id="form_enviar">
    <div class="form-group">
      <label class="col-sm-3 control-label">Urgencia</label>
      <div class="col-sm-6">
            <select class="form-control" name="criticidad">
            <option value="1">Baja</option>
            <option value="2">Media</option>
            <option value="3">Alta</option>
            </select> 
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-3 control-label">Detalle de la Solicitud</label>
      <div class="col-sm-6" >
       <textarea class="form-control" id="soporte" name="soporte"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Adjuntar</label>
      <div class="col-sm-6">
          <button type="button" class="btn btn-info" onclick="agregarAdjuntoSop();"><i class="fa  fa-plus"> Agregar</i></button>
      </div>
    </div>
        <div class="form-group">
      <label class="col-sm-3 control-label"></label>
      <div class="col-sm-6" id="soporteAdjuntos">
      </div>
    </div>
  </div>
  <div class="box-footer">
    <button type="button" class="btn btn-info pull-right" onclick="enviaSoporte();"><i class="fa fa-send-o"></i> Guardar y Enviar a Informática</button>
  </div>
</form>
<div style="display: none;">
<table id="adjunta_soporte" >
  <tbody>
    <tr class="adjunta_soporte">
      <td><input type="file" class="form-control" name="file_soporte[]" ></td>
      <td><span type="button" class="btn btn-info" rel="borrarAdjunto" ><i class="fa  fa-trash-o"></i></span></td>
    </tr>
    </tbody>
</table>
</div>
