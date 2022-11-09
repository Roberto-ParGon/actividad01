<?php
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

        <p>
          <p> Modificar su ID:
            <input type="text" id ="id" name="id_dispositivo"><br></p>
            <p>Modificar su nombre:
              <input type="text" id ="nombre" name="nombre_dispositivo"><br></p>
              <p> 
               Modificar su tipo:
               <input type="text" id ="tipo" name="tipo"><br></p>
             </p>

             <p id="button">
              <a href="#" class="cancel">Eliminar dispositivo</a>
              <a href="#" class="edit">Guardar cambios</a>
            </p>

          </div>

          <a class="home-btn" href="#">
            <span class="material-symbols-outlined md">home</span>
          </a>
        </main>
      </div>

      <script src="public/js/lista-prestamos/header.js"></script>
    </body>
    </html>

