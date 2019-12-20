<?php 
include_once("conexion.php");

/**
 * 
 */
class ModeloLibro
{
	
	public static function insertarLibro($cliente_id,$fecha,$asunto,$detalle)
	{
		$sql_insertar = 'INSERT INTO libro_reclamaciones(cliente_id,fecha,asunto,detalle) VALUES (?,?,?,?)';
		$consulta_preparada=conexion::conectar()->prepare($sql_insertar);
		$valor=$consulta_preparada->execute(array($cliente_id,$fecha,$asunto,$detalle));

		return $valor;

		$consulta_preparada->close();
    	$consulta_preparada=null;
	}
	public static function listarLibro()
	{
		$sql_listar='SELECT * FROM libro_reclamaciones';
		$consulta_preparada=conexion::conectar()->prepare($sql_listar);
		$consulta_preparada->execute();

		return $consulta_preparada->fetchAll();

		$consulta_preparada->close();
    	$consulta_preparada=null;
	}
}

 ?>