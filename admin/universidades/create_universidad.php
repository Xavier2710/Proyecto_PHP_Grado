<?php 
include('../../app/config.php');
include('../../admin/layout/parte1_admin.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
            <h4>&nbsp;&nbsp;<strong>REGISTRAR UNIVERSIDAD</strong></h4>            
        </div>
        <br>        
        <div class="row">

          <div class="col-md-11" >
            <div class="card card-outline card-danger" style="border-color: #D6B357;">
              <div class="card-header">
                <h3 class="card-title">Diligencie los datos de la Universidad</h3>
              </div>
              <div class="card-body">
              
                <form action="<?=APP_URL;?>/app/controllers/universidades/create_universidad.php" method="post">
                  <div class="form-row">
                    <div class="col-md-3">
                      <input type="text" name="txt_codigo" class="form-control" placeholder="Codigo">
                    </div>
                    <div class="col-md-5">
                      <input type="text" name="txt_nombre" class="form-control" placeholder="Nombre Universidad">
                    </div> 
                    <div class="col-md-4">
                      <select name="txt_pais" class="form-control">
                        <option value="" disabled selected>Seleccione un país...</option>
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
                  <div class="form-row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" style="background-color: #D6B357; border-color: #D6B357; color: #F2F2F2;">Registrar</button>
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

<script>
    function archivo(evt){
        var files = evt.target.files;
        for (var i=0, f; f= files[i]; i++){
            if(!f.type.match('image.*')){
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile){
                return function (e){
                    document.getElementById("list").innerHTML = ['<img class="thum thumbnail" src="',e.target.result, '" width="300px" title="',escape(theFile.name), '"/>'].join('');
                };
            }) (f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>