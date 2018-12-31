<?php 
include("conexion.php");

if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Modificar" or $_GET['opcion']=="Activar") {
  $registros=mysql_query("Select * from empresaafiliada where codEmpresa='$_GET[codigo]'");
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
   

   <?php $clase="afi" ;
      include("encabezado2.php");
    ?>

  <!-- desde aca el cuerpo de la pagina de registro de nuevos usuarios -->
  
<hr>
	<div class="row">
    
      <form method="post" action="actualizarAfiliados.php" enctype="multipart/form-data">
         
         
        <div class="col-md-6 col-md-offset-3">
          <div class="form-group">
            <label>Codigo de la Empresa <mark>*</mark></label>
            <input type="text" name="codigo"  minlength="4" maxlength="4" class="form-control" placeholder="Ingrese el código"  required value="<?php echo $_GET['codigo'] ?>" <?php echo ($_GET['codigo'] ? "disabled" : "" )?> >
          </div>     
            <input type="hidden" name="codigo2" class="form-control" placeholder="Ingrese el codigo" value="<?php echo $_GET['codigo'] ?>">
             <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "<fieldset disabled>";
          }
           ?>
          <div class="form-group">
            <label>Nombre de la Empresa Afiliada <mark>*</mark></label>
            <input type="text" name="nombre" maxlength="60" class="form-control" placeholder="Ingrese el nombre de la empresa" value="<?php echo $consulta['nombre'] ?>" required>
          </div>
          <div class="form-group">
            <label>RIF <mark>*</mark></label>
            <input type="text" name="rif" class="form-control" maxlength="30" placeholder="Ingrese el nombre de la cobertura" value="<?php echo $consulta['rif'] ?>" required>
          </div>
           <div class="form-group">
            <label>Numero de cuenta <mark>*</mark></label>
            <input type="number" name="numero" class="form-control" min="0" placeholder="Ingrese el numero de cuenta" value="<?php echo $consulta['nroCuenta'] ?>" required>
          </div>
          <div class="form-group">
          <label>Estado<mark>*</mark></label>
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
            <label>Teléfono <mark>*</mark></label>
            <input type="text" name="telefono" maxlength="15" class="form-control" placeholder="Ingrese el telefono" value="<?php echo $consulta['telefono'] ?>" required>
          </div>
              
            <div class="form-group">
            <label> Correo<mark>*</mark></label>
            <input type="email" name="correo"  minlength="4" maxlength="40" class="form-control" placeholder="Ingrese el correo" value="<?php echo $consulta['correo'] ?>" required>
          </div>

            
           <div class="form-group">
            <label>Dirección <mark>*</mark></label>
            <input type="text" name="direccion" maxlength="60" class="form-control" placeholder="Ingrese la direccion" value="<?php echo $consulta['direccion'] ?>" required>
          </div>
        
          <label>Seleccione los servicios que ofrece la empresa</label>
            <?php 
              $resultado=mysql_query("Select * from tipoServicio");
              while($fila=mysql_fetch_array($resultado)){ ?>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="servicios[]" value="<?php echo $fila['codTipoServicio']; ?>"> <?php echo $fila['nombre'] ?>
                </label>
              </div>
         
              <?php } ?>
           <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "</fieldset>";
          }
           ?>
          <label><mark>*</mark>Campo obligatorio</label><br>
          
             <center>
            <input type="submit" value="<?php echo $_GET['opcion'] ?>" name="boton" class="btn btn-info btn-lg" >  
            <a href="ventanaAfiliados.php" name="cancelar" class="btn btn-info btn-lg">Cancelar</a>        
          </center>
           </div>  
        </form>
   
  </div>
  
<hr>

<?php include("PieDePagina2.php"); ?>

</div>
</body>
</html>