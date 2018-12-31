
<!-- Reporte de Siniestros-->

<div id="ModalReporteSiniestro" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal contenido Reporte-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">REPORTE DE SINIESTRO</h4>
      </div>
      <div class="modal-body">
        
        <form  method="post" name="consulta" action="consultaPlaca.php">
            <label>Placa<mark>*</mark></label>
            <input type="text" name="placa"  minlength="7" maxlength="7" class="form-control" required placeholder="Placa del Vehículo..." value="<?php echo $consulta['nombre'] ?>">
   
         <div class="modal-footer">
       
      <button type="submit" class="btn btn-info">REPORTAR</button>
      <button type="button" class="btn btn-info" data-dismiss="modal">CERRAR</button>
      </form>
      </div>

  </div>
    </div>
      </div>