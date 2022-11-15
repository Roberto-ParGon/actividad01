<!DOCTYPE html>

<?php
    session_start();
    include_once('./public/php/connection.php');
    $id = 2;


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
          <span>Modificar Usuarios</span>
        </div>

        <!-- Loans Table -->
        <div class="loans-container scrollbar">

          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

            <p>

              <p> Modificar su ID:
                <input type="text" value="<?= $id ?>" id ="id" name="id_usuario" disabled><br>
              </p>

              <p>Modificar su nombre:
                <input type="text" id ="nombre" name="nombre_usuario"><br>
              </p>

              <p>Modificar su apellido:
                <input type="text" id ="apellido" name="apellido_usuario"><br>
              </p>

              <p>Modificar su nickname:
                <input type="text" id ="nickmane" name="nickname_usuario"><br>
              </p>

              <p>Modificar su contraseña:
                <input type="text" id ="contraseña" name="contra_usuario"><br>
              </p>

              <p>¿Es administrador?

                <select name="is_admin">
                  <option value="1">Sí</option>
                  <option value="0">No</option>
                </select><br>

              </p>

              <p id="button">
                <input class="send" type="submit" value="Guardar Cambios" name="add_device">
                <a href="#" class="cancel">Cancelar Cambios</a>
              </p>

            </p>

          </form>

        </div>

        <a class="home-btn" href="#">
          <span class="material-symbols-outlined md">home</span>
        </a>

      </main>

    </div>

    <script src="public/js/lista-prestamos/header.js"></script>
    <script>
        const btnEnviar = document.querySelector('.send');
       // btnEnviar.addEventListener("click", (e) => e.preventDefault());
    </script>

  </body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $database = new Connection();
    $db = $database->open();
    
    try{
    
        //$id = $_POST["id_usuario"];
        $nombre = $_POST["nombre_usuario"];
        $apellido = $_POST["apellido_usuario"];
        $nickname = $_POST["nickname_usuario"];
        $contra = $_POST["contra_usuario"];
        $admin = $_POST["is_admin"];
           
           
        
        $_GRABAR_SQL = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', nickname='$nickname', contrasena='$contra', is_admin='$admin' WHERE id='$id'";
        $data = $db->query( $_GRABAR_SQL);  
        $hi = $data -> fetchAll();
        
    }

    catch(PDOException $e){
        
      $_SESSION['message'] = $e->getMessage();   
    }

    $database->close();
}
?>