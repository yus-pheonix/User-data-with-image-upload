<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $message = true;
    class problems {
        public $usernameerror = "";
        public $lastnameerror = "";
        public $mobileerror = "";
        public $emailerror = "";
        public $imageerror = "";
    }

    $err = new problems();

    if(empty($username)){
        $err -> usernameerror = "User Name is Empty";
        $message = false;
    }else if(!preg_match('/^[a-zA-Z ]*$/', $username)){
        $err -> usernameerror = "Please Enter Valid User Name";
        $message = false;
    }else{
        $username = check($username);
    }

    if(empty($lastname)){
        $err -> lastnameerror = "Last Name is Empty";
        $message = false;
    }else if(!preg_match('/^[a-zA-Z ]*$/', $lastname)){
        $err -> lastnameerror = "Please Enter Valid Last Name";
        $message = false;
    }else{
        $lastname = check($lastname);
    }

    if(empty($mobile)){
        $err -> mobileerror = "Mobile is Empty";
        $message = false;
    }else if(!preg_match('/^[0-9]{10}+$/', $mobile)){
        $err -> mobileerror = "Please Enter Valid Mobile Number";
        $message = false;
    }else{
        $mobile = check($mobile);
    }

    if(empty($email)){
        $err -> emailerror = "Mobile is Empty";
        $message = false;
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err -> emailerror = "Please Enter Valid Email Address";
        $message = false;
    }else{
        $email = check($email);
    }

    if(empty($_FILES['image'])){
        $err -> imageerror = "Image is Empty";
        $message = false;
    }else{
        $imagename = $_FILES['image']['name'];
        $imagetempname = $_FILES['image']['tmp_name'];
        $imagesize = $_FILES['image']['size'];
        $imagetype = strtolower(pathinfo($imagename, PATHINFO_EXTENSION));
        $validimagetype = array("jpeg", "jpg", "png", "gif");
        $path = 'photo/';

        if($imagesize > 2097152){
            $err -> imageerror = "Image size is greater than 2 MB";
            $message = false;
        }else if(!in_array($imagetype, $validimagetype)){
            $err -> imageerror = "Please Upload Valid Image";
            $message = false;
        }else{
            $path = $path.strtolower($imagename);
            if(move_uploaded_file($imagetempname, $path)){

            }else{
                $err -> imageerror = "Could not move image to server";
                $message = false;
            }
        }
    }

    if($message == true){
        $db = "singup";
        $user = "root";
        $pass = "";
        $server = "localhost";

        $conn = mysqli_connect($server, $user, $pass, $db);
        if (!$conn){
            die("error connecting to database");
        }else{
            $query = "INSERT INTO users(username, lastname, mobile, email, images) VALUES ('$username', '$lastname', '$mobile', '$email', '$path')";
            if(mysqli_query($conn, $query)){
                echo $message;
            }else{
                echo 'error inserting data to table';
            }
        }

    }else{
        echo json_encode($err);
    }

}

function check($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>