<?php 
include("conexion.php");

?><option value="">Selecciona el Modelo</option> <?php
$query="SELECT codModelo, annoDelModelo, nombreModelo FROM modelo WHERE MarcaCodMarca=".$_REQUEST["marca"]." ORDER BY nombreModelo";
 $resultado = mysql_query($query) or die("Ocurrio un error en la consulta SQL");

 mysql_close();
 while(($fila=mysql_fetch_array($resultado))!=NULL)
        {
            echo '<option value="'.$fila["codModelo"].'">'.$fila["nombreModelo"]." ".$fila["annoDelModelo"].'</option>';
           }
mysql_free_result($resultado);

// Cerrar la conexión
mysql_close($link);

 //             
?> 
