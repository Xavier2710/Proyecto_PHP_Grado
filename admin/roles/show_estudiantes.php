<?php 
include('../../app/config.php');
include('../../admin/layout/parte1_admin.php');

include('../../app/controllers/rol_estudiantes/show_estudiante.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h3>Lista de estudiantes</h3>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-12">
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Estudiantes Registrados</h3>

                <div class="card-tools">
                  <a href="create_estudiante.php" class="btn btn-outline-danger">Crear Estudiante <i class="bi bi-person-add"></i></a>
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
                    <th>Nombre Completo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Correo</th>
                    <th>Programa</th>
                    <th>Procedencia Escolar</th>
                    <th>Genero</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $contador_estudiante = 0;
                  foreach($estudiantes as $estudiante){
                   //$codigo_estudiante = $estudiantes ['codigo']; 
                   $contador_estudiante = $contador_estudiante + 1;?>
                    
                    <tr>
                      <td  style="text-align: center;"><?=$contador_estudiante;?></td>
                      <td style="text-align: center;"><?=$estudiante['codigo'];?></td>
                      <td><?=$estudiante['nombreCompleto'];?></td>
                      <td style="text-align: center;"><?=$estudiante['fechaN'];?></td>
                      <td><?=$estudiante['correo'];?></td>
                      <td style="text-align: center;"><?=$estudiante['Programa_idPrograma'];?></td>
                      <td><?=$estudiante['procedenciaEscolar'];?></td>
                      <td style="text-align: center;"><?=$estudiante['genero'];?></td>
                      <td style="text-align: center; ">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-primary" title="Editar" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;"><i class="bi bi-pencil"></i></button>
                          <button type="button" class="btn btn-danger" title="Borrar" style="background-color: #D92B3A; border-color: #D6B357; color: #F2F2F2;"><i class="bi bi-trash3"></i></button>
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
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
        "infoEmpty": "Mostrando 0 a 0 de 0 Estudiantes",
        "infoFiltered": "(Filtrado de _MAX_ total Estudiantes",
        "infoPostEix": "",
        "thousands": ",",
        "LengthMenu": "Mostrar _MENU_ Estudiantes",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscador:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",    
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }   

      },
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [{text:'Copiar',extend:'copy'},
                  {text:'Excel',extend:'excel',title: 'Reporte de Estudiantes',filename: 'Reporte de Estudiantes'}, 
                  {text:'PDF',extend:'pdf',title: 'Reporte de Estudiantes',filename: 'Reporte de Estudiantes'}, 
                  {text:'Imprimir',extend:'print',title: 'Reporte de Estudiantes'},
                  {text:'Vista de Columnas',extend:'colvis'}           
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