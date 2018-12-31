<?php

if(isset($_POST['nombre'])&& !empty($_POST['nombre']) && isset($_POST['apellido']) && !empty($_POST['apellido']) && isset($_POST['correo'])&& !empty($_POST['correo']) && isset($_POST['telefono'])&& !empty($_POST['telefono']) && isset($_POST['mensaje']) && !empty($_POST['mensaje']))
  {
    $destino= "ysidrofernandez3012@gmail.com";
    $desde=$_POST['correo'];
    $asunto=$_POST['apellido'];
    $mens=$_POST['mensaje'];

   @mail($destino,$asunto,$mens,$desde);
   ?>
    <script type="text/javascript"> alert("Correo envíado con éxito!! espera nuestra respuesta, por favor.");</script>
   <?php 
  }
?>

<!DOCTYPE html>
<html lang="es">
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
  <?php include ("encabezado.php") ?>
  



<!--esto es de contacto-->

<div class="container">
  <div class="row">
     <center><img src="img/Contacto1.jpg"  class="img-responsive"></center>
  </div>

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="well well-sm">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">                     
                <form class="form-horizontal" method="post" action="Contacto.php">
                  <legend class="text-center header">Contáctenos</legend>

                  <div class="form-group">
                        <input required id="fname" maxlength="40" name="nombre" type="text" placeholder="Ingresar nombre" class="form-control">
                  </div>
                  <div class="form-group">
                      <input  required id="lname"  maxlength="40" name="apellido" type="text" placeholder="ingresar apellido" class="form-control">
                  </div> 
                  <div class="form-group">       
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input required id="email"  minlength="4" maxlength="40" type="email" class="form-control" placeholder="Correo" aria-describedby="basic-addon1" name="correo">
                  </div>
                  </div>
                  <div class="form-group">
                    <input required id="phone" name="telefono"  maxlength="15" type="text" placeholder="Telefono" class="form-control">
                  </div>
                  <div class="form-group">
                    <textarea required class="form-control" id="message" name="mensaje" placeholder="Introduzca su mensaje para nosotros aquí. Nos pondremos en contacto con usted dentro de 2 días hábiles." rows="7"></textarea>
                    <img src="img/contac.png" width="140" >
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Enviar Correo" class="btn btn-primary btn-lg btn-block center-block"  ></input>     
                  </div>
                </form>
              </div> 
            </div> 
          </div>
        </div>
      </div>                        
</div>
<?php include ("PieDePagina.php") ?>
</body>
</html>



  
