<div class="container">
	<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header navbar-inverse">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <form action="">
 <a class="navbar-brand" href="index.php"><img class="img-rounded img-responsive" style="margin-top:-5px;" src="img/micarro.jpg"></a>
    </form>
  </div>
 
  <!--  Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse navbar-inverse">
    <ul class="nav navbar-nav">

    	 <li class="dropdown1">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Servicios<b class="caret"></b>
        </a>

        <ul class="dropdown-menu">
          <li><a href="servRCV.php">RCV</a></li>
          <li class="divider"></li>
          <li><a href="servCasco.php">CASCO</a></li>
        </ul>
      </li>
      <li><a href="empresa.php">La Empresa</a></li>
      <li><a href="citas.php">Asegurate</a></li>
      <!--
      <li><a href="index.php" data-toggle="modal" data-target="#myModalReporteSiniestro" id="cotiza" >Reportar Siniestro</a></li>
      -->
<!--  <div class="form-group" > -->
      <li>  <a href="#" class="modal-toggle"  data-toggle="modal" data-target="#ModalReporteSiniestro" id="Reportar" >Reportar Siniestro</a></li>
        <!--  </div> -->

      <li><a href="afiliados.php">Afiliados</a></li>
      <li><a href="Contacto.php">Contáctenos</a></li>
      
    </ul>
 
    <form action="inicioSesion.php" method="post"  class="navbar-form navbar-primary navbar-right" role="search">
      
     <!-- <button type="submit" class="btn btn-default">Empleado</button>-->

       <ul class="nav pull-right">
          <li class="dropdown" id="menuLogin">
            <a class="dropdown-toggle color2" href="#" data-toggle="dropdown" id="navLogin">Empleado</a>
            <div class="dropdown-menu" style="padding:17px;">
                <span class="label label-info center-block">Iniciar sesión</span>
                <input name="username" id="username" type="text" placeholder="Usuario" required> <br>
                <input name="password" id="password" type="password" placeholder="Contraseña" required><br>
                <button type="submit" id="btnLogin" class="btn btn-info center-block">Login</button>
            </div>
          </li>
        </ul>
    </form>

<?php include("modalReporteSiniestro.php") ?>

  </nav>