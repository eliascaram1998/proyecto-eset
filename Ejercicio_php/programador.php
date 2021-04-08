<?php
require_once "empresa.php";
class programador extends empresa { //Defino como clase hija de empresa 
  private $id;
  public $nombre;
  public $apellido;
  protected $edad;
  public $lenguaje;
  function __construct($nombre,$apellido,$edad,$lenguaje)
  {
       $this->nombre = $nombre;
       $this->apellido=$apellido;
       $this->edad=$edad;
       $this->lenguaje=$lenguaje;
  }
}
?>