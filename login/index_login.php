<?php 
include('../app/config.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=APP_NAME;?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page" style="background-image: url('../public/dist/img/fondo2.jpg'); background-size: cover;background-position: center;">
<div class="login-box">
  <div class="login-logo">
    <h3 style="color: #F2F2F2;"><strong><?=APP_NAME;?></strong></h3>
  </div>
  <!-- /.login-logo -->
  <div class="card shadow rounded-lg" style="border: none; max-width: 400px; margin: auto;">
  <div class="card-body login-card-body text-center" style="background-color: #f7f9fc; border-radius: 15px;">
    <h3 class="mb-4" style="color: #2C3E50;"><strong>Login</strong></h3>
    <p class="login-box-msg" style="color: #34495E; font-size: 1.1rem;">Ingrese sus credenciales</p>
    <hr>
    <form action="controller_login.php" method="post">
      <div class="input-group mb-3">
        <input type="email" name="correo" class="form-control" placeholder="Email" style="border-radius: 10px 0 0 10px;">
        <div class="input-group-append">
          <div class="input-group-text" style="background-color: #e9ecef; border-radius: 0 10px 10px 0;">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" name="clave" class="form-control" placeholder="Password" style="border-radius: 10px 0 0 10px;">
        <div class="input-group-append">
          <div class="input-group-text" style="background-color: #e9ecef; border-radius: 0 10px 10px 0;">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <hr>
      <button class="btn btn-primary btn-block" type="submit" style="background-color: #D92B3A;border-radius: 20px; font-weight: bold;">Ingresar</button>
    </form>

    <?php 
    session_start();
    if(isset($_SESSION['mensaje'])){
      $mensaje = $_SESSION['mensaje'];
    ?>
      <script>
          Swal.fire({
              icon: "error",
              title: "Acceso Denegado",
              text: "<?=$mensaje;?>"
          });
      </script>
    <?php
      session_destroy();
    }
    ?>
  </div>
</div>

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=APP_URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=APP_URL;?>/public/dist/js/adminlte.min.js"></script>
</body>
</html>
