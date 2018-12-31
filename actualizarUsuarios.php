<?php 
session_start();
	include("conexion.php");

	switch ($_POST['boton']) {
		case "Registrar":

			$consulta=mysql_query("Select * from usuario where cedula='$_POST[cedula]'");
			if(mysql_num_rows($consulta)>0)
			{
			?>
				<script type="text/javascript">
				alert("¡ERROR! Cedula ya existe"); 
				window.history.back();	//Lo manda de regreso sin borrar el texto en los inputs
				</script>
			<?php
			exit(); //Para que se salga de este php
			}


			$sql="INSERT INTO usuario (cedula, EstadocodEstado, AseguradoracodAseguradora, RolcodRol, user, pass, nombre, apellido, fechaNacimiento, email, telefono, fechaIngreso, estatus) ";
			$sql.="values(";
			$sql.="'$_POST[cedula]', ";
			$sql.="'$_POST[estado]', ";
			$sql.="'$_POST[tipoA]', ";
			$sql.="'$_POST[tipo]', ";
			$sql.="'$_POST[usuario]', ";
			$sql.="'$_POST[contrasena]', ";
			$sql.="'$_POST[nombre]', ";
			$sql.="'$_POST[apellido]', ";
			$sql.="'$_POST[fechaN]', ";
			$sql.="'$_POST[correo]', ";
			$sql.="'$_POST[telefono]', ";
			$sql.="'$_POST[fechai]', ";
			$sql.="'A')";
			mysql_query($sql);
			?>
			<script type="text/javascript"> alert("Registrado con éxito!!"); </script>
			<?php 
		break;
		case "Modificar":

			$sql = "UPDATE  `proyecto`.`usuario` SET  ";
			//$sql.="`cedula` =  '$_POST[cedula]', ";
            $sql.="`EstadocodEstado` = '$_POST[estado]', ";
            $sql.= "`AseguradoracodAseguradora` =  '$_POST[tipoA]', ";
            $sql.="`RolcodRol` =  '$_POST[tipo]', ";
            $sql.="`user` =  '$_POST[usuario]', ";
            $sql.="`pass` =  '$_POST[contrasena]',";
            $sql.="`nombre` =  '$_POST[nombre]', ";
            $sql.="`apellido` =  '$_POST[apellido]', ";
            $sql.="`fechaNacimiento` =  '$_POST[fechaN]', ";
            $sql.="`email` =  '$_POST[correo]', ";
            $sql.="`telefono` =  '$_POST[telefono]', ";
            $sql.="`fechaIngreso` =  '$_POST[fechai]', ";
            $sql.="`estatus` =  'A' ";
			

			
			$sql .= " where cedula='$_POST[cedula2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Modificado con éxito!!"); </script>
			<?php 

		break;
		case "Activar":
			$sql="Update usuario set estatus='A' where cedula='$_POST[cedula2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Activado con éxito!!"); </script>
			<?php 
		break;
		case "Eliminar":
			$sql="Update usuario set estatus='I' where cedula='$_POST[cedula2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Eliminado con exito!!"); </script>
			<?php 
		break;
	}

	?>
	<script type="text/javascript"> document.location.href="ventanaAdministrador.php"; </script>
	<?php 
 ?>