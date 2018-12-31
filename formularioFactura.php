<?php 
include("conexion.php");

if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Modificar" or $_GET['opcion']=="Activar") {
  $registros=mysql_query("Select * from factura where codFactura='$_GET[codFactura]'");
  $consulta= mysql_fetch_array($registros);
}
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- importar librerias para estilos y responsib -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet"  href="css/estilos.css">
  <script src="js/jquery.js"></script>

<script src="js/bootstrap.min.js"></script>
  <title>MiCarroSeguro</title>
</head>
<body onload="mostrarServicios('<?=$consulta['TipoServiciocodTipoServicio']?>')">
  <div class="container">
  <?php 
    $clase="fact";
    include("encabezado3.php"); 
  ?>
  
<hr>
	<div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form method="post" action="actualizarFactura.php" enctype="multipart/form-data">
            <input type="hidden" name="codigo2" class="form-control" value="<?php echo $_GET['codFactura'] ?>">
            <input type="hidden" name="siniestro2" class="form-control" value="<?php echo $consulta['SiniestrocodSiniestro'] ?>">
          <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "<fieldset disabled>";
          }
           ?>
          <div class="form-group">
            <label>Código del siniestro<mark>*</mark></label>
            <select class="form-control" id="selectParticular" name="siniestro" required>
              <option value="">Seleccione el siniestro</option>
              <?php 
              $resultado = mysql_query("SELECT codSiniestro FROM siniestro where estatus='P' order by codSiniestro");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['codSiniestro'];?>" <?= $fila['codSiniestro'] == $consulta['SiniestrocodSiniestro'] ? "Selected" : ""?> <?= $fila['codSiniestro'] == $_GET['codigo'] ? "Selected" : ""?> > <?php echo $fila['codSiniestro'];?> </option>
              <?php } ?> 
            </select>
          </div>

          
         <div class="form-group selector-empresa">
            <label>Empresa  <mark>*</mark></label>
            <select class="form-control" onchange="mostrarServicios('<?=$consulta['TipoServiciocodTipoServicio']?>')" name="empresa" required>
              <option value="">Seleccione la empresa</option>
              <?php  
                $resultado=mysql_query("SELECT codEmpresa, nombre FROM empresaafiliada where estatus='A'");
                while($fila=mysql_fetch_array($resultado))
                {?>
                  <option value="<?php echo $fila['codEmpresa']; ?>"<?php echo ($fila['codEmpresa']==$consulta['EmpresaAfiliadacodEmpresa'] ? "selected" : ""); ?>> <?php echo $fila['nombre']; ?> </option>
                <?php } ?>
            </select>
          </div>

          <div class="form-group selector-servicio">
            <label>Servicio empleado <mark>*</mark></label>
            <select class="form-control" name="servicio" id="servicio" required>
            </select>
          </div>

          <div class="form-group">
            <label>Fecha de emisión <mark>*</mark></label>
            <input type="date" name="fecha" class="form-control" required max="<?php echo date("Y-m-d") ?>" value="<?php echo $consulta['fecha'] ?>">
          </div>

          <div class="form-group">
            <label>Monto facturado <mark>*</mark></label>
            <input type="number" name="monto" class="form-control" required min="0" value="<?= $consulta['monto'] ?>">
          </div>

          <div class="form-group">
            <label>Descripción <mark>*</mark></label>
            <textarea class="form-control" rows="3" name="descripcion" required ><?php echo $consulta['descripcion'] ?></textarea>
          </div>

          <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "</fieldset>";
          }
           ?>
          <label><mark>*</mark>Campo obligatorio</label><br>
          <center>
            <input type="submit" value="<?php echo $_GET['opcion'] ?>" name="boton" class="btn btn-info btn-lg" >  
            <a href="javascript:window.history.back();" name="cancelar" class="btn btn-info btn-lg">Cancelar</a>        
          </center>  
        </form>
    </div>
  </div>
  
<hr>

<?php include ("PieDePagina2.php"); ?>

</div>
</body>
</html>

<script type="text/javascript">

function mostrarServicios(servicioSeleccionado){

  var form_data = {
            is_ajax: 1,
            valor:$(".selector-empresa select").val(),
            valor2:servicioSeleccionado

      };
      $.ajax({
              type: "POST",
              url: "getServiciosPorEmpresa.php",
              data: form_data,
              success: function(response)
              {
                  $(".selector-servicio select").html(response).fadeIn();
              }
      });
}

</script>