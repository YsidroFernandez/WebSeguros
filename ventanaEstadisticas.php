<?php 

include("conexion.php");

$sql="SELECT cobertura.nombre, ROUND( (
COUNT( * ) *100 ) / ( 
SELECT COUNT( * ) 
FROM seguro, cobertura, coberturaporpoliza
WHERE codSeguro = Segurocodseguro
AND codcobertura = coberturacodcobertura
AND codseguro =0001 ) 
,2)
FROM seguro, cobertura, coberturaporpoliza
WHERE codSeguro = Segurocodseguro
AND codcobertura = coberturacodcobertura
AND codseguro =0001 and cobertura.estatus='A' and coberturaporpoliza.estatus='A'
GROUP BY cobertura.nombre";

$resultado = mysql_query($sql) or die ($sql .mysql_error()."" );


$sql1="SELECT cobertura.nombre, ROUND( (
COUNT( * ) *100 ) / ( 
SELECT COUNT( * ) 
FROM seguro, cobertura, coberturaporpoliza
WHERE codSeguro = Segurocodseguro
AND codcobertura = coberturacodcobertura
AND codseguro =0002 ) 
,2)
FROM seguro, cobertura, coberturaporpoliza
WHERE codSeguro = Segurocodseguro
AND codcobertura = coberturacodcobertura
AND codseguro =0002 and cobertura.estatus='A' and coberturaporpoliza.estatus='A'
GROUP BY cobertura.nombre";
$resultado1 = mysql_query($sql1) or die ($sql1 .mysql_error()."" );

?> 


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
	<?php $clase="esta" ;
      include("encabezado2.php");
    ?>



<div class="panel panel-primary">

<div class="panel-heading"><strong>Estadisticas Administrativas</strong>
</div>

<div class="panel-body">     



<!-- aqui comienza el row -->
<div class="row">
<div class="col-md-6">
<div class="panel panel-info">
	<div class="panel-heading"><strong>Porcentaje de Coberturas RCV Suministradas</strong></div>
<div class="panel-body">
	<canvas id="chart-area" width="400" height="300"></canvas>
	<br>

	<!-- a partir de este punto se cargan los label con la especificacion de la
	cobertura y el color en el grafico -->
	<?php 
      if (mysql_num_rows($resultado)==0) {
        ?>
          <spam class="label label-default">No se encontraron coberturas</spam>
          <?php  
          }
          else  
          	
	          while($fila=mysql_fetch_array($resultado))
                  {
                   $cont1++;
                   ?>

	               <span class="label label-default <?php colores1($cont1); ?> "  ><?php echo $fila[0]; ?> </span>
	
	         <?php }
                $resultado = mysql_query($sql) or die ($sql .mysql_error()."" );
	          ?>
	
	
</div>
</div>

</div>	



<div class="col-md-6">
	
	<div class="panel panel-info">
	<div class="panel-heading"><strong>Porcentaje de coberturas Casco Suministradas</strong></div>
<div class="panel-body">
	<canvas id="chart-area2" width="400" height="300"></canvas>
	<br>

	<!-- a partir de este punto se cargan los label con la especificacion de la
	cobertura y el color en el grafico -->
	<?php 
      if (mysql_num_rows($resultado1)==0) {
        ?>
          <spam class="label label-default">No se encontraron coberturas</spam>
          <?php  
          }
          else  
          	
	          while($fila=mysql_fetch_array($resultado1))
                  {
                   $cont2++;
                   ?>

	               <span class="label label-default <?php colores1($cont2); ?> "  ><?php echo $fila[0]; ?> </span>
	
	         <?php }
                $resultado1 = mysql_query($sql1) or die ($sql1 .mysql_error()."" );
	          ?>
</div>
</div>

</div>

</div>
<!-- aqui termina el row -->
<div class="row">
	<div class="panel panel-info">
	<div class="panel-heading"><strong>Crecimiento mensual de polizas del año 2016 (Segundo semestre)</strong></div>
    <div class="panel-body">
	
<canvas id="chart-area3" width="600" height="300"></canvas>
<br>
<h1><span class="label label-default label1" >RCV</span></h1>
<h1><span class="label label-default label2" >Casco</span></h1>
</div>
</div>

</div>



<div class="row">
	<div class="panel panel-info">
	<div class="panel-heading"><strong>Crecimiento mensual de polizas del año 2017 (Primer Trimestre)</strong></div>
    <div class="panel-body">
	
<canvas id="chart-area4" width="600" height="300"></canvas>
<br>
<h1><span class="label label-default label1" >RCV</span></h1>
<h1><span class="label label-default label2" >Casco</span></h1>
</div>
</div>

</div>

</div>



<!-- <div id="canvas-holder">
<canvas id="chart-area4" width="100" height="100"></canvas>
</div>  -->
<?php 
      if (mysql_num_rows($resultado)==0) {
         
        ?>
       <spam class="label label-default">No se encontraron coberturas</spam>
          <?php /*a esto se le llama espageti rudo nivel dios desde aca se multiplica la sentencia de consulta de cada cobertura sin importar cuantas sean se cargan en el script */
          }
          else  
          	?>
<script>
var pieData = [
          <?php           
          
        while($fila=mysql_fetch_array($resultado))
        {
         $cont++;
        	?>
                {
                	value: <?php echo $fila[1] ?>,
                    color:"<?php colores($cont); ?>",
                    highlight: "#00FFFF",
                    label: "<?php echo $fila[0] ?> %"
                },
                <?php } ?>
				
				{   /*nota: esto lo dejo porque se necesita que algun bloque termine sin punto y coma*/
					value: 0,
					color: "#5ae85a",
					highlight: "#42a642",
					label: ""
				}
				
			];
</script>
<?php 
      if (mysql_num_rows($resultado1)==0) {
         
        ?>
       <spam class="label label-default">No se encontraron coberturas</spam>
          <?php /*a esto se le llama espageti rudo nivel dios desde aca se multiplica la sentencia de consulta de cada cobertura sin importar cuantas sean se cargan en el script */
          }
          else  
          	?>
<script>
var pieData2 = [
          <?php           
          $cont=0;
        while($fila=mysql_fetch_array($resultado1))
        {
         $cont++;
        	?>
                {
                	value: <?php echo $fila[1] ?>,
                    color:"<?php colores($cont); ?>",
                    highlight: "#00FFFF",
                    label: "<?php echo $fila[0] ?> %"
                },
                <?php } ?>
				
				{
					value: 0,
					color: "#5ae85a",
					highlight: "#42a642",
					label: ""
				}
				
			];


</script>

<script>
	var barChartData = {
		labels : ["Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		datasets : [
			{
				fillColor : "#6b9dfa",
				strokeColor : "#ffffff",
				highlightFill: "#1864f2",
				highlightStroke: "#ffffff",
				data : [9,3,1,8,5,5]
			},
			{
				fillColor : "#e9e225",
				strokeColor : "#ffffff",
				highlightFill : "#ee7f49",
				highlightStroke : "#ffffff",
				data : [4,2,1,4,5,3]
			}
		]

	}	
		var lineChartData = {
			labels : ["Enero","Febrero","Marzo"],
			datasets : [
				{
					label: "Primera serie de datos",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "#6b9dfa",
					pointColor : "#1e45d7",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [9,7,6]
				},
				{
					label: "Segunda serie de datos",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "#e9e225",
					pointColor : "#faab12",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [3,6,5]
				}
			]

		}
var ctx = document.getElementById("chart-area").getContext("2d");
var ctx2 = document.getElementById("chart-area2").getContext("2d");
var ctx3 = document.getElementById("chart-area3").getContext("2d");
var ctx4 = document.getElementById("chart-area4").getContext("2d");
window.myPie = new Chart(ctx).Pie(pieData);	
window.myPie = new Chart(ctx2).Doughnut(pieData2);				
window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});
</script>


</div>  
</div>
<?php include("PieDePagina2.php"); ?>
</div>  
</body>
</html>
<?php
function colores($cont)
{
	switch ($cont) {
    case 1:
        $color="#0b82e7";
        break;
    case 2:
        $color="#e3e860";
        break;
    case 3:
        $color= "#e965db";
        break;
    case 4:
        $color= "#eb5d82";
        break;
    case 5:
        $color="#5ae85a";
        break;
    case 6:
        $color="#8B0000";
        break;
    case 7:
       $color="#8A2BE2";
        break;
    case 8:
       $color="#FF0000";
        break;
    case 9:
       $color="#FFFF00";
        break;
    default:
      $color="#FF6347";
      break;
}
    echo $color;
}
function colores1($cont1)
{
	switch ($cont1) {
    case 1:
        $color="label1";
        break;
    case 2:
        $color="label2";
        break;
    case 3:
        $color= "label3";
        break;
    case 4:
        $color= "label4";
        break;
    case 5:
        $color="label5";
        break;
    case 6:
        $color="label6";
        break;
    case 7:
       $color="label7";
        break;
    case 8:
       $color="label8";
        break;
    case 9:
       $color="label9";
        break;
    default:
       $color="label10";
        break;
}
    echo $color;
}
?>