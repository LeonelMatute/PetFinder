<?php
include_once 'Conectar.php';
try
{
  function CargarRazaMascota()
  {

    $conn = OpenConnection();

      $tmascota = $_POST['tipomascota'];
      $sql = "EXEC CargarRazaMascota '$tmascota'";

      $stmt = sqlsrv_query( $conn, $sql );
      if( $stmt === false) {
          print_r( sqlsrv_errors(), true);
      }
      else
      {
        $rows=array();
        while($row = sqlsrv_fetch_array($stmt))
            {$rows[] = $row['Nombre'];}


         echo json_encode($rows);
      }

    }

    CargarRazaMascota();

  }
catch(Exception $e)
{
    echo('Error!');
}
 ?>
