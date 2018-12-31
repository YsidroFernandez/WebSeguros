<?php 
include ("conexion.php");

/*Actualizar el monto total de los siniestros sumando todas las facturas activas.*/
	$resultado= mysql_query("SELECT codSiniestro from siniestro");
	while($fila=mysql_fetch_array($resultado))
	{
		mysql_query("UPDATE siniestro set `montoTotalSiniestro` = (Select sum(factura.monto) from factura where SiniestrocodSiniestro = $fila[0] and factura.estatus='A') where siniestro.codSiniestro=$fila[0]");	
	}
 ?>