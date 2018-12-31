<?php 
include("conexion.php");
session_start();

$consulta=mysql_query("Select * from usuario where user='$_POST[username]' and pass='$_POST[password]'");
if(mysql_num_rows($consulta)==0) //user y pass no coinciden o no existe
{
	?>
	<script type="text/javascript">
		alert("Datos incorrectos"); 
		window.history.back();	//Lo manda de regreso sin borrar el texto en los inputs
	</script>
	<?php
	exit(); //Para que se salga de este php
}
else
{
	$fila=mysql_fetch_array($consulta);
	$_SESSION['username']=$fila['cedula'];
	
	switch ($fila['RolcodRol']) 
	{
		case 1: //Analista 
			header("Location:ventanaCliente.php");
			exit();
		break;
		case 2: //Ajustador(perito)
			header("Location:ventanaInspecciones.php");
			exit();
		break;
		case 4: //Administrador
              header("Location:ventanaAdministrador.php");
              exit();
		break;
	}
}



 ?>