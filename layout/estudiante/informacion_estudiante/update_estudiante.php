<?php 

include('../../../app/config.php');
include('../layout/parte1_admin.php');
include('../../../app/controllers/rol_usuarios/show_usuario_estudiante.php');

$id_usuario;

$sql = "SELECT 
    usuarios.idusuario,
    usuarios.nombreCompleto,
    usuarios.correo,
    usuarios.rol,
    estudiante.codigo,
    estudiante.fechaN,
    estudiante.procedenciaEscolar,
    estudiante.genero,
    estudiante.promedioPonderado,
    estudiante.repeticionAsignatura
FROM 
    usuarios
INNER JOIN 
    estudiante
ON 
    usuarios.idusuario = estudiante.usuarios_idusuario
WHERE 
    estudiante.usuarios_idusuario = :id_usuario;";

$query = $pdo->prepare($sql);
$query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$query->execute();
$usuarios_estudiante = $query->fetchAll(PDO::FETCH_ASSOC);


foreach ($usuarios_estudiante as $usuario_estudiante) {
  $codigo_estudiante = $usuario_estudiante['idusuario'];
  $nombre_estudiante = $usuario_estudiante['nombreCompleto'];
  $correo_estudiante = $usuario_estudiante['correo'];
  $rol_estudiante = $usuario_estudiante['rol'];
  $fecha_estudiante = $usuario_estudiante['fechaN'];
  $escolar_estudiante = $usuario_estudiante['procedenciaEscolar'];
  $genero_estudiante = $usuario_estudiante['genero'];
  $promedio_estudiante = $usuario_estudiante['promedioPonderado'];
  $repeticion_estudiante = $usuario_estudiante['repeticionAsignatura'];
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h4>&nbsp;&nbsp;<strong>DATOS BÁSICOS</strong></h4>            
        </div>
        <div class="row">
          <h3>&nbsp;&nbsp;Actualizar información para: <strong><?=$nombre_estudiante?></strong></h3>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-12" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/rol_usuarios/update_usuario.php" method="post">
                    <div class="form-row">
                        <div class="col-md-2">
                        <input type="text" readonly name="txt_codigo" class="form-control" value=" Codigo: <?=$codigo_estudiante;?>" placeholder="Codigo">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="txt_nombre" class="form-control" value="<?=$nombre_estudiante;?>" placeholder="Nombre Completo">
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="txt_email" class="form-control" value="<?=$correo_estudiante;?>" placeholder="Correo">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">                        
                        <div class="col">
                        <input type="email" name="txt_correo" class="form-control" value="<?=$correo_usuario;?>" placeholder="Correo">
                        </div>
                        <div class="col">
                        <input type="password" name="txt_clave" class="form-control" value="<?=$clave_usuario;?>" placeholder="Contraseña">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">                        
                        <div class="col-md-9">
                            <select class="custom-select" name="txt_rol">
                                <option value="<?=$clave_usuario;?>" disabled selected>Seleccione rol de usuario...</option>
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
                            <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Actualizar</button>
                            <a href="../index_estudiante.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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
  include('../layout/parte2_admin.php');
  include('../../mensajes.php');
  ?>