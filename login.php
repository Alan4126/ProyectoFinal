<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilos.css?v=0.0.4">
    
</head>
<body>
    
    <!--  CAJA DEL LOGIN-->

    <div class="login-caja">

        <img class="imagenLogo" src="img/A(1).png" alt="">
        <h1>
            Ingresa
        </h1>
        <form action="ingresar.php" method="POST">

            <label for="Usuario">Email</label>
            <input type="text" placeholder="Coloca Tu Email" name="email">

            <label for="Contraseña">Contraseña</label>
            <input type="password" placeholder="Coloca Tu Contraseña" name="clave">
            
            
            <input type="submit" value="Ingresar" >

           
            <a href="registrarse.php">No tienes una cuenta?</a>

        </form>
    
    </div>


</body>
</html>
