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
      
      <li  class=" <?php echo ($clase=="adm" ? "active" : ""); ?>"><a href="ventanaAdministrador.php">Empleados</a></li>
      
       <li class="dropdown1 <?php echo (($clase=="ase" or $clase=="suc") ? "active" : ""); ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Aseguradora<b class="caret"></b>
        </a>

        <ul class="dropdown-menu">
          <li class="<?php echo ($clase=="ase" ? "active" : ""); ?>"><a href="ventanaAseguradora.php">Información</a></li>
          <li class="divider"></li>
          <li class="<?php echo ($clase=="suc" ? "active" : ""); ?>"><a href="ventanaSucursal.php">Sucursales</a></li>
        </ul>
      </li>
      <li  class="<?php echo ($clase=="cita" ? "active" : ""); ?>" ><a href="ventanaCitas.php">Citas</a></li>
      <li  class="<?php echo ($clase=="cober" ? "active" : ""); ?>"><a href="ventanaCoberturas.php">Coberturas</a></li>
      <li class="dropdown1 <?php echo (($clase=="esta" or $clase=="finan") ? "active" : ""); ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Reportes<b class="caret"></b>
        </a>

        <ul class="dropdown-menu">
          <li class="<?php echo ($clase=="esta" ? "active" : ""); ?>"><a href="ventanaEstadisticas.php">Estadisticas</a></li>
          <li class="divider"></li>
          <li class="<?php echo ($clase=="finan" ? "active" : ""); ?>"><a href="ventanaReporteFinanciero.php">Financieros</a></li>
        </ul>
      </li>
      <li  class="<?php echo ($clase=="afi" ? "active" : ""); ?>"><a href="ventanaAfiliados.php">Afiliados</a></li>
    </ul>
 
    <form action="cerrarSesion.php" class="navbar-form navbar-inverse navbar-right" role="search">
      
      <button type="submit" class="btn btn-default">Cerrar sesión</button>
    </form>
  </div>
  </nav>