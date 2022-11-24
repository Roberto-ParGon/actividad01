<?php 
  header('Content-Type: application/json');
  $PROJECT_NAME = "/prestamos";
  $INC_DIR = $_SERVER["DOCUMENT_ROOT"] . $PROJECT_NAME ."/public/php/";
  require_once($INC_DIR.'connection.php');

  $database = new Connection();
  $db = $database->open();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //recuperacion de la solicitud POST
    $resultado = json_decode(file_get_contents("php://input"));
    echo json_encode($resultado);
  }
?>
