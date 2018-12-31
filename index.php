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
	<?php include ("encabezado.php") ?>


<!-- Desde aqui el codigo del carousel -->

<div class="row">
      
      <div class="col-md-8">
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner center" role="listbox">
          <div class="item active">
            <img class="first-slide imagengrande" src="img/promo1.jpg" alt="First slide">
          </div>
          <div class="item">
            <img class="second-slide imagengrande" src="img/promo2.jpg" alt="Second slide">
          </div>
          <div class="item">
            <img class="third-slide imagengrande" src="img/promo4.jpg" alt="Third slide">
          </div>
          <div class="item">
            <img class="fourth-slide imagengrande" src="img/promo5.png" alt="Third slide">
          </div>
          
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
     </div>
    


     </div>

     <div class="col-md-4">
     <div class="panel panel-info">
     <div class="panel-heading">
        <h2 class="panel-title text-center">Cotización</h2>
     </div>
     <div class="panel-body">
      <form onsubmit="$('#myModal').modal('show');return false;">

        <div class="form-group">
          <div class="selector-marca">
            <label>Seleccione la marca</label>
            <select class="form-control" onchange="cargarModelos()" required>
            <option value="">Selecciona una Marca</option> 
              <?php 
               $resultado = mysql_query("Select codMarca, nombreDeMarca from marca  ORDER BY `codMarca` ASC");
               while($fila=mysql_fetch_array($resultado))
                {?>
                  <option value="<?=$fila['codMarca']?>"><?=$fila['nombreDeMarca']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="selector-modelos">
            <label>Seleccione modelo</label>
              <select class="form-control" onchange="cargarCotizacion()" required>
              </select>
          </div>
        </div>

          <!--boton para cotizaciones -->
         
        <div class="form-group" >
          <button type="submit" class="btn btn-info center-block" id="cotizar" >Cotiza</button>
        </div>
      </form>

  <!--MODAL PARA COTIZACION DEL VEHICULO-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal contenido-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">COTIZACIÓN</h4>
      </div>
      <div class="modal-body">
        <label>SU COTIZACION ES: </label>
           <p>
         </p>
         
        </div>
<div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">CERRAR</button>
      </div>
      </div>
      
    </div>

  </div>







         <!--hasta aqui vamos a agregar scrips para consultas de selec a select -->
     </div>
     </div>

     
     
     
  </div>
<!-- a partir de estas lineas de codico comenzamos a colocar las referencias a las redes sociales-->


  
   

  </div><!-- este es el cierre del primer row-->
  <div class="row ">
  <h4><span class="label label-info center-block">Síguenos en nuestras redes sociales</span></h4>
  <center>
    <a href=""><img  src="img/rs3.png" alt=""></a>
    <a href=""><img  src="img/rs5.png" alt=""></a>
    <a href=""><img  src="img/rs6.png" alt=""></a>
    <a href=""><img  src="img/rs7.png" alt=""></a>
    </center>
  </div>
<div class="row"> 
   <h4><span class="label label-info center-block">Nos preocupamos por brindale los mejores servicios</span></h4>
      <div class="col-md-4">
        <a href="#" class="modal-toggle"  data-toggle="modal" data-target="#ModalReporteSiniestro"> <div class="panel panel-primary" style="text-align:center;">
        <div class="panel-heading">
        <h2 class="panel-title text-center glyphicon glyphicon-bell"> Notificación de siniestros</h2>
        </div>
         <div class="panel-body">
            <p>Ahorre tiempo con la notificacion <br> de siniestros online</p>
        </div>
        </div>
        </a>
      </div>
      
       
       
      
     <div class="col-md-4">
        
       <a href="Contacto.php"> 
        <div class="panel panel-primary" style="text-align:center;">
        <div class="panel-heading">
        <h2 class="panel-title text-center glyphicon glyphicon-phone-alt"> Contactenos</h2>
        </div>
         <div class="panel-body">
            <p>Nuestras oficinas están distribuidas <br> en el Territorio Nacional.</p>
        </div>
        </div>
        </a>


      </div>
      

<div class="col-md-4"> 

  <div class="panel panel-info">
    <div class="panel-heading">
      <h2 class="panel-title text-center">Consultar Póliza</h2>
    </div>
   
    <div class="panel-body">
      <!--   <form  method="post" name="consulta" > -->
      <!--caja de texto de cedua para la cotizacion -->
      <form onsubmit="$('#ModalConsultarPoliza').modal('show');return false;">

        <div class="form-group">
          <div class="selector-placa">
            <input  type="text" class="form-control" id="placa"  minlength="7" maxlength="7" required placeholder="Ingrese la Placa..!"> 
          </div>
        </div>
       <!--  data-toggle="modal" data-target="#ModalConsultarPoliza" -->
        <div class="form-group">
          <input type="submit" class="btn btn-info center-block" id="consulta" >
        </div>
      </form>     

      <?php include ("modalConsultarPoliza.php") ?>
      <!-- </form> -->
    </div>
  </div>
</div> 

</div> 
    
<script>
    $(document).ready(function(){
        $('.myCarousel').carousel()
    });
</script>
	
	
<?php include ("PieDePagina.php") ?>
</body>
</html>

<script type="text/javascript">
  function cargarModelos(){

     var form_data = {
            is_ajax: 1,
            marca:+$(".selector-marca select").val()
      };
      $.ajax({
              type: "POST",
              url: "getModelos.php",
              data: form_data,
              success: function(response)
              {
                  $('.selector-modelos select').html(response).fadeIn();
              }
      });

  }

  function cargarCotizacion(){
    var form_data = {
          is_ajax: 1,
          modelo:+$(".selector-modelos select").val()
    };
    $.ajax({
            type: "POST",
            url: "getCotizacion.php",
            data: form_data,
            success: function(response)
            {
                $('.modal-body p').html(response).fadeIn();
            }
    });
  }

</script>