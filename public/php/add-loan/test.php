<?php
  header('Content-Type: application/json');

  $response = ['success' => false, 'errorCode' => 'DB_ERROR', 'errorMessage' => 'error error error'];
  echo json_encode($response);
  die;
?>