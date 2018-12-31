<?php 
session_start();
if (!isset($_SESSION['username'])) {
  //header("Location:index.php"); DESCOMENTAR LUEGO!!!
}

include("conexion.php");

/*Colocar las polizas vencidas según la fecha de caducidad*/
mysql_query("UPDATE polizadeseguro set estatus = 'V' WHERE `fechaCaducidad`< CURDATE()");

$sql = "SELECT  `codPoliza` ,  `Vehiculoplaca` ,  `Tomadorcedula`, sucursal.nombre, usuario.nombre,tipopoliza.tipo,  `fechaEmision` ,  `fechaCaducidad` ,  `prima` , montoAsegurado , polizadeseguro.`estatus` FROM polizadeseguro, sucursal, usuario, tipopoliza";
$sql .= " WHERE  `TipoPolizacodTipo` = tipopoliza.codTipo";
$sql .= " AND  polizadeseguro.`SucursalcodSucursal` = sucursal.codSucursal";
$sql .= " AND  `Usuariocedula` = usuario.cedula";
if ($_GET['codPoliza']) {
  $sql .= " and codPoliza ='$_GET[codPoliza]'";
}
if ($_GET['cedula']) {
  $sql .= " and Tomadorcedula ='$_GET[cedula]'";
}
if ($_GET['placa']) {
  $sql .= " and Vehiculoplaca ='$_GET[placa]'";
  if(mysql_num_rows(mysql_query($sql))==0)
  {
    $sql = "SELECT  `codPoliza` ,  certificadoseguro.`Vehiculoplaca` ,  `Tomadorcedula`, sucursal.nombre, usuario.nombre,tipopoliza.tipo,  `fechaEmision` ,  `fechaCaducidad` ,  `prima` , montoAsegurado , polizadeseguro.`estatus` FROM polizadeseguro, sucursal, usuario, tipopoliza, certificadoseguro";
    $sql .= " WHERE  `TipoPolizacodTipo` = tipopoliza.codTipo";
    $sql .= " AND  polizadeseguro.`SucursalcodSucursal` = sucursal.codSucursal";
    $sql .= " AND  `Usuariocedula` = usuario.cedula";
    $sql .= " AND  codPoliza = PolizaDeSeguroCodPoliza";
    $sql .= " AND  certificadoseguro.`Vehiculoplaca`='$_GET[placa]'";
  }
}
$sql.=" order by polizadeseguro.`estatus`, codPoliza";

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
    $clase="poli";
    include("encabezado3.php"); 
  ?>
  
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Póliza</strong></div>
       <div class="panel-body">
        <p>Aquí puedes ver todas las pólizas que ha emitido la empresa. Para registrar uno nuevo haz click en el botón registrar.</p>
      <form class="form-inline" method="get">
        <div class="row">
      <center>
          <div class="col-md-3">
            <a href="formularioPoliza.php?opcion=Registrar" class="btn btn-info">Registrar</a>
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              <a href="ventanaPoliza.php" class="btn btn-info">Ver Todos</a>  
              <button type="submit" class="btn btn-info">Buscar</button>
              <input type="text" class="form-control" name="codPoliza" minlength="4" maxlength="4" placeholder ="Código de la póliza..." required>
            </div>
          </div>
          <div class="col-md-3  ">
            <img src="img/leyenda4.png" alt="" class="img-thumbnail center-block">
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
        <th>Vehículo</th>
        <th>Tomador</th>
        <th>Sucursal</th>
        <th>Corredor</th>
        <th nowrap>Tipo Póliza</th>
        <th nowrap>Fec. Emisión</th>
        <th nowrap>Fec. Caducidad</th>
        <th>Prima</th>
        <th nowrap>Monto Asegurado</th>
        <th colspan="2">Acciones</th>
      </tr>
      </thead>
      <tbody>
         <?php 
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="12" align="center"> <h3>No se encontraron pólizas</h3></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class="<?php switch($fila[10])
      {
        case 'A':
        echo "info";
        break;
        case 'C':
        echo "warning";
        break;
        case 'S':
        echo "danger";
        break;
        case 'V':
        echo "label-default";
        break;
        
      } ?>">
        <td><?php echo $fila[0] ?></td>

        <td>
          <?php if ($fila[5]=="Flota") {
            ?>
            <a href="ventanaCertificados.php?codigo=<?=$fila[0]?>" class="btn btn-info btn-sm">Ver certificados</a>
          <?php }
          else{?> 
              <a href="ventanaVehiculo.php?placa=<?php echo $fila[1] ?>"><?php echo $fila[1] ?></a>
              <?php } ?>
        </td>

        <td><a href="ventanaCliente.php?cedula=<?php echo $fila[2] ?>"><?php echo $fila[2] ?></a></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td><?php echo $fila[6] ?></td>
        <td><?php echo $fila[7] ?></td>
        <td><?php echo $fila[8] ?></td>
        <td><?php echo $fila[9] ?></td>
        <td class="text-center">
          <a href="ventanaCoberturasPorPoliza.php?codigo=<?=$fila[0]?>" class="btn btn-info btn-sm">Ver Coberturas</a>
        </td>
        <td class="text-center">
        <?php if($fila[10]=='C'){?>
          <a onclick="pagarPrima('<?=$fila[0]?>','<?=$fila[8]?>')" class="btn btn-info btn-sm">Pagar Prima</a>
        <?php }
        else if ($fila[10]=='V'){ ?>
          <a onclick="renovarPoliza('<?=$fila[0]?>')" class="btn btn-info btn-sm">Renovar Póliza</a>
        <?php } 
        if($fila[10]!='S' and $fila[10]!='V'){?>
          <a onclick="suspenderPoliza('<?=$fila[0]?>')" class="btn btn-info btn-sm">Suspender Póliza</a>
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

  function pagarPrima(codPoliza, prima)
  {
    if(confirm("El tomador pagó los "+prima+"bsf? \nPresione Aceptar para colocar la póliza "+codPoliza+" activa.\nCancelar para volver."))
    {
      document.location.href="actualizarPoliza.php?opcion=Pagar&poliza="+codPoliza;
    }
  }

  function suspenderPoliza(codPoliza)
  {
    if(confirm("Desea suspender la póliza? \nPresione Aceptar para colocar la póliza "+codPoliza+" suspendida.\nCancelar para volver."))
    {
      document.location.href="actualizarPoliza.php?opcion=Suspender&poliza="+codPoliza;
    }
  }
function renovarPoliza(codPoliza)
  {
    if(confirm("Desea renovar la póliza? \nPresione Aceptar para colocar la póliza "+codPoliza+" a cobranza y actualizar la fecha de caducidad a <?= date('Y-m-d',strtotime('+1 year' , strtotime ( date('Y-m-d'))))?>.\nCancelar para volver."))
    {
      document.location.href="actualizarPoliza.php?opcion=Renovar&poliza="+codPoliza;
    }
  }

</script>
