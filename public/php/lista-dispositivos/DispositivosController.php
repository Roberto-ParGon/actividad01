<?php
  include_once('public/php/connection.php');

  class DispositivosController {
    private $database = null;
    private $db = null;

    function __construct() {
      $this->database = new Connection();
      $this->db = $this->database->open();
    }

    public function getDispositivosInfo() {
      $sql = "SELECT * FROM dispositivo";
      $dispositivos = $this -> fetch($sql);

      return $dispositivos;
    }

    private function fetch($sql) {
      try {
        $data = $this->db->query($sql);
        return $data -> fetchAll();
      }
      catch(PDOException $e) {
        return false;
      }
    }

    public function close() {
      $this->database->close();
    }
  }
?>