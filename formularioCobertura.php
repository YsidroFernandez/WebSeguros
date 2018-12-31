<?php 
include("conexion.php");

if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Modificar" or $_GET['opcion']=="Activar") {
  $registros=mysql_query("Select * from cobertura where codCobertura='$_GET[codigo]'");
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
   

   <?php $clase="cober" ;
      include("encabezado2.php");
    ?>

  <!-- desde aca el cuerpo de la pagina de registro de nuevos usuarios -->
  
<hr>
	<div class="row">
    
      <form method="post" action="actualizarCoberturas.php" enctype="multipart/form-data">
         
         
        <div class="col-md-6 col-md-offset-3">
          <div class="form-group">
            <label>Codigo de la Cobertura <mark>*</mark></label>
            <input type="text" name="codigo" class="form-control" placeholder="Ingrese el código"  required value="<?php echo $_GET['codigo'] ?>" <?php echo ($_GET['codigo'] ? "disabled" : "" )?> >
          </div>     
            <input type="hidden" name="codigo2" class="form-control" placeholder="Ingrese el codigo" value="<?php echo $_GET['codigo'] ?>">
             <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "<fieldset disabled>";
          }
           ?>
          <div class="form-group">
            <label>Nombre de la cobertura <mark>*</mark></label>
            <input type="text" name="nombre" maxlength="50" class="form-control" placeholder="Ingrese el nombre de la cobertura" value="<?php echo $consulta['nombre'] ?>" required>
          </div>
           
         <div class="form-group">
            <label>Seguro de la cobertura <mark>*</mark></label>
            <select class="form-control" name="seguro" required>
              <option value="">Seleccione el tipo de seguro</option>
              <?php  
                $resultado=mysql_query("Select codSeguro, nombre from seguro");
                while($fila=mysql_fetch_array($resultado))
                {?>
                  <option value="<?php echo $fila['codSeguro']; ?>"<?php echo ($fila['codSeguro']==$consulta['SegurocodSeguro'] ? "selected" : ""); ?>> <?php echo $fila['nombre']; ?> </option>
                <?php } ?>
            </select>
          </div>
     
          <div class="form-group">
            <label>Tipo de Cobertura<mark>*</mark></label>
            <select class="form-control" name="tipoC" required>
              <option value="">Seleccione el tipo de cobertura</option>
              
              <option value="Opcional" <?php echo ($consulta['tipoCobertura']=="Opcional"?"Selected":"") ?>>Opcional</option>
               <option value="Basica" <?php echo ($consulta['tipoCobertura']=="Basica"?"Selected":"") ?>>Basica</option>

            </select>
          </div>

           <div class="form-group">
             <label>Descripcion</label><br>
             <textarea required name="descripcion" class="form-control"  rows="6"><?php echo $consulta['descripcion']; ?></textarea><br>
             </div>
         

           <?php 
          if ($_GET['opcion']=="Eliminar" or $_GET['opcion']=="Activar") {
            echo "</fieldset>";
          }
           ?>
          <label><mark>*</mark>Campo obligatorio</label><br>
          
           
         
          
             <center>
            <input type="submit" value="<?php echo $_GET['opcion'] ?>" name="boton" class="btn btn-info btn-lg" >  
            <a href="ventanaCoberturas.php" name="cancelar" class="btn btn-info btn-lg">Cancelar</a>        
          </center>
           </div>  
        </form>
   
  </div>
  
<hr>

<?php include("PieDePagina2.php"); ?>

</div>
</body>
</html>