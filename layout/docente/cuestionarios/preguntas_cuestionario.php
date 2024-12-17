<?php 
include('../../../app/config.php');
include('../layout/parte1_admin.php');

$codigo_encu = $_GET['id'];
include('../../../app/controllers/cuestionarios/datos_cuestionario.php');
include('../../../app/controllers/rol_dimensiones/show_dimension.php');


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>AGREGAR PREGUNTAS AL CUESTIONARIO</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-4" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Datos del Cuestionario</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  &nbsp;&nbsp;&nbsp;<label for=""><h>Código Cuestionario: </h6></label>     
                  &nbsp;&nbsp;<?=$codigo_cuestionario;?>           
                </div>
                <div class="row">
                  &nbsp;&nbsp;&nbsp;<label for=""><h>Nombre Cuestionario: </h6></label>     
                  &nbsp;&nbsp;<?=$nombre_cuestionario;?>           
                </div>
                <hr>
                <div class="row">
                  &nbsp;&nbsp;&nbsp;<label for=""><h>Fecha de Inicio:</h6></label>
                  &nbsp;&nbsp;<?=$fechainicio_cuestionario;?>                
                </div>
                <hr>
                <div class="row">
                  &nbsp;&nbsp;&nbsp;<label for=""><h>Fecha Fin:</h6></label> 
                  &nbsp;&nbsp;<?=$fechafin_cuestionario;?>               
                </div>      
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div> 
          
          <div class="col-md-8">
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Agregar preguntas al cuestionario</h3>
              </div>
              <div class="card-body">
                <form action="<?=APP_URL;?>/app/controllers/preguntas/create_pregunta_docente.php" method="POST">
                  <div id="preguntas-container">                    
                      <div class="pregunta-card">
                          <label for="pregunta1">Pregunta 1:</label>
                          <input type="text" name="codigo" value="<?=$codigo_encu;?>" hidden>
                          <input type="text" class="form-control" name="preguntas[]" placeholder="Escribe la pregunta" required>
                          <label>Seleccionar Dimensión:</label>
                          <select name="dimensiones[]" class="form-control">
                              <option value="" disabled selected>-- Seleccionar Dimensión --</option>
                              <?php
                                  foreach ($dimensiones as $dimension) {
                                      echo "<option value='{$dimension['iddimensiones']}'>{$dimension['iddimensiones']} - {$dimension['nombre']}</option>";
                                  }
                              ?>
                          </select>
                      </div>
                  </div>
                  
                  <div class="row">
                    &nbsp;&nbsp;&nbsp;<button type="button" id="btnAgregarPregunta" class="btn btn-primary btn-sm" style="border-color: #D92B3A; background-color:#D6B357;">Agregar Pregunta</button> 
                  </div>                  
                  <br>
                  <hr>
                  <button type="submit" class="btn btn-primary" style="border-color: #D6B357; background-color:#D6B357;">Guardar Preguntas</button>
                    <a href="show_cuestionarios.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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
  include('../../mensajes.php');
  ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnAgregarPregunta = document.getElementById('btnAgregarPregunta');
        const preguntasContainer = document.getElementById('preguntas-container');
        let preguntaCount = preguntasContainer.querySelectorAll('.pregunta-card').length + 1; // Empieza en 2

        // Función para actualizar la numeración
        function actualizarNumeracion() {
            const etiquetas = preguntasContainer.querySelectorAll('.etiqueta-pregunta');
            etiquetas.forEach((etiqueta, index) => {
                etiqueta.textContent = `Pregunta ${index + 2}:`; 
            });
            preguntaCount = etiquetas.length + 2;
        }

        // Crear las opciones de dimensiones usando datos de PHP
        const opcionesDimensiones = `<?php
            foreach ($dimensiones as $dimension) {
                echo "<option value='{$dimension['iddimensiones']}'>{$dimension['iddimensiones']} - {$dimension['nombre']}</option>";
            }
        ?>`;

        // Evento para agregar una pregunta
        btnAgregarPregunta.addEventListener('click', function () {
            const nuevaPregunta = document.createElement('div');
            nuevaPregunta.classList.add('pregunta-card');
            nuevaPregunta.innerHTML = `
                <label class="etiqueta-pregunta">Pregunta ${preguntaCount}:</label>
                <input type="text" class="form-control" name="preguntas[]" placeholder="Escribe la pregunta" required>
                <label>Seleccionar Dimensión:</label>
                <select name="dimensiones[]" class="form-control">
                    <option value="" disabled selected>-- Seleccionar Dimensión --</option>
                    ${opcionesDimensiones} <!-- Opciones desde PHP -->
                </select>
                <button type="button" class="btn btn-danger btn-sm btnEliminar">Eliminar</button>
            `;
            preguntasContainer.appendChild(nuevaPregunta);
            preguntaCount++;

            // Añadir evento al botón eliminar
            nuevaPregunta.querySelector('.btnEliminar').addEventListener('click', function () {
                nuevaPregunta.remove();
                actualizarNumeracion();
            });
        });
    });
</script>
