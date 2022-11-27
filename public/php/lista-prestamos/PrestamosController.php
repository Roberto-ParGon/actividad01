<?php
include_once('public/php/connection.php');

class PrestamosController {
  private $database = null;
  private $db = null;

  function __construct() {
    $this->database = new Connection();
    $this->db = $this->database->open();
  }

  public function regresarPrestamo($id) {
    try {
      // Cambiar estado del prestamo
      $sql = "UPDATE prestamo SET is_active=false WHERE id={$id}";
      $this->fetch($sql);

      // Obtener dispositivos asignados al prestamo
      $sql = "SELECT * from dispositivo_prestado WHERE id_prestamo={$id}";
      $dispositivosPrestados = $this->fetch($sql);

      foreach($dispositivosPrestados as $key => $dispositivoPrestado) {
        $idDispositivo = $dispositivoPrestado['id_dispositivo'];
        $sql = "
          UPDATE dispositivo 
          SET prestado=prestado-{$dispositivoPrestado['prestado']} 
          WHERE id='{$idDispositivo}'";
        $this->fetch($sql);
      }

      return true;
    }
    catch(Exception $e) {
      return false;
    }
  }

  public function getAllPrestamosInfo() {
    $sql = "SELECT * FROM prestamo";
    return $this -> getPrestamos($sql);
  }

  public function getPrestamosInfo() {
    $sql = "SELECT * FROM prestamo WHERE is_active=true";
    return $this -> getPrestamos($sql);
  }

  public function getAllMyPrestamosInfo($id) {
    $sql = "SELECT * FROM prestamo WHERE id_usuario={$id}";
    return $this -> getPrestamos($sql);
  }

  private function getPrestamos($sql) {
    $prestamos = $this -> fetch($sql);

    foreach($prestamos as $key => $prestamo) {
      $sql = "
      SELECT d.id, d.nombre, d.observaciones
      FROM dispositivo_prestado AS dp
      INNER JOIN dispositivo AS d ON dp.id_dispositivo=d.id
      WHERE dp.id_prestamo={$prestamo['id']}
      ";

      // Buscar dispositivos de cada prestamo
      $prestamos[$key]['dispositivos'] = $this->fetch($sql);

      //Buscar el alumno del prestamo
      if($prestamos[$key]['id_alumno'] !== NULL) {
        $matricula = $prestamos[$key]['id_alumno'];
        $sql = "
        SELECT nombre, apellidoPaterno, apellidoMaterno
        FROM alumno 
        WHERE matricula='{$matricula}'
        ";

        $alumno = $this->fetch($sql);
        $nombreAlumno = "{$alumno[0]['nombre']} {$alumno[0]['apellidoPaterno']} {$alumno[0]['apellidoMaterno']}";
        $prestamos[$key]['alumno'] = $nombreAlumno;
      }

      // Buscar profesor del prestamo
      if($prestamos[$key]['id_profesor'] !== NULL) {
        $sql = "
        SELECT nombre
        FROM profesor
        WHERE noPersonal={$prestamos[$key]['id_profesor']}
        ";

        $prestamos[$key]['profesor'] = $this->fetch($sql);
      }

      // Buscar materia
      $nrc = $prestamos[$key]['nrc_materia'];
      $sql = "SELECT nombre FROM materia WHERE nrc='{$nrc}'";
      $prestamos[$key]['materia'] = $this->fetch($sql);

      // Buscar aula
      $aula = $prestamos[$key]['id_aula'];
      $sql = "SELECT nombre FROM aula WHERE id={$aula}";
      $prestamos[$key]['aula'] = $this->fetch($sql);
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

  public function close() {
    $this->database->close();
  }
}
?>