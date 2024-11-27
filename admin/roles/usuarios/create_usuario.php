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
            <h3>Creación nuevo usuario</h3>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-10" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Diligencie los datos del usuario</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/rol_usuarios/create_usuario.php" method="post">
                    <div class="form-row">
                        <div class="col-md-3">
                        <input type="text" name="txt_codigo" class="form-control" placeholder="Codigo">
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="txt_nombre" class="form-control" placeholder="Nombre Completo">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">                        
                        <div class="col">
                        <input type="email" name="txt_correo" class="form-control" placeholder="Correo">
                        </div>
                        <div class="col">
                        <input type="password" name="txt_clave" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">                        
                        <div class="col-md-9">
                            <select class="custom-select" name="txt_rol">
                                <option value="" disabled selected>Seleccione rol de usuario...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Docente">Docente</option>
                                <option value="Estudiante">Estudiante</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Registrar</button>
                            <a href="show_usuarios.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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