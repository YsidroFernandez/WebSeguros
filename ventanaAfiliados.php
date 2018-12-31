<?php 

include("conexion.php");
$sql = "select  codEmpresa, estado, nombre, telefono, direccion,  empresaafiliada.estatus
from estado, empresaafiliada
where EstadocodEstado = codEstado ";
if ($_GET['codigo']) {
  $sql.= " and codEmpresa ='$_GET[codigo]'";
}

$sql.=" order by estado";
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


    
    <?php $clase="afi" ;
      include("encabezado2.php");
    ?>
 

  
<!-- cuerpo de diseño de la pantalla principal del administrador -->
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Control de Afiliados</strong></div>
       <div class="panel-body">
        <p>Desde acá se pueden observar, agregar y modificar las empresas afiliadas . </p>
      <form class="form-inline" method="get">
        <div class="row">
      <center>
          <div class="col-md-3">
            <a href="formularioAfiliados.php?opcion=Registrar" class="btn btn-info">Registrar</a>
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              <a href="ventanaAfiliados.php" class="btn btn-info">Ver Todos</a>  
              <button type="submit" class="btn btn-info">Buscar</button>
              <input type="text" class="form-control" name="codigo"  minlength="4" maxlength="4" placeholder ="Codigo de la empresa..." required>
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
              <th>Estado</th>
              <th>Empresa</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Servicios</th>
              
            </tr>
            </thead>
            <tbody>
              <?php 
              if (mysql_num_rows($resultado)==0) {

                ?>
                <tr>
                  <td colspan="9" align="center"> <h3>No se encontraron empresas afiliadas</h3></td>
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
      <td>
      <?php  
      $sql1 = "select tiposervicio.nombre from tiposervicio, servicio, empresaafiliada where EmpresaAfiliadacodEmpresa=".$fila[0]." and codEmpresa = EmpresaAfiliadacodEmpresa and TipoServiciocodTipoServicio=codTipoServicio;";

      $resultado1 = mysql_query($sql1);
      while($fila1=mysql_fetch_array($resultado1)){

               echo $fila1[0]." <br>"; }
        ?></td>
              <td nowrap class="text-center">
          <?php 
            if ($fila[5]=="I") {
               ?>
              <a href="formularioAfiliados.php?codigo=<?php echo $fila[0] ?>&opcion=Activar" class="btn btn-info btn-sm">Activar</a>    
               <?php 
            }
            else
            {
           ?>
          
          <a href="formularioAfiliados.php?codigo=<?php echo $fila[0]?>&opcion=Eliminar" class="btn btn-info btn-sm">Eliminar</a></td>
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