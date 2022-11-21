<?php
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

  <!-- React -->
  <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
  <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>

  <!-- React Select -->
  <script src="https://unpkg.com/prop-types@15.7.2/prop-types.js"></script>
  <script src="https://unpkg.com/classnames@2.2.6/index.js"></script>
  <script src="https://unpkg.com/react-input-autosize@2.2.2/dist/react-input-autosize.js"></script>
  <script src="https://unpkg.com/emotion@10.0.27/dist/emotion.umd.min.js"></script>
  <script src="https://unpkg.com/react-select@2.4.4/dist/react-select.js"></script>

  <!-- MUI Components -->
  <script src="https://unpkg.com/@mui/material@latest/umd/material-ui.production.min.js"></script>
  
  <!-- Babel -->
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

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

    .main-container {
      grid-template-rows: 82vh 1fr !important;
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
    <main class="main-container">
      <div>
        <div id="root"></div>       
      </div>
      <a class="home-btn" href="#">
        <span class="material-symbols-outlined md">add</span>
      </a>
    </main>
  </div>

  <script src="public/js/lista-prestamos/header.js"></script>
  
  <!-- Components -->
  <script src="public/js/add-prestamo/components/ListInput.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/components/MultiSelector.js" type="text/babel"></script>

  <!-- Features -->
  <script src="public/js/add-prestamo/features/DeviceSelector.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/features/StudentSelector.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/features/TeacherSelector.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/features/HoursSelector.js" type="text/babel"></script>

  <script src="public/js/add-prestamo/features/CreateLoanFeature.js" type="text/babel"></script>

  <!-- App -->
  <script src="public/js/add-prestamo/app.js" type="text/babel"></script>
</body>
</html>
