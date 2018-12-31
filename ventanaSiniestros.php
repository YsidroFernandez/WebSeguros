<?php 
session_start();
if (!isset($_SESSION['username'])) {
  //header("Location:index.php"); DESCOMENTAR LUEGO!!!
}

include("conexion.php");

$sql = "Select `codSiniestro`,`Vehiculoplaca`, `tiposiniestro`.`tipo`, `estado`.`estado`, `fechaSiniestro`,`direccion`,nombreArchivo, siniestro.estatus from estado, siniestro, tiposiniestro";
$sql .= " where `EstadocodEstado`= `estado`.`codEstado`";
$sql .= " and `TipoSiniestrocodTipoSiniestro` = `tiposiniestro`.`codTipoSiniestro`";

if ($_GET['codigo']) {
  $sql .= " and codSiniestro ='$_GET[codigo]'";
}
$sql .=" order by codSiniestro";
$resultado = mysql_query($sql);
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- importar librerias para estilos y responsib -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <script src="js/jquery.js"></script>
    <style type="text/css">

    table th{
      text-align: center
    }

    </style>
<script src="js/bootstrap.min.js"></script>
  <title>MiCarroSeguro</title>

</head>



<body>
  <div class="container">
  <nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header navbar-inverse">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <form action="">
    <a class="navbar-brand" href="index.php"><img class="img-rounded"style="margin-top:-5px;" src="img/micarro.jpg"  ></a>
    </form>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse navbar-inverse">
    <ul class="nav navbar-nav nav-tabs">
      <li><a href="ventanaInspecciones.php">Informe de Inspecciones</a></li>
      <li class="active"><a href="#">Informe de Siniestro</a></li>
    </ul>
 
    <form action="cerrarSesion.php" class="navbar-form navbar-inverse navbar-right" role="search">
      
      <button type="submit" class="btn btn-default">Cerrar sesión</button>
    </form>
  </div>
  </nav>
  
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Informe de inspecciones</strong></div>
       <div class="panel-body">
        <p>Aquí puedes ver todos los informes de siniestro que has subido. Para registrar uno nuevo
        haz click en el botón. </p>
      <form class="form-inline" method="get">
        <div class="row">
      <center>
          <div class="col-md-3">
            
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              <a href="ventanaSiniestros.php" class="btn btn-info">Ver Todos</a>  
              <button type="submit" class="btn btn-info">Buscar</button>
              <input type="text" minlength="1" maxlength="3" class="form-control" name="codigo" placeholder ="Código de Siniestro..." required>
            </div>
            
          </div>
         
      </center>
        </div>
        </form>
      </div>
      <div class="table-responsive">
    <table class="table table-hover">
      <thead>
      <tr>
        <th>Código</th>
        <th>Placa</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Lugar</th>
        <th>Archivo</th>
        <th>Acciones</th>
      </tr>
      </thead>
      <tbody>
        <?php 
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="9" align="center"> <h3>No se encontraron informes de Siniestros</h3></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr >
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td width="50"><a href="documentos/siniestros/<?php echo $fila[6] ?>"><?php echo $fila[6] ?></a></td>
        <td nowrap class="text-center">
          <form action="actualizarSiniestros.php" enctype="multipart/form-data" method="post" >
            
              <input type="submit" class="btn btn-info btn-sm" value="Subir">
              <input type="hidden" name="codigo" value="<?php echo $fila[0];  ?>  ">
              <input required type="file" name="archivo" class="form-control">
          </form>
        </td>

         
      </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
    </div>
  
<hr>

<?php include("PieDePagina2.php") ?>

</div>
  
</body>
</html>