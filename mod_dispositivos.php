<?php
  session_start();
  $idUsuario = $_SESSION['id'];

  if (!isset($idUsuario)) {
    header('location: index.php');
  }  

  include_once('public/php/mod-dispositivos/ModDispositivoController.php');

  $controller = new ModDispositivoController();
  $idDispositivo;

  try {
    $idDispositivo = $_GET['id'];
  } catch (Exception $e) {
    $idDispositivo = $_POST['id'];
  }

  $dispositivo = $controller -> getDispositivoInfo($idDispositivo)[0];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['mod_device'])) {
      $nombre = $_POST['nombre_dispositivo'];
      $cantidad = $_POST['cantidad_dispositivo'];
      $observaciones = $_POST['comentarios_dispositivo'];
      $id = $_POST['id'];

      $res = $controller -> setDispositivoInfo($nombre, $cantidad, $observaciones, $id);

      header("location: lista_dispositivos.php");
    }

    if (isset($_POST['del_device'])) {
      $id = $_POST['id'];

      $res = $controller -> delDispositivo($id);
      header("location: lista_dispositivos.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Préstamos UV</title>

  <!-- Google Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- Google Roboto Font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <!-- Misc css -->
  <link rel="stylesheet" type="text/css" href="public/css/reset.css">
  <link rel="stylesheet" type="text/css" href="public/css/lista-prestamos/lista-prestamos.css">
  <link rel="stylesheet" type="text/css" href="public/css/lista-prestamos/header.css">
  <link rel="stylesheet" type="text/css" href="public/css/mod-dispositivos/mod-dispositivos.css">
  
</head>
<body>
  <div class="container">
    <!-- Header -->
    <header>

      <!-- Hamburguer Menu Button -->
      <nav class="hamburger-menu">
        <span class="material-symbols-outlined md">menu</span>

        <!-- Dropdown -->
        <ul>
          <li>
            <a href="#">
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span>Opción 2</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span>Opción 3</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- Logo -->
      <span class="title-header">Sistema de préstamos</span>

      <!-- User Icon -->
      <div class="user">
        <span class="material-symbols-outlined md">person</span>
      </div>
    </header>

    <!-- Main Section -->
    <main>
      <!-- Title -->
      <div class="title" id="ventana">
        <span>Modificar dispositivo</span>
      </div>

      <!-- Loans Table -->
      <div class="loans-container scrollbar">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <p> Modificar su ID:
            <input type="text" id ="id" class="form-control" name="id_dispositivo" value="<?= $dispositivo['id'] ?>"><br>
          </p>

          <p>
            Modificar su nombre:
            <input type="text" id ="nombre" class="form-control" name="nombre_dispositivo" value="<?= $dispositivo['nombre'] ?>">
            <br>
          </p>

          <p> 
            Cantidad disponible:
            <input type="text" id ="canatidad" name="cantidad_dispositivo" value="<?= $dispositivo['cantidad'] ?>"><br></p>
          </p>

          <p> 
            Comentarios:
            <input type="text" id ="comentarios" name="comentarios_dispositivo" value="<?= $dispositivo['observaciones'] ?>"><br></p>
          </p>

          <input type="hidden" name="id" value="<?= $dispositivo['id'] ?>" />
          <p id="button">
            <input class="cancel" type="submit" value="Eliminar Dispositivo" name="del_device">
            <input class="edit" type="submit" value="Guardar Cambios" name="mod_device">
          </p>
        </form>
      </div>

      <a class="home-btn" href="lista_dispositivos.php">
          <span class="material-symbols-outlined md">arrow_back_ios</span>
      </a>
    </main>
  </div>
  <script src="public/js/lista-prestamos/header.js"></script>
</body>
</html>

