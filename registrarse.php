<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilosRegistro.css?v=0.0.5">
    
</head>
<body>
    
    <!--  CAJA DEL REGISTRO-->

    <div class="login-caja">

        <img class="imagenLogo" src="img/A(1).png" alt="">
        <h1>
            Registrate
        </h1>
        <form action="insertar.php" method="POST">

            <label for="Usuario">Nombre</label>
            <input type="text" placeholder="Coloca Tu Nombre" name="nombre">

            <label for="Apellido">Apellidos</label>
            <input type="text" placeholder="Coloca Tus Apellidos" name="apellidos">

            <label for="Email">Email</label>
            <input type="text" placeholder="Coloca Tus Apellidos" name="email">

            <label for="Contraseña">Contraseña</label>
            <input type="password" placeholder="Coloca Tu Contraseña" name="clave">

            <input type="submit" value="Registrarse">

           
            <a href="index.php">Iniciar Sesión</a>

        </form>
    
    </div>


</body>
</html>