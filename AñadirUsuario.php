<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $usertype = "";
$username_err = $password_err = $confirm_password_err = $usertype_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Porfavor introduce un nombre de usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Porfavor introduce una contraseña.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Porfavor confirma tu contraseña.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
	
    //
     // Validate usertype
    
    if(empty(trim($_POST['usertype']))){
        $usertype_err = "Please enter a tipo de usuario 1 ó 2.";     
    } elseif(!ctype_digit($_POST['usertype'])){
        $usertype_err = 'Please enter a positive integer value.';
    } else{
        $usertype = trim($_POST['usertype']);
    }
    
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($usertype_err) ){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, tipo_usuario) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_usertype);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_usertype = $usertype;
            // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Regístro</title>
    <link rel="stylesheet" href="bootstrap337/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        <body backgroud="tamales_con_aceite_de_oliva_1"></body>
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Regístrate</h2>
        <p>Por favor llene este formulario para crear una cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($usertype_err)) ? 'has-error' : ''; ?>">
                <label>Tipo de usuario</label>
                <input type="text" name="usertype"class="form-control" value="<?php echo $usertype; ?>">
                <span class="help-block"><?php echo $usertype_err; ?></span>
            </div> 
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
				<a href="login.php"  type="Atras" class="btn btn-default" value="Atras">Atras</a>
            </div>
            <p>
¿Ya tienes una cuenta?<a href="login.php"> Entre aquí</a>.</p>
        </form>
    </div>    
</body>
</html>