<?php 
include('../../app/config.php');
include('../../admin/layout/parte1_admin.php');

$codigo_pregunta = $_GET['id'];

include('../../app/controllers/preguntas/datos_pregunta.php');
include('../../app/controllers/rol_dimensiones/show_dimension.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>ACTUALIZAR PREGUNTA</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-10" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Actualice los datos de la pregunta</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/preguntas/update_pregunta.php" method="post">
                  <div class="form-row">
                    <div class="col-md-7">
                      <label>Pregunta: </label>
                      <input type="text" name="txt_nombre" class="form-control" value="<?=$nombre_pregunta;?>" placeholder="Nombre de la Pregunta">
                      <input type="text" name="txt_codigo" class="form-control" value="<?=$codigo_pregunta;?>" hidden>
                    </div>
                    <div class="col-md-5">
                    <label>Seleccionar Dimensión:</label>
                      <select name="txt_dimension" class="form-control">
                        <option value="<?=$dimension_pregunta;?>" selected><?=$dimension_pregunta;?></option>
                          <?php
                            foreach ($dimensiones as $dimension) {
                              echo "<option value='{$dimension['iddimensiones']}'>{$dimension['iddimensiones']} - {$dimension['nombre']}</option>";
                            }
                          ?>
                      </select>                     
                    </div>                                          
                  </div>
                  <hr>
                  <div class="form-row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Actualizar</button>
                        <a href="show_preguntas.php?id=<?=$codigo_encu;?>" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
                      </div>
                  </div>                   
                </form>

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
    function archivo(evt){
        var files = evt.target.files;
        for (var i=0, f; f= files[i]; i++){
            if(!f.type.match('image.*')){
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile){
                return function (e){
                    document.getElementById("list").innerHTML = ['<img class="thum thumbnail" src="',e.target.result, '" width="300px" title="',escape(theFile.name), '"/>'].join('');
                };
            }) (f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>