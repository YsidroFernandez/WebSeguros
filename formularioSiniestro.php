<?php 
include("conexion.php");
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- importar librerias para estilos y responsib -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet"  href="css/estilos.css">
  <script src="js/jquery.js"></script>

<script src="js/bootstrap.min.js"></script>
  <title>MiCarroSeguro</title>
</head>
<body>
    <?php include ("encabezado.php") ?>
  
<div class="container">
 
  
<hr>
	<div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form method="post" action="RegistrarReporteSiniestro.php" enctype="multipart/form-data">
          <center> <h3>Reportar Siniestro</h3></center>
          <div class="form-group">
            <label>Placa <mark>*</mark></label>
            <input maxlength="7"  minlength="7" disabled type="text" name="placa" class="form-control" placeholder="Placa del Vehículo..."  required value="<?php echo $_GET['placa'] ?>"  >
          </div>     
            <input type="hidden" name="placa2" class="form-control" placeholder="Placa del Vehículo..." value="<?php echo $_GET['placa'] ?>">

           <div class="form-group">
            <label>Tipo de Siniestro <mark>*</mark></label>
            <select class="form-control" name="tipo" required>
              <option value="">Seleccione el Tipo de Siniestro</option>
              <?php 
              $resultado = mysql_query("Select codTipoSiniestro,tipo from tiposiniestro");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['codTipoSiniestro']; ?>" <?php echo ($fila['codTipoSiniestro']==$consulta['TiposiniestrocodTipoSiniestro'] ? "selected" : ""); ?>> <?php echo $fila['tipo']; ?> </option>
             <?php } ?> 
            </select>
          </div>



            <div class="form-group">
            <label>Fecha del Siniestro <mark>*</mark></label>
            <input type="date" name="fecha" max="<?php echo date("Y-m-d");?>" class="form-control" required value="">
          </div>

          <div class="form-group">
            <label>Estado donde ocurrió el siniestro <mark>*</mark></label>
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
            <label>Dirección <mark>*</mark></label>
            <input type="text" name="direccion" maxlength="50" class="form-control" required placeholder="Dirección del Siniestro..." >
          </div>

    
          <label><mark>*</mark> Campo obligatorio</label><br>
          <center>
            <input value="Registrar" type="submit"  name="Registrar" class="btn btn-info btn-lg" ></input> 
            <a href="javascript:window.history.back();" name="cancelar" class="btn btn-info btn-lg">Cancelar</a>        
          </center>  
        </form>
    </div>
  </div>
  
<hr>

<nav class="navbar navbar-default navbar-inverse">
    <h2 class="letraMediana">Síguenos</h2>
    <img src="img/AR_facebook_logo.jpg">
   <img src="img/AR_twitter_logo.jpg">
   <img src="img/instagram_logo24x24.jpg">
   <img src="img/youtube_logo24x24.jpg">
   <center class="negro">
   Copyright & Todos los derechos reservados   |   Aspectos Legales   |   Política y Privacidad
   </center>
    </nav>

</div>
  
</body>
</html>