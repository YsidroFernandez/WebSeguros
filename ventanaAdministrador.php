<?php 
session_start();
if (!isset($_SESSION['username'])){
  //header("Location:index.php"); DESCOMENTAR LUEGO!!!
}
include("conexion.php");
$sql="SELECT cedula, rol.nombre, user, pass, usuario.nombre, apellido, email, telefono, fechaIngreso, usuario.estatus";
$sql.=" FROM usuario, rol";
$sql.=" WHERE RolcodRol = codRol";
if ($_GET['cedula']) {
  $sql.= " and cedula ='$_GET[cedula]'";
}
$resultado = mysql_query($sql) or die ($sql .mysql_error()."" );


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


    
    <?php $clase="adm" ;
      include("encabezado2.php");
    ?>
  

  
<!-- cuerpo de diseño de la pantalla principal del administrador -->
<hr>
  
    <div class="panel panel-info">
      <div class="panel-heading"><strong>Informe de usuarios</strong></div>
       <div class="panel-body">
        <p>Aqui se pueden buscar y agregar nuevos empleados al registro general. </p>
      <form class="form-inline" method="get">
        <div class="row">
      <center>
          <div class="col-md-3">
            <a href="formularioUsuarios.php?opcion=Registrar" class="btn btn-info">Registrar</a>
          </div>
          <div class="col-md-6  ">
            <div class="form-group ">
              <a href="ventanaAdministrador.php" class="btn btn-info">Ver Todos</a>  
              <button type="submit" class="btn btn-info">Buscar</button>
              <input type="text" class="form-control" name="cedula"  minlength="7" maxlength="9" placeholder ="Cedula del empleado..." required>
            </div>
            
          </div>
          <div class="col-md-3  ">
            <img src="img/leyenda.png" alt="" class="img-thumbnail center-block">
          </div>
      </center>
        </div>
        </form>
      </div>
      <div class="table-responsive">
    <table class="table table-condensed">
      <thead>
      <tr>
        <th>Cedula</th>
        <th>Cargo</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Fecha_de_Ingreso</th>
      </tr>
      </thead>
      <tbody>
        <?php 
      if (mysql_num_rows($resultado)==0) {
      
        ?>
        <tr>
          <td colspan="9" align="center"> <h3>No se encontraron usuarios</h3></td>

        </tr> 
          <?php 
                     
          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class="<?php echo ($fila[9]=="A" ? "info" : "danger"); ?>">
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
       <td><a href="mailto:<?php echo $fila[6] ?>"><?php echo $fila[6] ?></a></td>
        <td><?php echo $fila[7] ?></td>
        <td><?php echo $fila[8] ?></td>
        <td nowrap class="text-center">
          <?php 
            if ($fila[9]=="I") {
               ?>
              <a href="formularioUsuarios.php?cedula=<?php echo $fila[0] ?>&opcion=Activar" class="btn btn-info btn-sm">Activar</a>    
               <?php 
            }
            else
            {
           ?>
          <a href="formularioUsuarios.php?cedula=<?php echo $fila[0] ?>&opcion=Modificar" class="btn btn-info btn-sm">Modificar</a>
          
          <a href="formularioUsuarios.php?cedula=<?php echo $fila[0]?>&opcion=Eliminar" class="btn btn-info btn-sm">Eliminar</a></td>
          <?php } ?>
      </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
    </div>
  
<hr>


<!-- hasta aqui el cuerpo de diseño -->


  <?php include("PieDePagina2.php") ?>
</div>
</body>
</html>