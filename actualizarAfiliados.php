<?php 
session_start();
	include("conexion.php");

	switch ($_POST['boton']) {
		case "Registrar":

			$consulta=mysql_query("Select * from empresaafiliada where codEmpresa='$_POST[codigo]'");
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


			$sql="INSERT INTO empresaafiliada (codEmpresa, EstadocodEstado, nombre, direccion, rif, correo, telefono, nroCuenta, estatus) ";
			$sql.="values(";
			$sql.="'$_POST[codigo]', ";
			$sql.="'$_POST[estado]', ";
			$sql.="'$_POST[nombre]', ";
			$sql.="'$_POST[direccion]', ";
			$sql.="'$_POST[rif]', ";
			$sql.="'$_POST[correo]', ";
			$sql.="'$_POST[telefono]', ";
			$sql.="'$_POST[numero]', ";
			$sql.="'A')";


            
			mysql_query($sql);

           $servicios = array();
			if(isset($_POST['servicios']))
				$servicios = $_POST['servicios'];
			
			foreach ($servicios as $key => $value) {
				$sql="INSERT INTO servicio (`EmpresaAfiliadacodEmpresa`, `TipoServiciocodTipoServicio`, `estatus`)";
				$sql.="values(";
				$sql.="'$_POST[codigo]', ";
				$sql.="'$value', ";
				$sql.="'A')";
				mysql_query($sql);
				}



			?>
			<script type="text/javascript"> alert("Empresa Registrada con éxito!!"); </script>
			<?php 
		break;
		/*case "Modificar":

			$sql="UPDATE empresaafiliada set ";
			
			$sql.="codEmpresa='$_POST[codigo]', ";
			$sql.="EstadocodEstado='$_POST[estado]', ";
			$sql.="nombre='$_POST[nombre]', ";
			$sql.="direccion='$_POST[direccion]', ";
			$sql.="rif='$_POST[rif]', ";
			$sql.="correo='$_POST[correo]', ";
			$sql.=" telefono='$_POST[telefono]', ";
			$sql.="nroCuenta='$_POST[numero]', ";
			$sql.="estatus='A'";
			

			
			$sql .= " where codEmpresa='$_POST[codigo2]'";
			mysql_query($sql);


			$servicios = array();
			if(isset($_POST['servicios']))
				$servicios = $_POST['servicios'];
			
			foreach ($servicios as $key => $value) {
				$sql="UPDATE servicio SET ";
				
				$sql.="EmpresaAfiliadacodEmpresa='$_POST[codigo2]', ";
				$sql.="TipoServiciocodTipoServicio='$value', ";
				$sql.="estatus='A'";
				$sql .= " where codEmpresa='$_POST[codigo2]'";
				mysql_query($sql);
				}
			?>

                

				<script type="text/javascript"> alert("Modificada con éxito!!"); </script>
			<?php 

		break;*/
		case "Activar":
			$sql="Update empresaafiliada set estatus='A' where codEmpresa='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Activada con \u00e9xito!!"); </script>

			<?php 
		break;
		case "Eliminar":
			$sql="Update empresaafiliada set estatus='I' where codEmpresa='$_POST[codigo2]'";
			mysql_query($sql);
			?>
				<script type="text/javascript"> alert("Eliminada con exito!!"); </script>
			<?php 
		break;
	}

	?>
	<script type="text/javascript"> document.location.href="ventanaAfiliados.php"; </script>
	<?php 
 ?>