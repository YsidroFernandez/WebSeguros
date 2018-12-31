<?php 
include("conexion.php");

$sql = "UPDATE Aseguradora set ";
$sql .= "nombre = '$_POST[nombreA]'";
$sql .= ", rif = '$_POST[rif]'";
$sql .= ", fechaFundacion = '$_POST[fechaf]'";
$sql .= ", mision = '$_POST[mision]'";
$sql .= ", Vision = '$_POST[vision]'";
$sql .= " where codAseguradora='0001'";
mysql_query($sql);
 ?>
 			<script type="text/javascript"> 
			 alert("Datos de la aseguradora modificados!");
			  document.location.href="ventanaAseguradora.php";
			</script>