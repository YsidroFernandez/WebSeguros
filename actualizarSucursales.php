<?php 
session_start();
	include("conexion.php");

	switch ($_POST['boton']) {
		case "Registrar":

			$consulta=mysql_query("Select * from sucursal where codSucursal='$_POST[codigo]'");
			if(mysql_num_rows($consulta)>0)
			{
			?>
				<script type="text/javascript">
				alert("¡ERROR! Codigo ya existe"); 
				window.history.back();	//Lo manda de regreso sin borrar el texto en los inputs
				</script>
			<?php
			exit(); //Para que se salga de este php
			}


			$sql="INSERT INTO sucursal (codSucursal, AseguradoracodAseguradora, EstadocodEstado, nombre, direccion,telefono,`e-mail`,estatus) ";
			$sql.="values(";
			$sql.="'$_POST[codigo]', ";
			$sql.="(SELECT codAseguradora FROM aseguradora WHERE aseguradora.estatus ='A'), ";
			$sql.="$_POST[estado], ";
			$sql.="'$_POST[nombre]', ";	
			$sql.="'$_POST[direccion]', ";
			$sql.="'$_POST[telefono]', ";
			$sql.="'$_POST[email]', ";
			$sql.="'A')";
			mysql_query($sql);
			?>
			<script type="text/javascript"> alert("Registrado con éxito"); </script>
			<?php 
		break;
		case "Modificar":

			$sql = " UPDATE sucursal SET EstadocodEstado = $_POST[estado], nombre='$_POST[nombre]', direccion='$_POST[direccion]', telefono='$_POST[telefono]',`e-mail`='$_POST[email]' where codSucursal='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Modificado con éxito"); </script>
			<?php 

		break;
		case "Activar":
			$sql="Update sucursal set estatus='A' where codSucursal='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Activada con \u00e9xito!!"); </script>

			<?php 
		break;
		case "Eliminar":
			$sql="Update sucursal set estatus='I' where codSucursal='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Eliminada con exito!!"); </script>
			<?php 
		break;
	}

	?>
	<script type="text/javascript"> document.location.href="ventanaSucursal.php"; </script>
	<?php
 ?>