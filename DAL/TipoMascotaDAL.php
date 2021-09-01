<?php
include_once 'Conectar.php';
try
{
/*  function CargarTipoMascota()
  {

    $conn = OpenConnection();

      $sql = "EXEC CargarTipoMascota";

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

    function CargarTipoMascota()
    {
      $rows = array('Perro','Gato' );
      echo json_encode($rows);
    }

    CargarTipoMascota();

  }
catch(Exception $e)
{
    echo('Error!');
}
 ?>
