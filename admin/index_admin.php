<?php 
include('../app/config.php');
include('../admin/layout/parte1_admin.php');
include('../app/controllers/rol_usuarios/show_usuario.php');
include('../app/controllers/creaciones_literarias/show_literaria.php');
include('../app/controllers/cuestionarios/show_cuestionario.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="container">
      <div class="container">
        <div class="row">
          <h4>&nbsp;&nbsp;<strong>DASHBOARD</strong></h4>
        </div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-poll"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cuestionarios</span>
                <?php
                $contador_cuestionario = 0;
                foreach ($cuestionarios as $cuestionario) {
                   $contador_cuestionario = $contador_cuestionario + 1;
                 }
                ?>
                <span class="info-box-number"><?=$contador_cuestionario;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Guias Resueltas</span>
                <span class="info-box-number">30</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Creaciones Literarias</span>
                <?php
                $contador_literaria = 0;
                foreach ($literarias as $literaria) {
                   $contador_literaria = $contador_literaria + 1;
                 }
                ?>
                <span class="info-box-number"><?=$contador_literaria;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Usuarios Registrados</span>

                <?php
                $contador_usuarios = 0;
                foreach ($usuarios as $usuario) {
                   $contador_usuarios = $contador_usuarios + 1;
                 }
                ?>
                <span class="info-box-number"><?=$contador_usuarios;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
              </div>
              <!-- /.card-body-->
            </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <?php 
  include('../admin/layout/parte2_admin.php');
  include('../layout/mensajes.php');
  ?>