<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $db = "singup";
        $user = "root";
        $pass = "";
        $server = "localhost";

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $conn = mysqli_connect($server, $user, $pass, $db);
        if (!$conn){
            die("error connecting to database");
        }else{
            $query = "DELETE FROM users WHERE id='$id' LIMIT 1";
            $userdata = mysqli_query($conn, $query);
            if(empty($userdata)){
                window.location.replace("Home.php");
            }else{
                echo true;
            }
        }
    }
}

?>