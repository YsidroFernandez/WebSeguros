<?php 
session_start();
	include("conexion.php");

	switch ($_POST['boton']) {
		case "Registrar":

			$consulta=mysql_query("Select * from inspeccion where codInspeccion='$_POST[codigo]'");
			if(mysql_num_rows($consulta)>0)
			{
			?>
				<script type="text/javascript">
				alert("¡ERROR! Codigo de informe ya existe"); 
				window.history.back();	//Lo manda de regreso sin borrar el texto en los inputs
				</script>
			<?php
			exit(); //Para que se salga de este php
			}

			$carpeta= "documentos/inspecciones/";
			opendir($carpeta);
			$nombreArchivo = $_FILES['archivo']['name'];
			$destino=$carpeta.$nombreArchivo;
			copy($_FILES['archivo']['tmp_name'], $destino);

			$sql="Insert into inspeccion (`codInspeccion`,SiniestrocodSiniestro ,`Vehiculoplaca`, `TipoInspeccioncodTipo`, `EstadocodEstado`, Usuariocedula, `fecha`, `lugar`, `evaluacion`, `nombreArchivo`)";
			$sql.="values(";
			$sql.="'$_POST[codigo]',";
			$sql.="'$_POST[siniestro]',";
			$sql.="'$_POST[placa]',";
			$sql.="'$_POST[tipo]',";
			$sql.="'$_POST[estado]',";
			$sql.="'$_SESSION[username]',";
			$sql.="'$_POST[fecha]',";
			$sql.="'$_POST[lugar]',";
			$sql.="'$_POST[evaluacion]',";
			$sql.="'$nombreArchivo')";
			mysql_query($sql);
			?>
			<script type="text/javascript"> alert("Registrado con éxito!!"); </script>
			<?php 
		break;
		case "Modificar":

			$sql = "update inspeccion set Vehiculoplaca = '$_POST[placa]'";
			$sql .= ", TipoInspeccioncodTipo = '$_POST[tipo]'";
			$sql .= ", EstadoCodEstado = '$_POST[estado]'";
			$sql .= ", fecha = '$_POST[fecha]'";
			$sql .= ", lugar = '$_POST[lugar]'";
			$sql .= ", evaluacion = '$_POST[evaluacion]'";

			if(!empty($_FILES['archivo']['name']))
			{
				//unlink($_POST['archivo']); //borrar el viejo

				//actualizar con nuevo archivo.
				$carpeta= "documentos/inspecciones/";
				opendir($carpeta);
				$nombreArchivo = $_FILES['archivo']['name'];
				$destino=$carpeta.$nombreArchivo;
				copy($_FILES['archivo']['tmp_name'], $destino);

				$sql .= ", nombreArchivo = '$nombreArchivo'";
			}
			$sql .= " where codInspeccion='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Modificado con éxito!!"); </script>
			<?php 

		break;
		case "Activar":
			$sql="Update inspeccion set estatus='A' where codInspeccion='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Activado con éxito!!"); </script>
			<?php 
		break;
		case "Eliminar":
			$sql="Update inspeccion set estatus='I' where codInspeccion='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Eliminado con éxito!!"); </script>
			<?php 
		break;
	}

	?>
	<script type="text/javascript"> document.location.href="ventanaInspecciones.php"; </script>
	<?php 
 ?>