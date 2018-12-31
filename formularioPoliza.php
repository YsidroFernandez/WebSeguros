<?php 
include("conexion.php");
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- importar librerias para estilos y responsib -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet"  href="css/estilos.css">
  <script src="js/jquery.js"></script>

<script src="js/bootstrap.min.js"></script>
  <title>MiCarroSeguro</title>
</head>
<body onload="mostrarCoberturas(),seleccionarVehiculo()">
  <div class="container">
  <?php 
    $clase="poli";
    include("encabezado3.php"); 
  ?>
<hr>
	<div class="row">
    <div class="col-md-6 col-md-offset-3">

      <form method="post" name="datos" action="actualizarPoliza.php">
          <div class="form-group">
            <label>Código de la de póliza <mark>*</mark></label>
            <input type="text" name="codigo" class="form-control"  minlength="4" maxlength="4" placeholder="Ingresa el código de la póliza"  required value="<?php echo $_GET['codPoliza'] ?>" <?php echo ($_GET['codPoliza'] ? "disabled" : "" )?> >
          </div>     
            <input type="hidden" name="codigo2" class="form-control" placeholder="Ingresa el código de la póliza" value="<?php echo $_GET['codPoliza'] ?>">

          <div class="form-group">
            <label>Tomador <mark>*</mark></label>
            <select class="form-control" name="tomador" required>
              <option value="">Seleccione el Tomador</option>
              <?php 
              $resultado = mysql_query("Select cedula,nombre, apellido from cliente where estatus='A'");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['cedula']; ?>" <?php echo ($fila['cedula']==$consulta['Tomadorcedula'] ? "selected" : ""); echo ($fila['cedula']==$_GET['cedula'] ? "selected" : "");?> > <?php echo $fila['nombre']." ".$fila['apellido']; ?> </option>
             <?php } ?> 
            </select>
          </div>

         <div class="form-group">
            <label>Sucursal <mark>*</mark></label>
            <select class="form-control" name="sucursal" required>
              <option value="">Seleccione la sucursal</option>
              <?php  
                $resultado=mysql_query("Select * from sucursal where estatus='A'");
                while($fila=mysql_fetch_array($resultado))
                {?>
                  <option value="<?php echo $fila['codSucursal']; ?>"<?php echo ($fila['codSucursal']==$consulta['SucursalcodSucursal'] ? "selected" : ""); ?>> <?php echo $fila['nombre']; ?> </option>
                <?php } ?>
            </select>
          </div>


         <div class="form-group">
            <label>Corredor <mark>*</mark></label>
            <select class="form-control" name="corredor" required>
              <option value="">Seleccione el corredor</option>
              <?php  
                $resultado=mysql_query("Select * from usuario where estatus='A' and RolcodRol=3");
                while($fila=mysql_fetch_array($resultado))
                {?>
                  <option value="<?php echo $fila['cedula']; ?>"<?php echo ($fila['cedula']==$consulta['Usuariocedula'] ? "selected" : ""); ?>> <?php echo $fila['nombre']." ".$fila['apellido'] ; ?> </option>
                <?php } ?>
            </select>
          </div>
      
          <div class="form-group">
            <label>Tipo de vehículo <mark>*</mark></label>
            <select class="form-control" name="tipo" required>
              <option value="">Seleccione el tipo de vehículo</option>
              <?php 
              $resultado = mysql_query("Select codTipo, nombreTipo from tipovehiculo where estatus='A'");
               while($fila=mysql_fetch_array($resultado))
               {?>
                <option value="<?php echo $fila['codTipo']; ?>" <?php echo ($fila['codTipo']==$consulta['TipoVehiculoCodTipo'] ? "selected" : ""); ?>> <?php echo $fila['nombreTipo']; ?> </option>
             <?php } ?> 
            </select>
          </div>
          <br>
    
          <legend>Seguros y coberturas</legend>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="0001"  name="seguros[]" checked disabled> R.C.V
            </label>
          </div>
          <center>
            <label for="">Cobertura básicas</label>
            <?php 
              $resultado=mysql_query("Select * from cobertura where SeguroCodSeguro='0001' and tipoCobertura='Basica'  and estatus='A'");
              while($fila=mysql_fetch_array($resultado)){ ?>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="<?php echo $fila['codCobertura']; ?>" checked disabled> <?php echo $fila['nombre'] ?>
                </label>
              </div>
             <?php  } ?>

           <label for="">Cobertura Opcionales</label>
            <?php 
              $resultado=mysql_query("Select * from cobertura where SeguroCodSeguro='0001' and tipoCobertura='Opcional'  and estatus='A'");
              while($fila=mysql_fetch_array($resultado)){ ?>
              <div class="checkbox">
                <label>
                  <input name="coberturas[]" type="checkbox"  value="<?php echo $fila['codCobertura']; ?>"> <?php echo $fila['nombre'] ?>
                </label>
              </div>
             <?php } ?>
          </center>

          <div class="checkbox">
            <label>
              <input type="checkbox" value="0002" id="casco" name="seguros[]" onclick="mostrarCoberturas()"> Casco
            </label>
          </div>
          <div id="coberturasCasco" style="display:none">
          <center>
            <label for="">Cobertura básicas</label>
            
            <?php 
              $resultado=mysql_query("Select * from cobertura where SeguroCodSeguro='0002' and tipoCobertura='Basica'  and estatus='A'");
              while($fila=mysql_fetch_array($resultado)){ ?>
              <div class="radio">
                <label>
                  <input name="coberturas[]" type="radio" value="<?php echo $fila['codCobertura']; ?>"> <?php echo $fila['nombre'] ?>
                </label>
              </div>
             <?php  } ?>

           <label for="">Cobertura Opcionales</label>
            <?php 
              $resultado=mysql_query("Select * from cobertura where SeguroCodSeguro='0002' and tipoCobertura='Opcional'  and estatus='A'");
              while($fila=mysql_fetch_array($resultado)){ ?>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="coberturas[]" value="<?php echo $fila['codCobertura']; ?>"> <?php echo $fila['nombre'] ?>
                </label>
              </div>
             <?php  } ?>
          </center>
          </div>

          <hr>

          <label for="">Tipo de póliza <mark>*</mark></label>
          <br>

              <div class="radio-inline">
                <label>
                  <input type="radio" onclick="seleccionarVehiculo()" id="tipoPoliza1"  name="tipoPoliza" value="1" required> Particular
                </label>
              </div>

              <div class="radio-inline">
                <label>
                  <input type="radio" onclick="seleccionarVehiculo()" id="tipoPoliza2" name="tipoPoliza" value="2" required> Flota
                </label>
              </div>
            
          <br><br>

          <div id="particular" style="display:none">
            <div class="form-group">
              <label>Vehículo a asegurar <mark>*</mark></label>
              <?php  
                $resultado = mysql_query("Select placa, cliente.nombre, cliente.apellido from vehiculo, cliente where vehiculo.estatus='I' and vehiculo.Aseguradocedula = cliente.cedula");
                if(mysql_num_rows($resultado)==0)
                {?>
                  <mark>No hay vehículos disponibles para asegurar.</mark>                    
          
               <?php }
               else
                {?>
              <select class="form-control" id="selectParticular" name="vehiculo" required>
                <option value="">Seleccione el vehículo</option>
                <?php 
                 while($fila=mysql_fetch_array($resultado))
                 {?>
                  <option value="<?php echo $fila['placa']; ?>"> <?php echo "Placa: ".$fila['placa']." Asegurado: ".$fila['nombre']." ".$fila['apellido']; ?> </option>
               <?php } ?> 
              </select>
              <?php } ?>
            </div>
          </div>

          <div id="flota" style="display:none">
            <div class="form-group">
              <label>Vehículos a asegurar <mark>*</mark></label>

                <?php 
                $resultado = mysql_query("Select placa, cliente.nombre, cliente.apellido from vehiculo, cliente where vehiculo.estatus='I' and vehiculo.Aseguradocedula = cliente.cedula");
                while($fila=mysql_fetch_array($resultado))
                {?>
                <div class="checkbox">
                <label>
                  <input type="checkbox" name="vehiculosFlota[]" value="<?php echo $fila['placa']; ?>"> <?php echo "Placa: ".$fila['placa']." Asegurado: ".$fila['nombre']." ".$fila['apellido']; ?>
                </label>
                </div>
               <?php } ?> 
            </div>
          </div>

          <div class="form-group">
            <label>Monto asegurado <mark>*</mark></label>
            <input type="number" name="montoasegurado" class="form-control" min="0"; required placeholder="Ingrese el monto asegurado..." value="<?php echo $consulta['kilometraje'] ?>">
          </div>

          <label><mark>*</mark> Campo obligatorio</label><br>
          <center>
            <input type="submit" value="<?php echo $_GET['opcion'] ?>" name="boton" class="btn btn-info btn-lg" >  
            <a href="javascript:window.history.back();" name="cancelar" class="btn btn-info btn-lg">Cancelar</a>        
          </center> 

        </form>
    </div>
  </div>
  
<hr>

<?php include("PieDePagina2.php") ?>

</div>
  
</body>
</html>


<script type="text/javascript">

  function mostrarCoberturas(){
    if(document.getElementById("casco").checked==true)
    {
      document.getElementById("coberturasCasco").style.display='block';
    }
  else{
      document.getElementById("coberturasCasco").style.display='none';

  }
                    
  }

function  seleccionarVehiculo(){
  if(document.getElementById("tipoPoliza1").checked==true)
  {
    document.getElementById("particular").style.display='block';
    document.getElementById("selectParticular").required=true;
    document.getElementById("flota").style.display='none';
  }
  else if(document.getElementById("tipoPoliza2").checked==true)
  {
    document.getElementById("particular").style.display='none';
    document.getElementById("flota").style.display='block';
    document.getElementById("selectParticular").required=false;
  }
}
</script>