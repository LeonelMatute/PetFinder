<<<<<<< HEAD
<?php
include_once 'Conectar.php';
try
{
  function CargarRazaMascota()
  {

    $conn = OpenConnection();

      print_r($_POST);
      $tmascota = $_POST;
      echo json_encode($tmascota);

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
=======
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
>>>>>>> afd6700853523ca1140e4b36f7333e109c4e40be
