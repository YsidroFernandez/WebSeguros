<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;  charset=utf-8">
<title>Estadisticas</title>
<meta name ="author" content ="Norfi Carrodeguas">
 <!-- importar librerias para estilos y responsib -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet"  href="css/estilos.css">
  <script src="js/jquery.js"></script>
  <script src="js/Chart.js"></script>
    <style type="text/css">
    </style>
</head>
<body>  	
<!-- desde aca se solicita el encabezado -->
<div class="container">
	<?php $clase="finan" ;
      include("encabezado2.php");
      include ("conexion.php");
    ?>
	<div class="panel panel-primary">
		<div class="panel-heading"><strong>Reporte coberturas con mayor ingreso (descendente) por concepto de primas</strong>
		</div>
		<div class="panel-body"></div>
    <div class="table-responsive">
	    <table class="table table-condensed table-hover">
	      <thead>
	      <tr>
	        <th>Seguro</th>
	        <th>Cobertura</th>
	        <th>Tipo</th>
	        <th>Monto Total</th>
	      </tr>
	      </thead>
	      <tbody>
	        <?php 
	        $resultado = mysql_query("SELECT seguro.nombre, cobertura.nombre, cobertura.tipoCobertura, IFNULL( SUM( coberturaporpoliza.montoPrima ) , 0 ) AS monto
																																			FROM cobertura
																																			LEFT JOIN coberturaporpoliza ON cobertura.codCobertura = coberturaporpoliza.CoberturacodCobertura
																																			JOIN seguro ON cobertura.SegurocodSeguro = seguro.codSeguro
																																			WHERE cobertura.estatus='A'
																																			GROUP BY cobertura.codCobertura
																																			ORDER BY monto DESC");
	        if (mysql_num_rows($resultado)==0) {

	          ?>
	          <tr>
	            <td colspan="4" align="center"> <h4>No se encontraron coberturas</h4></td>
	          </tr>
	          <?php 

	          }
	          else
	        while($fila=mysql_fetch_array($resultado))
	        {?>
	      <tr>
	        <td><?=$fila[0] ?></td>
	        <td><?=$fila[1] ?></td>
	        <td><?=$fila[2] ?></td>
	        <td><?=$fila[3] ?></td>
	      </tr>
	        <?php } ?>
	      </tbody>
	    </table>
    </div>  
 </div>  
  
<hr>  

<div class="panel panel-primary">
		<div class="panel-heading"><strong>Reporte pólizas con mayor indemnización (descendente) y cantidad de siniestros</strong>
		</div>
		<div class="panel-body"></div> 
    <div class="table-responsive">
	    <table class="table table-condensed table-hover">
	      <thead>
	      <tr>
	        <th>Póliza</th>
	        <th>Cant. Siniestros</th>
	        <th>Total Indemnizado</th>
	        <th>Estatus Póliza</th>
	      </tr>
	      </thead>
	      <tbody>
	        <?php 
	        $resultado = mysql_query("SELECT polizadeseguro.codPoliza, COUNT( siniestro.montoAprobado ) , IFNULL( SUM( siniestro.montoAprobado ) , 0 ) AS montoTotal, polizadeseguro.estatus
																																			FROM vehiculo
																																			LEFT JOIN siniestro ON vehiculo.placa = siniestro.Vehiculoplaca
																																			JOIN polizadeseguro ON vehiculo.placa = polizadeseguro.Vehiculoplaca
																																			GROUP BY polizadeseguro.codPoliza
																																			UNION SELECT polizadeseguro.codPoliza, COUNT( siniestro.montoAprobado ) , IFNULL( SUM( siniestro.montoAprobado ) , 0 ) AS montoTotal, polizadeseguro.estatus
																																			FROM certificadoseguro
																																			LEFT JOIN siniestro ON certificadoseguro.Vehiculoplaca = siniestro.Vehiculoplaca
																																			JOIN polizadeseguro ON certificadoseguro.PolizaDeSeguroCodPoliza = polizadeseguro.codPoliza
																																			GROUP BY polizadeseguro.codPoliza
																																			ORDER BY montoTotal DESC ");
	        if (mysql_num_rows($resultado)==0) {

	          ?>
	          <tr>
	            <td colspan="4" align="center"> <h4>No se encontraron coberturas</h4></td>
	          </tr>
	          <?php 

	          }
	          else
	        while($fila=mysql_fetch_array($resultado))
	        {?>
	      <tr>
	        <td><?=$fila[0] ?></td>
	        <td><?=$fila[1] ?></td>
	        <td><?=$fila[2] ?></td>
	        <td><?php switch ($fila[3]) {
                  case 'A':
                    echo "Activo";
                    break;
                  case 'S':
                    echo "Suspendida";
                    break;
                  case 'C':
                    echo "No Pagada";
                    break;
                    case 'V':
                    echo "Vencida";
                    break;
                } ?>
         </td>
	      </tr>
	        <?php } ?>
	      </tbody>
	    </table>
    </div>
  	 
 </div>
	<?php include("PieDePagina2.php"); ?>
</div>  
</body>
</html>
