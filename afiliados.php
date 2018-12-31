 <?php 
include("conexion.php");

$sql = "select estado, empresaafiliada.nombre, telefono, direccion, codEmpresa, tiposervicio.nombre, empresaafiliada.estatus";
$sql.= " from estado, empresaafiliada, tiposervicio, servicio";
$sql.=" where EstadocodEstado = codEstado  and codEmpresa = EmpresaAfiliadacodEmpresa and TipoServiciocodTipoServicio=codTipoServicio and empresaafiliada.estatus='A'";
if($_GET['estado']) 
{
$sql .= " and EstadocodEstado ='$_GET[estado]'";
}
if($_GET['servicio']) 
{
$sql .= " and codTipoServicio ='$_GET[servicio]'";
}
$sql.=" order by estado, tiposervicio.nombre";
$resultado = mysql_query($sql);

 ?>


 <!DOCTYPE html>
<html>

    <head>
    	<meta charset="UTF-8">
    	<!-- importar librerias para estilos y responsib -->
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<link rel="stylesheet"  href="css/estilos.css">
    	<script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      
    	<title>MiCarroSeguro</title>
    </head>
<body>        

  
<?php include("encabezado.php") ?>    
          




 <div class="row">             
    <div class="col-md-6"><h1 class="text-center">Tenemos las mejores empresas afiliadas para atenderle</h1 >
    </div>
    <div class="col-md-6">
      <center><img class="img-rounded" src="img/casco3.jpg" height=200></center>

    </div>

 </div>

<div class="row">
  <form class="form-inline" method="get">
   <div class="col-md-4">
   
        <div class="form-group">

         <br>
             <label>Seleccione un Servicio </label>
        <select class="form-control" name="servicio">
             <option value="">Seleccione el servicio</option>
                  <?php 
                $resultado1 = mysql_query("Select codTipoServicio, nombre from tiposervicio");
                     while($fila=mysql_fetch_array($resultado1))
                          {?>
                            <option value="<?php echo $fila['codTipoServicio']; ?>" > 
                              <?php echo $fila['nombre']; ?> </option>
                             <?php } ?> 
         </select>
         </div>
  </div>

    <div class="col-md-4">

    <br>
      <label>Seleccione un Estado</label>
        <select class="form-control" name="estado" >
             <option value="">Seleccione el estado</option>
                  <?php 
                $resultado2 = mysql_query("Select codEstado, estado from estado");
               while($fila=mysql_fetch_array($resultado2))
                  {?>
                    <option value="<?php echo $fila['codEstado']; ?>"> <?php echo $fila['estado']; ?> </option>
                     <?php } ?> 
        </select>
    </div>

      <div class="col-md-4">
        
        <div class="form-group">
          <br>
          <br>
          <input type="submit" value="Consultar" class="btn btn-info btn-lg btn-block center-block"  ></input>     
        </div>  
      </div>
</form>

</div>

<div class="row">
    
    <div class="table-responsive">
    <table class="table table-condensed">
      <thead>
      <tr>
        <th>Estado</th>
        <th>Empresa</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Servicios</th>
        
      </tr>
      </thead>
      <tbody>
        <?php 
        if (mysql_num_rows($resultado)==0) {

          ?>
          <tr>
            <td colspan="9" align="center"> <h3>No se encontraron empresas afiliadas</h3></td>
          </tr>
          <?php 

          }
          else
        while($fila=mysql_fetch_array($resultado))
        {?>
      <tr class="info">
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[5] ?></td>
  
        <td nowrap class="text-center">
         
      </tr>
       <?php } ?> 

      </tbody>
    </table>
    </div>
</div>

<?php include("piedepagina.php") ?>
</body>
</html>