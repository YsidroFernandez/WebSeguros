<?php 

	include("conexion.php");

	switch ($_POST['boton'])
	 {
		case "Registrar":

	$registro=mysql_query("Select placa from vehiculo where placa='$_POST[placa]' and estatus='A'");
    if(mysql_num_rows($registro)==0)
    {

			 ?>
				<script type="text/javascript">
				alert("¡ERROR! La Placa no existe o el Vehículo no está Activo"); 
				window.history.back();//Lo manda de regreso sin borrar el texto en los inputs
				</script>
			<?php
			exit(); //Para que se salga de este php

    }
      	$sql="INSERT into siniestro (`TipoSiniestrocodTipoSiniestro`, `Vehiculoplaca`, `EstadocodEstado`, `fechaSiniestro`, `fechaReporte`,`montoReserva` ,`direccion`,`estatus`)";
				$sql.="values(";
				$sql.="'$_POST[tipo]',";
				$sql.="'$_POST[placa]',";
				$sql.="'$_POST[estado]',";
				$sql.="'$_POST[fecha]',";
				$sql.="'".date("Y-m-d")."',";
				$sql.="'$_POST[montoR]',";
				$sql.="'$_POST[direccion]',";
				$sql.="'P')";
				mysql_query($sql);
				?>
				<script type="text/javascript"> alert("Registrado con éxito!") ; </script>
				<?php 
     
		break;


		case "Modificar":

			$sql = "UPDATE siniestro set Vehiculoplaca= '$_POST[placa]'";
			$sql .= ", TipoSiniestrocodTipoSiniestro= '$_POST[tipo]'";
			$sql .= ", fechaSiniestro= '$_POST[fecha]'";
			$sql .= ", EstadocodEstado = $_POST[estado]";
			$sql .= ", montoReserva = $_POST[montoR]";
			$sql .= ", direccion = '$_POST[direccion]'";
			$sql .= " where codSiniestro=$_POST[placa2]";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Modificado con éxito!"); </script>
			<?php 

		break;

	}
	switch($_GET['opcion'])
	{
		case "decision":
			$sql="UPDATE siniestro set estatus='C', montoAprobado=$_GET[montoAprobado], fechaDecision = CURDATE() WHERE codSiniestro=$_GET[codigo]";
			mysql_query($sql);
			?>
			<script type="text/javascript"> alert("Indemnizado con éxito!\nSiniestro pasado a Completado.") </script>
			<?php 
		break;
	}

	?>
	<script type="text/javascript"> document.location.href="ventanaSiniestros2.php"; </script>
	<?php 
 ?>