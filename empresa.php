<?php 
include("conexion.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!-- importar librerias para estilos y responsib -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet"  href="css/estilos.css">
	<script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<title>MiCarroSeguro</title>
</head>
<body>
	<?php include ("encabezado.php") ?>

  <div class="row ">
    <col-md-12><img src="img/ASEGURADORA.jpg" class="imagengrande1 img-responsive" ></col-md-12>
  </div>
<div class="row " >
  <div class="col-md-6">
  <br>
  <label class="label label-primary ">LÍDERES DEL MERCADO ASEGURADOR</label>
  <br>
<img src="img/mision.jpg" class="img-responsive" >
<br>
</div>
<div class="col-md-6">
<center><label><h2><b>"Misión"</b></h2></label></center>
<p>
<p>
    <!--Desde aca el codigo php para consultar la información de los seguros con sus coberturas-->
  <?php 
  
   $resultado = mysql_query("Select mision from aseguradora where codAseguradora='0001'");
   
  $fila=mysql_fetch_array($resultado);
  
                 echo '<center>'.$fila["mision"].'</center><br><br>';

?>
</p>
</div>
</div>

<div class="row " >

<div class="col-md-6">
<center><label><h2><b>"Visión"</b></h2></label></center>
<p>
    <!--Desde aca el codigo php para consultar la información de los seguros con sus coberturas-->
  <?php 
  
   $resultado = mysql_query("Select  vision from aseguradora where codAseguradora='0001'");
   


  $fila=mysql_fetch_array($resultado);
  
                 echo '<center>'.$fila["vision"].'</center><br><br>';

?>
</p>
</div>


  <div class="col-md-6">
  <br>
  <label class="label label-primary ">SATISFACER LAS NECESIDADES DE NUESTROS CLIENTES</label>
  <br>
<img src="img/vision.jpg" class="img-responsive" >
<br>
</div>
</div>
  <?php include ("PieDePagina.php") ?>
  
</div>
</body>
</html>
