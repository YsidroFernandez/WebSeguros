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
    $clase="cobe";
    include("encabezado3.php"); 
  ?>

  <hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Coberturas</strong></div>
       <div class="panel-body">
        <p>Aquí puedes ver todas las coberturas que posee una póliza de seguro.</p>
      <form class="form-inline" method="get">
        <div class="row">
          <center>
              <div class="col-md-6 col-md-offset-3">
                <div class="form-group ">
                  <button type="submit" class="btn btn-info">Buscar</button>
                  <select class="form-control" id="selectParticular" name="codigo" required>
                    <option value="">Seleccione la póliza</option>
                    <?php 
                    $resultado = mysql_query("Select codPoliza from polizadeseguro order by codPoliza");
                     while($fila=mysql_fetch_array($resultado))
                     {?>
                      <option value="<?php echo $fila['codPoliza'];?>" <?=$_GET['codigo'] == $fila['codPoliza']? "Selected":""?>> <?php echo $fila['codPoliza'];?> </option>
                    <?php } ?> 
                  </select>
                </div>
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
        <th>Seguro</th>
        <th>Cobertura</th>
        <th>Tipo</th>
        <th>Prima</th>
      </tr>
      </thead>
      <tbody>
        <?php 
        $sql = "Select codPoliza, seguro.nombre, cobertura.nombre, cobertura.tipoCobertura, coberturaporpoliza.montoPrima from seguro, polizadeseguro, cobertura, coberturaporpoliza where codpoliza = '$codigo' and PolizaDeSeguroCodPoliza= '$codigo'  and CoberturacodCobertura  = codCobertura and seguro.codSeguro = cobertura.SegurocodSeguro and cobertura.estatus='A' and coberturaporpoliza.estatus='A' order by seguro.codSeguro desc, cobertura.tipoCobertura";
        $resultado = mysql_query($sql);
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="5" align="center"> <h4>No se encontraron certificados de seguro</h4></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr>
        <td><a href="ventanaPoliza.php?codPoliza=<?=$fila[0]?>"><?php echo $fila[0] ?></a></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
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