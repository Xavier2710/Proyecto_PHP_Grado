<?php 

$codigo = $_GET['id'];


include('../../../app/config.php');
include('../../../admin/layout/parte1_admin.php');
include('../../../app/controllers/rol_asignaturas/datos_asignatura.php');
include('../../../app/controllers/rol_programas/show_programa.php');
include('../../../app/controllers/universidades/show_universidad.php');


$sql_programas = "SELECT * FROM programa WHERE idPrograma = '$programa_asignatura'";
$query_programas = $pdo->prepare($sql_programas);
$query_programas->execute();
$datos_programas = $query_programas->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_programas as $datos_programa){
    $codigo_programa = $datos_programa['idPrograma'];
    $nombre_programa = $datos_programa['nombre'];
    $universidad_programa = $datos_programa['Universidad_idUniversidad'];
}

$sql_universidades = "SELECT * FROM universidad WHERE idUniversidad = '$universidad_asignatura'";
$query_universidades = $pdo->prepare($sql_universidades);
$query_universidades->execute();
$datos_universidades = $query_universidades->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_universidades as $datos_universidad){
    $codigo_universidad = $datos_universidad['idUniversidad'];
    $nombre_universidad = $datos_universidad['nombre'];
    $pais_universidad = $datos_universidad['pais'];
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>ACTUALIZAR ASIGNATURA</strong></h4>            
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
                    <div class="form-row">
                        <div class="col-md-5">
                          <select name="txt_programa" class="form-control" title="Seleccione Programa">
                            <option value="<?=$codigo_programa;?>"> <?=$codigo_programa;?> - <?=$nombre_programa;?> </option>
                              <?php
                                foreach($programas as $programa){
                                  $codigo1_programa = $programa['idPrograma'];
                                  $nombre1_programa = $programa['nombre'];
                                  echo "<option value='" . $codigo1_programa . "'>" .$codigo1_programa." - ".$nombre1_programa . "</option>";
                                }
                              ?>
                          </select>
                        </div>
                        <div class="col-md-7">
                          <select name="txt_programa" class="form-control"  title="Seleccione Universidad" >
                            <option value="<?=$codigo_universidad;?>"><?=$codigo_universidad;?> - <?=$nombre_universidad;?></option>
                            <?php
                                foreach($universidades as $universidad){
                                  $codigo1_universidad = $universidad['idUniversidad'];
                                  $nombre1_universidad = $universidad['nombre'];
                                  echo "<option value='" . $codigo1_universidad . "'>" .$codigo1_universidad." - ".$nombre1_universidad . "</option>";
                                }
                              ?>
                          </select>
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