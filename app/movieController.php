<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
	session_start();
}
include_once "connectionController.php";

if (isset($_POST['action'])) {

	$movieController = new MovieController();

	switch ($_POST['action']) {
		case 'store':

			$title = strip_tags($_POST['title']);
			$description = strip_tags($_POST['description']);
			$minutes = strip_tags($_POST['minutes']);
			$clasification = strip_tags($_POST['clasification']);
			$trailer = strip_tags($_POST['trailer']);
			$category_id = strip_tags($_POST['category_id']);
			
			$movieController->store($title,$description,$minutes,$clasification,$trailer,$category_id);
		break; 

		case 'update':
            $title = strip_tags($_POST['title']);
			$description = strip_tags($_POST['description']);
			$minutes = strip_tags($_POST['minutes']);
			$clasification = strip_tags($_POST['clasification']);
			$trailer = strip_tags($_POST['trailer']);
			$category_id = strip_tags($_POST['category_id']);
            $id = strip_tags($_POST['id']);

           //var_dump($_POST);
            $movieController->update($id,$name,$description,$minutes,$clasification,$trailer,$category_id);
        break;
		
		case 'destroy':

			$id = strip_tags($_POST['id']);

			$movieController->destroy($id);
		break;
	}
}

class MovieController
{
	public function get()
	{
		$conn = connect();
		if ($conn->connect_error==false) {
			
			$query = "select * from movies";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);
			
			if (count($movies)>0) {
				return $movies;
			}else{
				return array();
			}
				

		}else
			return array();
	}

	public function getTitle($id){

		$conn = connect();
		
		if($conn->connect_error==false){
			$query="select title from movies where id = '$id'";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);
			
			if(count($movies)>0){

                return $movies;

            }else{
                return array();
            }
		}else{
			echo "error";
		}
	
	}
	
	public function getTrailer($id){

		$conn = connect();
		
		if($conn->connect_error==false){
			$query="select trailer from movies where id = '$id'";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);
			
			if(count($movies)>0){

                return $movies;

            }else{
                return array();
            }
		}else{
			echo "error";
		}
	
	}
	

	public function getDescriptio($id){

		$conn = connect();
		
		if($conn->connect_error==false){
			$query="select description from movies where id = '$id'";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);
			
			if(count($movies)>0){

                return $movies;

            }else{
                return array();
            }
		}else{
			echo "error";
		}
	
	}

	public function getClasifica($id){

		$conn = connect();
		
		if($conn->connect_error==false){
			$query="select clasification from movies where id = '$id'";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);
			
			if(count($movies)>0){

                return $movies;

            }else{
                return array();
            }
		}else{
			echo "error";
		}
	
	}
	

	public function getMinutes($id){

		$conn = connect();
		
		if($conn->connect_error==false){
			$query="select minutes from movies where id = '$id'";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);
			
			if(count($movies)>0){

                return $movies;

            }else{
                return array();
            }
		}else{
			echo "error";
		}
	
	}

	public function getCategory($id){

		$conn = connect();
		
		if($conn->connect_error==false){
			$query="select category_id from movies where id = '$id'";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);
			
			if(count($movies)>0){

                return $movies;

            }else{
                return array();
            }
		}else{
			echo "error";
		}
	
	}

	public function getCover($id){

		$conn = connect();
		
		if($conn->connect_error==false){
			$query="select cover from movies where id = '$id'";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);
			
			if(count($movies)>0){

                return $movies;

            }else{
                return array();
            }
		}else{
			echo "error";
		}
	
    }

	public function store($title,$description,$minutes,$clasification,$trailer,$category_id)
	{
		$conn = connect();
		if ($conn->connect_error==false){

			if ($title!="" && $description!="" && $minutes!="" && $clasification!="" && $trailer && $category_id!="" ) {
				
				// SUBIR ARCHIVO COVER
				$target_path = "../assets/img/movies/";
				$original_name = basename($_FILES['cover']['name']);
				$new_file_name = $target_path.basename($_FILES['cover']['name']);

				if (move_uploaded_file($_FILES['cover']['tmp_name'], $new_file_name)) {
				// SUBIR ARCHIVO COVER
					
					$query = "insert into movies (title,description,minutes,cover,clasification,trailer,category_id) values(?,?,?,?,?,?,?)";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('ssisssi',$title,$description,$minutes,$original_name,$clasification,$trailer,$category_id);

					if ($prepared_query->execute()) {
						
						$_SESSION['success'] = "el registro se ha guardado correctamente";

						header("Location:". $_SERVER['HTTP_REFERER'] );

					}else{

						$_SESSION['error'] = 'verifique los datos envíados';

						header("Location:". $_SERVER['HTTP_REFERER'] );
					}


				}  

			}else{
				$_SESSION['error'] = 'verifique la información del formulario';

				header("Location:". $_SERVER['HTTP_REFERER'] );
			}

		}else{

			$_SESSION['error'] = 'verifique la conexión a la base de datos';

			header("Location:". $_SERVER['HTTP_REFERER'] );
		}
	}


	public function update($id,$title,$description,$minutes,$clasification,$trailer,$category_id)
    {
        $conn = connect();

        if($conn->connect_error==false){

            if($id != "" && $title!="" && $description != "" && $minutes != "" && $clasification != "" && $trailer != "" && $category_id != ""){

				// SUBIR ARCHIVO COVER
				$target_path = "../assets/img/movies/";
				$original_name = basename($_FILES['cover']['name']);
				$new_file_name = $target_path.basename($_FILES['cover']['name']);

				if (move_uploaded_file($_FILES['cover']['tmp_name'], $new_file_name)) {
					// SUBIR ARCHIVO COVER
						
					$query="update movies set title = ?, description = ?, cover = ?, minutes =?,clasification=?, trailer = ?, category_id=? where id = ?";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sssissii',$title,$description,$original_name,$minutes,$clasification,$trailer,$category_id,$id);	
	
					if($prepared_query->execute()){
						header("location:".$_SERVER['HTTP_REFERER']);
					}else{
						header("location:".$_SERVER['HTTP_REFERER']);
					}
				}

				
            }else{
                header("location:".$_SERVER['HTTP_REFERER']);
            }
          
        }else{
            header("location:".$_SERVER['HTTP_REFERER']);
        }
        
    }






	

	public function destroy($id){

        $conn = connect();

		if ($conn->connect_error==false) {
			
			if ($id != "") {
				
				$query = "delete from movies where id = ?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('i',$id);
				if ($prepared_query->execute()) {

					header("Location:".$_SERVER['HTTP_REFERER']);
				}else{
					header("Location:".$_SERVER['HTTP_REFERER']);
				}

			}else{
				header("Location:".$_SERVER['HTTP_REFERER']);
			}


		}else{
			header("Location:".$_SERVER['HTTP_REFERER']);
		}
	}
	

	



}