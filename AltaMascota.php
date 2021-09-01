<form method="post" id="formularioAM" >
  Ingrese su nombre:
  <input type="text" name="nombre" size="30"><br>
  Seleccione el tipo de mascota:
  <select id="Tmascotas" method='post' name = "Tmascotass" onchange="CargarRaza()">
  </select>
  Seleccione la raza:
  <select id="raza">
  </select>
  <br>
  <input type="submit" value="Enviar">
</form>


<script type="text/javascript" onload="CargarTipos(event);">

function CargarTipos()
{

var formularios = document.getElementById('formularioAM')
console.log('me diste click');

fetch('DAL/TipoMascotaDAL.php',{method:'post'})
.then(response => response.json())
.then(data =>{console.log(data)

      var array = data;
      var tiposmascotas = document.getElementById('Tmascotas');
      for(var i=0;i<array.length;i++)
      {
      console.log(String(array[i]));
      var opt = document.createElement("option");
      opt.text = String(array[i]);
      // then append it to the select element
      tiposmascotas.add(opt,tiposmascotas[i]);

      }


})
}
CargarTipos();

function CargarRaza()
{
  var formularios = document.getElementById('formularioAM')
  //var datos = new FormData(formularios);
  var valor = document.getElementById('Tmascotas')
  var datos = document.getElementById('Tmascotas').value;
  console.log(datos);
  fetch('DAL/RazaDAL.php',{method:'post',body:datos})
  .then(response => response.json())
  .then(data =>{console.log(data)

        var array = data;
        var raza = document.getElementById('raza');
        for(var i=0;i<array.length;i++)
        {
        console.log(String(array[i]))
        var opt = document.createElement("option");
        opt.text = String(array[i])

        // then append it to the select element
        raza.add(opt,tiposmascotas[i]);

        }


  })
}
</script>
