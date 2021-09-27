<div class="row">
    <div class="col">
      <table class="table shadow-sm">
        <thead>
          <tr>
            <th>Raza</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Color Primario</th>
            <th>Color Secundario</th>
            <th>Imagen</th>
          </tr>
        </thead>
        <tbody id="datos_tbody">
          <tr>
            <td class="text-center" colspan="6">
              <b>Sin registros</b>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<script type="text/javascript">

function ListarMascotas() {
  let tbody = $('#datos_tbody');
  fetch('DAL/MascotaDAL.php?case=listar')
  .then(response => response.json())
      .then(json => {
        if(json.error){
          throw new Error(json.error);
        }
        let rows = '';
        if(typeof json.datos == 'undefined'){
          tbody.html(`<tr>
            <td class="text-center" colspan="6">
              <b>Sin registros xD</b>
            </td>
          </tr>`);
          return;
        }
        json.datos.forEach((item, i) => {
          let image = new Image();
          let date = JSON.stringify(item.Fecha);
          image.src = item.Imagen;
          rows += `<tr>
                    <td>${item.Nombre_Raza}</td>
                    <td>${date.substring(9,19)}</td>
                    <td>${item.Estado}</td>
                    <td><input type="color" class="form-control form-control-color mb-3" value="${item.Color1}" disabled></td>
                    <td><input type="color" class="form-control form-control-color mb-3" value="${item.Color2}" disabled></td>
                    <td><img width="200" height="200" src="${image.src}"</td>
                  </tr>`;

        });
        tbody.html(rows);
      })
}

</script>
