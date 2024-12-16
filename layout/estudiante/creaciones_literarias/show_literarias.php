<?php 
include('../../../app/config.php');
include('../layout/parte1_admin.php');

include('../../../app/controllers/creaciones_literarias/show_literaria.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>LISTA DE CREACIONES LITERARIAS</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-12">
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Creaciones Literarias Registradas</h3>

                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-hover table-sm"> <!--Para marcar una fila(table-striped) -->
                
                <thead>
                  <tr style="text-align: center;">
                    <th>Item</th>
                    <th>Codigo</th>
                    <th>Nombre Creación Literaria</th>
                    <th>Archivo</th>
                    <th>Autor</th>
                    <th>Fecha de Cargue</th>
                    <th>Descargar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $contador_literaria = 0;
                  foreach($literarias as $literaria){
                   $codigo_literaria = $literaria['idliteraria'];
                   $codigo_autor = $literaria['autor'];
                   $contador_literaria = $contador_literaria + 1;?>
                    
                    <tr>
                      <td style="text-align: center;"><?=$contador_literaria;?></td>
                      <td style="text-align: center;"><?=$literaria['idliteraria'];?></td>
                      <td style="text-align: center;"><?=$literaria['nombre'];?></td>
                      <td style="text-align: center;"><?=$literaria['archivo'];?></td>
                      <td style="text-align: center;">
                        
                      <?php 
                      $codigo = $literaria['autor'];
                      $codigo_li = $literaria['idliteraria'];
                      include ('../../../app/controllers/rol_usuarios/datos_usuario.php');
                      echo $nombre_usuario;                      
                      ?>
                    
                      </td>
                      <td style="text-align: center;"><?=$literaria['fechaCargue'];?></td>
                      <td style="text-align: center; ">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                          <a href="<?=APP_URL;?>/app/controllers/creaciones_literarias/download_literaria.php?id=<?=$codigo_li;?>" type="button" class="btn btn-primary" title="Descargar" style="background-color: #D6B357; border-radius: 10px 6px 6px 0px; border-color: #D6B357; color: #F2F2F2;"><i class="bi bi-download"></i></a>                          
                        </div>
                      </td>
                    </tr>  
                  <?php
                  }
                  ?>                
                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
  include('../layout/parte2_admin.php');
  include('../../../layout/mensajes.php');
  ?>

<script>
  $(function () {
    $("#example1").DataTable({
      "pageLength":4,
      "language":{
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Creaciones Literarias",
        "infoEmpty": "Mostrando 0 a 0 de 0 Creaciones Literarias",
        "infoFiltered": "(Filtrado de _MAX_ total Creaciones Literarias",
        "infoPostEix": "",
        "thousands": ",",
        "LengthMenu": "Mostrar _MENU_ Creaciones Literarias",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscador:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",    
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior",            
          } 
      },
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
                
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>