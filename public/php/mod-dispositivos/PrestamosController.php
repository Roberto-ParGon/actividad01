<?php
include_once('public/php/connection.php');

class PrestamosController {
	private $database = null;
	private $db = null;

	function __construct() {
		$this->database = new Connection();
		$this->db = $this->database->open();


	}

	public function getPrestamosInfo() {


		try{
			$id = $_GET['id'];
			$nombre = $_POST['nombre'];
			$cantidad = $_POST['cantidad'];
			$comentarios = $_POST['observaciones'];


			$sql = "UPDATE dispositivo SET nombre = '$nombre', cantidad = '$cantidad', comentarios = '$comentarios' WHERE id = '$id'";
      // declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Los datos se actualizaron' : 'Ocurrio un error. No se pudo actualizar';

		}

		catch(PDOException $e){
			return false;
		}

		//cerrar conexión 
		$database->close();
	}





/*
		$sql = "SELECT * FROM prestamo";
		$prestamos = $this -> fetch($sql);

		foreach($prestamos as $key => $prestamo) {
			$sql = "
			SELECT d.id, d.nombre, d.cantidad, d.observaciones
			FROM dispositivo_prestado AS dp
			INNER JOIN dispositivo AS d ON dp.id_dispositivo=d.id
			WHERE dp.id_prestamo={$prestamo['id']}
			";

			$prestamos[$key]['dispositivos'] = $this->fetch($sql);
			if($prestamos[$key]['id_alumno'] !== NULL) {
				$sql = "
				SELECT nombre, apellidoPaterno, apellidoMaterno
				FROM alumno 
				WHERE matricula={$prestamos[$key]['id_alumno']}
				";

				$prestamos[$key]['alumno'] =  $this->fetch($sql);
			}
		}

		if($prestamos[$key]['id_profesor'] !== NULL) {
			$sql = "
			SELECT nombre
			FROM profesor
			WHERE noPersonal={$prestamos[$key]['id_profesor']}
			";

			$prestamos[$key]['profesor'] = $this->fetch($sql);
		}

		return $prestamos;
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


*/

}


?>