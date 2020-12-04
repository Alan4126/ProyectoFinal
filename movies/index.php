<?php 
	include "../app/categoryController.php";
	include "../app/movieController.php";

	$categoryController = new CategoryController();
	$movieController = new MovieController();

	$categories = $categoryController->get();
    $movies = $movieController->get();
    
    if(isset($_SESSION)==false || isset($_SESSION['id'])==false){
        header("Location:../");
    }
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
                    <a href="../dashboard/dashboard.php">Inicio</a>
                    <a href="../movies">Movies</a>
                    <a href="../users">Clients</a>
                    <a href="../categories">Category</a>
                    <a href="../app/salir.php">Salir</a>
                    
                </nav>
            </div>
        </header>
        <!--===============================
            FIN DEL HEADER DE LA PAGINA
        ===================================-->



       

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
                            <button onclick="edit(<?= $movie['id'] ?>,'<?= $movie['title'] ?>','<?= $movie['description'] ?>','<?= $movie['minutes'] ?>','<?= $movie['clasification'] ?>','<?= $movie['trailer'] ?>','<?= $movie['category_id'] ?>')">
                                Edit 
                            </button>
                            <button onclick="remove(<?= $movie['id'] ?>)" style="color: white; background: red;">
                                Delete 
                            </button>
                        </td>

                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <h1>
                Agregar / Modificar
			</h1>
            

            <?php 
				if (isset($_SESSION) && isset($_SESSION['error'])) {

					echo "<h3> Error: ".$_SESSION['error']."</h3>";
					unset($_SESSION['error']);
	
				}
			
			?>

			<?php include "../layouts/alerts.template.php"; ?>	


            <form id="storeForm" action="../app/movieController.php" method="POST" enctype="multipart/form-data" >
                <fieldset class="fielset"> 
                    <legend>
                        Add Movie
                    </legend>


                    <label>
                        Title
                    </label> <br> <br>
                    <input type="text" name="title" placeholder="movie name" required="">

                    <br> <br>

                    <label>
                        Description
                    </label><br> <br>
                    <textarea name="description" rows="5" placeholder="Description" required=""></textarea>

                    <br> <br>

                    <label>
                        Cover
                    </label><br> <br>
                    <input type="file" name="cover" required="" accept="image/*">

                    <br> <br>

                    <label>
                        Minutes
                    </label><br> <br>
                    <input type="number" name="minutes" placeholder="80" required="">
                    
                    <br> <br>

                    <label>
                        Clasification
                    </label><br> <br>
                    <select  name="clasification" required="">
                        <option> B15 </option>
                        <option> BA </option>
                    </select>
                    <br> <br>


                    <label>
                        Category
                    </label><br> <br>
                    <select  name="category_id" required=""> 
                        <?php foreach ($categories as $category): ?>

                        <option value="<?= $category['id'] ?>" >
                            <?= $category['name'] ?>
                        </option>

                        <?php endforeach ?>

                        
                    </select>
                    <br> <br>

                    <label>
                        trailer
                    </label><br> <br>
                    <textarea name="trailer" rows="5" placeholder="trailer" required=""></textarea>
                    <br> <br>           
                    <button type="submit">
                        Save
                    </button><br> <br>
                    <input type="hidden" name="action" value="store">

                </fieldset>
            </form>

            <form id="updateForm" action="../app/movieController.php" method="POST" enctype="multipart/form-data" >
                <fieldset class="fielset"> 
                    <legend>
                        Edit Movie
                    </legend>


                    <label>
                        Title
                    </label> <br> <br>
                    <input id="title" type="text" name="title" placeholder="movie name" required="">

                    <br> <br>

                    <label>
                        Description
                    </label><br> <br>
                    <textarea id="description" name="description" rows="5" placeholder="Description" required=""></textarea>

                    <br> <br>

                    <label>
                        Cover
                    </label><br> <br>
                    <input id="cover"  type="file" name="cover" required="" accept="image/*">

                    <br> <br>

                    <label>
                        Minutes
                    </label><br> <br>
                    <input id="minutes" type="number" name="minutes" placeholder="80" required="">
                    
                    <br> <br>

                    <label>
                        Clasification
                    </label><br> <br>
                    <select id="clasification"  name="clasification" required="">
                        <option> B15 </option>
                        <option> BA </option>
                    </select>
                    <br> <br>


                    <label>
                        Category
                    </label><br> <br>
                    <select id="category_id"  name="category_id" required=""> 
                        <?php foreach ($categories as $category): ?>

                        <option value="<?= $category['id'] ?>" >
                            <?= $category['name'] ?>
                        </option>

                        <?php endforeach ?>

                        
                    </select>
                    <br> <br>

                    <label>
                        trailer
                    </label><br> <br>
                    <textarea id="trailer" name="trailer" rows="5" placeholder="trailer" required=""></textarea>
                    <br> <br>           
                    <button type="submit">
                        Save
                    </button><br> <br>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" id="id">

                </fieldset>
            </form>

                          

            <form id="destroyForm" action="../app/movieController.php" method="POST">

                            
                    <input type="hidden" name="action" value="destroy">
                    <input type="hidden" name="id" id="id_destroy">
            </form>
            


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
    <script type="text/javascript">

        function edit(id,title,description,minutes,clasification,trailer,category_id){

            document.getElementById('storeForm').style.display="none";
            document.getElementById('updateForm').style.display="block";
        
            document.getElementById('title').value=title
            document.getElementById('description').value=description
            document.getElementById('minutes').value=minutes
            document.getElementById('clasification').value=clasification
            document.getElementById('trailer').value=trailer
            document.getElementById('category_id').value=category_id
            document.getElementById('id').value=id
        }                 




        
      
        function remove(id){

            var confirm = prompt("Si quiere eliminar el registro, escriba: "+ id);

            if(confirm == id){

            document.getElementById('id_destroy').value=id;
            document.getElementById('destroyForm').submit();


            }
        }

	</script>
	
</body>
</html>