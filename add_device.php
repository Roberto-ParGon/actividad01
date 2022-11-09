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
    
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <p>
                        ID:
                        <input type="text" id="id" name="ide">
                    </p>
                    <p>
                        Nombre:
                        <input type="text" id ="nombre" name="nombre_dispositivo">
                    </p>
                    <p> 
                        Cantidad:
                        <input type="number" id ="cantidad" name="cantidad" min="0" max="100">
                    </p>
                    <p>
                        Detalles:
                        <input type="text" id="detalles" name="detalles">
                    </p>

                    <p id="button">
                        <input class="send" type="submit" value="Añadir" name="add_device">
                        <a href="#" class="edit">Cancelar</a>
                    </p>
                </form>
        </main>
            <a class="home-btn" href="#">
                <span class="material-symbols-outlined md">home</span>
            </a>
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
  // collect value of input field
  $name = $_POST['detalles'];
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
}
?>