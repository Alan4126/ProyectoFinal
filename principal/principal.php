<?php 

include "../app/movieController.php";

$movieController = new MovieController();


$movies = $movieController->get();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anzu </title>
    <link rel="stylesheet" href="../css/estilosIndex.css?v=0.0.8">  
</head>
<body>
    
    <!--CONTENEDOR DE TODA LA PAGINA -->
    <div class="contenedor">

        <!--===============================
            INICIO DEL HEADER DE LA PAGINA
        ===================================-->
        <header>
            <div class="wrapper">
                <div class="logo">
                    <a href="principal.php">Anzu </a>
                    
                </div>
                <nav>
                    <a href="../principal/principal.php">Inicio</a>
                    <a href="#">Contacto</a>
                    
                    <a href="../app/salir.php">Salir</a>
                    
                </nav>
            </div>
        </header>
        <!--===============================
            FIN DEL HEADER DE LA PAGINA
        ===================================-->
    
        <!--===============================
            INICIO DEL SLIDER
        ===================================-->
        
        <div class="slider">

            <ul>
                
                <li>
                    <img src="../img/miku.png" alt="">
                </li>
                <li>
                    <img src="../img/nino.png" alt="">
                </li>
                <li>
                    <img src="../img/ichi.png" alt="">
                </li>
                <li>
                    <img src="../img/its.png" alt="">
                </li>
               

            </ul>

        </div>

         <!--===============================
            FIN DEL SLIDER
        ===================================-->

        <!--===============================
            INICIO DE LAS PELICULAS
        ===================================-->


        <div class="box-movies">

              
           

            <?php foreach ($movies as $movie): ?>
                <div class="movies-img">
                <img src="../assets/img/movies/<?= $movie['cover'] ?>" alt="" id="img">
                <a href="../plantilla/pelicula_1.php?id=<?= $movie['id'] ?>">
                    <div class="capa">
                        <h5>
                            <?= $movie['description'] ?>
                        </h5>

                    </div>
                </a>
                <h3>
                    <?= $movie['title'] ?>
                </h3>
                </div>
            <?php endforeach ?>
                
                
                
        </div>


        <!--===============================
            INICIO DEL FOOTER DE LA PAGINA
        ===================================-->
        <footer>
            <div class="wrapper">
                <div class="logo">
                    <a href="index.php">© copyright by Jesus Alan Hernandez Rodarte </a>
                    
                </div>
                <nav >
                    <a href="#">
                        <img src="../img/facebook.png" alt="">
                    </a>
                    <a href="#">
                        <img src="../img/twit.png" alt="">
                    </a>
                    <a href="#">
                        <img src="../img/instagram.png" alt="">
                    </a>
                    <a href="#">
                        <img src="../img/google.png" alt="">
                    </a>
                    
                    
                </nav>
            </div>
        </footer>
        <!--===============================
            FIN DEL FOOTER DE LA PAGINA
        ===================================-->

     
    
    </div>

    





</body>
</html>