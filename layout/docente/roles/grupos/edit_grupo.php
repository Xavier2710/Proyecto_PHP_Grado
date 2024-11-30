<?php 

$codigo = $_GET['id'];


include('../../../../app/config.php');
include('../../../docente/layout/parte1_admin.php');
include('../../../../app/controllers/rol_grupos/datos_grupo.php');
include('../../../../app/controllers/rol_asignaturas/show_asignatura.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>ACTUALIZAR GRUPO</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-10" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Información Registrada</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/rol_grupos/update_grupo.php" method="post">
                  <div class="form-row">
                      <div class="col-md-2">
                        <input type="text" readonly name="txt_codigo" class="form-control" value="<?=$codigo_grupo;?>" placeholder="Codigo">
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="txt_nombre" class="form-control" value="<?=$nombre_grupo;?>" placeholder="Nombre Grupo">
                      </div> 
                      <div class="col-md-2">
                        <input type="number" name="txt_año" min="1900" max="2100" class="form-control" value="<?=$año_grupo;?>" placeholder="Año(YYYY)">
                      </div>                                          
                    </div>
                    <hr>
                    <div class="form-row">                    
                      <div class="col-md-4">
                        <select name="txt_periodo" class="form-control">
                          <option value="<?=$periodo_grupo;?>" disabled selected>Periodo <?=$periodo_grupo;?></option>
                          <option value="1">Periodo 1</option>
                          <option value="2">Periodo 2</option>
                        </select>
                      </div>
                      <div class="col-md-8">
                        <select name="txt_asignatura" class="form-control">
                          <option value="<?=$asignatura_grupo;?>" disabled selected><?=$asignatura_grupo;?></option>
                            <?php
                            foreach($asignaturas as $datos_asignatura){
                                $codigo_asignatura = $datos_asignatura['idasignaturas'];
                                $nombre_asignatura = $datos_asignatura['nombre'];
                                echo "<option value='" . $codigo_asignatura . "'>" .$codigo_asignatura." - ".$nombre_asignatura . "</option>";
                            }
                            ?>
                        </select>
                      </div>                                         
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Registrar</button>
                          <a href="show_grupos.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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
  include('../../../docente/layout/parte2_admin.php');
  include('../../../mensajes.php');
  ?>