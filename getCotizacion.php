<?php 
include("conexion.php");

$query="SELECT cotizacion, nombreModelo, annoDelModelo FROM modelo WHERE codModelo=".$_REQUEST["modelo"];
 $resultado = mysql_query($query) or die("Ocurrio un error en la consulta SQL");

 mysql_close();




	while(($fila=mysql_fetch_array($resultado))!=NULL)
     {
     	if($fila["nombreModelo"]!="..."){
          echo $fila["nombreModelo"]." ".$fila["annoDelModelo"]." cobertura Amplia de Bs: ".$fila["cotizacion"];
      }else
      echo"Debe seleccionar un modelo valido";
     }
    


mysql_free_result($resultado);

// Cerrar la conexión

              
?>