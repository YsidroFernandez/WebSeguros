<?php 
include("conexion.php");

      
      ?> 
      <div class="table-responsive">
          <table class="table table-hover">
            <thead>
            <tr>
              <th>Código</th>
              <th>Vehículo</th>
              <th>Tomador</th>
              <th>Sucursal</th>
               <th>Corredor</th>
              <th nowrap>Tipo Póliza</th>
              <th nowrap>Fec. Emisión</th>
              <th nowrap>Fec. Caducidad</th>
              <th>Prima</th>
              <th nowrap>Monto Asegurado</th>
              <th nowrap>Estatus</th>
             
            </tr>
            </thead>
            
            <tbody>
              <?php 
              $sql = "SELECT  `codPoliza` ,  `Vehiculoplaca` ,  `Tomadorcedula`, sucursal.nombre, usuario.nombre,tipopoliza.tipo ,`fechaEmision` ,  `fechaCaducidad` ,  `prima` , montoAsegurado , polizadeseguro.`estatus` FROM polizadeseguro, sucursal, usuario, tipopoliza";
              $sql .= " WHERE  `TipoPolizacodTipo` = tipopoliza.codTipo";
              $sql .= " AND  polizadeseguro.`SucursalcodSucursal` = sucursal.codSucursal";
              $sql .= " AND  `Usuariocedula` = usuario.cedula";
              $sql .= " and Vehiculoplaca ='$_REQUEST[placa]' ";
              $sql .= " UNION";
              $sql .= " SELECT  certificadoseguro.PolizaDeSeguroCodPoliza , certificadoseguro.Vehiculoplaca ,  `Tomadorcedula`, sucursal.nombre, usuario.nombre,tipopoliza.tipo,`fechaEmision` , `fechaCaducidad` , `prima` , montoAsegurado, polizadeseguro.estatus  FROM polizadeseguro, sucursal, usuario, tipopoliza,certificadoseguro";
              $sql .= " WHERE   `TipoPolizacodTipo` = tipopoliza.codTipo";
              $sql .= " AND  polizadeseguro.`SucursalcodSucursal` = sucursal.codSucursal";
              $sql .= " AND  `Usuariocedula` = usuario.cedula  and codPoliza=certificadoseguro.PolizaDeSeguroCodPoliza   ";
              $sql .= " and certificadoseguro.Vehiculoplaca ='$_REQUEST[placa]' and certificadoseguro.estatus='A'";
             
              $resultado = mysql_query($sql);
             if (mysql_num_rows($resultado)==0){

               ?>
                  <tr>
                    <td colspan="11" align="center"> <h3>No se encontraron pólizas</h3></td>
                  </tr>
                  <?php 
               }
              else
              {
                while($fila=mysql_fetch_array($resultado))
                {?>
              <tr >
                <td><?php echo $fila[0] ?></td>

                <td>
                  <?php  echo $fila[1]  ?>
                    
                </td>

                <td><?php echo $fila[2] ?></td>
                <td><?php echo $fila[3] ?></td>
                <td><?php echo $fila[4] ?></td>
                <td><?php echo $fila[5] ?></td>
                <td><?php echo $fila[6] ?></td>
                <td><?php echo $fila[7] ?></td>
                <td><?php echo $fila[8] ?></td>
                <td><?php echo $fila[9] ?></td>
                <td><?php switch ($fila[10]) {
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
                }
                  ?></td>
              </tr>
              <?php }
            }?>
            </tbody>
            
          </table>
        </div>

      <?php
    
mysql_free_result($resultado);

// Cerrar la conexión

              
?>