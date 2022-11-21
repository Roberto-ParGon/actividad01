<?php
  header('Content-Type: application/json');

  $PROJECT_NAME = "/prestamos";
  $INC_DIR = $_SERVER["DOCUMENT_ROOT"] . $PROJECT_NAME ."/public/php/";
  require_once($INC_DIR.'connection.php');

  $database = new Connection();
  $db = $database->open();

  try {
    $sql = "SELECT * FROM alumno";
    $data = $db->query($sql);

    $estudiantes = $data -> fetchAll();
  } catch(PDOException $e) {
    $estudiantes = false;
  }

  if (!$estudiantes) {
    $response = ['success' => false, 'error' => 'Algo salió mal'];
    echo json_encode($response);
    die;
  }

  $response = ['success' => true, 'students' => $estudiantes];
  echo json_encode($response);
  die;
?>
