<?php 
include('../../app/config.php');
include('../../admin/layout/parte1_admin.php');

include('../../app/controllers/rol_usuarios/show_usuario.php');
include('../../app/controllers/rol_asignaturas/show_asignatura.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>NUEVA CREACIÓN LITERARIA</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-11" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Diligencie los datos de la creación literaria</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/creaciones_literarias/create_literaria.php" method="post" enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="col">
                      <input type="text" name="txt_codigo" class="form-control" placeholder="Codigo">
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="txt_nombre" class="form-control" placeholder="Nombre Creación Literaria">
                    </div>                                          
                  </div>
                  <hr>
                  <div class="form-row">
                    <div class="col-md-7">
                      <input type="file" id="file" accept=".pdf,.doc,.docx,.txt" name="txt_archivo" class="form-control" placeholder="Seleccione el archivo...">                  
                    </div>
                    <div class="col-md-4">
                      <output id="list">
                        <img id="preview" style="max-width: 100%; height: auto; border-radius: 15px; display: none;" alt="Vista previa">
                      </output>                    
                    </div>                    
                  </div>
                  <hr>
                  <div class="form-row">
                    <div class="col-md-7">
                      <select class="custom-select" name="txt_autor">
                        <option value="" disabled selected>Seleccione el Autor...</option>
                        <?php
                        foreach($usuarios as $usuario) {?>
                          <option value="<?=$usuario['idusuario'];?>"><?=$usuario['nombreCompleto'];?></option>
                        <?php 
                         }                        
                        ?>                        
                      </select>
                    </div>
                  </div>
                  <hr>
                  <div class="form-row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Registrar</button>
                        <a href="show_literarias.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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