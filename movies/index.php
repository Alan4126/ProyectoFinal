<?php 
	include "../app/categoryController.php";
	include "../app/movieController.php";

	$categoryController = new CategoryController();
	$movieController = new MovieController();

	$categories = $categoryController->get();
	$movies = $movieController->get();

	// if (!isset($_SESSION['id']) || $_SESSION['role'] != "admin") {
	// 	header("Location:../");
	// }

	#echo json_encode($movies);
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Movies
    </title>
    <link rel="stylesheet" href="../css/estilosdatosMovies.css?v=0.0.13">
    <link rel="stylesheet" href="../css/estilosIndex.css?v=0.0.10">
	<style type="text/css">
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		#updateForm{
			display: none;
		}
	</style>
</head>
<body>

    <div class="contenedor">

        <!--===============================
            INICIO DEL HEADER DE LA PAGINA
        ===================================-->
        <header>
            <div class="wrapper">
                <div class="logo">
                    <a href="#">Anzu Dashboard</a>
                    
                </div>
                <nav>
                    <a href="#">Inicio</a>
                    <a href="#">Movies</a>
                    <a href="#">Clients</a>
                    <a href="#">Loads</a>
                    <a href="../index.php">Index</a>
                    
                </nav>
            </div>
        </header>
        <!--===============================
            FIN DEL HEADER DE LA PAGINA
        ===================================-->



    </div>    

    <div class="contenedortabla">
        <h1>
            Movies
        </h1>

        <?php include "../layouts/alerts.template.php"; ?>

        <table>
            <thead>
                <th>
                    #
                </th>
                <th>
                    title
                </th>
                <th>
                    cover
                </th>
                <th>
                    minutes
                </th>
                <th>
                    category
                </th>
                <th>
                    actions
                </th>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                <tr>
                    <td class="centrar">
                        <?= $movie['id'] ?>
                    </td>
                    <td class="centrar">
                    <?= $movie['title'] ?>
                    </td>
                    <td class="centrar">
                        <img style="width: 10%" src="../assets/img/movies/<?= $movie['cover'] ?>">
                    </td>
                    <td class="centrar">
                        <?= $movie['minutes'] ?>
                    </td>
                    <td class="centrar">
                        <?= $movie['category_id'] ?>
                    </td>
                    <td class="centrar">
                        <button onclick="edit(<?= $user['id'] ?>,'<?= $user['name'] ?>','<?= $user['lastname'] ?>','<?= $user['email'] ?>','<?= $user['password'] ?>','<?= $user['rol'] ?>')">
                                        Edit 
                        </button>
                        <button onclick="remove(<?= $user['id'] ?>)" style="color: white; background: red;">
                                        Delete 
                        </button>
                    </td>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <form action="../app/movieController.php" method="POST" enctype="multipart/form-data" >
            <fieldset class="fielset"> 
                <legend>
                    Add Movie
                </legend>


                <label>
                    Title
                </label>
                <input type="text" name="title" placeholder="movie name" required="">

                <br>

                <label>
                    Description
                </label>
                <textarea name="descripiton" rows="5" placeholder="Description" required=""></textarea>

                <br>

                <label>
                    Cover
                </label>
                <input type="file" name="cover" required="" accept="image/*">

                <br>

                <label>
                    Minutes
                </label>
                <input type="number" name="minutes" placeholder="80" required="">
                
                <br>

                <label>
                    Clasification
                </label>
                <select  name="clasification" required="">
                    <option> B15 </option>
                    <option> BA </option>
                </select>
                <br>


                <label>
                    Category
                </label>
                <select  name="category_id" required=""> 
                    <?php foreach ($categories as $category): ?>

                    <option value="<?= $category['id'] ?>" >
                        <?= $category['name'] ?>
                    </option>

                    <?php endforeach ?>

                    
                </select>
                <br>

                <button type="submit">
                    Save
                </button>
                <input type="hidden" name="action" value="store">

            </fieldset>
        </form>
    </div>
	
    





</body>
</html>