
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
    <link rel="stylesheet" href="../css/estilos.css?v=0.0.9">
    
</head>
<body>

    <div class="login-caja">
    <img class="imagenLogo" src="../img/A(1).png" alt="">
        <form action="../app/authController.php" method="POST">
            <fieldset>
                <legend>
                    Acceder
                </legend>

                <label>
                    Email
                </label>
                <input type="text" name="email" placeholder="Coloca Tu Email" require="">

                <label>
                    Contraseña
                </label>
                <input type="text" name="password" placeholder="Coloca Tu Contraseña" require="">

                <button type="submit">
                    Acceder
                </button>
                <input type="hidden" name="action" value="login">

            </fieldset>
            <br> <br>
            <a href="../registrar">No tienes una cuenta?</a>

        </form>
    </div>

    <!-- <form action="../app/authController.php" method="POST">

        <fieldset>
            <legend>
                Register
            </legend>

            <label>
                name
            </label>
            <input type="text" name="name" require="">

            <label>
                email
            </label>
            <input type="text" name="email" require="">

            <label>
                password
            </label>
            <input type="text" name="password" require="">

            <button type="submit">
                save
            </button>
            <input type="hidden" name="action" value="register">

        </fieldset>


    </form>-->
    



    
</body>
</html>