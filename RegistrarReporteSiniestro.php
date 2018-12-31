<?php 
	include("conexion.php");
	
		
				$sql="INSERT into siniestro (`TipoSiniestrocodTipoSiniestro`, `Vehiculoplaca`, `EstadocodEstado`, `fechaSiniestro`, `fechaReporte`, `direccion`,`estatus`)";
				$sql.="values(";
				$sql.="'$_POST[tipo]',";
				$sql.="'$_POST[placa2]',";
				$sql.="'$_POST[estado]',";
				$sql.="'$_POST[fecha]',";
				$sql.="'".date("Y-m-d")."',";
				$sql.="'$_POST[direccion]',";
				$sql.="'P')";
				mysql_query($sql);
				?>
				<script type="text/javascript"> alert("Siniestro Reportado con éxito!!") ; </script>
				<?php 
		

	?>
	<script type="text/javascript"> document.location.href="index.php"; </script>
	<?php 
 ?>