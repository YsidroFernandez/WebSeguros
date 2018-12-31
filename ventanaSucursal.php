<?php 

include("conexion.php");
$sql="SELECT codSucursal,aseguradora.nombre, estado.estado, sucursal.nombre, sucursal.direccion, sucursal.telefono,  `e-mail` , sucursal.estatus
FROM sucursal, aseguradora, estado
WHERE sucursal.EstadocodEstado = estado.codEstado
AND sucursal.AseguradoracodAseguradora = aseguradora.codAseguradora";

if ($_GET['codigo']) {
  $sql.= " and codSucursal ='$_GET[codigo]'";
}
$sql.=" ORDER BY  sucursal.estatus,sucursal.codSucursal ";
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


    
    <?php $clase="suc" ;
      include("encabezado2.php");
    ?>
 

  
<!-- cuerpo de diseño de la pantalla principal del administrador -->
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Sucursales</strong></div>
       <div class="panel-body">
        <p>Aquí se muestran las Sucursales que tiene la Aseguradora. </p>
      <form class="form-inline" method="get">
        <div class="row">
      <center>
          <div class="col-md-3">
            <a href="formularioSucursal.php?opcion=Registrar" class="btn btn-info">Registrar</a>
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              <a href="ventanaSucursal.php" class="btn btn-info">Ver Todos</a>  
              <button type="submit" class="btn btn-info">Buscar</button>
              <input type="text"  maxlength=4 minlength=4  class="form-control" name="codigo" placeholder ="Codigo de la Sucursal..." required>
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
        <th>Código</th>
        <th>Aseguradora</th>
        <th>Estado</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>E-mail</th>
        <th>Acciones</th>
        
      </tr>
      </thead>
      <tbody>
        <?php 
      if (mysql_num_rows($resultado)==0) {
      
        ?>
        <tr>
          <td colspan="8" align="center"> <h3>No se encontraron Sucursales</h3></td>

        </tr> 
          <?php 
                     
          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class="<?php echo ($fila[7]=="A" ? "info" : "danger"); ?>">
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td><a href="mailto:<?php echo $fila[6] ?>"><?php echo $fila[6] ?></a></td>

        
        <td nowrap class="text-center">
          <?php 
            if ($fila[7]=="I") {
               ?>
              <a href="formularioSucursal.php?codigo=<?php echo $fila[0] ?>&opcion=Activar" class="btn btn-info btn-sm">Activar</a>    
               <?php 
            }
            else
            {
           ?>
          <a href="formularioSucursal.php?codigo=<?php echo $fila[0] ?>&opcion=Modificar" class="btn btn-info btn-sm">Modificar</a>
          
          <a href="formularioSucursal.php?codigo=<?php echo $fila[0]?>&opcion=Eliminar" class="btn btn-info btn-sm">Eliminar</a></td>
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