<form method="post" id="formulario">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input name="correo" type="email" class="form-control"aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Nunca compartiremos tu email.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
    <input name="nombre" type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input name="contraseña" type="password" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Reingrese la contraseña</label>
    <input name= contraseña2 type="password" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Registrarse</button>
</form>
<div class="mt-3", id="respuesta">
</div>
<div id="resp"></div>

<script type="text/javascript">

var formularios = document.getElementById('formulario')
var respuesta = document.getElementById('respuesta')
formularios.addEventListener('submit',function(event)
{
event.preventDefault();

var datos = new FormData(formularios);

fetch('DAL/UsuarioDAL.php',{method:'POST',body:datos})
.then(response => response.text())
.then(data =>{

  if(data==='REGISTRADO CON EXITO')
  {
    respuesta.innerHTML = '<div class="alert alert-success" role="alert">'+String(data)+'</div>'
  }
  else
  {
    respuesta.innerHTML ='<div class="alert alert-danger" role="alert">'+String(data)+'</div>'
  }

});
})
</script>
