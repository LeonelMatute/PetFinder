<form method="post" id="formularioAM">
  <div class = "mb-3">
    <label for="exampleInputEmail1" class="form-label">Ingrese su nombre</label>
    <input name="correo" type="email" class="form-control">
    Seleccione el tipo de mascota:
    <select id="Tmascotas" class="form-select" name = "Tmascotas" onchange="CargarRaza()">
    </select>
    Seleccione la raza:
    <select id="raza" class="form-select">
    </select>
    <label for="exampleInputEmail1" class="form-label">L</label>
    <input name="correo" type="email" class="form-control">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input name="correo" type="email" class="form-control">
    <label for="formFileMultiple" class="form-label">Seleccione una imagen</label>
    <input  id ="capturadorIMG" class="form-control" type="file" id="formFileMultiple" accept="image/png, image/gif, image/jpeg">
    <label for="exampleColorInput" class="form-label">Color Primario</label>
    <input id="color1" type="color" class="form-control form-control-color" value="#000" title="Choose your color">
    <label for="exampleColorInput" class="form-label">Color Secundario</label>
    <input id= "color2" type="color" class="form-control form-control-color" value="#000" title="Choose your color">
  </div>
    <input type="submit" value="Registrar" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" onclick="CargarModal(event);">
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mt-3", id="respuestaModel">
        </div>
        <label id = "modelTMascota" class="form-label"></label>
        <img id="imagenCargada"  width="400" height="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript" onload="CargarTipos(event);">

function CargarTipos()
{

var formularios = document.getElementById('formularioAM')

fetch('DAL/TipoMascotaDAL.php',{method:'post'})
.then(response => response.json())
.then(data =>{

      var array = data;
      var tiposmascotas = document.getElementById('Tmascotas');
      for(var i=0;i<array.length;i++)
      {
      var opt = document.createElement("option");
      opt.text = String(array[i])
      tiposmascotas.add(opt,tiposmascotas[i]);
      }


})
}
CargarTipos();

function CargarRaza()
{
  var formularios = document.getElementById('formularioAM')
  var datos = new FormData(formularios);
  var valor = document.getElementById('Tmascotas').value;
  datos.append("tipomascota",valor);
  //var datos = valor;
  fetch('DAL/RazaDAL.php',{method:'post',body:datos})
  .then(response => response.json())
  .then(data =>{

        var array = data;
        var raza = document.getElementById('raza');
        for (i = length; i >= 0; i--) {
          raza.options[i] = null;
        }
        for(var i=0;i<array.length;i++)
        {
        var opt = document.createElement("option");
        opt.text = String(array[i])
        raza.add(opt,raza[i]);
        }


  })
}

function CargarModal(event)
{
  event.preventDefault();
  var imagen = document.getElementById('imagenCargada');
  var capturador = document.getElementById('capturadorIMG');
  const [file] = capturador.files;
  imagen.src = URL.createObjectURL(file);
  var modelTMascota = document.getElementById('Tmascotas').value;
  var modelRaza = document.getElementById('raza').value;
  var respuesta = document.getElementById('respuestaModel');
  respuesta.innerHTML ='<div>Tipo mascota: '+String(modelTMascota)+'</div>'
  +'<div>Raza: '+String(modelRaza)+'</div>'+'Color Primario <br/>'+'<input type="color" class="form-control form-control-color" value="'+document.getElementById('color1').value+'" disabled>' +
'Color Secundario<input type="color" class="form-control form-control-color mb-3" value="'+document.getElementById('color2').value+'" disabled>';
 };


</script>
