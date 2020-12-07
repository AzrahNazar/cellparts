<?php



include 'db/db.php';  //set up sql connection 





if (array_key_exists('login', $_POST)) {

    $name=htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $password=htmlspecialchars(trim($_POST['pass']), ENT_QUOTES, 'UTF-8');


    //$pass_with_sha = sha1($password); // echo $pass_with_sha;

    $result = mysqli_query($conn,"SELECT   

`user`.id,

`user`.user,

`user`.pws,

`user`.val



 FROM 

`user` WHERE `user`.user ='{$_POST['name']}'") or die(mysqli_error());

    $num = mysqli_num_rows($result);

    if ($num > 0) {//check user exist

        while ($row = mysqli_fetch_assoc($result)) {//set database values to variables

            $user_id=htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');
            $user_name=htmlspecialchars(trim($_POST['user']), ENT_QUOTES, 'UTF-8');
            $pass_word=htmlspecialchars(trim($_POST['pws']), ENT_QUOTES, 'UTF-8');
            $user_level=htmlspecialchars(trim($_POST['val']), ENT_QUOTES, 'UTF-8');
		
        }



        if ($pass_word) {//check against password

            session_start(); // this sets variables in the session 

				$_SESSION['id'] = $user_id;

                $_SESSION['user'] = $user_name;

                $_SESSION['pws'] = $pass_word;

                $_SESSION['val'] = $user_level;

		

            if ($result) {

                echo json_encode(array("msgType" => 1, "msg" => "Successfully Add informations")); //if sql result true pass magType1

            }

        } else {

            if ($result) {

                echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2

            }

        }

    } else {

        if ($result) {

            echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data")); //if sql result true pass magType2

        }

    }

} 





?>