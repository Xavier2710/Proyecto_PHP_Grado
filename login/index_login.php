<?php 
session_start(); // Moved session_start to the top
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
  <style>
  body {
    background-image: url('../public/dist/img/fondo2.jpg');
    background-size: cover;
    background-position: center;
    height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center; /* Centrar horizontalmente */
    align-items: center;    /* Centrar verticalmente */
  }

  .container {
    display: grid;
    grid-template-columns: 2fr 1fr; /* Dos columnas en PC */
    gap: 20px;
    width: 90%;
    max-width: 1200px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8);
  }

  .welcome-box {
    background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(100, 100, 100, 0.8);
      max-width: 700px; 
      margin: 5%;
  }

  .welcome-box h2 {
    color: #2C3E50;
    margin-bottom: 20px;
  }

  .welcome-box p {
    color: #34495E;
    font-size: 1.1rem;
    line-height: 1.6;
  }

  .login-box {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
  }

  .login-card-body {
    background-color: #f7f9fc;
    border-radius: 15px;
    padding: 20px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 4px 10px rgba(100, 100, 100, 0.8);
  }

  /* Media Query para pantallas medianas y pequeñas */
  @media (max-width: 768px) {
    .container {
      grid-template-columns: 1fr; /* Una columna en pantallas medianas y pequeñas */
      gap: 10px;
    }

    .welcome-box {
      padding: 20px;
    }

    .welcome-box h2 {
      font-size: 1.6rem; /* Texto más pequeño */
    }

    .welcome-box p {
      font-size: 1rem; /* Ajustar texto */
    }

    .login-box {
      padding: 20px;
    }

    .login-card-body {
      max-width: 100%; /* Asegurar que el formulario ocupe el ancho */
      padding: 15px;
    }
  }

  /* Media Query para pantallas muy pequeñas */
  @media (max-width: 576px) {
    .welcome-box h2 {
      font-size: 1.4rem; /* Texto más pequeño aún */
    }

    .welcome-box p {
      font-size: 0.9rem;
    }

    .login-card-body {
      padding: 10px; /* Reducir espacio interno */
    }

    .input-group input {
      font-size: 0.9rem; /* Reducir tamaño de texto en el input */
    }

    button[type="submit"] {
      font-size: 0.9rem; /* Botón más pequeño */
    }
  }
</style>


</head>
<body>
<div class="container">
  <!-- Cuadro de bienvenida -->
  <div class="welcome-box">
    <h2><strong>Bienvenido a <?=APP_NAME;?></strong></h2>
    <p><em>Permite visualizar el impacto de la formación médica en atención primaria y salud pública mediante la metodología de Aprendizaje Basado en Problemas haciendo uso de creaciones literarias</em></p>
  </div>

  <!-- Cuadro de login -->
  <div class="login-box">
    <div class="card shadow rounded-lg" style="border: none;">
      <div class="card-body login-card-body text-center">
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
        if(isset($_SESSION['mensaje'])){
          $mensaje = $_SESSION['mensaje'];
        ?>
          <script>
              Swal.fire({
                  icon: "error",
                  title: "Acceso Denegado",
                  text: "<?=$mensaje;?>",
                  confirmButtonColor: "#D6B357"
              });
          </script>
        <?php
          session_destroy();
        }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?=APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=APP_URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=APP_URL;?>/public/dist/js/adminlte.min.js"></script>
</body>
</html>
