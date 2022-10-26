<?php
  include_once('public/php/lista-prestamos/PrestamosController.php');

  $controller = new PrestamosController();
  $prestamos = $controller->getPrestamosInfo();
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
      <span class="title">Sistema de préstamos</span>

      <!-- User Icon -->
      <div class="user">
        <span class="material-symbols-outlined md">person</span>
      </div>
    </header>

    <!-- Main Section -->
    <main>
      <!-- Title -->
      <div class="title">
        <span>Lista de prestamos activos</span>
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
                <td><?= $prestamo['materia'] ?> </td>
                <td><?= $prestamo['aula'] ?> </td>
                <td><?= $prestamo['horario_entrada'] ?> </td>
                <td><?= $prestamo['horario_salida'] ?> </td>
                <td><?= $prestamo['fecha'] ?> </td>
                <td>
                  <ul>
                    <?php 
                      foreach($prestamo['dispositivos'] as $dispositivo) {
                        echo "
                          <li>{$dispositivo['nombre']}</li>
                        ";
                      }
                    ?>
                  </ul>
                </td>
                <td>
                  <?php 
                    if($prestamo['id_alumno'] !== NULL) {
                      echo $prestamo['alumno'][0]['nombre'];
                    } 
                  ?> 
                </td>
              </tr>
              <?php
            }
          ?>
        </table>
      </div>

      <a class="home-btn" href="#">
        <span class="material-symbols-outlined md">home</span>
      </a>
    </main>
  </div>

  <script src="public/js/lista-prestamos/header.js"></script>
</body>
</html>

