<?php
  session_start();
  $isAdmin = $_SESSION['is_admin'];
  $idUsuario = $_SESSION['id'];

  if (!isset($isAdmin)) {
    header('location: index.php');
    return;
  }

  include_once('public/php/lista-prestamos/PrestamosController.php');

  $controller = new PrestamosController();
  $prestamos = $controller->getAllMyPrestamosInfo($idUsuario);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id='';
    foreach($_POST as $name => $content) {
      $id = $name;
    }

    $res = $controller->regresarPrestamo($id);

    if (!$res) {
       echo "<SCRIPT> alert('Algo salió mal'); document.location=('home.php'); </SCRIPT>";
    }

    header("location: lista_prestamos.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Lista de préstamos</title>

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
            <a href="home.php">
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="mis_prestamos.php">
              <span>Mis prestamos</span>
            </a>
          </li>
          <li>
            <a href="lista_prestamos.php">
              <span>Prestamos activos</span>
            </a>
          </li>

          <?php 
            if (boolval($isAdmin)) {
              ?>
              <li>
                <a href="all_prestamos.php">
                  <span>Todos los prestamos</span>
                </a>
              </li>
              <li>
                <a href="lista_dispositivos.php">
                  <span>Dispositivos</span>
                </a>
              </li>
              <li>
                <a href="lista_usuarios.php">
                  <span>Usuarios</span>
                </a>
              </li>
              <?php
            }
          ?>
        </ul>
      </nav>

      <!-- Logo -->
      <span class="title">Sistema de préstamos</span>

      <!-- User Icon -->
      <div class="user">
        <a href="logout.php" style="color: #212121;">
          <span class="material-symbols-outlined md">logout</span>
        </a>
      </div>
    </header>

    <!-- Main Section -->
    <main>
      <!-- Title -->
      <div class="title">
        <span>Mis prestamos</span>
      </div>

      <!-- Loans Table -->
      <div class="loans-container scrollbar">
        <table>
          <tr>
            <th>Profesor</th>
            <th>EE</th>
            <th>Aula</th>
            <th>Hora de Inicio</th>
            <th>Hora de entrega</th>
            <th>Fecha</th>
            <th>Dispositivos</th>
            <th>Alumno</th>
          </tr>

          <?php 
          foreach ($prestamos as $prestamo) { 
            ?>
            <tr>
              <td><?= $prestamo['profesor'][0]['nombre'] ?> </td>
              <td><?= $prestamo['materia'][0]['nombre'] ?> </td>
              <td><?= $prestamo['aula'][0]['nombre'] ?> </td>
              <td><?= $prestamo['horario_entrada'] ?> </td>
              <td><?= $prestamo['horario_salida'] ?> </td>
              <td><?= $prestamo['fecha'] ?> </td>
              <td>
                <ul>
                  <?php 
                  foreach($prestamo['dispositivos'] as $dispositivo) {
                    echo "
                    <li>{$dispositivo['nombre']} ({$dispositivo['prestado']})</li>
                    ";
                  }
                  ?>
                </ul>
              </td>
              <td>
                <?php 
                  if($prestamo['id_alumno'] !== NULL) {
                    echo $prestamo['alumno'];
                  } 
                ?> 
              </td>
              <?php 
                if ($prestamo['is_active'] === 1) {
                  ?>
                  <td>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                      <input type="submit" value="Regresar" name="<?= $prestamo['id'] ?>">
                    </form>
                  </td>
                  <?php
                }
              ?>
            </tr>
            <?php
          }
          ?>
          
        </table>
      </div>

      <a class="home-btn" href="home.php">
        <span class="material-symbols-outlined md">add</span>
      </a>
    </main>
  </div>

  <script src="public/js/lista-prestamos/header.js"></script>
</body>
</html>
