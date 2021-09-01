<?php
include_once 'Conectar.php';
try
{
  /*function CargarRazaMascota()
  {

    $conn = OpenConnection();

      $tmascota = $_POST['value'];
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

    }*/



    function CargarRazaMascota()
    {
    $tmascota = $_POST['tipomascota'];
    $datos = array('Siames','Caniche' );
    echo json_encode($datos);
    }

    CargarRazaMascota();

  }
catch(Exception $e)
{
    echo('Error!');
}
 ?>
