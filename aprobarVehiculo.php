<?php 
	session_start();
	include("conexion.php");
	mysql_query("update vehiculo set estatus='I' where placa='$_GET[placa]'");
	?>
	<script type="text/javascript">
		window.history.back(); 
	</script>
	<?php 
				

 ?>	