<?php
include_once("conexion.php");

/**
 * 
 */
class ModeloProducto
{
	
	public static function insertarProducto($nombre,$precio,$url,$codigo)
	{
		$sql_insertar='INSERT INTO producto(nombre,precio,url,codigo) VALUES(?,?,?,?)';
		$consulta_preparada=conexion::conectar()->prepare($sql_insertar);
		$valor = $consulta_preparada->execute(array($nombre,$precio,$url,$codigo));

		return $valor;

		$consulta_preparada->close();
    	$consulta_preparada=null;
	}
	public static function listarProducto()
	{
		$sql_listar='SELECT * FROM producto';
		$consulta_preparada=conexion::conectar()->prepare($sql_listar);
		$consulta_preparada->execute();

		return $consulta_preparada->fetchAll();

		$consulta_preparada->close();
    	$consulta_preparada=null;
	}
}
?>