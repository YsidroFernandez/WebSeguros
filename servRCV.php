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
<div class="container">
  <div class="row ">
    <col-md-12><img src="img/rcv.jpg" class="imagengrande1 img-responsive" ></col-md-12>
  </div>
<div class="row center-block" >
  <div class="col-md-6">
  <br>
  <label class="label label-primary ">Cuida tu Vehículo con nosotros</label>
  <br>
<img src="img/rcv1.jpg" class="imagenmediana">
<br>
<br>
<label class="label label-primary">Te protegemos contra accidentes</label>
<br>
<img src="img/rcv2.jpg"class="imagenmediana">
<br>
<br>
<label class="label label-primary">CUIDAMOS</label>
<br>
<img src="img/rcv3.jpg"class="imagenmediana">
</div>
  <div class="col-md-6">
  <p>
    <!--Desde aca el codigo php para consultar la información de los seguros con sus coberturas-->
  <?php 
  
   $resultado = mysql_query("Select * from seguro where codSeguro='0001'");
   
  $fila=mysql_fetch_array($resultado);
  
                 echo '<center><h1>'.$fila["nombre"].'</h1></center><br><br>';
                 echo $fila["descripcion"]."<br><br>";

  $resultado=mysql_query("Select * from cobertura where SeguroCodSeguro='0001' and tipoCobertura='Basica'");
  echo "<center><h2> Coberturas Básicas </h2></center> <br><br>";

  while($fila=mysql_fetch_array($resultado)){
    echo "<mark>*<label>".$fila["nombre"].": </label></mark><br>".$fila["descripcion"]."<br><br>";
  }

  $resultado=mysql_query("Select * from cobertura where SeguroCodSeguro='0001' and tipoCobertura='Opcional'");
  echo "<center><h2> Coberturas Opcionales </h2></center> <br><br>";

  while($fila=mysql_fetch_array($resultado)){
    echo "<mark>*<label>".$fila["nombre"].": </label></mark><br>".$fila["descripcion"]."<br><br>";
  }



   ?>
  </p>


  </div>
  </div>
  </div>











 <?php include ("PieDePagina.php") ?>
  </div>
  </div>
</body>
</html>

