<?php
	require_once '../empresa.php'; //Importa la clase empresa
	$empleado=new empresa(); //Crea un objeto de tipo empresa
	$val=$empleado->listado(); //Llama al método para generar listado
	echo $val;
?>