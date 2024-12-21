<?php 
include('../../app/config.php');
include('../../admin/layout/parte1_admin.php');

$codigo_encu = $_GET['id'];

include('../../app/controllers/cuestionarios/datos_cuestionario.php');
include('../../app/controllers/rol_grupos/show_grupo.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>ASIGNAR CUESTIONARIO A GRUPO DE ESTUDIANTE</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-10" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Seleccione el grupo para el cuestionario</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/cuestionarios/asign_cuestionario.php" method="post">
                  <div class="form-row">
                    <div class="col-md-3">
                      <input type="text" name="txt_codigo_cuestionario" class="form-control" readonly value="<?=$codigo_cuestionario;?>" placeholder="Codigo">
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="txt_nombre" class="form-control" readonly value="<?=$nombre_cuestionario;?>" placeholder="Nombre Cuestionario" required>
                    </div>                                          
                  </div>
                  <hr>
                  <div class="form-row">
                    <div class="col-md-5">
                      <select name="txt_codigo_grupo" class="form-control">
                        <option value="" disabled selected>Seleccione el Grupo...</option>
                        <?php
                          foreach($grupos as $grupo){
                              $codigo_grupo = $grupo['idgrupos'];
                              $nombre_grupo = $grupo['nombregrupo'];
                              echo "<option value='" . $codigo_grupo . "'>" .$codigo_grupo." - ".$nombre_grupo . "</option>";
                          }
                          ?>
                      </select>
                    </div>
                  </div>
                  <hr>
                  <div class="form-row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Actualizar</button>
                        <a href="show_cuestionarios.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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