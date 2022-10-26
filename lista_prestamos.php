<?php
  include_once('public/php/connection.php');
  
  $medicos = null;

  $database = new Connection();
  $db = $database -> open();

  try {  
    $sql = 'SELECT * FROM medico';
    $medicos = $db->query($sql);
  }
  catch(PDOException $e){
    echo "There is some problem in connection: " . $e->getMessage();
  }

  //cerrar conexión
  $database->close();
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
            <th>Nombre</th>
            <th>Apellido</th>
            <th>EE</th>
            <th>Aula</th>
            <th>Hora de Inicio</th>
            <th>Hora de entrega</th>
            <th>Fecha</th>
            <th>Dispositivos</th>
          </tr>

          <?php 
            for ($i=0; $i < 20; $i++) { 
              
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

