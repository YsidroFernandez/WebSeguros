<?php 
	session_start();
	include("conexion.php");

	switch ($_POST['boton']) {
		case "Registrar":

			$consulta=mysql_query("Select * from polizadeseguro where codPoliza='$_POST[codigo]'");
			if(mysql_num_rows($consulta)>0)
			{
			?>
				<script type="text/javascript">
				alert("¡ERROR! La póliza ya existe"); 
				window.history.back();	//Lo manda de regreso sin borrar el texto en los inputs
				</script>
			<?php
			exit(); //Para que se salga de este php
			}
			$fechaEmision= date("y-m-d");
			$fechaCaducidad = ($fechaEmision +1).date("-m-d");
			switch ($_POST['tipoPoliza']) 
			{
				case 1:			
						$sql="INSERT INTO polizadeseguro (`codPoliza`, `Vehiculoplaca`, `Tomadorcedula`, `TipoPolizacodTipo`, `SucursalcodSucursal`, `Usuariocedula`, `fechaEmision`, `fechaCaducidad`, `prima`, `montoAsegurado`, `estatus`)";
						$sql.="values(";
						$sql.="'$_POST[codigo]',";
						$sql.="'$_POST[vehiculo]',";
						$sql.="'$_POST[tomador]',";
						$sql.="'$_POST[tipoPoliza]',";
						$sql.="'$_POST[sucursal]',";
						$sql.="'$_POST[corredor]',";
						$sql.="'$fechaEmision',";
						$sql.="'$fechaCaducidad',";
						$sql.="0,";
						$sql.="'$_POST[montoasegurado]',";
						$sql.="'C')";
						mysql_query($sql);
						mysql_query("update vehiculo set estatus='A' where placa='$_POST[vehiculo]'");
					break;
				
				case 2:
					$sql="INSERT INTO polizadeseguro (`codPoliza`, `Tomadorcedula`, `TipoPolizacodTipo`, `SucursalcodSucursal`, `Usuariocedula`, `fechaEmision`, `fechaCaducidad`, `prima`, `montoAsegurado`, `estatus`)";
					$sql.="values(";
					$sql.="'$_POST[codigo]',";
					$sql.="'$_POST[tomador]',";
					$sql.="'$_POST[tipoPoliza]',";
					$sql.="'$_POST[sucursal]',";
					$sql.="'$_POST[corredor]',";
					$sql.="'$fechaEmision',";
					$sql.="'$fechaCaducidad',";
					$sql.="0,";
					$sql.="'$_POST[montoasegurado]',";
					$sql.="'C')";
					mysql_query($sql);

					$vehiculos = $_POST['vehiculosFlota'];
					foreach ($vehiculos as $key => $value) {
						$sql="INSERT INTO certificadoseguro (`PolizaDeSeguroCodPoliza`, `Vehiculoplaca`)";
						$sql.="values(";
						$sql.="'$_POST[codigo]',";
						$sql.="'$value')";
						mysql_query($sql);
						mysql_query("update vehiculo set estatus='A' where placa='$value'");
					}
					break;
				}

			$coberturas = array();
			if(isset($_POST['coberturas']))
				$coberturas = $_POST['coberturas'];
			array_push($coberturas, '0001','0002'); 
			foreach ($coberturas as $key => $value) {
				$sql="INSERT INTO coberturaporpoliza (`CoberturacodCobertura`, `PolizaDeSeguroCodPoliza`, coberturaporpoliza.`montoPrima`)";
				$sql.="values(";
				$sql.="'$value',";
				$sql.="'$_POST[codigo]',";
				$sql.="(Select primaportipovehiculo.montoPrima from primaportipovehiculo where TipoVehiculocodTipo = $_POST[tipo] and CoberturacodCobertura = '$value'))";
				mysql_query($sql);
				}

			$sql="UPDATE polizadeseguro set prima = (SELECT sum(montoPrima) FROM `coberturaporpoliza` WHERE `PolizaDeSeguroCodPoliza` = '$_POST[codigo]') WHERE codPoliza='$_POST[codigo]'";
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
				<script type="text/javascript"> alert("Modificado con éxito!! <?php echo $sql; ?>"); </script>
			<?php 

		break;
	}
	switch ($_GET['opcion']) {
		case "Pagar":
			mysql_query("UPDATE polizadeseguro set estatus='A' where codPoliza='$_GET[poliza]'") or die ($sql .mysql_error()."" );
		break;
		case "Suspender":
			mysql_query("UPDATE polizadeseguro set estatus='S' where codPoliza='$_GET[poliza]'") or die ($sql .mysql_error()."" );
			/*Actualiza el vehículo (particular) de Asegurado a Inspeccionado*/
			mysql_query("UPDATE vehiculo set vehiculo.estatus='I' where vehiculo.placa = (Select Vehiculoplaca from polizadeseguro where codPoliza='$_GET[poliza]')");

			/*Actualiza el vehículo (flota) de Asegurado a Inspeccionado*/
			mysql_query("UPDATE certificadoseguro set estatus='I' where PolizaDeSeguroCodPoliza='$_GET[poliza]'");
			$resultado = mysql_query("Select Vehiculoplaca from certificadoseguro where PolizaDeSeguroCodPoliza = '$_GET[poliza]'");
			while($fila=mysql_fetch_array($resultado)){
				mysql_query("UPDATE vehiculo set vehiculo.estatus='I' where vehiculo.placa ='$fila[Vehiculoplaca]'");
			}
		break;
		case "Renovar":
			$fechaCaducidadNueva=date('Y-m-d',strtotime('+1 year' , strtotime ( date('Y-m-d'))));
			mysql_query("UPDATE polizadeseguro set estatus='C', fechaCaducidad = '$fechaCaducidadNueva' where codPoliza='$_GET[poliza]' AND estatus='V'") or die ($sql .mysql_error()."" );
		break;
	}

	?>
	<script type="text/javascript"> document.location.href="ventanaPoliza.php"; </script>
	<?php 
 ?>