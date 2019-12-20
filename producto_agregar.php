<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location:login.php");
}

require_once("bd_conexion/bd_producto.php");

$errores = "";

if ($_POST) {

	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$url=$_POST['url'];
	$codigo=$_POST['codigo'];

	// echo "$nombre - $precio - $url - $codigo";
	$valor = ModeloProducto::insertarProducto($nombre,$precio,$url,$codigo);
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
	                  <a href="#">Productos</a>
	                </li>
	                <li class="breadcrumb-item active" aria-current="page">Agregar Producto</li>
	              </ol>
	            </nav>
	          </div>
              <div class="col-lg-12">
                <div class="grid">
                  <p class="grid-header">Ingrese datos de producto</p>
                  <div class="grid-body">
                    <div class="item-wrapper">
                    	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	                      <div class="row mb-3">
	                      	<input type="hidden" name="id_cliente" value="<?php echo($_SESSION['id_cliente']) ?>">
	                        <div class="col-md-8 mx-auto">
	                          <div class="form-group row showcase_row_area">
	                            <div class="col-md-3 showcase_text_area">
	                              <label for="inputType1">Nombre</label>
	                            </div>
	                            <div class="col-md-9 showcase_content_area">
	                              <input type="text" name="nombre" class="form-control" id="inputType1" value="" placeholder="Zapatilla adidas 360" required>
	                            </div>
	                          </div>
	                          <div class="form-group row showcase_row_area">
	                            <div class="col-md-3 showcase_text_area">
	                              <label for="inputType12">Precio</label>
	                            </div>
	                            <div class="col-md-9 showcase_content_area">
	                              <input type="number" name="precio" class="form-control" id="inputType2" value="" placeholder="380" required>
	                            </div>
	                          </div>
	                          <div class="form-group row showcase_row_area">
	                            <div class="col-md-3 showcase_text_area">
	                              <label for="inputType5">URL Imágen</label>
	                            </div>
	                            <div class="col-md-9 showcase_content_area">
	                              <input type="text" name="url" class="form-control" id="inputType5" value="assets/images/productos/img1.jpg">
	                            </div>
	                          </div>
	                           <div class="form-group row showcase_row_area">
	                            <div class="col-md-3 showcase_text_area">
	                              <label for="inputType8">Código Producto</label>
	                            </div>
	                            <div class="col-md-9 showcase_content_area">
	                              <input type="text" name="codigo" class="form-control" id="inputType8" value="" placeholder="003" required>
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