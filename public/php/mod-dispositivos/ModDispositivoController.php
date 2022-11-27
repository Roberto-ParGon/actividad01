<?php
include_once('public/php/connection.php');

class ModDispositivoController {
	private $database = null;
	private $db = null;

	function __construct() {
		$this->database = new Connection();
		$this->db = $this->database->open();
	}

	public function getDispositivoInfo($id) {
		try{
			$sql = "SELECT * FROM dispositivo WHERE id='$id'";
      $dispositivo = $this -> fetch($sql);
      return $dispositivo;
		} catch(PDOException $e){
			return false;
		}
	}

	public function setDispositivoInfo($nombre, $cantidad, $comentarios, $id) {
		try{
			$sql = "
				UPDATE dispositivo 
				SET nombre='$nombre', cantidad={$cantidad}, observaciones='$comentarios' 
				WHERE id='$id'
			";

			$this->fetch($sql);
			return true;
		} catch(PDOException $e) {
			return false;
		}
	}

	public function delDispositivo ($id) {
		try{
			$sql = "DELETE FROM dispositivo WHERE id='$id'";

			$this->fetch($sql);
			return true;
		} catch(PDOException $e) {
			return false;
		}	
	}

  private function fetch($sql) {
    try {
      $data = $this->db->query($sql);
      return $data -> fetchAll();
    }
    catch(PDOException $e){
      return false;
    }
  }
}

?>