<?php

session_start();
 

if(!isset($_SESSION['nickname']) || empty($_SESSION['nickname'])){

           header("location: login.php");
  exit;
}


require_once 'config.php';
 
// Define variables and initialize with empty values
$id = $nombre = $apellido = $nickname = $contrasena = /*$is_admin*/ = "";
$id_err = $nombre_err = $apellido_err = $contrasena_err = /* $is_admin_err = */"";

 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    

  

    $input_id = trim($_POST["id"]);
    if(empty($input_id)){
        $id_err = "Introduce el ID de tu usuario ";
    } elseif(!filter_var(trim($_POST["ID"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $id_err = 'Introduce un ID valido';
    } else{
        $id = $input_id;
    }
    
     $input_nombre= trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Introduce el nombre del usuario ";
    } elseif(!filter_var(trim($_POST["nombre"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $nombre_err = 'Introduce un nombre valido';
    } else{
        $nombre = $input_nombre;
    }
   
    $input_apellido = trim($_POST["apellido"]);
    if(empty($input_apellido)){
        $apellido_err = "Introduce el apellido del usuario";
    } elseif(!filter_var(trim($_POST["apellido"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $apellido_err = 'Introduce un apellido valido';
    } else{
        $apellido = $input_apellido;
        
         $input_nickname = trim($_POST["nickname"]);
    if(empty($input_nickname)){
        $nickname_err = "Introduce el nickname";
    } elseif(!filter_var(trim($_POST["nickname"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $nickname_err = 'Introduce un nickname valido';
    } else{
        $nickname = $input_nickname;
        
     if(empty(trim($_POST['contraseña']))){
        $contrasena_err = "Porfavor introduce una contraseña.";     
    } elseif(strlen(trim($_POST['contraseña'])) < 6){
        $contrasena_err = "La contraseña debe contener al menos 6 caracteres.";
    } else{
        $contrasena = trim($_POST['contrasena']);
    }
    
    /*falta validar el tipo de usurio*/
  
    
   
    if(empty($id_err) && empty($nombre_err) && empty($apellido_err)&& empty($nickname_err)&& empty($contrasena_err)){
        $sql = "INSERT INTO prestamos (id, nombre, apellido, nickname, contrasena) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "sssss", $param_id, $param_nombre, $param_apellido, $param_nickname, $param_contrasena );
            
      
            $param_id= $id;
            $param_nombre= $nombre;
            $param_apellido= $apellido;
            $param_nickname= $nickname;
            $param_contrasena= $contrasena;

           if(mysqli_stmt_execute($stmt)){
                header("location: lista_usuarios.php");
                exit();
            } else{
                echo "Por favor intentelo más tarde.";
            }
        }
 
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar usuario</title>
    <link rel="stylesheet" href="bootstrap337/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Agregar usuario</h2>
                    </div>
                    <p>A continuacion agregaras un usuario </p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre del usuario</label>
                            <textarea name="nombre" class="form-control"><?php echo $nombre; ?></textarea>
                            <span class="help-block"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($apellido_err)) ? 'has-error' : ''; ?>">
                            <label>Apellido del usuario</label>
                            <input type="text" name="apellido" class="form-control" value="<?php echo $apellido; ?>">
                            <span class="help-block"><?php echo $apellido_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nickname_err)) ? 'has-error' : ''; ?>">
                            <label>Nickname</label>
                            <input type="text" name="nickname" class="form-control" value="<?php echo $nickname; ?>">
                            <span class="help-block"><?php echo $nickname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($contrasena_err)) ? 'has-error' : ''; ?>">
                            <label>Contraseña</label>
                            <input type="text" name="contrasena" class="form-control" value="<?php echo $contrasena; ?>">
                            <span class="help-block"><?php echo $contrasena_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit"> 
                        <a href="lista_usuarios.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>