<?php 
session_start();
	include("conexion.php");

	switch ($_POST['boton']) {
		case "Registrar":

			$consulta=mysql_query("Select * from cobertura where codCobertura='$_POST[codigo]'");
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


			$sql="INSERT INTO cobertura (codCobertura, SegurocodSeguro, nombre, descripcion, tipoCobertura, estatus) ";
			$sql.="values(";
			$sql.="'$_POST[codigo]', ";
			$sql.="'$_POST[seguro]', ";
			$sql.="'$_POST[nombre]', ";
			$sql.="'$_POST[descripcion]', ";
			$sql.="'$_POST[tipoC]', ";
			$sql.="'A')";
			mysql_query($sql);
			?>
			<script type="text/javascript"> alert("Cobertura Registrada con éxito!!"); </script>
			<?php 
		break;
		case "Modificar":

			$sql = "UPDATE  cobertura SET  ";
			//$sql.="`cedula` =  '$_POST[cedula]', ";
            $sql.="SegurocodSeguro = '$_POST[seguro]', ";
            $sql.= "nombre =  '$_POST[nombre]', ";
            $sql.="descripcion =  '$_POST[descripcion]', ";
            $sql.="tipoCobertura='$_POST[tipoC]', ";
            $sql.="estatus =  'A' ";
			

			
			$sql .= " where codCobertura='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Modificada con éxito!!"); </script>
			<?php 

		break;
		case "Activar":
			$sql="Update cobertura set estatus='A' where codCobertura='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Activada con \u00e9xito!!"); </script>

			<?php 
		break;
		case "Eliminar":
			$sql="Update cobertura set estatus='I' where codCobertura='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Eliminada con exito!!"); </script>
			<?php 
		break;
	}

	?>
	<script type="text/javascript"> document.location.href="ventanaCoberturas.php"; </script>
	<?php 
 ?>