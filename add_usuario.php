<!DOCTYPE html>

<?php
  session_start();
  $isAdmin = $_SESSION['is_admin'];

  if (!isset($isAdmin)) {
    header('location: index.php');
    return;
  }

  if (!boolval($isAdmin)) {
    echo "Solo administradores";
    return;
  }
?>

<?php

include_once('./public/php/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $database = new Connection();
  $db = $database->open();

  if (isset($_POST['add_device'])) {
    try{
      $nombre = $_POST["nombre_usuario"];
      $apellido = $_POST["apellido_usuario"];
      $nickname = $_POST["nickname_usuario"];
      $contra = $_POST["contra_usuario"];
      $admin = $_POST["is_admin"];

      if (empty($nombre) || empty($apellido) || empty($nickname) || empty($contra) || empty($admin)) {
        echo "<SCRIPT> alert('No dejes campos vacios'); document.location=('add_usuario.php'); </SCRIPT>";
      } else {
        $_GRABAR_SQL = "INSERT INTO usuario (nombre, apellido, nickname, contrasena, is_admin) VALUES('$nombre', '$apellido', '$nickname', '$contra', '$admin')";
        $data = $db->query( $_GRABAR_SQL);
        $hi = $data -> fetchAll();

        if(!$hi){
          header("location: lista_usuarios.php");
        } else{
          echo "<SCRIPT> alert('Error'); document.location=('mod_usuarios.php'); </SCRIPT>";
        }
      }
    } catch(PDOException $e){
      $_SESSION['message'] = $e->getMessage();   
    }
  }


  /*
  insert into usuario (nombre, apellido, nickname, contrasena, is_admin) values (
  "cesar",
  "vallejo",
  "admin2",
  "1234",
  true
);
  */
}
?>

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
    
    <style>
      .cancel {
        margin-left: .5rem;
      }

      .enviar {
        display: flex;
        background-color:#5cc23a;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:Arial;
        font-size:18px;
        padding:10px 14px;
        text-decoration:none;
        text-shadow:-1px 2px 1px #810e05;
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
        <span class="title-header">Sistema de préstamos</span>

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
        <div class="title" id="ventana">
          <span>Añadir Usuarios</span>
        </div>

        <!-- Loans Table -->
        <div class="loans-container scrollbar">

          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

            <p>

              <p>Agregar su nombre:
                <input type="text" id ="nombre" name="nombre_usuario"><br>
              </p>

              <p>Agregar apellido:
                <input type="text" id ="apellido" name="apellido_usuario"><br>
              </p>

              <p>Agregar nickname:
                <input type="text" id ="nickmane" name="nickname_usuario"><br>
              </p>

              <p>Agregar contraseña:
                <input type="text" id ="contraseña" name="contra_usuario"><br>
              </p>

              <p>¿Es administrador?

                <select name="is_admin">
                  <option value="1">Sí</option>
                  <option value="0">No</option>
                </select><br>

              </p>

              <p id="button">
                <input class="enviar" type="submit" value="Guardar Cambios" name="add_device">
              </p>

            </p>

          </form>

        </div>

        <a class="home-btn" href="lista_usuarios.php">
          <span class="material-symbols-outlined md">arrow_back_ios</span>
        </a>

      </main>

    </div>

    <script src="public/js/lista-prestamos/header.js"></script>
  </body>

</html>

