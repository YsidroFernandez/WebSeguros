<?php include ("conexion.php");
$sql="SELECT codSiniestro FROM siniestro WHERE Vehiculoplaca='$_REQUEST[valor]'";
$resultado = mysql_query($sql);

if(mysql_num_rows($resultado)>0)
{
	?><option value="">Seleccione el código de siniestro</option><?php
	while($fila=mysql_fetch_array($resultado)){
		?>
			<option value="<?= $fila['codSiniestro'] ?>" <?=$fila['codSiniestro']==$_REQUEST['valor2'] ? "Selected":""?>><?= $fila['codSiniestro'] ?></option>
		<?php 
	}
}
else{
	?> <option value="">No hay siniestros asociados</option><?php
}
 ?>