<?php 
session_start();
	include("conexion.php");

	switch ($_POST['boton']) {
		case "Registrar":

			$consulta=mysql_query("Select * from vehiculo where placa='$_POST[placa]'");
			if(mysql_num_rows($consulta)>0)
			{
			?>
				<script type="text/javascript">
				alert("¡ERROR! El vehículo ya existe"); 
				window.history.back();	//Lo manda de regreso sin borrar el texto en los inputs
				</script>
			<?php
			exit(); //Para que se salga de este php
			}
				$sql="INSERT INTO vehiculo (`placa`, `ModelocodModelo`, `Aseguradocedula`, `EstadocodEstado`, `TipoVehiculoCodTipo`, `color`, `serial`, `kilometraje`, `estatus`)";
				$sql.="values(";
				$sql.="'$_POST[placa]',";
				$sql.="'$_POST[modelo]',";
				$sql.="'$_POST[asegurado]',";
				$sql.="'$_POST[estado]',";
				$sql.="'$_POST[tipo]',";
				$sql.="'$_POST[color]',";
				$sql.="'$_POST[serial]',";
				$sql.="'$_POST[kilometraje]',";
				$sql.="'P')";
				mysql_query($sql);
				?>
				<script type="text/javascript"> alert("Registrado con éxito!!"); </script>
				<?php 



		break;
		case "Modificar":

			$sql = "UPDATE vehiculo set ModelocodModelo = '$_POST[modelo]'";
			$sql .= ", Aseguradocedula = '$_POST[asegurado]'";
			$sql .= ", EstadocodEstado = '$_POST[estado]'";
			$sql .= ", TipoVehiculoCodTipo = '$_POST[tipo]'";
			$sql .= ", color = '$_POST[color]'";
			$sql .= ", serial = '$_POST[serial]'";
			$sql .= ", kilometraje = '$_POST[kilometraje]'";
			$sql .= " where placa='$_POST[placa2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Modificado con éxito!!"); </script>
			<?php 

		break;

	}

	?>
	<script type="text/javascript"> document.location.href="ventanaVehiculo.php"; </script>
	<?php 
 ?>