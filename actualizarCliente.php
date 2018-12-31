<?php 
session_start();
	include("conexion.php");
	include ("calcularedad.php");

	switch ($_POST['boton']) {
		case "Registrar":

			$consulta=mysql_query("Select * from cliente where cedula='$_POST[cedula]'");
			if(mysql_num_rows($consulta)>0)
			{
			?>
				<script type="text/javascript">
				alert("¡ERROR! Tomador ya existe"); 
				window.history.back();	//Lo manda de regreso sin borrar el texto en los inputs
				</script>
			<?php
			exit(); //Para que se salga de este php
			}

			
				$sql="INSERT into cliente (`cedula`, `EstadocodEstado`, `nombre`, `apellido`, `fechaNacimiento`, `edad`, `direccion`, `telefono`, `e-mail`)";
				$sql.="values(";
				$sql.="'$_POST[cedula]',";
				$sql.="'$_POST[estado]',";
				$sql.="'$_POST[nombre]',";
				$sql.="'$_POST[apellido]',";
				$sql.="'$_POST[fecha]',";
				$sql.=calculaedad($_POST['fecha']).",";
				$sql.="'$_POST[direccion]',";
				$sql.="'$_POST[telefono]',";
				$sql.="'$_POST[correo]')";
				mysql_query($sql);
				?>
				<script type="text/javascript"> alert("Registrado con éxito!!"); </script>
				<?php 
		break;
		case "Modificar":
		case "Atender":

			$sql = "UPDATE cliente set EstadocodEstado = '$_POST[estado]'";
			$sql .= ", nombre = '$_POST[nombre]'";
			$sql .= ", apellido = '$_POST[apellido]'";
			$sql .= ", fechaNacimiento = '$_POST[fecha]'";
			$sql .= ", edad =".calculaedad($_POST['fecha']);
			$sql .= ", direccion = '$_POST[direccion]'";
			$sql .= ", telefono = '$_POST[telefono]'";
			$sql .= ", `e-mail` = '$_POST[correo]'";
			$sql .= ", estatus = 'A'";
			$sql .= " where cedula='$_POST[cedula2]'";

			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Modificado con éxito!!"); </script>
			<?php 

		break;

	}

	?>
	<script type="text/javascript"> document.location.href="ventanaCliente.php"; </script>
	<?php 
 ?>