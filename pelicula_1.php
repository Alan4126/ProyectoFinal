<?php 

include "app/movieController.php";

$movieController = new MovieController();

$titles =  $movieController->getTitle($_GET['id']);
$trailers =  $movieController->getTrailer($_GET['id']);
$descriptions =  $movieController->getDescriptio($_GET['id']);
$covers =  $movieController->getCover($_GET['id']);
$clasifications =  $movieController->getClasifica($_GET['id']);
$minutes =  $movieController->getMinutes($_GET['id']);
$categorys =  $movieController->getCategory($_GET['id']);

//$id = var_dump($_GET);



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kono Subarashii Sekai ni Shukufuku wo!: Kurenai Densetsu</title>
    <link rel="stylesheet" href="css/estilosPeliculas.css?v=0.0.8">
</head>
<body>

    <div class="contenedor">

        <!--===============================
            INICIO DEL HEADER DE LA PAGINA
        ===================================-->
        <header>
            <div class="wrapper">
                <div class="logo">
                    <a href="principal.php">Anzu</a>
                </div>
                <nav class="nav">
                    <a href="principal.php">Inicio</a>
                    <a href="#">Contacto</a>
                    <a href="login.php">Ingresar</a>
                    <a href="registrarse.php">Registrarse</a>
                </nav>
            </div>
        </header>
        <!--===============================
            FIN DEL HEADER DE LA PAGINA
        ===================================-->

        <!--===============================
            INICIO DE LA INFORMACION DE LA PELICULA
        ===================================-->

        <div class="informacion">


            <div class="informacion-titulo">

                <?php foreach ($titles as $title): ?>
                    <h3>
                    <?= $title['title'] ?>    
                    </h3>
                <?php endforeach ?>
                
            </div>

            <div class="informacion-video">

                <?php foreach ($trailers as $trailer): ?>
                    
                    <iframe width="560" height="315" src="<?= $trailer['trailer'] ?>" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                    </iframe>

                <?php endforeach ?>
                
            </div>

            <div class="informacion-pelicula">

                    <div class="informacion-pelicula-imagen">
                        <?php foreach ($covers as $cover): ?>
                            <img src="assets/img/movies/<?= $cover['cover'] ?>" alt="" id="img">
                        <?php endforeach ?>
                    </div>

                    <div class="informacion-pelicula-info">
                        
                        <p>
                            Descripción:
                            <?php foreach ($descriptions as $description): ?> 
                                
                                    <?= $description['description'] ?>
                                
                            <?php endforeach ?>
                        </p>    

                        <ul>
                            <li>
                                Nombre: 
                                <span>
                                <?php foreach ($titles as $title): ?>
                                    
                                    <?= $title['title'] ?>    
                                    
                                <?php endforeach ?>
                                </span>
                            </li>
                            <li>
                                Clasificación:  
                                    <span>
                                        <?php foreach ($clasifications as $clasification): ?>
                                            
                                            <?= $clasification['clasification'] ?>    
                                           
                                        <?php endforeach ?>
                                    </span>
                            </li>
                            <li>
                                Minutos: 
                                <span>
                                    <?php foreach ($minutes as $minute): ?>
                                        
                                        <?= $minute['minutes'] ?>    
                                        
                                    <?php endforeach ?>
                                </span>
                            </li>
                            <li>
                                Año: <span>2019</span>
                            </li>
                            <li>
                                Categoria: 
                                    <span>
                                        <?php foreach ($categorys as $category): ?>
                                            
                                            <?= $category['category_id'] ?>    
                                            
                                        <?php endforeach ?>
                                    </span>
                            </li>
                            <li>
                                Visualizaciones: <span>10 398</span>
                            </li>

                        </ul>
                    </div>
            </div>

            
        




        </div>
    
    
    </div>




</body>
</html>