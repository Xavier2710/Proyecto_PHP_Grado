<?php 

$codigo = $_GET['id'];

include('../../../app/config.php');
include('../layout/parte1_admin.php');
include('../../../app/controllers/rol_usuarios/datos_usuario_estudiante_grupo.php');
include('../../../app/controllers/rol_usuarios/datos_usuario.php');
include('../../../app/controllers/rol_grupos/show_grupo.php');
?>
  <!-- Content Wrapper. Contains page content -->
   
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>AGREGAR ESTUDIANTE A GRUPO</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-10" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Asignar grupo a este estudiante</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/rol_usuarios/update_usuario_estudiante_grupo_docente.php" method="post">
                    <div class="form-row">
                        <div class="col-md-3">
                        <input type="text"  name="txt_codigo" title="Codigo" readonly value="<?=$codigo_estudiante;?>" class="form-control" placeholder="Codigo">
                        </div>
                        <div class="col-md-4">
                        <input type="text" title="Nombre Completo" readonly value="<?=$nombre_usuario;?>" class="form-control" placeholder="Nombre Completo">
                        </div>
                        <div class="col-md-5">
                        <select class="custom-select" name="txt_grupo">
                        <option value="<?=$grupo_estudiante;?>" selected><?=$grupo_estudiante;?></option>
                                <?php 
                                  foreach($grupos as $datos_grupo){
                                    $codigo_grupo = $datos_grupo['idgrupos'];
                                    $nombre_grupo = $datos_grupo['nombregrupo'];
                                    echo "<option value='" . $codigo_grupo . "'>" .$codigo_grupo." - ".$nombre_grupo . "</option>";
                                  }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Asignar</button>
                            <a href="show_estudiantes.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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
  include('../layout/parte2_admin.php');
  include('../../mensajes.php');
  ?>