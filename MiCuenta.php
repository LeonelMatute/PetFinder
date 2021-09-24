  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Nunca compartiremos tu email.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
  </div>
  <button type="button" class="btn btn-primary" onclick="ProbarNull()">Probar Null</button>
  <br/>
  <label id = "MostrarLBL" class="m-3">Recordarme</label>
  <br/>
  <button type="button" class="btn btn-primary" onclick="ProbarUsuario()">Probar Usuario</button>

<script type="text/javascript">


function ProbarNull()
{
  fetch('DAL/UsuarioDAL.php')
  .then(response => response.json())
      .then(json => {
        var respuestaLBL = JSON.stringify(json);
        document.getElementById('MostrarLBL').innerHTML = " " + respuestaLBL

      })

}

function ProbarUsuario()
{
  fetch('DAL/UsuarioDAL.php?case=ZLATAN')
  .then(response => response.json())
      .then(json => {
        var respuestaLBL = JSON.stringify(json);
        document.getElementById('MostrarLBL').innerHTML = " " + respuestaLBL

      })

}

</script>
