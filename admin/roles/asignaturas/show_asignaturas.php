<?php 
include('../../../app/config.php');
include('../../../admin/layout/parte1_admin.php');

include('../../../app/controllers/rol_asignaturas/show_asignatura.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>LISTA DE ASIGNATURAS</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-12">
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Asignaturas Registradas</h3>

                <div class="card-tools">
                  <a href="create_asignatura.php" class="btn btn-outline-danger">Crear Asignatura <i class="bi bi-journal-plus"></i></a>
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
                    <th>Programa</th>
                    <th>Universidad</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $contador_asignatura = 0;
                  foreach($asignaturas as $asignatura){
                   $codigo = $asignatura ['idasignaturas']; 
                   $contador_asignatura = $contador_asignatura + 1;?>
                    
                    <tr>
                      <td style="text-align: center;"><?=$contador_asignatura;?></td>
                      <td style="text-align: center;"><?=$asignatura['idasignaturas'];?></td>
                      <td><?=$asignatura['nombre'];?></td>
                      <td style="text-align: center;">
                        <?php
                            $uni = $asignatura['programa_idPrograma'];
                            $sql_programas = "SELECT * FROM programa WHERE idPrograma = '$uni'";
                            $query_programas = $pdo->prepare($sql_programas);
                            $query_programas->execute();
                            $datos_programas = $query_programas->fetchAll(PDO::FETCH_ASSOC);

                            foreach($datos_programas as $datos_programa){
                              $nom_pro = $datos_programa['nombre'];
                              echo $nom_pro;
                            }
                        ?>
                      </td>
                      <td style="text-align: center;">
                        <?php
                            $uni = $asignatura['programa_Universidad_idUniversidad'];
                            $sql_universidades = "SELECT * FROM universidad WHERE idUniversidad = '$uni'";
                            $query_universidades = $pdo->prepare($sql_universidades);
                            $query_universidades->execute();
                            $datos_universidades = $query_universidades->fetchAll(PDO::FETCH_ASSOC);

                            foreach($datos_universidades as $datos_universidad){
                              $nom_uni = $datos_universidad['nombre'];
                              echo $nom_uni;
                            }
                          ?>
                      </td>
                      <td style="text-align: center; ">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                          <a href="edit_asignatura.php?id=<?=$codigo;?>" type="button" class="btn btn-primary" title="Editar" style="background-color: #D6B357; border-radius: 10px 6px 6px 0px; border-color: #D6B357; color: #F2F2F2;"><i class="bi bi-pencil"></i></a>
                          <form action="<?=APP_URL;?>/app/controllers/rol_asignaturas/delete_asignatura.php" onclick="preguntar<?=$codigo;?>(event)" method="post" id="miformulario<?=$codigo;?>">
                            <input type="text" value="<?=$codigo;?>" hidden name="codigo_eliminar">
                            <button type="submit" class="btn btn-danger btn-sm" title="Borrar" style="background-color: #D92B3A; border-color: #D92B3A; border-radius: 10px 5px 5px 0px; color: #F2F2F2;"><i class="bi bi-trash3"></i></button>
                          </form>  
                          <script>
                              function preguntar<?=$codigo;?>(event){
                                event.preventDefault();
                                Swal.fire({
                                  title: 'Eliminar Asignatura',
                                  text: '¿Desea eliminar la asignatura seleccionado?',
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
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Asignaturas",
        "infoEmpty": "Mostrando 0 a 0 de 0 Asignaturas",
        "infoFiltered": "(Filtrado de _MAX_ total Asignaturas",
        "infoPostEix": "",
        "thousands": ",",
        "LengthMenu": "Mostrar _MENU_ Asignaturas",
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
                  {text:'Excel',extend:'excel',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Asignaturas',filename: 'Reporte de Asignaturas'}, 
                  {text:'PDF',extend:'pdf',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Asignaturas',filename: 'Reporte de Asignaturas'}, 
                  {text:'Imprimir',extend:'print',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Asignaturas'},
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