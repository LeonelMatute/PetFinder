<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>PetFinder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>

  <!-- <style>
        img{
        width: 100%;
      }
      body {
      background: url("Imagenes/DSC01940.JPG");
      background-size: cover;
      background-repeat: no-repeat;
      margin: 0;
      height: 100vh;
      }
  </style> -->

  <body>

    <nav>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#inicio" type="button" role="tab" aria-controls="home" aria-selected="true" onclick="LogIn()">Inicio</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#registro" type="button" role="tab" aria-controls="messages" aria-selected="false">Registro</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="mapa-tab" data-bs-toggle="tab" data-bs-target="#mapa" type="button" role="tab" aria-controls="profile" aria-selected="false">Mapa</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="cuenta-tab" data-bs-toggle="tab" data-bs-target="#cuenta" type="button" role="tab" aria-controls="settings" aria-selected="false">Mi cuenta</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="altamascotas-tab" data-bs-toggle="tab" data-bs-target="#AltaMascota" type="button" role="tab" aria-controls="settings" aria-selected="false">Alta Mascota</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="listado-tab" data-bs-toggle="tab" data-bs-target="#ListadoMascota" type="button" role="tab" aria-controls="settings" aria-selected="false" onclick="ListarMascotas()">Listado Mascota</button>
        </li>
      </ul>

    </nav>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="inicio" role="tabpanel" aria-labelledby="home-tab">
        <!--<img src="Imagenes/DSC01940.JPG" alt="Furia tomando sol" width="400" height="400">-->
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" alt="">
        </div>
        <!--MAPA-->
        <div class="tab-pane" id="mapa" role="tabpanel" aria-labelledby="profile-tab">
          <?php
          include "Mapa.php";
          ?>
        </div>
        <!--LISTADO MASCOTA-->
        <div class="tab-pane m-2" id="ListadoMascota" role="tabpanel" aria-labelledby="messages-tab">
          <?php
          include "ListadoMascota.php";
          ?>
        </div>
        <!--REGISTRAR USUARIOS-->
        <div class="tab-pane m-2" id="registro" role="tabpanel" aria-labelledby="settings-tab">
          <?php
           include "Registro.php";
           ?>
        </div>
        <!--INGRESAR AL SISTEMA-->
        <div class="tab-pane m-2" id="cuenta" role="tabpanel" aria-labelledby="altamascotas-tab">
          <?php
            include "MiCuenta.php";
           ?>
        </div>
        <!--ALTA MASCOTA-->
        <div class="tab-pane m-2" id="AltaMascota" role="tabpanel" aria-labelledby="listado-tab">
          <?php
          include "AltaMascota.php";
           ?>
        </div>

      </div>
    <script type="text/javascript">
    var usuario = null
    if (usuario === null)
    {
    document.getElementById('cuenta-tab').style.display = 'none';
    }
    else
    {
      document.getElementById('cuenta-tab').style.display = 'block';
    }

    function LogIn()
    {
      document.getElementById('cuenta-tab').style.display = 'block';
    }


    </script>
  </body>
</html>
