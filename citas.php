    <?php 
    include("conexion.php");
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


    <div class="container">
      <div class="row">
        <div class="col-md-5 col-md-offset-1"><center>  <h1>¡Asegurate con Nosotros!</h1></center>
          <br>
         <p>
           Tenemos el mejor equipo para atenderle solo tiene llenar los campos que se indican a continuación para generar su cita en cualquiera de nuestras agencias.
         </p>
        </div>
        <div class="col-md-5"><center><img src="img/citas1.jpg" class="img-responsive" height=150></center></div>
         
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="well well-sm">
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">                     
                    <form class="form-horizontal" method="post" action="registrarcita.php">
                      <legend class="text-center header">Solicitud de Citas Online
                      </legend>
                      <div class="form-group">
                        <input required id="ci" name="cedula" minlength="7" maxlength="9" type="text" placeholder="Cedula" class="form-control">
                      </div>

                      <div class="form-group">
                            <input required id="fname" maxlength="50" name="nombre" type="text" placeholder="Nombre" class="form-control">
                      </div>
                      <div class="form-group">
                          <input  required id="lname" maxlength="50" name="apellido" type="text" placeholder="Apellido" class="form-control">
                      </div> 

                           
                      <div class="form-group">
                        
                        <input required id="email" name="correo" minlength="4" maxlength="40" type="email" class="form-control" placeholder="Correo">
                      </div>
                      
                      <div class="form-group">
                        <input required id="phone" name="telefono" maxlength="15" type="text" placeholder="Telefono" class="form-control">
                      </div>

                      <div class="form-group">
                        <input required id="dir" name="direccion" type="text" maxlength="60" placeholder="Dirección" class="form-control">
                      </div>
                         
                     <div class="form-group">
                        <label>Fecha de nacimiento:</label>
                        <input required id="ffecha" name="fecha" type="date"  max = "<?php echo (date("Y")-18)."-".date("m-d"); ?>" class="form-control">
                      </div>


                         <div class="form-group">
                             <label>Estado </label>
                                    <select class="form-control" name="estado" required>
                                        <option value="">Seleccione el estado</option>
                                              <?php 
                                                  $resultado = mysql_query("Select codEstado, estado from estado");
                                         while($fila=mysql_fetch_array($resultado))
                                              {?>
                                                <option value="<?php echo $fila['codEstado']; ?>" <?php echo ($fila['codEstado']==$consulta['EstadocodEstado'] ? "selected" : ""); ?>> <?php echo $fila['estado']; ?> </option>
                                                 <?php } ?> 
                                     </select>
                            </div>

                             <div class="form-group">
                             <label>Sucursal </label>
                                    <select class="form-control" name="sucursal" required>
                                        <option value="">Seleccione la sucursal</option>
                                              <?php 
                                                  $resultado = mysql_query("Select codSucursal, nombre, direccion, estado from estado, sucursal where EstadocodEstado=codEstado order by codEstado");
                                         while($fila=mysql_fetch_array($resultado))
                                              {?>
                                                <option value="<?php echo $fila['codSucursal']; ?>"> <?php echo $fila["estado"]." ".$fila['nombre']." ".$fila["direccion"]; ?> </option>
                                                 <?php } ?> 
                                     </select>
                            </div>




                      

                      <div class="form-group">
                        <label> Seleccione el dia de su Preferencia para su Cita</label>
                                 <br>
                                <select class="form-control" name="fechaCita">
                                  <?php  $resultado = mysql_query("Select codCita, fecha from cita where estatus='E'");
                                         while($fila=mysql_fetch_array($resultado))
                                              {?>
                                                 
                                            <option value="<?php echo $fila['codCita'] ?>"> <?php echo $fila['fecha'];  ?> </option>
                                    <?php } ?>
                                  </select>
                                  

                      </div>
                      <div class="form-group">
                        <textarea class="form-control" id="message" name="mensaje" placeholder="Introduzca su mensaje para nosotros (Opcional)" rows="7"></textarea>
                      
                      </div>
                           


                      <div class="form-group">
                        <input type="submit" value="Generar Cita" class="btn btn-info btn-lg btn-block center-block"  ></input>     
                      </div>
                          
                    </form>
                  </div> 
                </div> 
              </div>
            </div>
          </div>                        




    </div>























    <!--este es el navbar de pie de pagina  -->
    <?php include ("PieDePagina.php") ?>
    </body>
    </html>