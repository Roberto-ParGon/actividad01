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
  <link rel="stylesheet" type="text/css" href="public/css/mod-dispositivos/mod-dispositivos.css">
  <link rel="stylesheet" type="text/css" href="public/css/mod-dispositivos/lista_usuarios.css">

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
        <span>Lista de usuarios</span>
      </div>

      <!-- Loans Table -->
      <div class="loans-container scrollbar">
        <table>
          <tr>
            <th>Nombre</th>
           <!-- Correo usuario - Adición pendiente 
            <th>Correo</th>
          -->
          <th>Administrador</th>  <!--Rol de usuario-->
        </tr>


        <?php 
        foreach ($prestamos as $usuario) { 
         ?>
         <tr>
           <td><?= $prestamo['nombre'] ?> </td>
           <td><?= $prestamo['is_admin'] ?> </td>
           <td>
            <td>
              <?php 
              if($prestamo['nom_usuario'] !== NULL) {
                echo $prestamo['usuario'][0]['nombre'];
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
      <span class="material-symbols-outlined">person_add</span>
    </a>
  </main>
</div>

<script src="public/js/lista-prestamos/header.js"></script>
</body>
</html>
