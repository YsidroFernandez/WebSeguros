<?php 
session_start();
	include("conexion.php");
	

		
				//unlink($_POST['archivo']); //borrar el viejo

				//actualizar con nuevo archivo.
				$carpeta= "documentos/siniestros/";
				opendir($carpeta);
				$nombreArchivo = $_FILES['archivo']['name'];

				$destino=$carpeta.$nombreArchivo;
				copy($_FILES['archivo']['tmp_name'], $destino);

			$sql = "update siniestro set nombreArchivo = '$nombreArchivo' where codSiniestro=$_POST[codigo]";
			mysql_query($sql);
			?>
				<script type="text/javascript">
				 	alert("Modificado con éxito!! ");
				 	document.location.href="ventanaSiniestros.php"; 
				 </script>
			<?php 

	

 ?>