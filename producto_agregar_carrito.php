<?php 
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['cliente'])) {
  header("Location:login.php");
}

if ($_GET) {

$id=$_GET['id'];
$nombre=$_GET['nombre'];
$precio=$_GET['precio'];
$url=$_GET['url'];
$codigo=$_GET['codigo'];

	if (!isset($_SESSION['carrito'])) {
		$producto = array(
			'id'=>$id,
			'nombre'=>$nombre,
			'precio'=>$precio,
			'url'=>$url,
			'codigo'=>$codigo
		);

		$_SESSION['carrito'][0]=$producto;
	}else{
		$numeroProductos=count($_SESSION['carrito']);
		$producto=array(
			'id'=>$id,
			'nombre'=>$nombre,
			'precio'=>$precio,
			'url'=>$url,
			'codigo'=>$codigo
		);

		$_SESSION['carrito'][$numeroProductos]=$producto;
	}
	header("Location:producto_listar.php?aviso=exito");
}
else{
	header("Location:index.php");
}

// var_dump($_SESSION['carrito']);

?>