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
              
                <form action="<?=APP_URL;?>/app/controllers/rol_usuarios/update_usuario_estudiante.php" method="post">
                    <div class="form-row">
                        <div>
                          <label for="" style="text-align:center">Codigo: </label>
                        </div>
                        <div class="col-md-1">
                        <input type="text" readonly name="txt_codigo" class="form-control" value="<?=$codigo_estudiante;?>" placeholder="Codigo">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="txt_nombre" class="form-control" title="Nombre Completo" value="<?=$nombre_estudiante;?>" placeholder="Nombre Completo">
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="txt_email" class="form-control" title="Correo Eléctronico" value="<?=$correo_estudiante;?>" placeholder="Correo">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-3">
                            <select class="custom-select" name="txt_rol" title="Rol">
                                <option value="<?=$rol_estudiante;?>" disabled selected><?=$rol_estudiante;?></option>
                            </select>
                        </div>                       
                        <div class="col-md-4">
                        <input type="date" name="txt_fecha" class="form-control" title="Fecha de Nacimiento" value="<?=$fecha_estudiante;?>" placeholder="Fecha de Nacimiento">
                        </div>
                        <div class="col-md-5">
                          <select class="custom-select" name="txt_escolar" title="Procedencia Escolar">
                            <option value="<?=$escolar_estudiante;?>" disabled selected><?=$escolar_estudiante;?></option>
                            <option value="Privado">Privado</option>
                            <option value="Público">Público</option>
                          </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">                        
                        <div class="col-md-2">
                          <input type="text" name="txt_genero" class="form-control" value="<?=$genero_estudiante;?>" title="Genero" style="text-align: center;" placeholder="Genero">
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="txt_promedio" class="form-control" value="<?=$promedio_estudiante;?>" title="Promedio Ponderado" style="text-align: center;" placeholder="Promedio Ponderado">
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="txt_repeticion" class="form-control" value="<?=$repeticion_estudiante;?>" title="# Materias Validadas" style="text-align: center;" placeholder="# Materias Validadas">
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