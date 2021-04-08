<?php
	require_once '../programador.php'; //Importa la clase programador
	$nombre=$_POST["nombre"]; // Obtiene los inputs enviados con POST
	$apellido=$_POST["apellido"];
	$edad=$_POST["edad"];
	$lenguaje=$_POST["lenguaje"];
	$empleado=new programador($nombre,$apellido,$edad,$lenguaje); //Crear objeto de clase programador
	$val=$empleado->agregar_empleado($nombre,$apellido,$edad,$lenguaje,1); //Llama a el método agregar empleado heredado de la clase empresa
	echo $val;
?>