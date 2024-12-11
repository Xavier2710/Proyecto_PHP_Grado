<?php 

$codigo = $_GET['id'];


include('../../../app/config.php');
include('../../../admin/layout/parte1_admin.php');
include('../../../app/controllers/universidades/datos_universidad.php');
include('../../../app/controllers/universidades/show_universidad.php');
include('../../../app/controllers/rol_programas/datos_programa.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>ACTUALIZAR PROGRAMA</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-10" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Información Registrada</h3>
              </div>
              <div class="card-body">
                              
                <form action="<?=APP_URL;?>/app/controllers/rol_programas/update_programa.php" method="post">
                  <div class="form-row">
                      <div class="col-md-3">
                        <input type="text" name="txt_codigo" readonly value="<?=$codigo;?>" class="form-control" placeholder="Codigo">
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txt_nombre" value="<?=$nombre_programa;?>" class="form-control" placeholder="Nombre Programa">
                      </div> 
                      <div class="col-md-4">
                        <select name="txt_universidad" class="form-control">
                        <option title="Seleccione Universidad..." value="<?=$universidad_programa;?>" selected><?=$universidad_programa;?></option>
                          <?php
                            foreach($universidades as $datos_universidad){
                                $codigo_universidad = $datos_universidad['idUniversidad'];
                                $nombre_universidad = $datos_universidad['nombre'];
                                echo "<option value='" . $codigo_universidad . "'>" .$codigo_universidad." - ".$nombre_universidad . "</option>";
                            }
                            ?>
                        </select>
                      </div>                                         
                    </div>  
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Actualizar</button>
                            <a href="show_programas.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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
  include('../../../admin/layout/parte2_admin.php');
  include('../../../layout/mensajes.php');
  ?>