<?php 
session_start();
	include("conexion.php");

	switch ($_POST['boton']) {
		case "Registrar":

			$sql="INSERT INTO  `proyecto`.`factura` (`SiniestrocodSiniestro` ,`EmpresaAfiliadacodEmpresa` ,`TipoServiciocodTipoServicio` ,`fecha` ,`monto` ,`descripcion`)";
			$sql.="VALUES (";
			$sql.="'$_POST[siniestro]',";
			$sql.="'$_POST[empresa]',";
			$sql.="'$_POST[servicio]',";
			$sql.="'$_POST[fecha]',";
			$sql.="'$_POST[monto]',";
			$sql.="'$_POST[descripcion]')";
			mysql_query($sql);
			?>
			<script type="text/javascript"> alert("Registrado con éxito!!"); </script>
			<?php 
		break;
		case "Modificar":

			$sql = "UPDATE factura set SiniestrocodSiniestro = '$_POST[siniestro]'";
			$sql .= ", EmpresaAfiliadacodEmpresa = '$_POST[empresa]'";
			$sql .= ", TipoServiciocodTipoServicio = '$_POST[servicio]'";
			$sql .= ", fecha = '$_POST[fecha]'";
			$sql .= ", monto = '$_POST[monto]'";
			$sql .= ", descripcion = '$_POST[descripcion]'";
			$sql .= " where codFactura=$_POST[codigo2]";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Modificado con éxito!!"); </script>
			<?php 
		break;
		case "Eliminar":
			$sql="UPDATE factura set estatus='I' where codFactura='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Eliminado con éxito!!"); </script>
			<?php 
		break;
		case "Activar":
			$sql="UPDATE factura set estatus='A' where codFactura='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Activado con éxito!!"); </script>
			<?php 
		break;
	}

	?>
	<script type="text/javascript"> document.location.href="ventanaFacturas.php?codigo=<?=$_POST[siniestro2] ? $_POST[siniestro2] : $_POST[siniestro]?>"; </script>
	<?php 
 ?>