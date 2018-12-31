<?php 
include ("conexion.php");

$resultado=mysql_query("SELECT tiposervicio.codTipoServicio, tiposervicio.nombre
FROM empresaafiliada, servicio, tiposervicio
WHERE empresaafiliada.codEmpresa = EmpresaAfiliadacodEmpresa
AND tiposervicio.codTipoServicio =  `TipoServiciocodTipoServicio` 
AND tiposervicio.estatus =  'A'
AND empresaafiliada.estatus =  'A'
AND servicio.estatus =  'A'
AND EmpresaAfiliadacodEmpresa =  '$_REQUEST[valor]'");

?><option value="">Seleccione el servicio</option><?php
if(mysql_num_rows($resultado)>0)
{
	while($fila=mysql_fetch_array($resultado)){
		?>
			<option value="<?= $fila[0] ?>" <?= $fila[0] == $_REQUEST['valor2'] ? "Selected" : ""?>><?= $fila[1] ?></option>
		<?php 
	}
}

?>