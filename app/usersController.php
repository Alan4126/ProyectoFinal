<?php 

if (!isset($_SESSION)) {
    session_start();
}

include "connectionController.php";

if(isset($_POST['action'])){

    $usersController = new UsersController();

    switch($_POST['action']){

        case 'store':
            $name = strip_tags($_POST['name']);
           
			$email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $role = strip_tags($_POST['role']);
			
			

            $usersController->store($name,$email,$password,$role);
        break;
        case 'update':
            $name = strip_tags($_POST['name']);
			$email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $role = strip_tags($_POST['role']);
            $id = strip_tags($_POST['id']);

            $usersController->update($id,$name,$email,$password,$role);
        break;
        case 'destroy':

			$id = strip_tags($_POST['id']);

			$usersController->destroy($id);
		break;

    }

}


class UsersController
{

	public function get(){

		$conn = connect();

		if($conn->connect_error==false){

			$query = "select * from users";
            $prepared_query = $conn->prepare($query);
            $prepared_query->execute();

            $results = $prepared_query->get_result();
			$users = $results->fetch_all(MYSQLI_ASSOC);
			
			if(count($users)>0){

                return $users;

            }else{
                return array();
            }

		}else{
			return array();
		}


	}

	public function store($name,$email,$password,$role){

		$conn = connect();

        if($conn->connect_error==false){

            if($name!="" && $email!="" && $password!="" && $role!=""){

                $query="insert into users(name,email,password,role) values(?,?,?,?)";

                $prepared_query = $conn->prepare($query);
                $prepared_query->bind_param('ssss',$name,$email,$password,$role);

                if($prepared_query->execute()){
                    header("location:".$_SERVER['HTTP_REFERER']);
                    $_SESSION['success'] = "El registro se ha guardado correctamente";
                }else{
                    $_SESSION['error'] = 'verifique los datos envíados';
                    header("location:".$_SERVER['HTTP_REFERER']);
                }
            }else{
                $_SESSION['error'] = 'verifique la informacion del formulario';
                header("location:".$_SERVER['HTTP_REFERER']);
            }


        }else{
            $_SESSION['error'] = 'verifique la conexion';
            header("location:".$_SERVER['HTTP_REFERER']);
        }



    }
    

    public function update($id,$name,$email,$password,$role)
    {
        $conn = connect();

        if($conn->connect_error==false){

            if($id != "" && $name!=""  && $email != "" && $password != "" && $role!=""){

                $query="update users set name = ?, email = ?, password = ?, role = ? where id = ?";

                $prepared_query = $conn->prepare($query);
                $prepared_query->bind_param('ssssi',$name,$email,$password,$role,$id);

                if($prepared_query->execute()){
                    header("location:".$_SERVER['HTTP_REFERER']);
                }else{
                    header("location:".$_SERVER['HTTP_REFERER']);
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
				
				$query = "delete from users where id = ?";
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







?>