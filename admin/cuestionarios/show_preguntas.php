<?php 

$codigo_encu = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/parte1_admin.php');
include('../../app/controllers/cuestionarios/datos_cuestionario.php');
include('../../app/controllers/preguntas/show_pregunta.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>LISTA DE PREGUNTAS DEL CUESTIONARIO:</strong> <?=$nombre_cuestionario;?></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-12">
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Preguntas Registradas</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-hover table-sm"> <!--Para marcar una fila(table-striped) -->
                
                <thead>
                  <tr style="text-align: center;">
                    <th>Item</th>
                    <th>Dimension</th>
                    <th>Pregunta</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $contador_pregunta = 0;
                  foreach($preguntas as $pregunta){
                   $codigo_pre = $pregunta['idPreguntas']; 
                   $contador_pregunta  = $contador_pregunta  + 1;?>
                    
                    <tr>
                      <td style="text-align: center;"><?=$contador_pregunta;?></td>
                      <td style="text-align: center;">
                        <?php
                        $codigo = $pregunta['dimensiones_iddimensiones'];
                        include('../../app/controllers/rol_dimensiones/datos_dimension.php');
                        ?>
                        <?=$nombre_dimension;?>
                      </td>
                      <td><?=$pregunta['pregunta'];?></td>
                      <td style="text-align: center; ">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                          <a href="edit_pregunta.php?id=<?=$codigo_pre;?>" type="button" class="btn btn-primary" title="Editar" style="background-color: #D6B357; border-radius: 10px 6px 6px 0px; border-color: #D6B357; color: #F2F2F2;"><i class="bi bi-pencil"></i></a>
                          <form action="<?=APP_URL;?>/app/controllers/preguntas/delete_pregunta.php" onclick="preguntar<?=$codigo_pre;?>(event)" method="post" id="miformulario<?=$codigo_pre;?>">
                            <input type="text" value="<?=$codigo_encu;?>" hidden name="codigo_encu">
                            <input type="text" value="<?=$codigo_pre;?>" hidden name="codigo_eliminar">
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" style="background-color: #D92B3A; border-color: #D92B3A; border-radius: 10px 5px 5px 0px; color: #F2F2F2;"><i class="bi bi-trash3"></i></button>
                          </form>  
                          <script>
                              function preguntar<?=$codigo_pre;?>(event){
                                event.preventDefault();
                                Swal.fire({
                                  title: 'Eliminar Universidad',
                                  text: '¿Desea eliminar la Universidad seleccionada?',
                                  icon: 'question',
                                  showDenyButton: true,
                                  confirmButtonText: 'Eliminar',
                                  confirmButtonColor: '#D6B357',
                                  denyButtonText: 'Cancelar',
                                  denyButtonColor: '#D92B3A',
                                }).then((result) => {
                                  if(result.isConfirmed){
                                    var form = $('#miformulario<?=$codigo_pre;?>')
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
              <hr>
              <div class="row justify-content-center">
                <a href="show_cuestionarios.php" class="btn btn-danger" style="background-color:#D6B357; color: #F2F2F2;">Volver</a>
              </div>
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
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Preguntas",
        "infoEmpty": "Mostrando 0 a 0 de 0 Preguntas",
        "infoFiltered": "(Filtrado de _MAX_ total Preguntas",
        "infoPostEix": "",
        "thousands": ",",
        "LengthMenu": "Mostrar _MENU_ Preguntas",
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
      "buttons": [{text:'Copiar',extend:'copy',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'}},
                  {text:'Excel',extend:'excel',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Preguntas',filename: 'Reporte de Preguntas'}, 
                  {text:'PDF',extend:'pdf',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Preguntas',filename: 'Reporte de Preguntas'}, 
                  {text:'Imprimir',extend:'print',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Preguntas'},
                  {text:'Vista de Columnas',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},extend:'colvis'}           
                ]
                
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