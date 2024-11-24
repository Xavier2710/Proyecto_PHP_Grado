<?php 

$codigo = $_GET['id'];


include('../../../app/config.php');
include('../../../admin/layout/parte1_admin.php');
include('../../../app/controllers/rol_asignaturas/datos_asignatura.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h3>Actualizar Asignatura</h3>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-10" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Información Registrada</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/rol_asignaturas/update_asignatura.php" method="post">
                    <div class="form-row">
                        <div class="col">
                        <input type="text" readonly name="txt_codigo" class="form-control" value="<?=$codigo;?>" placeholder="Codigo">
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="txt_nombre" class="form-control" value="<?=$nombre_asignatura;?>" placeholder="Nombre Completo">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Actualizar</button>
                            <a href="show_asignaturas.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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