<?php 
include("conexion.php");

if ($_GET['opcion']=="Modificar") {
  $registros=mysql_query("Select * from siniestro where codSiniestro='$_GET[codSiniestro]'");
  
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
    $clase="sini";
    include("encabezado3.php"); 
  ?>
  
<hr>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form method="post" action="RegistrodeSiniestro.php" enctype="multipart/form-data">

            <input type="hidden" name="placa2" class="form-control" placeholder="Placa del Vehículo..." value="<?php echo $_GET['codSiniestro'] ?>"  > 

            <div class="form-group">
            <label>Placa de Vehículo<mark>*</mark></label>
            <select class="form-control" name="placa" required>
              <option value="">Seleccione la placa del vehículo</option>
              <?php 
              $resultado = mysql_query("SELECT placa
                                FROM vehiculo, polizadeseguro
                                WHERE Vehiculoplaca = placa
                                AND polizadeseguro.estatus =  'A'
                                UNION SELECT certificadoseguro.Vehiculoplaca
                                FROM vehiculo, polizadeseguro, certificadoseguro
                                WHERE certificadoseguro.Vehiculoplaca = vehiculo.placa
                                AND certificadoseguro.PolizaDeSeguroCodPoliza = polizadeseguro.codPoliza
                                AND polizadeseguro.estatus =  'A' ");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['placa']; ?>" <?php echo ($fila['placa']==$consulta['Vehiculoplaca'] ? "selected" : ""); echo ($_GET['placa']==$fila['placa'] ? "Selected":"")?>> <?php echo $fila['placa']; ?> </option>
             <?php } ?> 
            </select>
          </div>

           <div class="form-group">
            <label>Tipo de Siniestro <mark>*</mark></label>
            <select class="form-control" name="tipo" required>
              <option value="">Seleccione el Tipo de Siniestro</option>
              <?php 
              $resultado = mysql_query("Select codTipoSiniestro,tipo from tiposiniestro");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['codTipoSiniestro']; ?>" <?php echo ($fila['codTipoSiniestro']==$consulta['TipoSiniestrocodTipoSiniestro'] ? "selected" : ""); ?>> <?php echo $fila['tipo']; ?> </option>
             <?php } ?> 
            </select>
          </div>



            <div class="form-group">
            <label>Fecha del Siniestro <mark>*</mark></label>
            <input type="date" name="fecha" max="<?php echo date("Y-m-d");?>" class="form-control" required value="<?php echo $consulta['fechaSiniestro'] ?>">
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
            <label>Monto Reserva <mark>*</mark></label>
            <input type="number" name="montoR" min="0" class="form-control" placeholder="Monto de Reserva..."  required value= "<?php echo $consulta['montoReserva'] ?>"  >
          </div>

          <div class="form-group">
            <label>Dirección <mark>*</mark></label>
            <input type="text" name="direccion" maxlength="50" class="form-control" placeholder="Dirección del Siniestro..."  value= "<?php echo $consulta['direccion'] ?>" required  >
          </div>

          <label><mark>*</mark> Campo obligatorio</label><br>
          <center>
            <input value="<?php echo $_GET['opcion'] ?>" type="submit"  name="boton" class="btn btn-info btn-lg" ></input> 
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