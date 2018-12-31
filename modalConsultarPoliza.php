<!-- Reporte de Siniestros-->
<div id="ModalConsultarPoliza" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal contenido Reporte-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Datos de la Póliza</h4>
      </div>
      <div class="modal-body2">
            
             <script type="text/javascript">
                  $(document).ready(function() {
                    $(".selector-placa input").change(function() {
                       var txt = document.getElementById("placa").value;
                      var form_data = {
                          is_ajax: 1,
                          placa:txt
                    };
                          $.ajax({
                                  type: "POST",
                                  url: "getPlaca.php",
                                  data: form_data,
                                  success: function(response)
                                  {
                                      $('.modal-body2').html(response).fadeIn();
                                  }
                      });
                    });
                  });
             </script>
                        
              </div>
      

   
        <div class="modal-footer">
       
          <!-- <button type="submit" class="btn btn-info">CONSULTAR</button> -->
          <button type="button" class="btn btn-info" data-dismiss="modal">CERRAR</button>
        </div>

      </div> <!-- modalbody -->
    </div> <!-- modalcontent -->
  </div> <!-- modaldialog -->
