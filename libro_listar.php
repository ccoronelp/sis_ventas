<?php
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['cliente'])) {
  header("Location:login.php");
}

require_once("bd_conexion/bd_libro.php");

$errores = "";

$resultado = ModeloLibro::listarLibro();
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
                  <a href="#">Libro de reclamaciones</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Listando reclamos</li>
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
	                      <table id="zero_config" class="table table-hover">
	                        <thead>
	                          <tr>
	                            <th>Código</th>
	                            <th>Cliente</th>
	                            <th>Fecha</th>
	                            <th>Asunto</th>
	                            <th>Detalle</th>
	                            <th>Mentenimiento</th>
	                          </tr>
	                        </thead>
	                        <tbody>
                        	<?php foreach ($resultado as $key => $value): ?>
	                          <tr>
	                            <td class="d-flex align-items-center border-top-0">
	                              <img class="profile-img img-sm img-rounded mr-2" src="assets/images/profile/male/image_5.png" alt="profile image">
	                              <span><?php echo $value['id']; ?></span>
	                            </td>
	                            <td><?php echo $value['cliente_id']; ?></td>
	                            <td><?php echo $value['fecha']; ?></td>
	                            <td>
                            		<button type="button" class="btn btn-primary btn-xs"><?php echo $value['asunto']; ?></button>
	                            </td>
	                            <td>
	                            	<p><?php echo $value['detalle']; ?></p>
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