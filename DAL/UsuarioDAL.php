<?php
include_once 'Conectar.php';
try
{
    $conn = OpenConnection();

      $email = $_POST['correo'];
      $contraseña  = $_POST['contraseña'];
      $contraseña2  = $_POST['contraseña2'];
      $nombre = $_POST['nombre'];

      $contraseña = password_hash(strval($contraseña),PASSWORD_DEFAULT);



      $sql = "EXEC InsertarUsuario '$email','$contraseña','$nombre'";


      $stmt = sqlsrv_prepare($conn, $sql);
    if (password_verify($contraseña2,$contraseña))
      {
        $resultado = sqlsrv_execute($stmt);
        $errores=sqlsrv_errors();
        if ($resultado!=true)
        {
          echo "ERROR";
        }
        else
        {
          echo "REGISTRADO CON EXITO";
        }
      }
      else
      {
        echo "Las contraseñas no coinciden";
      }

  }
catch(Exception $e)
{
    echo('Error!');
}
 ?>
