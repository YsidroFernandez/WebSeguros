<?php 
include("conexion.php");

if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Modificar" or $_GET['opcion']=="Activar") {
  $registros=mysql_query("Select * from sucursal where codSucursal ='$_GET[codigo]'");
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
   

   <?php $clase="suc" ;
      include("encabezado2.php");
    ?>

  <!-- desde aca el cuerpo de la pagina de registro de nuevos usuarios -->
  
<hr>
	<div class="row">
    
      <form method="post" action="actualizarSucursales.php" enctype="multipart/form-data">
         
         
        <div class="col-md-6 col-md-offset-3">
           <div class="form-group">
              <label>Codigo de la Sucursal <mark>*</mark></label>
              <input type="text" maxlength=4 minlength=4 name="codigo" class="form-control" placeholder="Ingrese el código"  required value="<?php echo $_GET['codigo'] ?>" <?php echo ($_GET['codigo'] ? "disabled" : "" )?> >
            </div>    

            <input type="hidden" name="codigo2" class="form-control" placeholder="Ingrese el codigo" value="<?php echo $_GET['codigo'] ?>">
             <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "<fieldset disabled>";
          }
           ?>
          
           
         <div class="form-group">
            <label>Estado donde se Encuentra la Sucursal <mark>*</mark></label>
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
            <label>Nombre de la Sucursal<mark>*</mark></label>
            <input type="text" name="nombre"  maxlength="30" class="form-control" placeholder="Ingrese el Nombre de la Sucursal" value="<?php echo $consulta['nombre'] ?>" required>
          </div>
            

            <div class="form-group">
            <label>Dirección<mark>*</mark></label>
            <input type="text" name="direccion" maxlength="40" class="form-control" placeholder="Ingrese la Dirección de la Sucursal" value="<?php echo $consulta['direccion'] ?>" required>
          </div>

          <div class="form-group">
            <label>Teléfono<mark>*</mark></label>
            <input type="text"  maxlength="15" name="telefono" class="form-control" placeholder="Ingrese el Teléfono de la Sucursal" value="<?php echo $consulta['telefono'] ?>" required>
          </div>


           
         <div class="form-group">
            <label>E-mail<mark>*</mark></label>
            <input type="email" name="email" class="form-control"  minlength="3" maxlength="40" placeholder="Ingrese el e-mail..." value="<?php echo $consulta['e-mail'] ?>" required>
          </div>
              
         
           <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "</fieldset>";
          }
           ?>
          <label><mark>*</mark>Campo obligatorio</label><br>
          
           
         
          
             <center>
            <input type="submit" value="<?php echo $_GET['opcion'] ?>" name="boton" class="btn btn-info btn-lg" >  
            <a href="ventanaSucursal.php" name="cancelar" class="btn btn-info btn-lg">Cancelar</a>        
          </center>
           </div>  
        </form>
   
  </div>
  
<hr>

<?php include("PieDePagina2.php"); ?>

</div>
</body>
</html>