<?php 
include('../../../app/config.php');
include('../layout/parte1_admin.php');

$codigo = $codigo_sesion;
$codigo_encu = $_GET['id'];

include('../../../app/controllers/creaciones_literarias/show_literaria.php');
include('../../../app/controllers/rol_usuarios/datos_usuario_estudiante_grupo.php');
include('../../../app/controllers/cuestionarios/datos_cuestionario.php');
include('../../../app/controllers/preguntas/show_pregunta_estudiante.php');

$codigo_grupo = $grupo_estudiante;
include('../../../app/controllers/cuestionarios/show_cuestionario_estudiante.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>CUESTIONARIO: </strong><?=$nombre_cuestionario;?></h4>            
        </div> 
        <br>   
        <div class="row">
              <div class="col-md-4">
                <div class="card card-outline card-danger" style="border-color: #D92B3A;">
                  <div class="card-header">
                    <h3 class="card-title">Datos del Cuestionario</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <label><strong>Código Cuestionario:</strong></label>     
                      &nbsp;<?=$codigo_cuestionario;?>           
                    </div>
                    <div class="row">
                      <label><strong>Fecha de Inicio:</strong></label>
                      &nbsp;<?=$fechainicio_cuestionario;?>                
                    </div>
                    <div class="row">
                      <label><strong>Fecha Fin:</strong></label> 
                      &nbsp;<?=$fechafin_cuestionario;?>               
                    </div>
                  </div>
                </div>
              </div>
              <!-- evaluacion -->
              <div class="col-md-8">
                <div class="card card-outline card-danger" style="border-color: #D92B3A;">
                  <div class="card-header" style="justify-content: center; text-align: center;">
                    <h5><strong>EVALUACIÓN</strong></h5>
                  </div>


                  <div class="card-body">
    <form id="form-cuestionario">
        <div id="pregunta-contenedor">
            <?php $contador = 1; ?>
            <?php foreach ($preguntas as $pregunta): ?>
                <!-- Contenedor de cada pregunta -->
                <div class="pregunta-item" id="pregunta-<?= $contador ?>">
                    <div class="row">
                        <label><strong><?= $contador ?>) <?= htmlspecialchars($pregunta['pregunta']); ?></strong></label>
                    </div>
                    <div class="row">
                      <div class="row">
                          <?php foreach ($opciones as $indice => $opcion): ?>
                              <div class="col-12" style="margin-bottom: 10px;">
                                  <div class="form-check">
                                  <input class="form-check-input" 
                                      type="radio" 
                                      name="pregunta_<?= $pregunta['idPreguntas']; ?>" 
                                      value="<?= $opcion ?>" 
                                      id="opcion_<?= $pregunta['idPreguntas'] ?>_<?= $indice ?>"
                                      data-pregunta-id="<?= $pregunta['idPreguntas'] ?>" />
                                      <label class="form-check-label" for="opcion_<?= $pregunta['idPreguntas'] ?>_<?= $indice ?>">
                                          <?= $opcion ?>
                                      </label>
                                  </div>
                              </div>
                          <?php endforeach; ?>
                      </div>
                  </div>
                </div>
                <?php $contador++; ?>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color:#D92B3A; color:#F2F2F2;">Enviar Respuestas</button>
            </div>
        </div>
    </form>
</div>
                </div>
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

<script>
// Mantener la selección de las preguntas, incluso al cambiar de pregunta
// Guardar respuestas al seleccionar un radio
document.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', function() {
        const preguntaId = this.getAttribute('data-pregunta-id');
        const respuesta = this.value;
        localStorage.setItem(`respuesta_${preguntaId}`, respuesta);
    });
});

$(document).ready(function() {
  // Evitar que se recargue el formulario al hacer clic
  $('#form-cuestionario').on('submit', function(e) {
    e.preventDefault();
    // Aquí puedes agregar la lógica para enviar los datos sin recargar la página
  });
});

$(document).ready(function() {
  // Guardar las respuestas seleccionadas en localStorage
  $('input[type="radio"]').on('change', function() {
    const preguntaId = $(this).data('pregunta-id');
    const respuesta = $(this).val();
    localStorage.setItem('respuesta_' + preguntaId, respuesta);
  });

  // Restaurar las respuestas cuando se recarga la página
  $('input[type="radio"]').each(function() {
    const preguntaId = $(this).data('pregunta-id');
    const respuestaGuardada = localStorage.getItem('respuesta_' + preguntaId);
    if (respuestaGuardada && respuestaGuardada === $(this).val()) {
      $(this).prop('checked', true);
    }
  });
});
</script>