<?php 
include("conexion.php");

if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Modificar" or $_GET['opcion']=="Activar") {
  $registros=mysql_query("Select * from inspeccion where codInspeccion='$_GET[codInspeccion]'");
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
<body onload="mostrarSiniestros(),cargarSiniestros('<?=$consulta['SiniestrocodSiniestro']?>')">
  <div class="container">
  <nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header navbar-inverse">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <form action="">
    <a class="navbar-brand" href="index.php"><img class="img-rounded"style="margin-top:-5px;" src="img/micarro.jpg"  ></a>
    </form>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse navbar-inverse">
    <ul class="nav navbar-nav nav-tabs">

      <li class="active"><a href="#">Informe de Inspecciones</a></li>
      <li><a href="ventanaSiniestros.php">Informe de Siniestros</a></li>
      
    </ul>
 
    <form class="navbar-form navbar-inverse navbar-right" role="search">
      
      <button type="submit" class="btn btn-default">Cerrar sesión</button>
    </form>
  </div>
  </nav>
  
<hr>
	<div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form method="post" action="actualizarInspecciones.php" enctype="multipart/form-data">
          <div class="form-group">
            <label>Código del informe <mark>*</mark></label>
            <input type="text" name="codigo" class="form-control" placeholder="Ingresa el código del informe"  required value="<?php echo $_GET['codInspeccion'] ?>" <?php echo ($_GET['codInspeccion'] ? "disabled" : "" )?> >
          </div>     
            <input type="hidden" name="codigo2" class="form-control" placeholder="Ingresa el código del informe" value="<?php echo $_GET['codInspeccion'] ?>">
          <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "<fieldset disabled>";
          }
           ?>
          <div class="form-group selector-placa">
            <label>Placa del vehículo <mark>*</mark></label>
            <select class="form-control placa" onchange="cargarSiniestros('<?=$consulta['SiniestrocodSiniestro']?>')" id="placa" name="placa" required>
              <option value="">Seleccione el vehículo</option>
              <?php 
              $resultado = mysql_query("Select placa from vehiculo");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['placa'];?>" <?php echo ($fila['placa']==$consulta['Vehiculoplaca'] ? "selected" : ""); ?>> <?php echo $fila['placa'];?> </option>
              <?php } ?> 
              </select>
          </div>

         <div class="form-group">
            <label>Tipo de inspección <mark>*</mark></label>
            <select class="form-control" id="tipo" onchange="mostrarSiniestros()" name="tipo" required>
              <option value="">Seleccione el tipo de inspección</option>
              <?php  
                $resultado=mysql_query("Select * from tipoinspeccion");
                while($fila=mysql_fetch_array($resultado))
                {?>
                  <option value="<?php echo $fila['codTipo']; ?>"<?php echo ($fila['codTipo']==$consulta['TipoInspeccioncodTipo'] ? "selected" : ""); ?>> <?php echo $fila['nombre']; ?> </option>
                <?php } ?>
            </select>
          </div>

          <div id="selectSiniestros" style="display:none">
            <div class="form-group selector-siniestro">
              <label>Código del Siniestro <mark>*</mark></label>
              <select class="form-control" name="siniestro" id="siniestro">
              </select>
            </div>
          </div>


          <div class="form-group">
            <label>Fecha de la inspección <mark>*</mark></label>
            <input type="date" name="fecha" class="form-control" required max="<?php echo date("Y-m-d") ?>" value="<?php echo $consulta['fecha'] ?>">
          </div>

          <div class="form-group">
            <label>Estado donde se realizó <mark>*</mark></label>
            <select class="form-control" name="estado" required>
              <option value="">Seleccione el estado</option>
              <?php 
              $resultado = mysql_query("Select codEstado, estado from estado");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['codEstado']; ?>" <?php echo ($fila['codEstado']==$consulta['EstadocodEstado'] ? "selected" : ""); ?>> <?php echo $fila['estado']; ?> </option>
             <?php } ?> 
            </select>
          </div>

          <div class="form-group">
            <label>Lugar <mark>*</mark></label>
            <input type="text" name="lugar" maxlength="50" class="form-control" required placeholder="Dirección donde se realizó..." value="<?php echo $consulta['lugar'] ?>">
          </div>

          <div class="form-group">
            <label>Evaluación <mark>*</mark></label>
            <textarea class="form-control" rows="3" name="evaluacion" required id="evaluacion"><?php echo $consulta['evaluacion'] ?></textarea>
          </div>
     
          <div class="form-group">
            <label>Infome de inspección <mark>*</mark></label>
            <input type="file" name="archivo" class="form-control" placeholder="Adjunta el archivo" <?php echo ($_GET['opcion']=="Registrar" ? "required" : ""); ?>>
          </div>

          <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "</fieldset>";
          }
           ?>
          <label><mark>*</mark>Campo obligatorio</label><br>
          <center>
            <input type="submit" value="<?php echo $_GET['opcion'] ?>" name="boton" class="btn btn-info btn-lg" >  
            <a href="ventanaInspecciones.php" name="cancelar" class="btn btn-info btn-lg">Cancelar</a>        
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
function mostrarSiniestros(){
    if(document.getElementById("tipo").value>=2)
      {
        document.getElementById("selectSiniestros").style.display='block';
        document.getElementById("siniestro").required=true;
      }
      else
      {
       document.getElementById("selectSiniestros").style.display='none';
        document.getElementById("siniestro").required=false; 
      }

}

function cargarSiniestros(siniestroSeleccionado){

  var form_data = {
            is_ajax: 1,
            valor:$(".selector-placa select").val(),
            valor2:siniestroSeleccionado

      };
      $.ajax({
              type: "POST",
              url: "getSiniestros.php",
              data: form_data,
              success: function(response)
              {
                  $(".selector-siniestro select").html(response).fadeIn();
              }
      });
}

</script>