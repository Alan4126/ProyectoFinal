
<?php 

if(!isset($_SESSION)){
    session_start();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estilosRegistro.css?v=0.0.10">
    
</head>
<body>

    <div class="login-caja">
    <img class="imagenLogo" src="../img/A(1).png" alt="">
        <form action="../app/authController.php" method="POST">

            <fieldset>
                <legend>
                    Registarse
                </legend>

                <label>
                    Nombre
                </label>
                <input type="text" name="name" placeholder="Coloca Tu Nombre" require="">

                <label>
                    Email
                </label>
                <input type="text" name="email" placeholder="Coloca Tu Email" require="">

                <label>
                    Contraseña
                </label>
                <input type="text" name="password" placeholder="Coloca Tu Contraseña" require="">

                <button type="submit">
                    Registrar
                </button>
                <input type="hidden" name="action" value="register">

            </fieldset>

            <br> <br>
            <a href="../login">Iniciar Session</a>


        </form>
    </div>

    <!-- -->
    



    
</body>
</html>