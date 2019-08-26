<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script2.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>User Data</title>
</head>
<body>
<?php
    $db = "singup";
    $user = "root";
    $pass = "";
    $server = "localhost";

    $conn = mysqli_connect($server, $user, $pass, $db);
    if (!$conn){
        die("error connecting to database");
    }else{
        $query = "SELECT * FROM users";
        $userdata = mysqli_query($conn, $query);
        if(empty($userdata)){
            window.location.replace("Home.php");
        }else{
?>

    <table>
    <thead>
        <tr>
            <th>User Name</th>
            <th>Last Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Profile Picture</th>
            <th colspan = "2">Action</th>
        </tr>
    </thead>
<?php
        $raws = mysqli_num_rows($userdata);
        for ($i=0;$i<$raws;$i++){
            $data = mysqli_fetch_array($userdata);
            echo "<tr id='$data[0]'>
                    <td><input type='text' value='$data[1]' name='username' id='username' required/></td>
                    <td><input type='text' value='$data[2]' name='lastname' id='lastname' required/></td>
                    <td><input type='text' value='$data[3]' name='mobile' id='mobile' required/></td>
                    <td><input type='text' value='$data[4]' name='email' id='email' required/></td>
                    <td><img src='$data[5]' name='image' id='image' required/></td>
                    <td><button class='edit'>Edit</button><button class='save' name='save'>save</button></td>
                    <td><button class='delete' name='delete'>Delete</button><button class='cancel'>cancel</button></td>
                </tr>";
        }
        

        }
}

?>
        

    </table>
</body>
</html>