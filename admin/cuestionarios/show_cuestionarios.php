<?php 
include('../../app/config.php');
include('../../admin/layout/parte1_admin.php');

include('../../app/controllers/cuestionarios/show_cuestionario.php');
include('../../app/controllers/creaciones_literarias/show_literaria.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>LISTA DE CUESTIONARIOS</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-11">
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Cuestionarios Registrados</h3>

                <div class="card-tools">
                  <a href="create_cuestionario.php" class="btn btn-outline-danger" style="border-color: #D92B3A;">Crear Cuestionario <i class="bi bi-pencil-square"></i></a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-hover table-sm"> <!--Para marcar una fila(table-striped) -->
                
                <thead>
                  <tr style="text-align: center;">
                    <th>Item</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $contador_cuestionario = 0;
                  foreach($cuestionarios as $cuestionario){
                   $codigo_cu = $cuestionario['idCuestionario']; 
                   $contador_cuestionario = $contador_cuestionario + 1;?>
                    
                    <tr>
                      <td style="text-align: center;"><?=$contador_cuestionario;?></td>
                      <td style="text-align: center;"><?=$cuestionario['idCuestionario'];?></td>
                      <td><?=$cuestionario['nombre'];?></td>
                      <td style="text-align: center;"><?=$cuestionario['fechaInicio'];?></td>
                      <td style="text-align: center;"><?=$cuestionario['fechaFin'];?></td>
                      <td style="text-align: center; ">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                          <a href="edit_cuestionario.php?id=<?=$codigo_cu;?>" type="button" class="btn btn-primary" title="Editar Cuestionario" style="background-color: #F2D98D; border-radius: 10px 6px 6px 0px; border-color: #F2D98D; color: white;"><i class="bi bi-pencil"></i></a>
                          <a href="preguntas_cuestionario.php?id=<?=$codigo_cu;?>" type="button" class="btn btn-primary" title="Agregar Preguntas" style="background-color: #D6B357; border-radius: 10px 6px 6px 0px; border-color: #D6B357; color: #F2F2F2;"><i class="bi bi-plus-square"></i></a>
                          <a href="show_preguntas.php?id=<?=$codigo_cu;?>" type="button" class="btn btn-primary" title="Editar Preguntas" style="background-color: #D6B357; border-radius: 10px 6px 6px 0px; border-color: #D6B357; color: #F2F2F2;"><i class="bi bi-pencil-square"></i></a>
                          <form action="<?=APP_URL;?>/app/controllers/cuestionarios/delete_cuestionario.php" onclick="preguntar<?=$codigo_cu;?>(event)" method="post" id="miformulario<?=$codigo_cu;?>">
                            <input type="text" value="<?=$codigo_cu;?>" hidden name="codigo_eliminar">
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" style="background-color: #D92B3A; border-color: #D92B3A; border-radius: 10px 5px 5px 0px; color: #F2F2F2;"><i class="bi bi-trash3"></i></button>
                          </form>  
                          <script>
                              function preguntar<?=$codigo_cu;?>(event){
                                event.preventDefault();
                                Swal.fire({
                                  title: 'Eliminar Creación Literaria',
                                  text: '¿Desea eliminar la Creación Literaria seleccionada?',
                                  icon: 'question',
                                  showDenyButton: true,
                                  confirmButtonText: 'Eliminar',
                                  confirmButtonColor: '#D6B357',
                                  denyButtonText: 'Cancelar',
                                  denyButtonColor: '#D92B3A',
                                }).then((result) => {
                                  if(result.isConfirmed){
                                    var form = $('#miformulario<?=$codigo_cu;?>')
                                    form.submit();
                                  }
                                });
                              }
                          </script>
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
  include('../../admin/layout/parte2_admin.php');
  include('../../layout/mensajes.php');
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
      "responsive": true, "lengthChange": false, "autoWidth": false
                
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