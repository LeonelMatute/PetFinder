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
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#inicio" type="button" role="tab" aria-controls="home" aria-selected="true">Inicio</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#registro" type="button" role="tab" aria-controls="messages" aria-selected="false">Registro</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#contacto" type="button" role="tab" aria-controls="profile" aria-selected="false">Mapa</button>
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
        <div class="tab-pane" id="contacto" role="tabpanel" aria-labelledby="profile-tab">
          <style>
          #map{ height: 400px; width: 100%;}
          </style>
          <div id="map">

          </div>
        </div>
        <!--LISTADO MASCOTA-->
        <div class="tab-pane m-2" id="ListadoMascota" role="tabpanel" aria-labelledby="messages-tab">
            <?php
            include "ListadoMascota.php";
            ?>
        </div>
        <!--REGISTRAR USUARIOS-->
        <div class="tab-pane m-2" id="registro" role="tabpanel" aria-labelledby="settings-tab">
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
        </div>
        <!--INGRESAR AL SISTEMA-->
        <div class="tab-pane m-2" id="cuenta" role="tabpanel" aria-labelledby="altamascotas-tab">
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">Nunca compartiremos tu email.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Recordarme</label>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
          </form>
        </div>
        <!--ALTA MASCOTA-->
        <div class="tab-pane m-2" id="AltaMascota" role="tabpanel" aria-labelledby="listado-tab">
          <?php
          include "AltaMascota.php";
           ?>
        </div>

      </div>


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
    <script>

    function initMap() {
      //MAP OPTIONS
      var options = {
        zoom:10,
        center:{lat: -34.672501,lng:-58.449722}
      }
      // NEW MAPP
      var map = new google.maps.Map(document.getElementById("map"),options);
      //ADD Marker
      var marker = new google.maps.Marker({position:{lat: -34.6,lng:-58.500},map:map});

      var infoWindow = new google.maps.InfoWindow({content:'<h1>Lynn MA</h1>'
      });

      marker.addListener('click', function(){
        infoWindow.open(map,marker);
      });
      }


    </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9B-oZ-uHrcS-xfWYoKCIpLopV3qOvEXk&callback=initMap&libraries=&v=weekly"></script>

  </body>
</html>
