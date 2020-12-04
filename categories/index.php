<?php

include "../app/categoryController.php";

$categoryController = new CategoryController();

$categories = $categoryController -> get();

if(isset($_SESSION)==false || isset($_SESSION['id'])==false){
    header("Location:../");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="../css/estilosdatosMovies.css?v=0.0.12">
    <link rel="stylesheet" href="../css/estilosIndex.css?v=0.0.9">

    <style type="text/css">
        
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

        <!--===============================
            Contenedor tabla
        ===================================-->

        <div class="contenedortabla">
            <h1>
                Categorias
            </h1>

            <?php 

            if (isset($_SESSION) && isset($_SESSION['error'])) {

                echo "<h3> Error: ".$_SESSION['error']."</h3>";
                unset($_SESSION['error']);

            }

            ?> 
            
            <?php if (isset($_SESSION) && isset($_SESSION['error']) ): ?>
            <h3>
                Error: <?= $_SESSION['error'] ?>
            </h3>
            <?php unset($_SESSION['error']); ?>
            <?php endif ?>

            <?php if (isset($_SESSION) && isset($_SESSION['success']) ): ?>
            <h3>
                Correcto: <?= $_SESSION['success'] ?>
            </h3>
            <?php unset($_SESSION['success']); ?>
            <?php endif ?>

            <table>
                <thead>
                    <th>
                        #
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Actions
                    </th>
                
                </thead> 
                <tbody>
                    
                    <?php foreach ($categories as $category): ?>

                    <tr>
                        
                        <td class="centrar">
                            <?= $category['id'] ?>
                        </td>
                        <td class="centrar">
                            <?= $category['name'] ?>
                        </td>
                        <td class="centrar">
                            <?= $category['description'] ?>
                        </td>
                        <td class="centrar">
                        <button onclick="edit(<?= $category['id'] ?>,'<?= $category['name'] ?>','<?= $category['description'] ?>','<?= $category['status'] ?>')">
                                Edit category
                        </button>
                        <button onclick="remove(<?= $category['id'] ?>)" style="color: white; background: red;">
                            Delete category
                        </button>
                        </td>

                    </tr>
            
                    <?php endforeach ?>

                    <?php 

                    ?> 

                    
                </tbody>
            </table>

            <h1>
                Agregar / Modificar
            </h1>

            <form id="storeForm" action="../app/categoryController.php" method="POST">
                <fieldset class="fielset">
                    <legend>
                        Add new category
                    </legend>

                    <label for="">
                        Name
                    </label> <br><br>

                    <input type="text" name="name" placeholder="terror"> <br>

                    <label for="">
                        Description
                    </label><br><br>

                    <textarea name="description"  cols="30" rows="5" placeholder="write here"></textarea><br><br>


                    <label for="">
                        Status
                    </label><br><br>

                    <select name="status">
                        <option>Active</option>
                        <option>inactive</option>
                    </select><br><br>

                    <button type="submit">SAVE</button>
                    <input type="hidden" name="action" value="store">

                </fieldset>
            </form>
            

            <form id="updateForm" action="../app/categoryController.php" method="POST">
                <fieldset class="fielset">
                    <legend>
                        Edit category
                    </legend>

                    <label for="">
                        Name
                    </label><br><br>

                    <input type="text" id="name" name="name" placeholder="terror"> <br>

                    <label for="">
                        Description
                    </label><br><br>

                    <textarea name="description" id="description" cols="30" rows="5" placeholder="write here"></textarea><br><br>

                    <label for="">
                        Status
                    </label><br><br>

                    <select id="status" name="status">
                        <option>Active</option>
                        <option>inactive</option>
                    </select><br><br>

                    <button type="submit">SAVE</button>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" id="id">
                </fieldset>
            </form>


            <form id="destroyForm" action="../app/categoryController.php" method="POST">


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

    function edit(id,name,description,status){
        
        document.getElementById('storeForm').style.display="none";
        document.getElementById('updateForm').style.display="block";

        document.getElementById('name').value=name
        document.getElementById('description').value=description
        document.getElementById('status').value=status
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