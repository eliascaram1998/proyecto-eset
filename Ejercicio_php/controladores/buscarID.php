<?php
	require_once '../empresa.php';
	$id=$_GET["id"];
	$empleado=new empresa();
	$val=$empleado->buscarID($id);
	echo $val;
?>