<!DOCTYPE html>

<?php
session_start();
include_once('./public/php/connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $database = new Connection();
    $db = $database->open();
    
    try{
        
        $username = $_POST["username"];
        $contra = $_POST["contra"];
        
        $_GRABAR_SQL = "SELECT id, nombre, apellido, nickname, is_admin FROM usuario WHERE nickname = '$username' AND contrasena = '$contra'";

        $data = $db->query( $_GRABAR_SQL);  
        $hi = $data -> fetchAll();

        if($hi){
            $_SESSION['id'] = $hi[0]['id'];
            $_SESSION['nombre'] = $hi[0]['nombre'];
            $_SESSION['apellido'] = $hi[0]['apellido'];
            $_SESSION['nickname'] = $hi[0]['nickname'];
            $_SESSION['is_admin'] = $hi[0]['is_admin'];

            header("location: home.php");
        }else{
            alertMessage("Usuario y/o usuario incorrectos");
        }

    }catch(PDOException $e){
        alertMessage("Algo salió mal al conectarse con la base de datos");
    }

    $database->close();
}

?>

<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Préstamos de dispositivos UV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
     *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;  
        height: 100vh;  
        background-image: url("./images/ocean_sky.png");
        background-repeat: no-repeat;
        background-size: cover;
    }

    #logo{
        padding: 20px;
        width: 200px;
        height: 200px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;    

    }

    .container{
        background: rgb(25, 25, 25);
        width: 350px;
        height: 570px;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        color: white;
        padding: 2em;
    }


    .heading{
        font-size: 2em;
        margin-bottom: 0.1em;
        margin: auto;
    }
    .box {
        margin: 0.2em 0;
    }
    .container .box p{
        color: rgba(255, 255, 255, 0.781);
    }
    .container .box div{
        position: relative;
        width: 100%;
        height: 40px;
        margin: 0.5em 0;
    }
    .container .box input{
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgb(19, 19, 19);
        color: white;
        border: none;
        outline: none;
        padding-left: 0.8em;
        border-radius: 10px;
        transition: all .4s
    }

    .container .box input:focus::placeholder{
        color: white;
    }
    .container .box div::before{
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 102%;
        height: 105%;
        border-radius: 10px;
        background: linear-gradient(to right, #18529D, #28AD56);
    }
    .loginBtn{
        width: 102%;
        height: 40px;
        border: none;
        border-radius: 10px;
        margin: 0.5em 0;
        transform: translate(-1%);
        cursor: pointer;
        color: white;
        background: linear-gradient(to right, #18529D, #28AD56);
        transition: all .4s;
    }

    .loginBtn:hover{
        transform: translate(-1%, 5%);
        box-shadow: 0 0 10px #FFFFFF;
    }
    .text{
        font-size: 0.8em;
        margin-top: 0.5em;
        text-align: center;
        color: rgba(255, 255, 255, 0.623);
    }
    .text a{
        color: rgba(255, 255, 255, 0.911);
    }
</style>

</head>

<body>

   <div class="container">
    <div><img id='logo' src="./images/uv.png"></div>
    <p class="heading">Inicio de sesión</p>

    <form method="POST" action="">

        <div class="box">
            <p>Usuario</p>
            <div>
                <input type="text" name="username" id="login-name" placeholder="Introduzca su usuario">
            </div>
        </div>
        <div class="box">
            <p>Contraseña</p>
            <div>
                <input type="password" name="contra" id="login-pass" placeholder="Introduzca su contraseña">
            </div>
        </div> 
        <a href="#">
            <button type="submit" class="loginBtn" value="Entrar">Iniciar sesión</button>         
        </a>
    </form>

</div>
<?php
function alertMessage($msg) {
    echo "

    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='false'>
    <div class='modal-dialog'>
    <div class='modal-content'>
    <div class='modal-header'>
    <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
    </div>
    <div class='modal-body'>
    ...
    </div>
    <div class='modal-footer'>
    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
    <button type='button' class='btn btn-primary'>Save changes</button>
    </div>
    </div>
    </div>
    </div>
    ";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
