<?php 
include('../../../../app/config.php');
include('../../../docente/layout/parte1_admin.php');

include('../../../../app/controllers/rol_grupos/show_grupo.php');
include('../../../../app/controllers/rol_usuarios/show_usuario_asignatura.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>LISTA DE GRUPOS</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-12">
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Grupos Registradas</h3>

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
                    <th>Periodo</th>
                    <th>Año</th>
                    <th>Asignatura</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $contador_grupo = 0;
                  foreach($usuarios_asignatura as $grupo){
                   $codigo = $grupo ['idgrupos']; 
                   $contador_grupo = $contador_grupo + 1;?>
                    
                    <tr>
                      <td style="text-align: center;"><?=$contador_grupo;?></td>
                      <td style="text-align: center;"><?=$grupo['idgrupos'];?></td>
                      <td><?=$grupo['nombregrupo'];?></td>
                      <td style="text-align: center;"><?=$grupo['periodo'];?></td>
                      <td style="text-align: center;"><?=$grupo['año'];?></td>
                      <td style="text-align: center;"><?=$grupo['nombre_asignatura'];?></td>
                      
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
  include('../../../docente/layout/parte2_admin.php');
  include('../../../mensajes.php');
  ?>

<script>
  $(function () {
    $("#example1").DataTable({
      "pageLength":4,
      "language":{
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Grupos",
        "infoEmpty": "Mostrando 0 a 0 de 0 Grupos",
        "infoFiltered": "(Filtrado de _MAX_ total Grupos",
        "infoPostEix": "",
        "thousands": ",",
        "LengthMenu": "Mostrar _MENU_ Grupos",
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
                  {text:'Excel',extend:'excel',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Grupos',filename: 'Reporte de Grupos'}, 
                  {text:'PDF',extend:'pdf',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Grupos',filename: 'Reporte de Grupos'}, 
                  {text:'Imprimir',extend:'print',className: 'btn', attr:{style: 'background-color: #D92B3A;border-color:#F2F2F2;'},title: 'Reporte de Grupos'},
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