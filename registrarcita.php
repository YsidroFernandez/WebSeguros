<?php
include("conexion.php");
include("calcularedad.php");


$resultado=mysql_query("select * from cita where Tomadorcedula='$_POST[cedula]'");
$fila=mysql_fetch_array($resultado);

if(mysql_num_rows($resultado)>0)
{
 $sql = "update cita set TomadorCedula = '$_POST[cedula]'";
			$sql .= ", comentario = '$_POST[mensaje]'";
			$sql .= ", SucursalcodSucursal = '$_POST[sucursal]'";
			$sql .= ", estatus = 'A' where codCita='$_POST[fechaCita]';";
			mysql_query($sql);

			$sql = "update cita set TomadorCedula = '-'";
			$sql .= ", comentario = '-'";
			$sql .= ", SucursalcodSucursal = '-'";
			$sql .= ", estatus = 'E' where codCita='".$fila['codCita']."';";
			
			mysql_query($sql);
           ?>

	 <script type="text/javascript">alert("Cita modificada con éxito!!"); 
	    document.location.href="citas.php";
	</script>"

			<?php  
  }

else{
 
 
			$sql="Insert into cliente (`cedula`, `EstadocodEstado`, `nombre`, `apellido`, fechaNacimiento, `edad`, `direccion`, `telefono`, `e-mail`,`estatus`)";
			$sql.=" values(";
			$sql.="'$_POST[cedula]',";
			$sql.="'$_POST[estado]',";
			$sql.="'$_POST[nombre]',";
			$sql.="'$_POST[apellido]',";
			$sql.="'$_POST[fecha]',";
			$sql.=calculaedad($_POST['fecha']).",";
			$sql.="'$_POST[direccion]',";
			$sql.="'$_POST[telefono]',";
			$sql.="'$_POST[correo]',";
			$sql.="'C');";
			mysql_query($sql);

            $sql = "update cita set TomadorCedula = '$_POST[cedula]'";
			$sql .= ", comentario = '$_POST[mensaje]'";
			$sql .= ", SucursalcodSucursal = '$_POST[sucursal]'";
			$sql .= ", estatus = 'A' where codCita='$_POST[fechaCita]';";
			mysql_query($sql);
			?>

			<script type="text/javascript"> 
		     alert("Cita Generada con exito!!");
             document.location.href="citas.php";
		     </script>"
		    <?php  
		     
		 }

?>




 


		
			 

		
			