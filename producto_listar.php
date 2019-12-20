<?php
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['cliente'])) {
  header("Location:login.php");
}
require_once("bd_conexion/bd_producto.php");
$aviso="";

if ($_GET) {
	$aviso=$_GET['aviso'];
}


$errores = "";

$resultado = ModeloProducto::listarProducto();
// var_dump($resultado);

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
                <li class="breadcrumb-item active" aria-current="page">Listando productos</li>
              </ol>
            </nav>
        </div>
		<div class="content-viewport">
			<div class="row">
	            <div class="col-lg-12">
	                <div class="grid">
	                  <p class="grid-header">Listar productos</p>
	                  <div class="item-wrapper">
	                    <div class="table-responsive">
	                    <?php if ($aviso!=""): ?>
	                    	<a href="producto_carrito.php">
	                    	<button type="submit" class="btn btn-primary btn-block"> <?php echo "SE AGREGÓ EL PRODUCTO AL CARRITO DE COMPRAS (CLIC PARA VER)"; ?> </button>
	                    	</a>
	                    <?php endif ?>
	                      <table id="zero_config" class="table table-hover">
	                        <thead>
	                          <tr>
	                            <th>Imagen</th>
	                            <th>Nombre</th>
	                            <th>Precio</th>
	                            <th>Código</th>
	                            <th>Carrito</th>
	                            <th>Mentenimiento</th>
	                          </tr>
	                        </thead>
	                        <tbody>
                        	<?php foreach ($resultado as $key => $value): ?>
	                          	<?php 
								$id =$value['id'];
								$nombre =$value['nombre'];
								$precio =$value['precio'];
								$url =$value['url'];
								$codigo =$value['codigo'];

								$url="?id=$id&nombre=$nombre&precio=$precio&url=$url&codigo=$codigo"
	                          	?>
	                          <tr>
	                            <td class="d-flex align-items-center border-top-0">
	                              <img class="profile-img img-sm img-rounded mr-2" src="assets/images/profile/male/image_5.png" alt="profile image">
	                              <span><?php echo $value['nombre']; ?></span>
	                            </td>
	                            <td><?php echo $value['nombre']; ?></td>
	                            <td>S/ <?php echo $value['precio']; ?></td>
	                            <td>
                            		<button type="button" class="btn btn-primary btn-xs"><?php echo $value['codigo']; ?></button>
	                            </td>
	                            <td>
	                            	<a href="producto_agregar_carrito.php<?php echo($url) ?>">
	                            		<button type="button" class="btn btn-warning btn-xs">Agregar a carrito</button>
	                            	</a>
	                            </td>
	                            <td>
	                            	<a href="#">
	                            		<i class="mdi mdi-lead-pencil link-icon"></i>
	                            	</a>
	                            	<a href="#">
	                            		<i class="mdi mdi-delete-forever link-icon"></i>
	                            	</a>
	                            </td>
	                            
	                          </tr>
                        	<?php endforeach ?>

	                        </tbody>
	                      </table>
	                    </div>
	                  </div>
	                </div>
	            </div>
       		</div>
        </div>
    </div>
</div>


<?php

include_once("partes/footer.php");
?>





