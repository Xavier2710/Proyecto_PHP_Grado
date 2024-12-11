<?php 
include('../../app/config.php');
include('../../admin/layout/parte1_admin.php');

include('../../app/controllers/rol_usuarios/show_usuario_estudiante.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>INFORMACIÓN COMPLETA ESTUDIANTES</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-12">
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Registro Estudiantes</h3>
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
                    <th>Correo</th>
                    <th>Fecha Nacimiento</th>
                    <th>Procedencia Escolar</th>
                    <th>Genero</th> 
                    <th>Promedio Ponderado</th>                   
                    <!-- <th>Asignaturas Validadas</th> -->
                    <th>Grupo</th>
                    <th>Cambiar Grupo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $contador_usuarios_estudiante = 0;               

                  
                  foreach($usuarios_estudiante as $usuario_estudiante){
                   $codigo = $usuario_estudiante ['idusuario']; 
                   $contador_usuarios_estudiante = $contador_usuarios_estudiante + 1;
                   include('../../app/controllers/rol_usuarios/show_usuario_grupo.php');
                   ?>
                  
                    <tr>
                      <td style="text-align: center;"><?=$contador_usuarios_estudiante;?></td>
                      <td style="text-align: center;"><?=$usuario_estudiante['idusuario'];?></td>
                      <td style="text-align: center;"><?=$usuario_estudiante['nombreCompleto'];?></td>
                      <td style="text-align: center;"><?=$usuario_estudiante['correo'];?></td>        
                      <td style="text-align: center;"><?=$usuario_estudiante['fechaN'];?></td> 
                      <td style="text-align: center;"><?=$usuario_estudiante['procedenciaEscolar'];?></td>              
                      <td style="text-align: center;"><?=$usuario_estudiante['genero'];?></td>              
                      <td style="text-align: center;"><?=$usuario_estudiante['promedioPonderado'];?></td>              
                      <!-- <td style="text-align: center;"><?=$usuario_estudiante['repeticionAsignatura'];?></td> -->
                      <td style="text-align: center;"><?=$nom_grupo;?></td>
                      <td style="text-align: center; ">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                          <a href="edit_grupo_estudiante.php?id=<?=$codigo;?>" type="button" class="btn btn-primary" title="Editar" style="background-color: #D6B357; border-radius: 10px 6px 6px 0px; border-color: #D6B357; color: #F2F2F2;"><i class="bi bi-pencil"></i></a>                          
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
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
        "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
        "infoFiltered": "(Filtrado de _MAX_ total Usuarios",
        "infoPostEix": "",
        "thousands": ",",
        "LengthMenu": "Mostrar _MENU_ Usuarios",
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
      "buttons": [{text:'Copiar',extend:'copy',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'}},
                  {text:'Excel',extend:'excel',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Usuarios',filename: 'Reporte de Usuarios'}, 
                  {text:'PDF',extend:'pdf',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Usuarios',filename: 'Reporte de Usuarios'}, 
                  {text:'Imprimir',extend:'print',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Usuarios'},
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