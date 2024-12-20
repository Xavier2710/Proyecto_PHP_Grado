<?php 
include('../../app/config.php');
include('layout/parte1_admin.php');
include('../../app/controllers/rol_usuarios/show_usuario.php');
$codigo_au = $codigo_sesion;
include('../../app/controllers/creaciones_literarias/datos_literaria_docente.php');
include('../../app/controllers/cuestionarios/datos_cuestionario_docente.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="container">
        <div class="col-md-13">
          <div class="card card-outline card-danger" style="border-color:#D92B3A;">
            <div class="card-header">
              <h4><strong>DOCENTE</strong></h4>
            </div>
            <div class="card-body">
        <div class="container">
                <div class="col-md-13">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-white" style="background: url('<?=APP_URL;?>/public/dist/img/portada.jpg') center center;">
                        <h3 class="widget-user-username text-right" style="color:#F2F2F2"><?=$nombre_sesion_usuario;?></h3>
                        <h3 class="widget-user-username text-right" style="color:#F2F2F2">Docente</h3>
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?=APP_URL;?>/public/dist/img/avatar3.png" alt="User Avatar">
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col-sm-6 border-right border-left">
                            <div class="description-block">
                              <h5 class="description-header">CUESTIONARIOS REGISTRADOS</h5>
                              <span class="description-text">
                                <?php echo $contador_cuestionarios; ?>
                              </span>
                            </div>
                          </div>
                          <div class="col-sm-6 border-right border-left">
                            <div class="description-block">
                              <h5 class="description-header">CREACIONES LITERARIAS CARGADAS</h5>
                              <span class="description-text">
                                <?php echo $contador_creaciones_literarias; ?>
                              </span>
                            </div>
                          </div>                          
                          <!-- /.col -->
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>

                <div class="card card-success">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card mb-2 bg-gradient-dark">
                          <img class="card-img-top" src="<?=APP_URL;?>/public/dist/img/imagen 4.jpg" alt="Dist Photo 1">
                          <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <a class="text-white" style="color:#F2F2F2">Universidades</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card mb-2">
                          <img class="card-img-top" src="<?=APP_URL;?>/public/dist/img/imagen 5.jpg" alt="Dist Photo 2">
                          <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <a class="text-white" style="color:#F2F2F2">Alumnos</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card mb-2">
                          <img class="card-img-top" src="<?=APP_URL;?>/public/dist/img/imagen 6.jpg" alt="Dist Photo 3">
                          <div class="card-img-overlay d-flex flex-column justify-content-end"">
                            <a class="text-white" style="color:#F2F2F2">Encuentas</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>   
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <?php 
  include('layout/parte2_admin.php');
  include('../mensajes.php');
  ?>