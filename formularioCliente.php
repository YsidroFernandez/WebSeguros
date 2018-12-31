<?php 
include("conexion.php");

if ($_GET['opcion']=="Modificar" or $_GET['opcion']=="Atender") {
  $registros=mysql_query("Select * from cliente where cedula='$_GET[cedula]'");
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
    $clase="clie";
    include("encabezado3.php"); 
  ?>
  
<hr>
	<div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form method="post" action="actualizarCliente.php" enctype="multipart/form-data">
          
          <div class="form-group">
            <label>Cédula <mark>*</mark></label>
            <input type="text" name="cedula"  minlength="7" maxlength="9" class="form-control" placeholder="Cédula del cliente..."  required value="<?php echo $_GET['cedula'] ?>" <?php echo ($_GET['cedula'] ? "disabled" : "" )?> >
          </div>     
            <input type="hidden" name="cedula2" class="form-control" placeholder="Cédula del cliente..." value="<?php echo $_GET['cedula'] ?>">

          <div class="form-group">
            <label>Nombre <mark>*</mark></label>
            <input type="text" name="nombre" maxlength="40" class="form-control" required placeholder="Nombres del cliente..." value="<?php echo $consulta['nombre'] ?>">
          </div>

          <div class="form-group">
            <label>Apellido <mark>*</mark></label>
            <input type="text" name="apellido" maxlength="40"  class="form-control" placeholder="Apellidos del cliente..." value="<?php echo $consulta['apellido'] ?>" required>
          </div>

          <div class="form-group">
            <label>Estado de residencia <mark>*</mark></label>
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
            <input type="text" name="direccion" maxlength="60" class="form-control" required placeholder="Dirección de vivienda..." value="<?php echo $consulta['direccion'] ?>">
          </div>

          <div class="form-group">
            <label>Fecha de nacimiento <mark>*</mark></label>
            <input type="date" name="fecha" max="<?php echo (date("Y")-18)."-".date("m-d"); ?>" class="form-control" required value="<?php echo $consulta['fechaNacimiento'] ?>">
          </div>

          <div class="form-group">
            <label>Teléfono <mark>*</mark></label>
            <input type="text" name="telefono" maxlength="15" class="form-control" required placeholder="Teléfono movil..." value="<?php echo $consulta['telefono'] ?>">
          </div>
     
          <div class="form-group">
            <label>Correo <mark>*</mark></label>
            <input type="email" name="correo"  minlength="4" maxlength="40" class="form-control" placeholder="Correo electrónico..." required value="<?php echo $consulta['e-mail'] ?>">
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