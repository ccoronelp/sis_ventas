<?php
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['cliente'])) {
  header("Location:login.php");
}

require_once("bd_conexion/bd_producto.php");

$errores = "";
if (isset($_SESSION['carrito'])) {
	$resultado = $_SESSION['carrito'];
}

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
                <li class="breadcrumb-item active" aria-current="page">Carrito de compras</li>
              </ol>
            </nav>
        </div>
		<div class="content-viewport">
			<div class="row">
	            <div class="col-lg-12">
	                <div class="grid">
	                  <p class="grid-header">Productos en el carrito</p>
	                  <div class="item-wrapper">
	                    <div class="table-responsive">
	                      <table id="" class="table table-hover">
	                        <thead>
	                          <tr>
	                            <th>Imagen</th>
	                            <th>Nombre</th>
	                            <th>Precio</th>
	                            <th>Código</th>
	                            <th>Carrito</th>
	                            
	                          </tr>
	                        </thead>
	                        <tbody>
	                        <?php if (isset($_SESSION['carrito'])): ?>
	                        <?php $total=0; ?>
                        	<?php foreach ($resultado as $key => $value): ?>
	                          	<?php 
								$id =$value['id'];
								$nombre =$value['nombre'];
								$precio =(float)$value['precio'];
								$url =$value['url'];
								$codigo =$value['codigo'];

								$total=$total+$precio;
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
	                            	<a href="#">
	                            		<button type="button" class="btn btn-warning btn-xs">quitar de carrito</button>
	                            	</a>
	                            </td>
	                          </tr>
                        	<?php endforeach ?>
                        	<?php endif ?>
                        	<tr>
	                          	<td></td>
	                          	<td></td>
	                          	<td><p>TOTAL: S/ <?php echo "$total"; ?> </p></td>
	                          	<td></td>
	                          	<td></td>
	                          </tr>	
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