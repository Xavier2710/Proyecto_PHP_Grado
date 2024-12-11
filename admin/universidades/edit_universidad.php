<?php 

$codigo = $_GET['id'];


include('../../app/config.php');
include('../../admin/layout/parte1_admin.php');
include('../../app/controllers/universidades/datos_universidad.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>ACTUALIZAR UNIVERSIDAD</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-10" >
            <div class="card card-outline card-danger" style="border-color: #D92B3A;">
              <div class="card-header">
                <h3 class="card-title">Información Registrada</h3>
              </div>
              <div class="card-body">
                              
                <form action="<?=APP_URL;?>/app/controllers/universidades/update_universidad.php" method="post">
                    <div class="form-row">
                        <div class="col-md-3">
                        <input type="text" readonly name="txt_codigo" class="form-control" value="<?=$codigo;?>" placeholder="Codigo">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="txt_nombre" class="form-control" value="<?=$nombre_universidad;?>" placeholder="Nombre Universidad">
                        </div>
                        <div class="col-md-4">
                          <select name="txt_pais" class="form-control">
                            <option value="<?=$pais_universidad;?>" selected><?=$pais_universidad;?></option>
                            <option value="Colombia">Colombia</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Brasil">Brasil</option>
                            <option value="Chile">Chile</option>
                            <option value="México">México</option>
                            <option value="Perú">Perú</option>
                            <option value="España">España</option>
                            <option value="Estados Unidos">Estados Unidos</option>
                          </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Actualizar</button>
                            <a href="show_universidades.php" class="btn btn-danger" style="color: #F2F2F2;">Cancelar</a>
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
  include('../../admin/layout/parte2_admin.php');
  include('../../layout/mensajes.php');
  ?>