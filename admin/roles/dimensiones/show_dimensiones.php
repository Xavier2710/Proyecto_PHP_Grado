<?php 
include('../../../app/config.php');
include('../../../admin/layout/parte1_admin.php');

include('../../../app/controllers/rol_dimensiones/show_dimension.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>LISTA DE DIMENSIONES</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-12">
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Dimensiones Registradas</h3>

                <div class="card-tools">
                  <a href="create_dimension.php" class="btn btn-outline-danger">Crear Dimension <i class="bi bi-bounding-box"></i></a>
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
                    <th>Descripcion</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $contador_dimension = 0;
                  foreach($dimensiones as $dimension){
                   $codigo = $dimension ['iddimensiones']; 
                   $contador_dimension = $contador_dimension + 1;?>
                    
                    <tr>
                      <td  style="text-align: center;"><?=$contador_dimension;?></td>
                      <td style="text-align: center;"><?=$dimension['iddimensiones'];?></td>
                      <td style="text-align: center;"><?=$dimension['nombre'];?></td>
                      <td><?=$dimension['descripcion'];?></td>
                      <td style="text-align: center; ">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                          <a href="edit_dimension.php?id=<?=$codigo;?>" type="button" class="btn btn-primary" title="Editar" style="background-color: #D6B357; border-radius: 10px 6px 6px 0px; border-color: #D6B357; color: #F2F2F2;"><i class="bi bi-pencil"></i></a>
                          <form action="<?=APP_URL;?>/app/controllers/rol_dimensiones/delete_dimension.php" onclick="preguntar<?=$codigo;?>(event)" method="post" id="miformulario<?=$codigo;?>">
                            <input type="text" value="<?=$codigo;?>" hidden name="codigo_eliminar">
                            <button type="submit" class="btn btn-danger btn-sm" title="Borrar" style="background-color: #D92B3A; border-color: #D92B3A; border-radius: 10px 5px 5px 0px; color: #F2F2F2;"><i class="bi bi-trash3"></i></button>
                          </form>  
                          <script>
                              function preguntar<?=$codigo;?>(event){
                                event.preventDefault();
                                Swal.fire({
                                  title: 'Eliminar Dimension',
                                  text: '¿Desea eliminar la dimension seleccionado?',
                                  icon: 'question',
                                  showDenyButton: true,
                                  confirmButtonText: 'Eliminar',
                                  confirmButtonColor: '#D6B357',
                                  denyButtonText: 'Cancelar',
                                  denyButtonColor: '#D92B3A',
                                }).then((result) => {
                                  if(result.isConfirmed){
                                    var form = $('#miformulario<?=$codigo;?>')
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
  include('../../../admin/layout/parte2_admin.php');
  include('../../../layout/mensajes.php');
  ?>

<script>
  $(function () {
    $("#example1").DataTable({
      "pageLength":4,
      "language":{
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Dimensiones",
        "infoEmpty": "Mostrando 0 a 0 de 0 Dimensiones",
        "infoFiltered": "(Filtrado de _MAX_ total Dimensiones",
        "infoPostEix": "",
        "thousands": ",",
        "LengthMenu": "Mostrar _MENU_ Dimensiones",
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
                  {text:'Excel',extend:'excel',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Dimensiones',filename: 'Reporte de Dimensiones'}, 
                  {text:'PDF',extend:'pdf',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Dimensiones',filename: 'Reporte de Dimensiones'}, 
                  {text:'Imprimir',extend:'print',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Dimensiones'},
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