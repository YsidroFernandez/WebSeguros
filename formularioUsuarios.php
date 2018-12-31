<?php 
include("conexion.php");

if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Modificar" or $_GET['opcion']=="Activar") {
  $registros=mysql_query("Select * from usuario where cedula='$_GET[cedula]'");
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
  <title>WebSeguros</title>
</head>
<body>
  <div class="container">
   <?php $clase="adm" ;
      include("encabezado2.php");
    ?>

  <!-- desde aca el cuerpo de la pagina de registro de nuevos usuarios -->
  
<hr>
	<div class="row">
    
      <form method="post" action="actualizarUsuarios.php" enctype="multipart/form-data">
         
         
        <div class="col-md-5 col-md-offset-1">
          <div class="form-group">
            <label>Cédula del Empleado <mark>*</mark></label>
            <input type="text" name="cedula"  minlength="7" maxlength="9" class="form-control" placeholder="Ingresa la cedula del empleado"  required value="<?php echo $_GET['cedula'] ?>" <?php echo ($_GET['cedula'] ? "disabled" : "" )?> >
          </div>     
            <input type="hidden" name="cedula2" class="form-control" placeholder="Ingresa la cedula del empleado.." value="<?php echo $_GET['cedula'] ?>">
             <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "<fieldset disabled>";
          }
           ?>
          <div class="form-group">
            <label>Nombre <mark>*</mark></label>
            <input type="text" name="nombre" class="form-control" maxlength="50" placeholder="Ingrese el nombre del Empleado" value="<?php echo $consulta['nombre'] ?>" required>
          </div>
           <div class="form-group">
            <label>Apellido <mark>*</mark></label>
            <input type="text" name="apellido" class="form-control" maxlength="50" placeholder="Ingrese el apellido del Empleado" value="<?php echo $consulta['apellido'] ?>" required>
          </div>
         <div class="form-group">
            <label>Tipo de usuario <mark>*</mark></label>
            <select class="form-control" name="tipo" required>
              <option value="">Seleccione el tipo de usuario</option>
              <?php  
                $resultado=mysql_query("Select codRol, nombre from rol");
                while($fila=mysql_fetch_array($resultado))
                {?>
                  <option value="<?php echo $fila['codRol']; ?>"<?php echo ($fila['codRol']==$consulta['RolcodRol'] ? "selected" : ""); ?>> <?php echo $fila['nombre']; ?> </option>
                <?php } ?>
            </select>
          </div>


          <div class="form-group">
            <label>Usuario <mark>*</mark></label>
            <input type="text" name="usuario" class="form-control"  placeholder="Ingrese el usuario..." required  value="<?php echo $consulta['user'] ?>">
          </div>
           <div class="form-group">
            <label>Contraseña <mark>*</mark></label>
            <input type="text" name="contrasena" class="form-control" maxlength="10"  placeholder="Indique una contraseña..." required  value="<?php echo $consulta['pass'] ?>">
          </div>

           <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "</fieldset>";
          }
           ?>
        </div>
 <!-- a partir de aca se crea la otra columna -->


        <div class="col-md-5 col-md-offset-1">
             <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "<fieldset disabled>";
          }
           ?>
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
             <label>Fecha de nacimiento  <mark>*</mark></label>
             <input required  name="fechaN" type="date"  max = "<?php echo (date("Y")-18)."-".date("m-d"); ?>" class="form-control" value="<?php echo $consulta['fechaNacimiento'] ?>">
          </div>

          <div class="form-group">
            <label>Correo <mark>*</mark></label>
            <input type="email" name="correo" class="form-control" maxlength="40" minlength="4" required placeholder="Correo Electronico..." value="<?php echo $consulta['email'] ?>">
          </div>

           <div class="form-group">
            <label>Teléfono <mark>*</mark></label>
            <input type="text" minlength="15" name="telefono" class="form-control" required placeholder="Telefono..." value="<?php echo $consulta['telefono'] ?>">
          </div>
     
          <div class="form-group">
            <label>Sucursal donde labora <mark>*</mark></label>
            <select class="form-control" name="tipoA" required>
              <option value="">Seleccione la sucursal</option>
              <?php  
                $resultado=mysql_query("Select codSucursal, nombre from sucursal where estatus='A'");
                while($fila=mysql_fetch_array($resultado))
                {?>
                  <option value="<?php echo $fila['codSucursal']; ?>"<?php echo ($fila['codSucursal']==$consulta['SucursalcodSucursal'] ? "selected" : ""); ?>> <?php echo $fila['nombre']; ?> </option>
                <?php } ?>
            </select>
          </div>

         <div class="form-group">
             <label>Fecha de Ingreso <mark>*</mark></label>
             <input required id="fechai" name="fechai" type="date"  max="<?php echo date("Y-m-d");?>" class="form-control" value="<?php echo $consulta['fechaIngreso'] ?>">
          </div>

           <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "</fieldset>";
          }
           ?>
          
        </div>  
         
          
             <center>
          <label><mark>*</mark>Campo obligatorio</label><br>
            <input type="submit" value="<?php echo $_GET['opcion'] ?>" name="boton" class="btn btn-info btn-lg" >  
            <a href="ventanaAdministrador.php" name="cancelar" class="btn btn-info btn-lg">Cancelar</a>        
          </center>
           
        </form>
   
  </div>
  
<hr>

<?php include("PieDePagina2.php"); ?>

</div>
</body>
</html>