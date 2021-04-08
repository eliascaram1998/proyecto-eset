<?php
require_once "empresa.php"; //Importo la clase empresa
class diseñador extends empresa { //Hereda la clase empresa
	private $id;
	private $nombre;
	private $apellido;
	private $edad;
	private $tipo;
	function __construct($nombre,$apellido,$edad,$tipo) //Método constructor 
  {
      $this->nombre = $nombre;
      $this->apellido=$apellido;
      $this->edad=$edad;
      $this->tipo=$tipo;
  }
}
?>