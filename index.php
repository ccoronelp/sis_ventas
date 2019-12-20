<?php
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['cliente'])) {
  header("Location:login.php");
}


include_once("partes/header.php");
include_once("partes/bienvenido.php");
?>


<?php 
include_once("partes/footer.php");
?>