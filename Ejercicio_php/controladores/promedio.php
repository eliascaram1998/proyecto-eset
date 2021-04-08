<?php
	require_once '../empresa.php';
	$empleado=new empresa();
	$val=$empleado->promedio();
	echo $val;
?>