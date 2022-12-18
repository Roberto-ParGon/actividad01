<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Préstamos UV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="public/css/home.css">
</head>
<body>
    <div class="container-home">
        <div class="header">
            <div class="title-wrapper">
                <span class="logo-op">
                    
                </span>
            </div>

            <div class="title-wrapper f-center">
                <span class="t-medium">
                    Inicio
                </span>
            </div>

            <div class="title-wrapper f-end">
                <span class="t-medium">
                    <button type="button" class="btn-salir mrgn-right" onclick="location.href='logout.php'">Salir</button>
                </span>
            </div>
        </div>    
        
        <main>
            <div class="card br-10">
                <header class="purple-pink">
                    <span class="t-medium">
                        Préstamos
                    </span>
                </header>

                <section class="option-list-container">
                    <ul>
                        <li>
                            <a class="purple-pink-hover purple-pink-border" href="add_prestamo.php">Crear Préstamo </a>
                        </li>
                        <li>
                            <a class="purple-pink-hover purple-pink-border" href="mis_prestamos.php">Ver Mis Préstamos</a>
                        </li>
                        <li>
                            <a class="purple-pink-hover purple-pink-border" href="lista_prestamos.php">Ver Préstamos Activos</a>
                        </li>
                        <li>
                            <a class="purple-pink-hover purple-pink-border" href="all_prestamos.php">Ver Todos los Préstamos</a>
                        </li>
                    </ul>
                </section>
            </div>

            <div class="card br-10">
                <header class="purple">
                    <span class="t-medium">
                        Usuarios
                    </span>
                </header>

                <section class="option-list-container">
                    <ul>
                        <li>
                            <a class="purple-hover purple-border" href="add_usuario.php">Crear Usuario</a>
                        </li>
                        <li>
                            <a class="purple-hover purple-border" href="lista_usuarios.php">Ver Lista de Usuarios</a>
                        </li>
                    </ul>
                </section>
            </div>

            <div class="card br-10">
                <header class="pink">
                    <span class="t-medium">
                        Dispositivos
                    </span>
                </header>

                <section class="option-list-container">
                    <ul>
                        <li>
                            <a class="pink-hover pink-border" href="add_device.php">Crear Dispositivo</a>
                        </li>
                        <li>
                            <a class="pink-hover pink-border" href="lista_dispositivos.php">Ver Lista de Dispositivos</a>
                        </li>
                    </ul>
                </section>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
