<?php 

include_once('bd_conexion/conexion.php');


$arrayResultado = Productos::TraerProductos();

foreach ($arrayResultado as $key => $value) {
	echo $value['nombre']."<br>";
}


 ?>