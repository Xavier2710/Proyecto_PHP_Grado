<?php 
include('../../../../app/config.php');
include('../../../docente/layout/parte1_admin.php');

include('../../../../app/controllers/rol_dimensiones/show_dimension.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>LISTA DE DIMENSIONES</strong></h>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-12">
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Dimensiones Registradas</h3>

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