<?php 
session_start();
if (!isset($_SESSION['username'])) {
  //header("Location:index.php"); DESCOMENTAR LUEGO!!!
}

include("conexion.php");

$sql = "Select `codInspeccion`,`Vehiculoplaca`, `tipoinspeccion`.`nombre`, `estado`.`estado`, `fecha`,`lugar`,`evaluacion`,`nombreArchivo`, inspeccion.estatus from estado, inspeccion, tipoinspeccion";
$sql .= " where `EstadocodEstado`= `estado`.`codEstado`";
$sql .= " and `TipoInspeccioncodTipo` = `tipoinspeccion`.`codTipo`";
$sql .= " and Usuariocedula = '$_SESSION[username]'";
if ($_GET['codigo']) {
  $sql .= " and codInspeccion ='$_GET[codigo]'";
}
$sql .=" order by codInspeccion";
$resultado = mysql_query($sql);

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- importar librerias para estilos y responsib -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet"  href="css/estilos.css">
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

      <li class="active"><a href="#">Informe de Inspecciones</a></li>
      <li><a href="ventanaSiniestros.php">Informe de Siniestros</a></li>
      
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
        <p>Aquí puedes ver todos los informes de inspección que has subido. Para registrar uno nuevo
        haz click en el botón. </p>
      <form class="form-inline" method="get">
        <div class="row">
      <center>
          <div class="col-md-2">
            <a href="formularioInspeccion.php?opcion=Registrar" class="btn btn-info">Registrar</a>
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              <a href="ventanaInspecciones.php" class="btn btn-info">Ver Todos</a>  
              <button type="submit" class="btn btn-info">Buscar</button>
              <input type="text" class="form-control" name="codigo" minlength="4" maxlength="4" placeholder ="Código de informe..." required>
            </div>
            
          </div>
          <div class="col-md-4">
            <img src="img/leyenda.png" alt="" class="img-thumbnail">
            <a href="documentos/inspecciones/Formato Inspecciones.xls" class="btn btn-info">Descargar Formulario</a>  
          </div>
      </center>
        </div>
      </form>
      </div>
      <div class="table-responsive">
    <table class="table table-hover table-condensed">
      <thead>
      <tr>
        <th>Codigo</th>
        <th>Placa</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Lugar</th>
        <th>Evaluacion</th>
        <th>Archivo</th>
        <th>Acciones</th>
      </tr>
      </thead>
      <tbody>
        <?php 
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="9" align="center"> <h3>No se encontraron informes de inspección</h3></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class="<?php echo ($fila[8]=="A" ? "info" : "danger"); ?>">
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td width="400"><?php echo $fila[6] ?></td>
        <td><a href="documentos/inspecciones/<?php echo $fila[7] ?>"><?php echo $fila[7] ?></a></td>
        <td nowrap class="text-center">
          <?php 
            if ($fila[8]=="I") {
               ?>
              <a href="formularioInspeccion.php?codInspeccion=<?php echo $fila[0] ?>&opcion=Activar" class="btn btn-info btn-sm">Activar</a>    
               <?php 
            }
            else
            {
           ?>
          <a href="formularioInspeccion.php?codInspeccion=<?php echo $fila[0] ?>&opcion=Modificar" class="btn btn-info btn-sm">Modificar</a>
          
          <a href="formularioInspeccion.php?codInspeccion=<?php echo $fila[0]?>&opcion=Eliminar" class="btn btn-info btn-sm">Eliminar</a></td>
          <?php } ?>
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