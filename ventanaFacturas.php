<?php 
session_start();
if (!isset($_SESSION['username'])) {
  //header("Location:index.php"); DESCOMENTAR LUEGO!!!
}

include("conexion.php");
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

  <title>MiCarroSeguro</title>

</head>



<body>
  <div class="container">
  <?php 
    $clase="fact";
    include("encabezado3.php"); 
  ?>

  <hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Facturas</strong></div>
       <div class="panel-body">
        <p>Aquí puedes ver todas las facturas asociadas a un siniestro. </p>

      <form class="form-inline" method="get">
        <div class="row">
          <center>
          <div class="col-md-3">
            <a href="formularioFactura.php?codigo=<?=$_GET['codigo']?>&opcion=Registrar" class="btn btn-info">Registrar</a>
          </div>
          <div class="col-md-6">
            <div class="form-group ">
              <button type="submit" class="btn btn-info">Buscar</button>
              <select class="form-control" id="selectParticular" name="codigo" required>
                <option value="">Seleccione el siniestro</option>
                <?php 
                $resultado = mysql_query("SELECT codSiniestro FROM siniestro order by codSiniestro");
                 while($fila=mysql_fetch_array($resultado))
                 {?>
                  <option value="<?php echo $fila['codSiniestro'];?>" <?= $_GET['codigo']==$fila['codSiniestro'] ? "Selected":""?>> <?php echo $fila['codSiniestro'];?> </option>
                <?php } ?> 
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <img src="img/leyenda.png" alt="" class="img-thumbnail">
          </div>
          </center>
        </div>
      </form>
      </div>
      <div class="table-responsive">
    <table class="table table-condensed table-hover">
      <thead>
      <tr>
        <th>Factura</th>
        <th>Placa</th>
        <th>Siniestro</th>
        <th>Empresa</th>
        <th>Servicio</th>
        <th>Fecha</th>
        <th>Monto</th>
        <th>Descripción</th>
        <th>Acciones</th>
      </tr>
      </thead>
      <tbody>
        <?php 
        $sql = "SELECT factura.`codFactura` , siniestro.Vehiculoplaca, factura.`SiniestrocodSiniestro` , empresaafiliada.nombre,  `tiposervicio`.`nombre` , factura.`fecha` , factura.`monto` , factura.`descripcion`, factura.estatus";
        $sql .= " FROM factura, siniestro, empresaafiliada, tiposervicio";
        $sql .= " WHERE factura.`SiniestrocodSiniestro` = siniestro.codSiniestro";
        $sql .= " AND factura.`TipoServiciocodTipoServicio` = tiposervicio.codTipoServicio";
        $sql .= " AND factura.`EmpresaAfiliadacodEmpresa` = empresaafiliada.codEmpresa";
        $sql .= " AND factura.`SiniestrocodSiniestro` = '$_GET[codigo]'";
        $sql .= " order by codFactura";
        $resultado = mysql_query($sql); 
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="9" align="center"> <h4>No se encontraron facturas asociadas a ese siniestro</h4></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class="<?=$fila[8]=='A' ? "info" : "danger"?>">
        <td><?php echo $fila[0] ?></td>
        <td><a href="ventanaVehiculo.php?placa=<?=$fila[1]?>"><?php echo $fila[1] ?></a></td>
        <td><a href="ventanaSiniestros2.php?codigo=<?=$fila[2]?>"><?php echo $fila[2] ?></a></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td><?php echo $fila[6] ?></td>
        <td><?php echo $fila[7] ?></td>
        <td nowrap class="text-center">
          <?php if($fila[8]=='A'){?>
          <a href="formularioFactura.php?codFactura=<?php echo $fila[0]?>&opcion=Modificar" class="btn btn-info btn-sm">Modificar</a>
          <a href="formularioFactura.php?codFactura=<?php echo $fila[0]?>&opcion=Eliminar" class="btn btn-info btn-sm">Eliminar</a>
          <?php }
          else
          {?>
          <a href="formularioFactura.php?codFactura=<?php echo $fila[0]?>&opcion=Activar" class="btn btn-info btn-sm">Activar</a>
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