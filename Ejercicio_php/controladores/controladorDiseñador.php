<?php
	require_once '../diseñador.php'; //Importa la clase diseñador
	$nombre=$_POST["nombre"]; // Obtiene los inputs enviados con POST
	$apellido=$_POST["apellido"];
	$edad=$_POST["edad"];
	$dise=$_POST["dise"];
	$empleado=new diseñador($nombre,$apellido,$edad,$dise);
	$val=$empleado->agregar_empleado($nombre,$apellido,$edad,$dise,2); //Crear objeto de clase diseñador
	echo $val;
?>