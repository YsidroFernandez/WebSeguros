<?php
include("conexion.php");
include("calcularedad.php");

switch ($_GET['opcion']) {
	case 'Registrar':
			$fecha = date($_POST['fechai']);
			$nuevafecha=$fecha;
			$fechaf=date($_POST['fechaf']);

			if($fecha>$fechaf){

			 ?>
			 <script type="text/javascript"> 
			 alert("ERROR: La fecha de fin debe ser mayor a la inicial");
			  document.location.href="ventanaCitas.php";
			</script>
			 <?php  

			}else{


			$fechaf= strtotime ( '+1 day' , strtotime ( $fechaf) ) ;
			$fechaf = date ( 'Y-m-j' , $fechaf);

			while($nuevafecha!=$fechaf)
			{


			$sql="INSERT INTO  `proyecto`.`cita` (
			`codCita` ,
			`Tomadorcedula` ,
			`fecha` ,
			`comentario` ,
			`SucursalcodSucursal` ,
			`estatus`
			)
			VALUES (
			NULL ,  '-',  '$nuevafecha',  '-',  '-',  'E'
			);";

			mysql_query($sql);
			$nuevafecha = strtotime ( '+1 day' , strtotime ( $nuevafecha) ) ;
			$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
			}
			}

			?>

			<script type="text/javascript"> 
			 alert("Citas Generadas con exito!!");
			  document.location.href="ventanaCitas.php";
			</script><?php

		break;
	case 'Eliminar':
		$sql="DELETE FROM  `cita` WHERE  `cita`.`codCita` ='$_GET[codCita]' ";
		mysql_query($sql);
		?>

			<script type="text/javascript"> 
			 alert("Cita Eliminada con exito");
			  document.location.href="ventanaCitas.php";
			</script><?php
		break;
	default:
		# code...
		break;
}
?>










 


		
			 

		
			