<?php 

include("conexion.php");
$sql="SELECT codCobertura, seguro.nombre, cobertura.nombre, cobertura.descripcion, tipoCobertura, cobertura.estatus";
$sql.=" FROM cobertura, seguro";
$sql.=" WHERE SegurocodSeguro = codSeguro";
if ($_GET['codigo']) {
  $sql.= " and codCobertura ='$_GET[codigo]'";
}
$sql.=" ORDER BY seguro.nombre, tipoCobertura ";
$resultado = mysql_query($sql) or die ($sql .mysql_error()."" );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- importar librerias para estilos y responsib -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet"  href="css/estilos.css">
  <script src="js/jquery.js"></script>
    <style type="text/css">
    </style>
<script src="js/bootstrap.min.js"></script>
	<title>Admin</title>
</head>
<body>
	<div class="container">

    <?php $clase="cober" ;
      include("encabezado2.php");
    ?>
 
<!-- cuerpo de diseño de la pantalla principal del administrador -->
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Control de Coberturas</strong></div>
       <div class="panel-body">
        <p>Desde aca se pueden actualizar las coberturas que ofrece la aseguradora. </p>
      <form class="form-inline" method="get">
        <div class="row">
      <center>
          <div class="col-md-3">
            <a href="formularioCobertura.php?opcion=Registrar" class="btn btn-info">Registrar</a>
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              <a href="ventanaCoberturas.php" class="btn btn-info">Ver Todos</a>  
              <button type="submit" class="btn btn-info">Buscar</button>
              <input type="text" class="form-control" name="codigo"  minlength="4" maxlength="4" placeholder ="Codigo de la cobertura..." required>
            </div>
            
          </div>
          <div class="col-md-3  ">
            <img src="img/leyenda.png" alt="" class="img-thumbnail center-block">
          </div>
      </center>
        </div>
        </form>
      </div>
      <div class="table-responsive">
    <table class="table table-condensed">
      <thead>
      <tr>
        <th>Codigo</th>
        <th>Seguro</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Tipo</th>
        
      </tr>
      </thead>
      <tbody>
        <?php 
      if (mysql_num_rows($resultado)==0) {
      
        ?>
        <tr>
          <td colspan="9" align="center"> <h3>No se encontraron coberturas</h3></td>

        </tr> 
          <?php 
                     
          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class="<?php echo ($fila[5]=="A" ? "info" : "danger"); ?>">
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        
        <td nowrap class="text-center">
          <?php 
            if ($fila[5]=="I") {
               ?>
              <a href="formularioCobertura.php?codigo=<?php echo $fila[0] ?>&opcion=Activar" class="btn btn-info btn-sm">Activar</a>    
               <?php 
            }
            else
            {
           ?>
          <a href="formularioCobertura.php?codigo=<?php echo $fila[0] ?>&opcion=Modificar" class="btn btn-info btn-sm">Modificar</a>
          
          <a href="formularioCobertura.php?codigo=<?php echo $fila[0]?>&opcion=Eliminar" class="btn btn-info btn-sm">Eliminar</a></td>
          <?php } ?>
      </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
    </div>
  
<hr>


<!-- hasta aqui el cuerpo de diseño -->


  <?php include("PieDePagina2.php") ?>
</div>
</body>
</html>