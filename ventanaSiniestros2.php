<?php 
session_start();
if (!isset($_SESSION['username'])) {
  //header("Location:index.php"); DESCOMENTAR LUEGO!!!
}

include("conexion.php");
include("sumarFacturasSiniestro.php");

$sql = "SELECT codSiniestro , tiposiniestro.tipo , Vehiculoplaca , estado.estado , fechaSiniestro , fechaReporte , fechaDecision , montoReserva , montoAprobado , montoTotalSiniestro , direccion , nombreArchivo, siniestro.estatus FROM siniestro , estado , vehiculo , tiposiniestro WHERE TipoSiniestrocodTipoSiniestro = tiposiniestro.codTipoSiniestro  and Vehiculoplaca = vehiculo.placa and siniestro.EstadocodEstado = estado.codEstado";

if ($_GET['codigo']) {
  $sql .= " and codSiniestro ='$_GET[codigo]'";
}
if ($_GET['placa']) {
  $sql .= " and Vehiculoplaca ='$_GET[placa]'";
}
$sql .=" order by siniestro.estatus,codSiniestro";
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
    $clase="sini";
    include("encabezado3.php"); 
  ?>
  
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Siniestros</strong></div>
       <div class="panel-body">
        <p>Aquí puedes ver todos los Siniestros Registrados. Para registrar uno nuevo haz click en el botón registrar.</p>
      <form class="form-inline" method="get">
        <div class="row">
      <center>
          <div class="col-md-3">
            <a href="formularioRegistrarSiniestro.php?opcion=Registrar" class="btn btn-info">Registrar</a>
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              <a href="ventanaSiniestros2.php" class="btn btn-info">Ver Todos</a>  
              <button type="submit" class="btn btn-info">Buscar</button>
              <input type="text" class="form-control"  maxlength=3  minlength=1  name="codigo" placeholder ="Código del siniestro..." required>
            </div>
          </div>
          <div class="col-md-3  ">
            <img src="img/leyenda5.png" alt="" class="img-thumbnail center-block">
          </div>
      </center>
        </div>
        </form>
      </div>
      <div class="table-responsive">
    <table class="table table-hover table-condensed">
      <thead>
      <tr>
        <th>Código</th>
        <th>Tipo Siniestro</th>
        <th>Placa Vehículo</th>
        <th>Estado</th>
        <th nowrap>Fec. Siniestro</th>
        <th nowrap>Fec. Reporte</th>
        <th nowrap>Fec. Desición</th>
        <th>Monto Reserva</th>
        <th>Monto Aprobado</th>
        <th>Monto Total</th>
        <th>Monto Asegurado</th>
        <th>Dirección</th>
        <th>Informe</th>
        <th colspan="2">Acciones</th>
      </tr>
      </thead>
      <tbody>
         <?php 
        if (mysql_num_rows($resultado)==0) {


          ?>
          <tr>
            <td colspan="15" align="center"> <h3>No se encontraron Siniestros</h3></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {
          /*Para imprimir el moto asegurado de cada vehículo según su poliza*/
          $sql = "SELECT  montoAsegurado FROM polizadeseguro";
          $sql .= " WHERE Vehiculoplaca ='$fila[2]' ";
          $sql .= " UNION";
          $sql .= " SELECT  montoAsegurado FROM polizadeseguro,certificadoseguro";
          $sql .= " WHERE certificadoseguro.Vehiculoplaca ='$fila[2]' and certificadoseguro.estatus='A' AND codPoliza = certificadoseguro.PolizaDeSeguroCodPoliza";
          $montoAseguradoPoliza=mysql_fetch_array(mysql_query($sql));
        ?> 
      <tr class="<?= $fila[12]=='C' ? "info" : "warning" ?>" >
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><a href="ventanaVehiculo.php?placa=<?php echo $fila[2] ?>"><?php echo $fila[2] ?></a></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td><?= $fila[6] != "0000-00-00" ? $fila[6] : "-" ?></td>
        <td><?php echo $fila[7] ?></td>
        <td><?= $fila[8] ? $fila[8] : "-" ?></td>
        <td><?php echo $fila[9] ?></td>
        <td><?php echo $montoAseguradoPoliza[0]?></td>
        <td><?php echo $fila[10] ?></td>
        <td>
          <?php if($fila[11]){ ?>
          <a href="documentos/siniestros/<?=$fila[11]?>"><?=$fila[11]?></a> 
          <?php }
          else
          echo "Sin informe"; ?>
          
        </td>
        <td nowrap class="text-center">
          <a href="formularioRegistrarSiniestro.php?codSiniestro=<?php echo $fila[0] ?>&opcion=Modificar" class="btn btn-info btn-sm">Modificar</a>
        </td>
        
        <td class="text-center">
          <a href="ventanaFacturas.php?codigo=<?=$fila[0]?>" class="btn btn-info btn-sm">Ver Facturas</a>
          <?php if($fila[12]=="P") {?>
            <a href="formularioFactura.php?codigo=<?=$fila[0]?>&opcion=Registrar" class="btn btn-info btn-sm">Registrar Facturas</a>
          <?php } ?>
        </td>
        <td>
          <?php if($fila[12]=="P") { ?>
            <a href="#" onclick="tomarDecision('<?=$fila[0]?>','<?=$fila[9]?>','<?=$montoAseguradoPoliza[0]?>')" class="btn btn-info btn-sm">Tomar decisión</a>
          <?php } ?>
        </td>

      </tr>
      <?php  } ?>
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
  function tomarDecision(codSiniestro, montoTotalSiniestro, montoAsegurado){
    
    var mensaje ="Código del siniestro: "+codSiniestro;
    mensaje+="\nMonto total del siniestro: "+montoTotalSiniestro;
    mensaje+="\nMonto asegurado según póliza: "+montoAsegurado;
    mensaje+="\n\n";
    mensaje+= "Ingrese el monto por el cual se indemnizará al asegurado.\n";
    
    var montoAprobado=parseInt(prompt(mensaje));
    if(montoAprobado>parseInt(montoTotalSiniestro) || montoAprobado>parseInt(montoAsegurado))
    {
      alert("ERROR! el monto aprobado no debe ser mayor al monto asegurado o al total del siniestro.");
    }
    else if (montoAprobado>=0)
    {
      document.location.href="RegistrodeSiniestro.php?opcion=decision&codigo="+codSiniestro+"&montoAprobado="+montoAprobado;
    }
}
</script>