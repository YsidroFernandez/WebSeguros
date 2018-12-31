<?php 
include("conexion.php");

if ($_GET['opcion']=="Modificar") {
  $registros=mysql_query("Select * from vehiculo where placa='$_GET[placa]'");
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
<body>
  <div class="container">
  <?php 
    $clase="vehi";
    include("encabezado3.php"); 
  ?>
  
<hr>
	<div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form method="post" action="actualizarVehiculo.php" enctype="multipart/form-data">
          
          <div class="form-group">
            <label>Placa <mark>*</mark></label>
            <input type="text" name="placa" class="form-control" maxlength="7" minlength="7" placeholder="Placa del vehículo..."  required value="<?php echo $_GET['placa'] ?>" <?php echo ($_GET['placa'] ? "disabled" : "" )?> >
          </div>     
            <input type="hidden" name="placa2" class="form-control" placeholder="Placa del vehículo..." value="<?php echo $_GET['placa'] ?>">

          <div class="form-group">
            <label>Asegurado <mark>*</mark></label>
            <select class="form-control" name="asegurado" required>
              <option value="">Seleccione el asegurado</option>
              <?php 
              $resultado = mysql_query("Select cedula,nombre, apellido from cliente where estatus='A'");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['cedula']; ?>" <?php echo ($fila['cedula']==$consulta['Aseguradocedula'] ? "selected" : ""); echo ($_GET['cedula'] == $fila['cedula'] ? "selected" : ""); ?>> <?php echo $fila['nombre']." ".$fila['apellido']; ?> </option>
             <?php } ?> 
            </select>
          </div>
    
           <div class="form-group">
            <label>Marca y modelo del vehículo <mark>*</mark></label>
            <select class="form-control" name="modelo" required>
              <option value="">Seleccione el modelo</option>
              <?php 
              $resultado = mysql_query("SELECT codModelo, marca.nombreDeMarca, nombreModelo, annoDelModelo from marca, modelo where MarcaCodMarca = marca.codMarca and marca.estatus='A' and modelo.estatus='A' order by marca.nombreDeMarca");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['codModelo']; ?>" <?php echo ($fila['codModelo']==$consulta['ModelocodModelo'] ? "selected" : ""); ?> > <?php echo $fila['nombreDeMarca']." ".$fila['nombreModelo']." ".$fila['annoDelModelo']; ?> </option>
             <?php } ?> 
            </select>
          </div>

          <div class="form-group">
            <label>Estado de compra <mark>*</mark></label>
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
            <label>Tipo de vehículo <mark>*</mark></label>
            <select class="form-control" name="tipo" required>
              <option value="">Seleccione el tipo de vehículo</option>
              <?php 
              $resultado = mysql_query("Select codTipo, nombreTipo from tipovehiculo where estatus='A'");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['codTipo']; ?>" <?php echo ($fila['codTipo']==$consulta['TipoVehiculoCodTipo'] ? "selected" : ""); ?>> <?php echo $fila['nombreTipo']; ?> </option>
             <?php } ?> 
            </select>
          </div>

          <div class="form-group">
            <label>Color <mark>*</mark></label>
            <input type="text" name="color" maxlength="50" class="form-control" required placeholder="Color del vehículo..." value="<?php echo $consulta['color'] ?>">
          </div>

          <div class="form-group">
            <label>Serial <mark>*</mark></label>
            <input type="text" name="serial" maxlength="20" class="form-control" required placeholder="Serial del vehículo..." value="<?php echo $consulta['serial'] ?>">
          </div>

          <div class="form-group">
            <label>Kilometraje <mark>*</mark></label>
            <input type="number" name="kilometraje" class="form-control" min="0" max="300" required placeholder="Kilometraje del vehículo..." value="<?php echo $consulta['kilometraje'] ?>">
          </div>

          <label><mark>*</mark> Campo obligatorio</label><br>
          <center>
            <input type="submit" value="<?php echo $_GET['opcion'] ?>" name="boton" class="btn btn-info btn-lg" >  
            <a href="javascript:window.history.back();" name="cancelar" class="btn btn-info btn-lg">Cancelar</a>        
          </center>  
        </form>
    </div>
  </div>
  
<hr>

<?php include("PieDePagina2.php") ?>

</div>
  
</body>
</html>