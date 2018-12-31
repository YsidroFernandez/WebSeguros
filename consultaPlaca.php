<?php 
include("conexion.php");
    $registro=mysql_query("SELECT placa
                                FROM vehiculo, polizadeseguro
                                WHERE Vehiculoplaca = '$_POST[placa]'
                                AND polizadeseguro.estatus =  'A'
                                UNION SELECT certificadoseguro.Vehiculoplaca
                                FROM vehiculo, polizadeseguro, certificadoseguro
                                WHERE certificadoseguro.Vehiculoplaca = '$_POST[placa]'
                                AND certificadoseguro.PolizaDeSeguroCodPoliza = polizadeseguro.codPoliza
                                AND polizadeseguro.estatus =  'A'");
    if(mysql_num_rows($registro)>0)
      {
      ?>
      <script type="text/javascript"> document.location.href="formularioSiniestro.php?placa=<?php echo $_POST[placa] ?>"; </script>
       
      <?php
     exit(); //Para que se salga de este php
      }
      else
      {
      	 ?>
				<script type="text/javascript">
				alert("¡ERROR! La Placa no existe o el Vehículo no está Activo"); 
				window.history.back();	//Lo manda de regreso sin borrar el texto en los inputs
				</script>
			<?php
			exit(); //Para que se salga de este php
      }
     


	