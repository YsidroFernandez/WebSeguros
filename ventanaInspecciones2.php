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
    $clase="insp";
    include("encabezado3.php"); 
  ?>

  <hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Informe de inspecciones</strong></div>
       <div class="panel-body">
        <p>Aquí puedes ver todos los informes de inspección (riesgo, siniestros y postreparación) por vehículo. </p>
      <form class="form-inline" method="get">
        <div class="row">
          <center>
              <div class="col-md-6 col-md-offset-3">
                <div class="form-group ">
                  <button type="submit" class="btn btn-info">Buscar</button>
                  <select class="form-control" id="selectParticular" name="codigo" required>
                    <option value="">Seleccione el vehículo</option>
                    <?php 
                    $resultado = mysql_query("Select placa from vehiculo");
                     while($fila=mysql_fetch_array($resultado))
                     {?>
                      <option value="<?php echo $fila['placa'];?>" <?=$_GET['codigo'] == $fila['placa']? "Selected":""?>> <?php echo $fila['placa'];?> </option>
                    <?php } ?> 
                  </select>
                </div>
              </div>
          </center>
        </div>
      </form>
      </div>
      <hr>
      <h3>&nbsp<span class="label label-primary">Inspecciones de Riesgo</span></h3>
      <div class="table-responsive">
    <table class="table table-condensed table-hover">
      <thead>
      <tr>
        <th>Codigo</th>
        <th>Placa</th>
        <th>Estado</th>
        <th>Perito</th>
        <th>Fecha</th>
        <th>Lugar</th>
        <th>Evaluacion</th>
        <th>Archivo</th>
      </tr>
      </thead>
      <tbody>
        <?php 
        $sql = "Select `codInspeccion`,`Vehiculoplaca`, `estado`.`estado`,Usuariocedula, `fecha`,`lugar`,`evaluacion`,`nombreArchivo`, inspeccion.estatus from estado, inspeccion";
        $sql .= " where `EstadocodEstado`= `estado`.`codEstado`";
        $sql .= " and `TipoInspeccioncodTipo` = '1'";
        $sql .= " and Vehiculoplaca ='$_GET[codigo]'";
        $sql .=" order by codInspeccion";
        $resultado = mysql_query($sql);
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="8" align="center"> <h4>No se encontraron informes de inspección de riesgo</h4></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr>
        <td><?php echo $fila[0] ?></td>
        <td><a href="ventanaVehiculo.php?placa=<?php echo $fila[1] ?>"><?php echo $fila[1] ?></a></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td><?php echo $fila[6] ?></td>
        <td><a href="documentos/inspecciones/<?php echo $fila[7] ?>"><?php echo $fila[7] ?></a></td>
          
      </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
    <hr>
    <h3>&nbsp<span class="label label-primary">Inspecciones de Siniestro</span></h3>
      <div class="table-responsive">
    <table class="table table-condensed table-condensed">
      <thead>
      <tr>
        <th>Codigo</th>
        <th>Placa</th>
        <th>Estado</th>
        <th>Perito</th>
        <th>Fecha</th>
        <th>Lugar</th>
        <th>Evaluacion</th>
        <th>Archivo</th>
      </tr>
      </thead>
      <tbody>
        <?php 
        $sql = "Select `codInspeccion`,`Vehiculoplaca`, `estado`.`estado`,Usuariocedula, `fecha`,`lugar`,`evaluacion`,`nombreArchivo`, inspeccion.estatus from estado, inspeccion";
        $sql .= " where `EstadocodEstado`= `estado`.`codEstado`";
        $sql .= " and `TipoInspeccioncodTipo` = '2'";
        $sql .= " and Vehiculoplaca ='$_GET[codigo]'";
        $sql .=" order by codInspeccion";
        $resultado = mysql_query($sql);
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="8" align="center"> <h4>No se encontraron informes de inspección de siniestro</h4></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr>
        <td><?php echo $fila[0] ?></td>
        <td><a href="ventanaVehiculo.php?placa=<?php echo $fila[1] ?>"><?php echo $fila[1] ?></a></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td><?php echo $fila[6] ?></td>
        <td><a href="documentos/inspecciones/<?php echo $fila[7] ?>"><?php echo $fila[7] ?></a></td>
          
      </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
    <hr>
    <h3>&nbsp<span class="label label-primary">Inspecciones Postreparación</span></h3>
      <div class="table-responsive">
    <table class="table table-condensed table-hover">
      <thead>
      <tr>
        <th>Codigo</th>
        <th>Placa</th>
        <th>Estado</th>
        <th>Perito</th>
        <th>Fecha</th>
        <th>Lugar</th>
        <th>Evaluacion</th>
        <th>Archivo</th>
      </tr>
      </thead>
      <tbody>
        <?php 
        $sql = "Select `codInspeccion`,`Vehiculoplaca`, `estado`.`estado`,Usuariocedula, `fecha`,`lugar`,`evaluacion`,`nombreArchivo`, inspeccion.estatus from estado, inspeccion";
        $sql .= " where `EstadocodEstado`= `estado`.`codEstado`";
        $sql .= " and `TipoInspeccioncodTipo` = '3'";
        $sql .= " and Vehiculoplaca ='$_GET[codigo]'";
        $sql .=" order by codInspeccion";
        $resultado = mysql_query($sql);
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="8" align="center"> <h4>No se encontraron informes de inspección postreparación</h4></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr>
        <td><?php echo $fila[0] ?></td>
        <td><a href="ventanaVehiculo.php?placa=<?php echo $fila[1] ?>"><?php echo $fila[1] ?></a></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td><?php echo $fila[6] ?></td>
        <td><a href="documentos/inspecciones/<?php echo $fila[7] ?>"><?php echo $fila[7] ?></a></td>
          
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