<?php 

$codigo = $_GET['id'];


include('../../app/config.php');
include('../../admin/layout/parte1_admin.php');
include('../../app/controllers/rol_estudiantes/datos_estudiantes.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h3>Actualizar datos del estudiante: <?=$nombre_estudiante;?></h3>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-10" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/rol_estudiantes/update_estudiante.php" method="post">
                    <div class="form-row">
                        <div class="col">
                        <input type="text" readonly name="txt_codigo" class="form-control" value="<?=$codigo;?>" placeholder="Codigo">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="txt_nombre" class="form-control" value="<?=$nombre_estudiante;?>" placeholder="Nombre Completo">
                        </div>
                        <div class="col">
                            <input type="date" name="txt_fecha" class="form-control" value="<?=$fecha_estudiante;?>" placeholder="Fecha de Nacimiento" title="Fecha de Nacimiento">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">                        
                        <div class="col">
                        <input type="email" name="txt_correo" class="form-control" value="<?=$correo_estudiante;?>" placeholder="Correo">
                        </div>
                        <div class="col">
                        <input type="text" name="txt_programa" class="form-control" value="<?=$programa_estudiante;?>" placeholder="Programa de formación">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">                        
                        <div class="col-md-9">
                            <select class="custom-select" name="txt_escolar">
                                <option value="1"><?=$escolar_estudiante;?></option>
                                <option value="Pública">Pública</option>
                                <option value="Prívada">Prívada</option>
                            </select>
                        </div>
                        <div class="col">
                        <input type="text" name="txt_genero" class="form-control" value="<?=$genero_estudiante;?>" placeholder="Genero">
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Actualizar</button>
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
  include('../../admin/layout/parte2_admin.php');
  include('../../layout/mensajes.php');
  ?>