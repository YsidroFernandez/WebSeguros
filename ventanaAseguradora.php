<?php 
include("conexion.php");
$registros=mysql_query("Select * from aseguradora where codAseguradora='0001'");
$consulta= mysql_fetch_array($registros);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- importar librerias para estilos y responsib -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet"  href="css/estilos.css">
  <script src="js/jquery.js"></script>
    <style type="text/css">
    </style>
<script src="js/bootstrap.min.js"></script>
	<title>Admin</title>
</head>
<body>
	<div class="container">
    <?php $clase="ase" ;
      include("encabezado2.php");
    ?>
 
  <?php $accion="Modificar" ?>
<!-- cuerpo de diseño de la pantalla principal del administrador -->
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Datos Basicos de la aseguradora</strong></div>
       <div class="panel-body">
        <p>Aqui se puede modificar lo referente a la informacion basica de la seguradora. </p>
      <form class="form" method="post" action="actualizarAseguradora.php" enctype="multipart/form-data">
        <div class="row">
      <center> 
          <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
             <label>Nombre de la aseguradora</label><br>
             <input required id="nombre" name="nombreA" type="text" value="<?php echo $consulta['nombre'] ?>"  class="form-control" ><br>
            </div>
            <div class="form-group">
             <br>
             <label>RIF de la aseguradora</label><br>
             <input required id="rif" name="rif" type="text" value="<?php echo $consulta['rif'] ?>"   class="form-control" ><br>
             </div>
             <div class="form-group">
             <label>Fecha de fundacion</label><br>
             <input required id="fechaf" name="fechaf" type="date" value="<?php echo $consulta['fechaFundacion'] ?>"  class="form-control" ><br>
             </div>
             <div class="form-group">
             <label>Misión</label><br>
             <textarea required name="mision" class="form-control"  rows="6"><?php echo $consulta['mision'] ?></textarea><br>
             </div>
             <div class="form-group">
             <label>Visión</label><br>
             <textarea required name="vision" class="form-control"  rows="6"><?php echo $consulta['Vision'] ?></textarea>
          </div>
              
            <div class="form-group ">
              <br>
              <button type="submit" class="btn btn-info btn-lg"><?php echo $accion ?></button>
             <br>
             
            <!--  <span class="label label-primary">Ocupadas</span><br>
            <span class="label label-danger">Desocupadas</span> -->
            </div>
            
          </div>
          
      </center> 
       
        </div>
        </form>
      </div>
      <hr>
     <!--  desde aca el cuerpo de la tabla  -->




      </div>

<!-- hasta aqui el cuerpo de diseño -->


  <?php include("PieDePagina2.php") ?>
</div>
</body>
</html>