<?php 
include('../../../app/config.php');
include('../../../admin/layout/parte1_admin.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>CREACIÓN NUEVA DIMENSION</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-10" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Diligencie los datos de la dimension</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/rol_dimensiones/create_dimension.php" method="post">
                  <div class="form-row">
                    <div class="col">
                      <input type="text" name="txt_codigo" class="form-control" placeholder="Codigo">
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="txt_nombre" class="form-control" placeholder="Nombre Dimension">
                    </div>                                                            
                  </div>
                  <hr>
                  <div class="col-md-13">
                    <textarea name="txt_descripcion" class="form-control" placeholder="Descripción" rows="3"></textarea>
                  </div> 
                  <hr>
                  <div class="form-row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Registrar</button>
                        <a href="show_dimensiones.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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