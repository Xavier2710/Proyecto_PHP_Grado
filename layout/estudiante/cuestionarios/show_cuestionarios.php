<?php 
include('../../../app/config.php');
include('../layout/parte1_admin.php');

$codigo = $codigo_sesion;

include('../../../app/controllers/creaciones_literarias/show_literaria.php');
include('../../../app/controllers/rol_usuarios/datos_usuario_estudiante_grupo.php');

$codigo_grupo = $grupo_estudiante;
include('../../../app/controllers/cuestionarios/show_cuestionario_estudiante.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>LISTA DE CUESTIONARIOS</strong></h4>            
        </div>    
        <div class="row">
          <?php if (!empty($cuestionarios)): ?>
            <?php foreach ($cuestionarios as $cuestionario): ?>
              <?php
              $codigo_encu = $cuestionario['idCuestionario'];
              include('../../../app/controllers/preguntas/show_pregunta_cantidad.php');
              ?>
              <div class="col-md-4">
                <div class="card card-outline card-danger" style="border-color: #D92B3A;">
                  <div class="card-header">
                    <h3 class="card-title">Datos del Cuestionario</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <label><strong>Código Cuestionario:</strong></label>     
                      &nbsp;<?= $cuestionario['idCuestionario']; ?>           
                    </div>
                    <div class="row">
                      <label><strong>Nombre Cuestionario:</strong></label>     
                      &nbsp;<?= $cuestionario['nombre']; ?>           
                    </div>
                    <br>
                    <div class="row">
                      <label><strong>Preguntas:</strong></label>     
                      &nbsp;<?=$cantidad_preguntas;?>           
                    </div>
                    <hr>
                    <div class="row">
                      <label><strong>Fecha de Inicio:</strong></label>
                      &nbsp;<?= $cuestionario['fechaInicio']; ?>                
                    </div>
                    <hr>
                    <div class="row">
                      <label><strong>Fecha Fin:</strong></label> 
                      &nbsp;<?= $cuestionario['fechaFin']; ?>               
                    </div>      
                    <hr>
                    <?php                    
                        $fechaHora;
                        $fechaInicio = $cuestionario['fechaInicio'];
                        $fechaFin = $cuestionario['fechaFin'];
                        
                        $isInRange = ($fechaHora >= $fechaInicio && $fechaHora <= $fechaFin);
                    ?>
                    <div class="row">
                      <button class="btn btn-primary btn-sm" style="border-color: #D6B357; background-color: #D6B357;" 
                        <?php echo ($isInRange) ? '' : 'disabled'; ?> onclick="window.location.href='respond_cuestionario.php?id=<?=$cuestionario['idCuestionario'];?>';">
                        Resolver Cuestionario
                      </button>
                    </div>  
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="col-md-5">
              <div class="card card-outline card-danger" style="border-color: #D92B3A;">
                <div class="card-header">
                  <h3 class="card-title">Sin Cuestionarios</h3>
                </div>
                <div class="card-body">
                  <p>No tienes cuestionarios asignados en este momento.</p>
                </div>
              </div>
            </div>
          <?php endif; ?>
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