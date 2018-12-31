<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header navbar-inverse">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <form action="">
    <a class="navbar-brand" href="index.php"><img class="img-rounded"style="margin-top:-5px;" src="img/micarro.jpg"  ></a>
    </form>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse navbar-inverse">
    <ul class="nav navbar-nav nav-tabs">
      <li class="<?= ($clase=="clie") ? "active" : "" ?>"  ><a href="ventanaCliente.php">Clientes</a></li>
      <li class="<?= ($clase=="vehi") ? "active" : "" ?>" ><a href="ventanaVehiculo.php">Vehículos</a></li>
      <li class="dropdown1 <?= ($clase=="poli" or $clase=="cobe" or $clase=="cert") ? "active" : "" ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Póliza<b class="caret"></b>
        </a>

        <ul class="dropdown-menu">
          <li class="<?= ($clase=="poli") ? "active" : "" ?>" ><a href="ventanaPoliza.php">Contratos</a></li>
          <li class="divider"></li>
          <li class="<?= ($clase=="cobe") ? "active" : "" ?>" ><a href="ventanaCoberturasPorPoliza.php">Coberturas</a></li>
          <li class="divider"></li>
          <li class="<?= ($clase=="cert") ? "active" : "" ?>" ><a href="ventanaCertificados.php">Certificados</a></li>
        </ul>
      </li>
      <li class="dropdown1 <?= ($clase=="sini" or $clase=="fact") ? "active" : "" ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Siniestros<b class="caret"></b>
        </a>

        <ul class="dropdown-menu">
          <li class="<?= ($clase=="sini") ? "active" : "" ?>" ><a href="ventanaSiniestros2.php">Información</a></li>
          <li class="divider"></li>
          <li class="<?= ($clase=="fact") ? "active" : "" ?>" ><a href="ventanaFacturas.php">Facturas</a></li>
        </ul>
      </li>
      <li class="<?= ($clase=="insp") ? "active" : "" ?>" ><a href="ventanaInspecciones2.php">Inspecciones</a></li>
    </ul>
 
    <form action="cerrarSesion.php" class="navbar-form navbar-inverse navbar-right" role="search">
      
      <button type="submit" class="btn btn-default">Cerrar sesión</button>
    </form>
  </div>
  </nav>