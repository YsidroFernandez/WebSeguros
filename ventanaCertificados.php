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
    $clase="cert";
    include("encabezado3.php"); 
  ?>

  <hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Certificados de Seguro</strong></div>
       <div class="panel-body">
        <p>Aquí puedes ver todos los certificados de seguros por pólizas de tipo flota. </p>
      <form class="form-inline" method="get">
        <div class="row">
          <center>
            <div class="col-md-6 col-md-offset-3">
              <div class="form-group ">
                <button type="submit" class="btn btn-info">Buscar</button>
                <select class="form-control" id="selectParticular" name="codigo" required>
                  <option value="">Seleccione la póliza</option>
                  <?php 
                  $resultado = mysql_query("Select codPoliza from polizadeseguro where TipoPolizacodTipo =2 order by codPoliza");
                   while($fila=mysql_fetch_array($resultado))
                   {?>
                    <option value="<?php echo $fila['codPoliza'];?>" <?=$_GET['codigo'] == $fila['codPoliza']? "Selected":""?>> <?php echo $fila['codPoliza'];?> </option>
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
        <th>Póliza</th>
        <th>Certificado</th>
        <th>Placa</th>
      </tr>
      </thead>
      <tbody>
        <?php 
        $sql = "Select * from certificadoseguro where PolizaDeSeguroCodPoliza = '$_GET[codigo]' order by codCertificado";
        $resultado = mysql_query($sql);
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="3" align="center"> <h4>No se encontraron certificados de seguro</h4></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class="<?= $fila[3]=='A' ? "info" : "danger" ?>">
        <td><a href="ventanaPoliza.php?codPoliza=<?=$fila[1]?>"><?php echo $fila[1] ?></a></td>
        <td><?php echo $fila[0] ?></td>
        <td><a href="ventanaVehiculo?placa=<?php echo $fila[2] ?>"><?php echo $fila[2] ?></a></td>
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