<?php
include_once 'Conectar.php';
try
{

    //$conn = OpenConnection();

function AltaUsuario()
{
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

//AltaUsuario();

      // General singleton class.
class Singleton {
  // Hold the class instance.
  private static $instance = null;
  private $nombre = null;

  // The constructor is private
  // to prevent initiation with outer code.
  private function __construct($usuario)
  {
    $this->nombre = $usuario;
    
  }

  // The object is created from within the class itself
  // only if the class has no instance.
  public static function getInstance($usuario)
  {
    if (self::$instance == null)
    {
      self::$instance = new Singleton($usuario);
    }

    return self::$instance;
  }
  public function MostarNombre()
  {
    return $this->nombre;
  }
}

function PruebaSingleton()
{
  $usuario = null;
  if(isset($_GET['case']))
  {
    $usuario = $_GET['case'];

  }
  $ist = Singleton::getInstance($usuario);
  $respuesta = strval($ist->MostarNombre());

  echo json_encode($respuesta);
}
PruebaSingleton();
  }
catch(Exception $e)
{
    echo('Error!');
}
 ?>
