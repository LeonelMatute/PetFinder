<?php
include_once 'Conectar.php';
try
{
  $conn = OpenConnection();

$case = "";

if(isset($_GET["case"]))
{
  $case = $_GET["case"];
}
else
{
  $case = $_POST["case"];
}

switch ($case) {
  case 'alta':

    $raza = $_POST['razaSelect'];
    $fecha = $_POST['fecha'];
    $estado = $_POST['estado'];
    $color1 = $_POST['color1'];
    $color2 = $_POST['color2'];
    $imagen = file_get_contents($_FILES['foto_mascota']['tmp_name']);

    switch ($_FILES['foto_mascota']['type']) {
      case 'image/jpeg':
        $imageBase64 = 'data:image/jpeg;base64,' . base64_encode($imagen);
        break;

      case 'image/png':
        $imageBase64 = 'data:image/png;base64,' . base64_encode($imagen);
        break;
    }

    $sql = "exec InsertarMascota '$raza','$fecha','$estado','$color1','$color2','$imageBase64'";
    $stmt = sqlsrv_prepare($conn, $sql);
            $resultado = sqlsrv_execute($stmt);
            $errores=sqlsrv_errors();
            if ($resultado!=true)
            {
              echo json_encode("ERROR");
            }
            else
            {
              echo json_encode("REGISTRADO CON EXITO");
            }

    break;

    case 'listar':

      $sql = "EXEC ListarMascotas";

      $stmt = sqlsrv_query( $conn, $sql );
      if( $stmt === false) {
          print_r( sqlsrv_errors(), true);
      }
      else
      {
        $rows=array();
        $response = array();
        $i = 0;
        while($row = sqlsrv_fetch_array($stmt))
          {
            $response['datos'][$i]['Nombre_Raza'] = $row['Nombre_Raza'];
            $response['datos'][$i]['Fecha'] = $row['Fecha'];
            $response['datos'][$i]['Estado'] = $row['Estado'];
            $response['datos'][$i]['Color1'] = $row['Color1'];
            $response['datos'][$i]['Color2'] = $row['Color2'];
            $response['datos'][$i]['Imagen'] = $row['Imagen'];
            $i++;
          }




         echo json_encode($response);
      }

 }





}
catch(Exception $e)
{
    echo('Error!');
}
 ?>
