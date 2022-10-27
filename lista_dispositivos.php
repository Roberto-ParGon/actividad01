<?php
  include_once('public/php/lista-dispositivos/DispositivosController.php');

  $controller = new DispositivosController();
  $dispositivos = $controller->getDispositivosInfo();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Lista de dispositivos</title>

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

  <style type="text/css">
    .f {
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 400,
      'GRAD' 0,
      'opsz' 48
    }
  </style>
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
        <span>Lista de dispositivos</span>
      </div>

      <!-- Loans Table -->
      <div class="loans-container scrollbar">
        <table>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Observaciones</th>
            <th></th>
          </tr>

          <?php 
            foreach ($dispositivos as $dispositivo) { 
              ?>
              <tr>
                <td><?= $dispositivo['id'] ?> </td>
                <td><?= $dispositivo['nombre'] ?> </td>
                <td><?= $dispositivo['cantidad'] ?> </td>
                <td><?= $dispositivo['observaciones'] ?> </td>
                <td>
                  <span class="material-symbols-outlined f">
                    edit_square
                  </span>
                </td>
              </tr>
              <?php
            }
          ?>
        </table>
      </div>

      <a class="home-btn" href="#">
        <span class="material-symbols-outlined md">add</span>
      </a>
    </main>
  </div>

  <script src="public/js/lista-prestamos/header.js"></script>
</body>
</html>

