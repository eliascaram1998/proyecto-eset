<html>
<head> <!--Defino la hoja de estilos, importo boostrap y importo jquery-->
  <title>Proyecto ESET</title>
  <link href="estilos/index.css" rel="stylesheet">
  <script src="js/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link href="estilos/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="shortcut icon" href="imagenes/icono.ico" />
</head>
<body> 
  <div class="row"> <!--Defino la columna-->
    <div class="col-md-12 col-xs-12 col-lg-12"> <!--Ocupara 12 rejillas en todos los tamaños de pantalla-->
      <div class="centrado">
        <label>
          <input type="radio" checked="checked" class="form-check-input" id="empleado" value="agregar" name="options"/>
        <label class="label" for="empleado">Agregar</label>
        </label>
        <label>
          <input type="radio" class="form-check-input" id="listado" value="listado" name="options"/>
        <label class="label" for="listado">Listado</label>
        </label>
        <label>
          <input type="radio" class="form-check-input" id="buscar" value="buscar" name="options"/>
          <label class="label" for="buscar">Buscar </label>
        </label>
        <label>
          <input type="radio" class="form-check-input" id="promedio" value="promedio" name="options"/>
        <label class="label" for="promedio">Promedio</label>
        </label>
      </div>
    </div>
    <div class="col-md-12 col-xs-12 col-lg-12">
      <div id="agregar">
        <form class="form-estandar" action="javascript:agregar();"><!--Agrego la clase form-estandar y defino la función javascript que ejecutará la misma-->
          <h1>Agregar Empleado</h1>
          <br>
          <div class="form-input-material">
            <input type="text" name="nombre" id="nombre" placeholder=" Nombre" autocomplete="off" class="form-control" required />
          </div><br>
          <div class="form-input-material">
            <input type="text" name="apellido" id="apellido" placeholder="Apellido " autocomplete="off" class="form-control" required />
          </div><br>
          <div class="form-input-material">
            <input type="number" name="edad" id="edad" placeholder="Edad " autocomplete="off" class="form-control" required />
          </div><br>
          <div class="form-input-material">
            <select class="form-control" style="width:310% !important;margin-left:-65px !important" name='tipo' id='tipo'>
              <option selected disabled>Seleccione tipo</option>
              <option>Programador</option>
              <option>Diseñador</option>
            </select><br>
          </div>
          <div class="form-input-material">
            <select class="form-control down" name='lenguaje' id='programador'>
              <option>PHP</option>
              <option>NET</option>
              <option>PYTHON</option>
            </select>
          </div>
          <div class="form-input-materia">
            <select class="form-control down" name='dise' id='diseñador'>
              <option>Grafico</option>
              <option>Web</option>
            </select>
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-ghost">Cargar</button>
        </form>
      </div>
    </div>
    <div class="col-md-12 col-xs-12 col-lg-12">
      <div class="table-responsive" id="listadoTable"> <!--Utilizo boostrap para indicar que la tabla será responsiva-->
        <table class="table">
          <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Lenguaje</th>
            <th>Tipo de diseñador</th>
          </thead>
          <tbody id="datos">
          </tbody>
          </table>
      </div>
    </div>
    <div class="col-md-12 col-xs-12 col-lg-12">
      <div id="buscarID">
        <form class="form-estandar" action="javascript:buscar();">
          <h3>Buscador por ID</h3>
          <div class="form-input-material">
            <input type="number" name="id" id="id" placeholder=" Ingrese ID" autocomplete="off" class="form-control" required /><br>
            <button type="submit" class="btn btn-primary btn-ghost">Buscar</button>
            <div>
              <p id="encontrado"></p>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-12 col-xs-12 col-lg-12">
      <div id="promedioCuadro">
        <h3><u>Promedio de edad</u></h3>
        <div class="form-input-material">
          <div>
            <p id="promedioEdad"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
  $(document).ready(function() { //Cuando inicia la página esconde todos los formularios menos agregar
    $("#listadoTable").hide();
    $("#buscarID").hide();
    $("#promedioCuadro").hide();
    $("#programador").hide();
    $("#diseñador").hide();
  });
  $('input:radio[name="options"]').change( //Muestra el formulario especificado
    function(){
        if (this.checked && this.value == 'agregar') {
            $("#buscarID").hide();
            $("#listadoTable").hide();
            $("#promedioCuadro").hide();
            $("#agregar").show(300);
        }
        else if (this.checked && this.value == 'listado') {
            mostrarListado();
            $("#buscarID").hide();
            $("#agregar").hide();
            $("#promedioCuadro").hide();
            $("#listadoTable").show(300);
        }
        else if (this.checked && this.value == 'buscar') {
            $("#listadoTable").hide();
            $("#agregar").hide();
            $("#promedioCuadro").hide();
            $("#buscarID").show(300);
        }
        else {
            promedio();
            $("#listadoTable").hide();
            $("#agregar").hide();
            $("#buscarID").hide();
            $("#promedioCuadro").show(300);
        }
  });
  function agregar() { //Función para agregar un empleado
    $tipo=document.getElementById('tipo').value;
    if ($tipo=='Programador') {
      $.ajax({
        type:"POST",
        data:$("form").serialize(),
        url: "controladores/controladorProgramador.php", 
        success: function(result){
          if (result=='OK') {
            reset();
          }
        }
      });
    }
    else {
      $.ajax({
        type:"POST",
        data:$("form").serialize(),
        url: "controladores/controladorDiseñador.php", 
        success: function(result){
          reset();
        }
      });
    }
  }
  function mostrarListado() { //Muestra un listado, consultando por método get
    $.ajax({
      type:"GET",
      url: "controladores/mostrarListado.php",
      dataType:"json", 
      success: function(listado){
        $("#datos").empty();
        console.log(listado);
        for (var i=0; i< listado.length; i++)
        {
          $("#datos").append('<tr><td>'+ listado[i].id+'</td><td>'+ listado[i].nombre+'</td><td>'+ listado[i].apellido+'</td><td>'+ listado[i].edad+'</td><td>'+ listado[i].lenguaje+'</td><td>'+ listado[i].tipo+'</td></tr>');
        }
      }
    });
  }
  function buscar() { //Envía la ID por el método get y responde si lo encontro o no.
    var id=$("#id").val();
    $.ajax({
      type:"GET",
      data:{id:id},
      url: "controladores/buscarID.php",
      dataType:"json", 
      success: function(usuario){
        console.log(usuario);
        if ($.isEmptyObject(usuario)) {
          $("#encontrado").html("Usuario no encontrado");
        }
        else {
          $("#encontrado").html("Usuario: "+usuario[0].nombre+" "+usuario[0].apellido+" encontrado con éxito");
        }
      }
    });
  }
  function promedio() { //Obtiene un promedio, consultandolo por método get
    $.ajax({
      type:"GET",
      url: "controladores/promedio.php",
      dataType:"json", 
      success: function(promedio){
        console.log(promedio);
        if (promedio==0) {
          $("#promedioedad").html("No hay registros en el sistema.");
        }
        else {
          $("#promedioEdad").html(promedio);
        }
      }
    });
  }
  function reset() { //Resetea los formularios para agregar programador o diseñador
    $("#nombre").val("");
    $("#apellido").val("");
    $("#edad").val("");
    $("#tipo").val( $('#tipo').find("option[selected]").val());
    $("#programador").hide();
    $("#diseñador").hide();
    alert("¡Usuario agregado con éxito!");       
  }
  $('#tipo').change(function() {
    if (this.value=='Programador') {
      $("#programador").show();
      $("#diseñador").hide();
    }
    else {
      $("#diseñador").show();
      $("#programador").hide();
    }
  });
</script>
</body>
</html>