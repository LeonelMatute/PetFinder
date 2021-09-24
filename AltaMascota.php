<form id="formularioAM" enctype="multipart/form-data">
  <div class = "mb-3">
    <label for="exampleInputEmail1" class="form-label">Ingrese su nombre</label>
    <input name="correo" type="email" class="form-control">
    Seleccione el tipo de mascota:
    <select id="Tmascotas" class="form-select" name = "Tmascotas" onchange="CargarRaza()">
    </select>
    Seleccione la raza:
    <select id="raza" class="form-select">
    </select>
    <label for="exampleInputEmail1" class="form-label">Fecha</label>

    <!--OBTENEMOS EL DIA-->
    <input id="fecha" name="fecha" type='date' class= "m-3" min='1899-01-01' max='2000-13-13'></input>
    <br>
    <label for="exampleInputEmail1" class="form-label">Estado</label>
    <select id = "estado" class="form-select" aria-label="Default select example">
      <option value="Perdido">Perdido</option>
      <option value="Encontrado">Encontrado</option>
    </select>
    <label for="formFileMultiple" class="form-label">Seleccione una imagen</label>
    <input  id ="capturadorIMG" name="foto_mascota" class="form-control mb-3" type="file" id="formFileMultiple" accept="image/png, image/jpeg">
    <div>
    <table class = "table table-bordered">
      <tr>
        <th scope="col">
          <label for="exampleColorInput" class="form-label">Color Primario</label>
          <input id="color1" name ="color1" type="color" class="form-control form-control-color" value="#000" title="Choose your color">
        </th>
        <th scope="col">
          <label for="exampleColorInput" class="form-label">Color Secundario</label>
          <input id= "color2" name="color2" type="color" class="form-control form-control-color" value="#000" title="Choose your color">
        </th>
      </tr>
    </table>
  </div>
  </div>
    <input type="submit" value="Registrar" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" onclick="CargarModal(event);">
</form>
<div class="mt-3", id="respuestaAM">
</div>
<div id="resp"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vista Previa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="respuestaModel">
        </div>
        <label id = "modelTMascota" class="form-label"></label>
        <img id="imagenCargada"  width="400" height="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="AltaMascota(event)">Guardar</button>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript" onload="CargarTipos();">

function CargarDiaMax() {
    let today = new Date();
    let dd = today.getDate();
    let mm = today.getMonth() + 1; //January is 0!
    let yyyy = today.getFullYear();

    if (dd < 10) {
       dd = '0' + dd;
    }

    if (mm < 10) {
       mm = '0' + mm;
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("fecha").setAttribute("max", today);
  }

CargarDiaMax()

function CargarTipos() {
  let formularios = document.getElementById('formularioAM')

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

function CargarRaza() {
  let formularios = document.getElementById('formularioAM')
  let datos = new FormData(formularios);
  let valor = document.getElementById('Tmascotas').value;
  datos.append("tipomascota",valor);
  //var datos = valor;
  fetch('DAL/RazaDAL.php',{method:'post',body:datos})
  .then(response => response.json())
  .then(data =>{

        let array = data;
        let raza = document.getElementById('raza');
        for (i = raza.length; i >= 0; i--) {
          raza.options[i] = null;
        }
        for(var i=0;i<array.length;i++)
        {
        let opt = document.createElement("option");
        opt.text = String(array[i])
        raza.add(opt,raza[i]);
        }


  })
}

function CargarModal(event) {
  event.preventDefault();
  let imagen = document.getElementById('imagenCargada');
  let capturador = document.getElementById('capturadorIMG');
  const [file] = capturador.files;
  imagen.src = URL.createObjectURL(file);
  let modelTMascota = document.getElementById('Tmascotas').value;
  let modelRaza = document.getElementById('raza').value;
  let respuesta = document.getElementById('respuestaModel');
  respuesta.innerHTML =(
  '<div class="row">'+
      '<div class="col">'+
      '<table class="table shadow-sm">'+
          '<thead>'+
            '<tr>'+
              '<th>'+'Tipo Mascota'+'</th>'+
              '<th>'+'Raza'+'</th>'+
              '<th>'+'Color Primario'+'</th>'+
              '<th>'+'Color Secundario'+'</th>'+
            '</tr>'+
          '</thead>'+
          '<tbody>'+
            '<tr>'+
                '<td>'+String(modelTMascota)+'</td>'+
                '<td>'+String(modelRaza)+'</td>'+
                '<td>'+'<input type="color" class="form-control form-control-color mb-3" value="'+document.getElementById('color1').value+'" disabled>'+'</td>'+
                '<td>'+'<input type="color" class="form-control form-control-color mb-3" value="'+document.getElementById('color2').value+'" disabled>'+'</td>'+
            '</tr>'+
          '</tbody>'+
        '</table>'+
      '</div>'+
    '</div>');

}


function AltaMascota(event) {
    event.preventDefault();
    let formularios = document.getElementById('formularioAM')
    var respuesta = document.getElementById('respuestaAM')
    let datos = new FormData(formularios);
    let raza = document.getElementById('raza').value;
    let estado = document.getElementById('estado').value;
    let alta = 'alta';
    datos.append("case",alta);
    datos.append("razaSelect",raza);
    datos.append("estado",estado);
    //datos.append("fecha")

    fetch('DAL/MascotaDAL.php',{method:'post',body:datos})
    .then(response => response.json())
    .then(data =>{
      if(data==='REGISTRADO CON EXITO')
      {
        respuesta.innerHTML = '<div class="alert alert-success" role="alert">'+String(data)+'</div>'
      }
      else
      {
        respuesta.innerHTML ='<div class="alert alert-danger" role="alert">'+String(data)+'</div>'
      }
      $('#exampleModal').modal('hide');
    })

  }

</script>
