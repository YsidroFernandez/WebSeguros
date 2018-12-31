<?php 
include("conexion.php");
$sql="SELECT *
FROM  cita order by estatus, fecha";
$resultado=mysql_query($sql);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- importar librerias para estilos y responsib -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet"  href="css/estilos.css">
  <script src="js/jquery.js"></script>
    <style type="text/css">
    </style>
<script src="js/bootstrap.min.js"></script>
	<title>Admin</title>
</head>
<body>
	<div class="container">
    <?php $clase="cita" ;
      include("encabezado2.php");
    ?>
  

  
<!-- cuerpo de diseño de la pantalla principal del administrador -->
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Generador de Citas Automatico</strong></div>
       <div class="panel-body">
        <p>Aquí se pueden generar los días de disponibilidad para citas en la empresa seleccionado un rango específico de fechas. </p>
      <form class="form-inline" method="post" action="actualizarCitas.php?opcion=Registrar">
        <div class="row">
      <center>
          <div class="col-md-6">
            <div class="form-group">
             <label>Fecha inicio</label><br>
             <input required id="fechai" name="fechai" type="date"  min="<?php echo date("Y-m-d");?>" class="form-control" ><br>
             <label>Fecha fin</label><br>
             <input required id="fechaf" name="fechaf" type="date"  min="<?php echo date("Y-m-d");?>"  class="form-control" >
          </div>
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              
              <button type="submit" class="btn btn-info">Generar citas</button>
             <br>
             <br>
             <span class="label label-primary">Citas Ocupadas</span><br>
             <span class="label label-danger">Citas Desocupadas</span>
            </div>
            
          </div>
          
      </center>
       
        </div>
        </form>
      </div>
      <hr>
     <!--  desde aca el cuerpo de la tabla  -->
 <div class="table-responsive">
    <table class="table table-condensed">
      <thead>
      <tr>
        <th>Código</th>
        <th>Cédula del tomador</th>
        <th>fecha</th>
        <th>Comentario</th>
        <th>Sucursal</th>
        <th>Acciones</th>
      </tr>
      </thead>
      <tbody>
        <?php 
      if (mysql_num_rows($resultado)==0) {
      
        ?>
        <tr>
          <td colspan="6" align="center"> <h3>No se encontraron citas registradas</h3></td>

        </tr> 
          <?php 
                     
          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class="<?php echo ($fila[5]=="A" ? "info" : "danger"); ?>">
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td nowrap class="text-center">
          
        
          
          <a href="actualizarCitas.php?codCita=<?php echo $fila[0]?>&opcion=Eliminar" class="btn btn-info btn-sm">Eliminar</a></td>
          <?php } ?>
      </tr>
       
      </tbody>
    </table>
    </div>



      </div>

<!-- hasta aqui el cuerpo de diseño -->


  <?php include("PieDePagina2.php") ?>
</div>  
</body>
</html>