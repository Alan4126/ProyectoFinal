<?php

include "../app/categoryController.php";

$categoryController = new CategoryController();

$categories = $categoryController -> get();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

    <style type="text/css">
        table, th,td{
            border: 1px solid black;
            
        }
        #updateForm{
            display: none;
        }

    </style>
</head>
<body>

    <div>
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
                    
                    <td>
                        <?= $category['id'] ?>
                    </td>
                    <td>
                        <?= $category['name'] ?>
                    </td>
                    <td>
                        <?= $category['description'] ?>
                    </td>
                    <td>
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

        <form id="storeForm" action="../app/categoryController.php" method="POST">
            <fieldset>
                <legend>
                    Add new category
                </legend>

                <label for="">
                    name
                </label>

                <input type="text" name="name" placeholder="terror"> <br>

                <label for="">
                    Description
                </label><br>

                <textarea name="description"  cols="30" rows="5" placeholder="write here"></textarea><br>


                <label for="">
                    Status
                </label>

                <select name="status">
                    <option>Active</option>
                    <option>inactive</option>
                </select><br>

                <button type="submit">SAVE</button>
                <input type="hidden" name="action" value="store">

            </fieldset>
        </form>
        

        <form id="updateForm" action="../app/categoryController.php" method="POST">
            <fieldset>
                <legend>
                    Edit category
                </legend>

                <label for="">
                    name
                </label>

                <input type="text" id="name" name="name" placeholder="terror"> <br>

                <label for="">
                    Description
                </label><br>

                <textarea name="description" id="description" cols="30" rows="5" placeholder="write here"></textarea><br>

                <label for="">
                    Status
                </label>

                <select id="status" name="status">
                    <option>Active</option>
                    <option>inactive</option>
                </select><br>

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