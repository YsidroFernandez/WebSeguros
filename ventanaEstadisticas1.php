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
	<span class="label label-default label1" >Daño a cosas</span>
	<span class="label label-default label2" >Daño a personas</span>
	<span class="label label-default label3" >Defensa penal</span>
	<span class="label label-default label4" >Accidentes personales</span>
	<span class="label label-default label5" >Exceso de limites</span>
	
</div>
</div>

</div>	



<div class="col-md-6">
	
	<div class="panel panel-info">
	<div class="panel-heading"><strong>Porcentaje de coberturas Casco Suministradas</strong></div>
<div class="panel-body">
	<canvas id="chart-area2" width="400" height="300"></canvas>
	<br>
	<span class="label label-default label1" >Amplia </span>
	<span class="label label-default label2" >Perdida Total </span>
	<span class="label label-default label3" >Riesgos catastroficos </span>
	<span class="label label-default label4" >Accidentes personales </span>
	<span class="label label-default label5" >Indemnizacion diaria </span>
	<span class="label label-default label6" >Accesorios</span>
	<span class="label label-default label7" >Asistencia en viajes</span>
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
<script>
var pieData = [{value: 20,color:"#0b82e7",highlight: "#0c62ab",label: "Daño a Cosas %"},
				{
					value: 20,
					color: "#e3e860",
					highlight: "#a9ad47",
					label: "Daño a Personas %"
				},
				{
					value: 16,
					color: "#e965db",
					highlight: "#a6429b",
					label: "Defensa Penal %"

				},
				{
					value: 11,
					color: "#eb5d82",
					highlight: "#b74865",
					label: "Accidentes Personales %"
				},
				{
					value: 18,
					color: "#5ae85a",
					highlight: "#42a642",
					label: "Exceso de limites %"
				}
				
			];

var pieData2 = [
               {
                  value: 30,
	              color:"#0b82e7",
	              highlight: "#0c62ab",
	              label: "Amplia %"
	            },
				{
				    value: 20,
					color: "#e3e860",
					highlight: "#a9ad47",
					label: "Perdida Total %"
				},
				{
					value: 6,
					color: "#e965db",
					highlight: "#a6429b",
					label: "Riesgos Catastroficos %"
				},
				{
					value: 11,
					color: "#eb5d82",
					highlight: "#b74865",
					label: "Accidentes Personales %"
				},
				{
					value: 10.6,
					color: "#5ae85a",
					highlight: "#42a642",
					label: "Indemnización diaria por pérdida total %"
				},
				{
					value: 8,
					color: "#8B0000",
					highlight: "#42a642",
					label: "Accesorios %"
				},
				{
					value: 10.6,
					color: "#8A2BE2",
					highlight: "#42a642",
					label: "Asistencia en Viajes %"
				}
				
			];

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
