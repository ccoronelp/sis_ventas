<?php
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['cliente'])) {
  header("Location:login.php");
}

require_once("bd_conexion/bd_libro.php");

$date = getdate();
$hoy = $date['year'].'-'.$date['mon'].'-'.$date['mday'];

$errores = "";

if ($_POST) {
	$id_cliente=$_POST['id_cliente'];
	$fecha=$_POST['fecha'];
	$asunto=$_POST['asunto'];
	$detalle=$_POST['detalle'];

	// echo "$id_cliente - $fecha - $asunto - $detalle";
	$valor = ModeloLibro::insertarLibro($id_cliente,$fecha,$asunto,$detalle);
	if ($valor) {
		$errores = "Se insertó correctamente";
	}else{
		$errores = "Ocurrió un error";
	}
}


include_once("partes/header.php");

?>
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
	          <div class="viewport-header">
	            <nav aria-label="breadcrumb">
	              <ol class="breadcrumb has-arrow">
	                <li class="breadcrumb-item">
	                  <a href="#">Dashboard</a>
	                </li>
	                <li class="breadcrumb-item">
	                  <a href="#">Libro de reclamaciones</a>
	                </li>
	                <li class="breadcrumb-item active" aria-current="page">Agregar caso</li>
	              </ol>
	            </nav>
	          </div>
              <div class="col-lg-12">
                <div class="grid">
                  <p class="grid-header">Ingrese datos de reclamo</p>
                  <div class="grid-body">
                    <div class="item-wrapper">
                    	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	                      <div class="row mb-3">
	                      	<input type="hidden" name="id_cliente" value="<?php echo($_SESSION['id_cliente']) ?>">
	                        <div class="col-md-8 mx-auto">
	                          <div class="form-group row showcase_row_area">
	                            <div class="col-md-3 showcase_text_area">
	                              <label for="inputType1">Nombres</label>
	                            </div>
	                            <div class="col-md-9 showcase_content_area">
	                              <input type="text" class="form-control" id="inputType1" value="<?php echo($_SESSION['nombre']) ?>" disabled>
	                            </div>
	                          </div>
	                          <div class="form-group row showcase_row_area">
	                            <div class="col-md-3 showcase_text_area">
	                              <label for="inputType12">Email</label>
	                            </div>
	                            <div class="col-md-9 showcase_content_area">
	                              <input type="email" class="form-control" id="inputType2" value="
	                              <?php if ($_SESSION['admin']) {
	                              		echo($_SESSION['admin']); 
	                              	}else{
	                              		echo($_SESSION['cliente']); 
	                              	}
	                               ?>
	                              " disabled>
	                            </div>
	                          </div>
	                          <div class="form-group row showcase_row_area">
	                            <div class="col-md-3 showcase_text_area">
	                              <label for="inputType5">Fecha</label>
	                            </div>
	                            <div class="col-md-9 showcase_content_area">
	                              <input type="text" name="fecha" class="form-control" id="inputType5" value="<?php echo($hoy);?>">
	                            </div>
	                          </div>
	                           <div class="form-group row showcase_row_area">
	                            <div class="col-md-3 showcase_text_area">
	                              <label for="inputType8">Asunto</label>
	                            </div>
	                            <div class="col-md-9 showcase_content_area">
	                              <input type="text" name="asunto" class="form-control" id="inputType8" value="" placeholder="Asunto" required>
	                            </div>
	                          </div>
	                          <div class="form-group row showcase_row_area">
	                            <div class="col-md-3 showcase_text_area">
	                              <label for="inputType9">Detalle</label>
	                            </div>
	                            <div class="col-md-9 showcase_content_area">
	                              <textarea name="detalle" class="form-control" id="inputType9" cols="12" rows="5" required></textarea>
	                            </div>
	                          </div>
							<div class="form-group row showcase_row_area">
	                            <?php if ($errores!=""): ?>
		                            <div class="col-md-3 showcase_text_area">
		                              <label for="inputType9"></label>
		                            </div>
		                            <div class="col-md-9 showcase_content_area">
		                              <button type="submit" class="btn btn-danger btn-block mt-0"><i class="mdi mdi-comment-processing-outline"></i><?php echo $errores; ?></button>
		                            </div>                       	
	                            <?php endif ?>
	                            <div class="col-md-3 showcase_text_area">
	                              <label for="inputType9"></label>
	                            </div>	                            
	                            <div class="col-md-9 showcase_content_area">
	                              <button type="submit" class="btn btn-primary btn-block mt-0">Enviar</button>
	                            </div>	  	
	                        </div>
	                        </div>
	                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

<?php 
include_once("partes/footer.php");
?>