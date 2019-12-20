<?php

<<<<<<< HEAD
class conexion{
	static public function conectar(){
		$cadena="mysql:host=localhost;dbname=bd_ventas";
		$usuario="root";
		$password="";
		$pdo = new PDO($cadena,$usuario,$password);

		$pdo->exec("set names utf8");

		return $pdo;
	}
}


/**
 * 
 */
class ModeloUsuario
{
	public static function insertarUsuario($nombres,$apellidos,$email,$password1,$rol)
	{
		$direccion ="";
		$sql_insertar = 'INSERT INTO cliente(u_nombres,u_apellidos,usuario,password,rol,direccion) VALUES(?,?,?,?,?,?)';
   		$consulta_preparada=conexion::conectar()->prepare($sql_insertar);
    	$valor=$consulta_preparada->execute(array($nombres,$apellidos,$email,$password1,$rol,$direccion));

    	return $valor;

    	$consulta_preparada->close();
    	$consulta_preparada=null;
	}
	public static function traerUsuario($usuario,$password)
	{
		$sql_consulta='SELECT * FROM cliente WHERE usuario=:usuario AND password=:password';
		$consulta_preparada=conexion::conectar()->prepare($sql_consulta);
		$consulta_preparada->execute(array(':usuario'=>$usuario,':password'=>$password));

		return $consulta_preparada->fetch();

		$consulta_preparada->close();
    	$consulta_preparada=null;
=======
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
>>>>>>> 572cfdc93437d830b63039e89aed16b2a3077427
	}
}

?>