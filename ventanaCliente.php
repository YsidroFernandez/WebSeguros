<?php 
session_start();
if (!isset($_SESSION['username'])) {
  //header("Location:index.php"); DESCOMENTAR LUEGO!!!
}

include("conexion.php");

$sql = "Select cedula, nombre, apellido, estado.estado ,direccion, fechaNacimiento, edad, telefono, `e-mail`, cliente.estatus from cliente, estado";
$sql .= " WHERE EstadocodEstado = estado.codEstado";
if ($_GET['cedula']) {
  $sql .= " and cedula ='$_GET[cedula]'";
}
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
    $clase="clie";
    include("encabezado3.php"); 
  ?>
  
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Clientes</strong></div>
       <div class="panel-body">
        <p>Aquí puedes ver todos los clientes con los tiene contrato la empresa. Para registrar uno nuevo haz click en el botón registrar.</p>
      <form class="form-inline" method="get">
        <div class="row">
      <center>
          <div class="col-md-3">
            <a href="formularioCliente.php?opcion=Registrar" class="btn btn-info">Registrar</a>
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              <a href="ventanaCliente.php" class="btn btn-info">Ver Todos</a>  
              <button type="submit" class="btn btn-info">Buscar</button>
              <input type="text" class="form-control" name="cedula"  minlength="7" maxlength="9" placeholder ="Cédula del cliente..." required>
            </div>
          </div>
          <div class="col-md-3  ">
            <img src="img/leyenda3.png" alt="" class="img-thumbnail center-block">
          </div>
      </center>
        </div>
        </form>
      </div>
      <div class="table-responsive">
    <table class="table table-hover table-condensed">
      <thead>
      <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Domicilio</th>
        <th>Dirección</th>
        <th nowrap>Fec. Nac.</th>
        <th>Edad</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th colspan="3">Acciones</th>
      </tr>
      </thead>
      <tbody>
         <?php 
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="9" align="center"> <h3>No se encontraron clientes</h3></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class="<?=($fila[9]=='A' ? "info" : "warning")?>" >
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td><?php echo $fila[6] ?></td>
        <td><?php echo $fila[7] ?></td>
        <td><a href="mailto:<?php echo $fila[8] ?>"><?php echo $fila[8] ?></a></td>

        <?php if($fila[9]=='A'){ ?> 
        <td nowrap class="text-center">
          <a href="formularioCliente.php?cedula=<?php echo $fila[0] ?>&opcion=Modificar" class="btn btn-info btn-sm">Modificar</a>
        </td>
        <td class="text-center">
          <a href="ventanaPoliza.php?cedula=<?php echo $fila[0] ?>" class="btn btn-info btn-sm">Ver Pólizas</a>
          <a href="formularioPoliza.php?cedula=<?php echo $fila[0] ?>&opcion=Registrar" class="btn btn-info btn-sm">Registrar Póliza</a>
        </td>
        <td class="text-center">
          <a href="ventanaVehiculo.php?cedula=<?php echo $fila[0] ?>" class="btn btn-info btn-sm">Ver Vehiculo</a>
          <a href="formularioVehiculo.php?cedula=<?php echo $fila[0] ?>&opcion=Registrar" class="btn btn-info btn-sm">Registrar Vehiculo</a>
        </td>
        <?php } 
        else
        {?>
        <td nowrap class="text-center">
          <a href="formularioCliente.php?cedula=<?php echo $fila[0] ?>&opcion=Atender" class="btn btn-info btn-sm">Atender Cita</a>
        </td>
        <td></td>
        <td></td>
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