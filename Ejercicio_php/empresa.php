<?php
class Empresa {
    private $id; //Defino los atributos como privados
    private $nombre;
    private $empleados;
    
   	public function agregar_empleado($nombre,$apellido,$edad,$tipo,$op) //Método que agrega un empleado 
   	{
     $conn = mysqli_connect('localhost', 'root', '', 'empresa'); //Conexion a base de datos
      if (!$conn) { //Verificar si conexión es correcta
        die("Conexión Fallida: " . mysqli_connect_error());
      }
      if($op==1) { //Consulta que creara el registro para un programador
      $sql = "INSERT INTO empleados (nombre, apellido,edad,lenguaje) VALUES ('".$nombre."', '".$apellido."',".$edad.",'".$tipo."')";
      }
      else { //Consulta que creara el registro para un diseñador
        $sql = "INSERT INTO empleados (nombre, apellido,edad,tipo) VALUES ('".$nombre."', '".$apellido."',".$edad.",'".$tipo."')";
      }
        if (mysqli_query($conn, $sql)) { //Ejecuta el comando SQL
          return "OK";
        } 
        else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      mysqli_close($conn); //Cierra conexión
   	}
    public function listado() { //Imprime listado de empleados
      $conn = mysqli_connect('localhost', 'root', '', 'empresa');
      if (!$conn) {
        die("Conexión Fallida: " . mysqli_connect_error());
      }
      $sql = "SELECT * FROM empleados"; //Comando que selecciona registros
      $result = $conn->query($sql);
      $empleados = array();
      while($row =mysqli_fetch_assoc($result))
      {
        $empleados[] = $row;
      }
      return json_encode($empleados);
      mysqli_close($conn);
    }
    public function buscarID($id) { //Método que busca a un empleado por ID
      $conn = mysqli_connect('localhost', 'root', '', 'empresa');
      if (!$conn) {
        die("Conexión Fallida: " . mysqli_connect_error());
      }
      $sql = "SELECT * FROM empleados where id='".$id."'";
      $result = $conn->query($sql);
      $usuario = array();
      while($row =mysqli_fetch_assoc($result))
      {
        $usuario[] = $row;
      }
      return json_encode($usuario);
      mysqli_close($conn);
    }
    public function promedio() { //Método que obtiene el promedio de edad de los empleados
      $conn = mysqli_connect('localhost', 'root', '', 'empresa');
      if (!$conn) {
        die("Conexión Fallida: " . mysqli_connect_error());
      }
      $sql = "SELECT AVG(edad) as promedio FROM empleados";
      $result = $conn->query($sql);
      $row =mysqli_fetch_assoc($result);
      $promedio = $row['promedio'];
      return $promedio;
    }
}
?>