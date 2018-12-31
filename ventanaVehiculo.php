<?php 
session_start();
if (!isset($_SESSION['username'])) {
  //header("Location:index.php"); DESCOMENTAR LUEGO!!!
}

include("conexion.php");

$sql = "SELECT  `placa` ,  `Aseguradocedula` , marca.nombreDeMarca, modelo.nombreModelo,modelo.annoDelModelo, estado.estado, tipovehiculo.nombreTipo,  `color` ,  `serial` , `kilometraje`, vehiculo.estatus FROM vehiculo, estado, tipovehiculo, marca, modelo";
$sql .= " WHERE vehiculo.ModelocodModelo = modelo.codModelo";
$sql .= " AND modelo.MarcaCodMarca = marca.codMarca";
$sql .= " AND  `EstadocodEstado` = estado.codEstado";
$sql .= " AND  `TipoVehiculoCodTipo` = tipovehiculo.codTipo";
if ($_GET['placa']) {
  $sql .= " and placa ='$_GET[placa]'";
}
if ($_GET['cedula']) {
  $sql .= " and Aseguradocedula ='$_GET[cedula]'";
}
$sql .= " order by vehiculo.estatus";
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
<script src="js/bootstrap.min.js"></script>

    <style type="text/css">
    th{
      text-align: center;
    }
    .table>tbody>tr>td{
      vertical-align:middle;
    }

    </style>
  <title>MiCarroSeguro</title>

</head>



<body>
  <div class="container">
  <?php 
    $clase="vehi";
    include("encabezado3.php"); 
  ?>
  
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Vehículos</strong></div>
       <div class="panel-body">
        <p>Aquí encontrarás los vehículos asegurados y en proceso. Para registrar uno nuevo haz click en el botón registrar.</p>
      <form class="form-inline" method="get">
        <div class="row">
      <center>
          <div class="col-md-3">
            <a href="formularioVehiculo.php?opcion=Registrar" class="btn btn-info">Registrar</a>
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              <a href="ventanaVehiculo.php" class="btn btn-info">Ver Todos</a>  
              <button type="submit" class="btn btn-info">Buscar</button>
              <input type="text" minlength="7" maxlength="7" class="form-control" name="placa" placeholder ="Placa del vehículo..." required>
            </div>
            
          </div>
          <div class="col-md-3  ">
            <img src="img/leyenda2.png" alt="" class="img-thumbnail center-block">
          </div>
      </center>
        </div>
        </form>
      </div>
      <div class="table-responsive">
    <table class="table table-hover table-condensed">
      <thead>
      <tr>
        <th>Placa</th>
        <th>Asegurado</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th nowrap>Edo. Comprado</th>
        <th nowrap>Tipo vehículo</th>
        <th>Color</th>
        <th>Serial</th>
        <th>Kilometraje</th>
        <th colspan="4">Acciones</th>
      </tr>
      </thead>
      <tbody>
         <?php 
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="13" align="center"> <h3>No se encontraron vehículos</h3></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class=" <?php switch ($fila[10]) {
        case 'I':
          echo "warning";
          break;
        
        case 'A':
          echo "info";
          break;
          case 'P':
          echo "danger";
      } ?>">
        <td nowrap><?php echo $fila[0] ?></td>
        <td><a href="ventanaCliente.php?cedula=<?php echo $fila[1] ?>"><?php echo $fila[1] ?></a></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3]." ".$fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td><?php echo $fila[6] ?></td>
        <td><?php echo $fila[7] ?></td>
        <td><?php echo $fila[8] ?></td>
        <td><?php echo $fila[9] ?></td>       
        <td nowrap class="text-center">
          <a href="formularioVehiculo.php?placa=<?php echo $fila[0] ?>&opcion=Modificar" class="btn btn-info btn-sm">Modificar</a>
        </td>
        <td class="text-center">
          <a href="ventanaInspecciones2.php?codigo=<?php echo $fila[0] ?>" class="btn btn-info btn-sm">Ver Inspecciones</a>
          <?php if($fila[10]=="P") {?>
            <a onclick="aprobar('<?php echo $fila[0] ?>')" class="btn btn-info btn-sm">Aprobar Inspección</a>
          <?php } ?>
        </td>
        <td class="text-center">
          <?php if($fila[10]=="A") {?>
            <a href="ventanaPoliza.php?placa=<?php echo $fila[0] ?>" class="btn btn-info btn-sm">Ver Poliza</a>
          <?php  }  ?>
        </td>
        <td class="text-center">
          <?php if($fila[10]=="A") {?>
            <a href="ventanaSiniestros2.php?placa=<?php echo $fila[0] ?>" class="btn btn-info btn-sm">Ver Siniestros</a>
            <a href="formularioRegistrarSiniestro.php?placa=<?php echo $fila[0] ?>&opcion=Registrar" class="btn btn-info btn-sm">Registrar Siniestro</a>
          <?php } ?>
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

<script type="text/javascript">

  function aprobar(placa)
  {
    if(confirm("El vehículo pasó las inspecciones? \nPresione Aceptar para colocar el vehiculo disponible para asegurar.\nCancelar para volver."))
    {
      document.location.href="aprobarVehiculo.php?placa="+placa;
    }
  }
</script>