<?php

class BaseDatos
{
	
	static public function Conexion()
	{
		$cadena="mysql:host=localhost;dbname=fpdf";
		$usuario="root";
		$password="";
		
		$pdo = new PDO($cadena,$usuario,$password);
		$pdo->exec("set name utf8");

		return $pdo;

	}
}

/**
 * 
 */
class Productos 
{
	
	static public function TraerProductos()
	{
		$sql_consulta = 'SELECT * FROM productos';
		$consulta_preparada = BaseDatos::Conexion()->prepare($sql_consulta);
		$consulta_preparada->execute();

		return $consulta_preparada->fetchAll();	

		$consulta_preparada->close();
		$consulta_preparada = "";
	}
}

?>