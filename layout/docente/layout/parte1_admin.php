<?php
session_start();
if (isset($_SESSION['sesion_correo'])) {
  //echo'El usuario se logueo';
  $correo_sesion = $_SESSION['sesion_correo'] ;
  $query_sesion = $pdo->prepare("SELECT * FROM usuarios WHERE correo = '$correo_sesion'");
  $query_sesion->execute();

  $datos_sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
  foreach ($datos_sesion_usuarios as $datos_sesion_usuario) {
    $nombre_sesion_usuario = $datos_sesion_usuario['nombreCompleto'];
  }
}else{
  //echo 'El usuario no paso por el login';
  header('Location:'.APP_URL.'/login/index_login.php');
} 
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=APP_NAME;?></title>

  <link rel="icon" type="image/png" href="<?=APP_URL;?>/public/images/favicon-16x16.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/dist/css/adminlte.min.css">

  <!--Libreria para cambiar el estilo a los mensajes de alerta -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!--Libreria para todos los iconos -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!--DataTables -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <script>
    const logoutTime = 900000; //se cerrala la sesion en 15 min
    const logoutTime1 = 30000; // 30 segundos para cancelar el cierre de sesion

    let autoLogoutTimeout;

    function autoLogout() {
        let timerInterval;
        Swal.fire({
            title: "Cierre Automático",
            html: "Se cerrará la sesión en <b>30</b> segundos.<br><br>" +
                  "<button id='continue-session' class='btn btn-danger'>Continuar Sesión</button>",
            timer: logoutTime1,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timerDisplay = Swal.getHtmlContainer().querySelector("b");
                let timeLeft = logoutTime1 / 1000;
                timerInterval = setInterval(() => {
                    timeLeft -= 1;
                    timerDisplay.textContent = timeLeft;
                }, 1000);

                const continueButton = Swal.getHtmlContainer().querySelector("#continue-session");
                continueButton.addEventListener("click", () => {
                    clearInterval(timerInterval);
                    Swal.close();
                    resetAutoLogout();
                });
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = "<?=APP_URL;?>/login/logout.php";
            }
        });
    }

    function resetAutoLogout() {
        clearTimeout(autoLogoutTimeout);
        autoLogoutTimeout = setTimeout(autoLogout, logoutTime);
    }

    document.addEventListener("DOMContentLoaded", () => {
        resetAutoLogout();
    });
</script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=APP_URL;?>/layout/docente/index_docente.php" class="nav-link"><strong><?=APP_NAME;?></strong></a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- BOTON DE BUSQUEDA EN LA PARTE DERECHA
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>      -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">2</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #D5B256;">
    <!-- Brand Logo -->
    <a href="<?=APP_URL;?>/layout/docente/index_docente.php" class="brand-link">
      <img src="<?=APP_URL;?>/public/dist/img/medicina2.png" alt="Logo_Medicina" class="brand-image elevation-3" style="opacity: .9; border-radius:5px">
      <span class="brand-text font-weight-light"><strong>Dashboard ABP</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <br>
      <div class="user-panel mt-2 pb-4 mb-3 d-flex align-items-center justify-content-center" style="border-color: #F2F2F2;border-radius: 30px; background-color: #D92B3A;">
        <div class="image mr-1">
            <img src="<?=APP_URL;?>/public/dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a style="color: #F2F2F2;" class="d-block"><?=$nombre_sesion_usuario;?></a>
        </div>         
      </div>

      <!-- SidebarSearch Form -->

      <!--

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <br>
          <li class="nav-item">
            <a href="<?=APP_URL;?>/layout/docente/index_docente.php" class="nav-link" style="color: #F2F2F2;">
              <i class="nav-icon fas"><i class="bi bi-house"></i></i>
              <p>
                HOME
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            <a href="#" class="nav-link " style="color: #F2F2F2;">
              <i class="nav-icon fas"><i class="bi bi-tools"></i></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left" style="color: #D92B3A;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
              <li class="nav-item">
                <a href="<?=APP_URL;?>/layout/docente/roles/asignaturas/show_asignaturas.php" class="nav-link " style="color: #F2F2F2;">
                  <i class="fas fa-caret-right nav-icon" style="color: #D92B3A;"></i>
                  <p>Asignaturas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=APP_URL;?>/layout/docente/roles/dimensiones/show_dimensiones.php" class="nav-link " style="color: #F2F2F2;">
                  <i class="fas fa-caret-right nav-icon" style="color: #D92B3A;"></i>
                  <p>Dimensiones</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/roles/usuarios/show_usuarios.php" class="nav-link" style="color: #F2F2F2;">
                  <i class="fas fa-caret-right nav-icon" style="color: #D92B3A;"></i>
                  <p>Usuarios</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?=APP_URL;?>/layout/docente/roles/grupos/show_grupos.php" class="nav-link " style="color: #F2F2F2;">
                  <i class="fas fa-caret-right nav-icon" style="color: #D92B3A;"></i>
                  <p>Grupos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=APP_URL;?>/layout/docente/roles/preguntas/show_preguntas.php" class="nav-link " style="color: #F2F2F2;">
                  <i class="fas fa-caret-right nav-icon" style="color: #D92B3A;"></i>
                  <p>Preguntas</p>
                </a>
              </li>              
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link" style="color: #F2F2F2;">
              <i class="nav-icon fas"><i class="bi bi-pencil-square"></i></i>
              <p>
                Cuestionario
              </p>
            </a>
          </li>
          
          <li class="nav-item" style="border-color: #F2F2F2;"">
            <a href="<?=APP_URL;?>/layout/docente/creaciones_literarias/show_literarias.php" class="nav-link" style="color: #F2F2F2;">
              <i class="nav-icon fas"><i class="bi bi-journal-bookmark-fill"></i></i>
              <p>
                Creaciones Literarias
              </p>
            </a>
          </li>

          
          <li class="nav-item text-left user-panel mt-3 pb-3 mb-3 d-flex" style="border-color: #F2F2F2;">
          </li>

          <li class="nav-item has-treeview">
                  <a href="#" class="nav-link" style="color: #F2F2F2;">
                    <i class="nav-icon fas"><i class="bi bi-people-fill"></i></i>
                    <p>
                      Información Usuarios
                      <i class="right fas fa-angle-left" style="color: #D92B3A;"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item" style="border-color: #F2F2F2;">
                      <a href="<?=APP_URL;?>/layout/docente/estudiantes/show_estudiantes.php" class="nav-link" style="color: #F2F2F2;">
                        <i class="fas fa-caret-right nav-icon" style="color: #D92B3A;"></i>
                        <p>Datos Estudiantes</p>
                      </a>
                    </li>
                  </ul>
          </li>

          <!-- <li class="nav-item has-treeview">
                  <a href="#" class="nav-link" style="color: #F2F2F2;">
                    <i class="nav-icon fas"><i class="bi bi-people-fill"></i></i>
                    <p>
                      Usuarios
                      <i class="right fas fa-angle-left" style="color: #D92B3A;"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item" style="border-color: #F2F2F2;">
                      <a href="#" class="nav-link" style="color: #F2F2F2;">
                        <i class="fas fa-caret-right nav-icon" style="color: #D92B3A;"></i>
                        <p>Administradores</p>
                      </a>
                      <a href="#" class="nav-link" style="color: #F2F2F2;">
                        <i class="fas fa-caret-right nav-icon" style="color: #D92B3A;"></i>
                        <p>Docentes</p>
                      </a>
                      <a href="#" class="nav-link" style="color: #F2F2F2;">
                        <i class="fas fa-caret-right nav-icon" style="color: #D92B3A;"></i>
                        <p>Estudiantes</p>
                      </a>
                    </li>
                  </ul>
                </li> -->
          <br>
          <li class="nav-item text-left user-panel mt-3 pb-3 mb-3 d-flex" style="border-color: #F2F2F2;">
            <a href="<?=APP_URL;?>/login/logout.php" class="nav-link" style="color: #F2F2F2;background-color: #D92B3A; border-radius: 15px">
              <i class="nav-icon fas"><i class="bi bi-box-arrow-left"></i></i>
                <p>
                Cerrar Sesión
              </p>
            </a>
          </li>  
                   

        </ul>
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>