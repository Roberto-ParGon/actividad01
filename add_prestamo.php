<?php
  session_start();
  $idUsuario = $_SESSION['id'];

  if (!isset($idUsuario)) {
    header('location: index.php');
  }

  $isAdmin = $_SESSION['is_admin'];
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
  <link rel="stylesheet" type="text/css" href="public/css/add-prestamo/add-prestamo.css">
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

    .main-container {
      grid-template-rows: 82vh 1fr !important;
    }

    .container-main {
      background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./images/nynight.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
    }

    .btn-salir {
background: #C33764;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #1D2671, #C33764);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #1D2671, #C33764); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */



    }
  </style>
</head>
<body>
  <div class="container-main">
    <header>
      <div class="title-wrapper f-start">
          <span>
              <button type="button" class="btn-atras mrgn-left" onclick="location.href='home.php'">Atrás</button>
          </span>
      </div>

      <div class="title-wrapper f-center">
          <span class="t-medium">
              Agregar Dispositivo
          </span>
      </div>

      <div class="title-wrapper f-end">
          <span>
              <button type="button" class="btn-salir mrgn-right" onclick="location.href='logout.php'">Cerrar Sesión</button>
          </span>
      </div>
    </header>

    <!-- Main Section -->
    <main class="main-container">
      <div id="root" data-usuario="<?= $idUsuario ?>"></div>
    </main>
  </div>
  
  <!-- Components -->
  <script src="public/js/add-prestamo/components/Input.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/components/ListInput.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/components/MultiSelector.js" type="text/babel"></script>

  <!-- Features -->
  <script src="public/js/add-prestamo/features/DeviceSelector.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/features/StudentSelector.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/features/TeacherSelector.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/features/HoursSelector.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/features/CoursesSelector.js" type="text/babel"></script>
  <script src="public/js/add-prestamo/features/ClassroomsSelector.js" type="text/babel"></script>

  <script src="public/js/add-prestamo/features/CreateLoanFeature.js" type="text/babel"></script>

  <!-- App -->
  <script src="public/js/add-prestamo/app.js" type="text/babel"></script>
</body>
</html>
