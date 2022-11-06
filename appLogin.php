<?php

require 'connection.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$checkUserEmail = "SELECT * FROM user WHERE email = '$email'";
$resultEmail = mysqli_query($con, $checkUserEmail);

if(mysqli_num_rows($resultEmail) > 0){
    $checkUser = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
    $resultUser = mysqli_query($con, $checkUser);
    if(mysqli_num_rows($resultUser) > 0){
        while($row = $resultUser->fetch_assoc()){
            
            //$json = array("response" => 'success', "status" => 200, "message" => 'User login successful');
            $json['user'] = $row["id"];
    }
    }
    else{
        $json = array("response" => 'error', "status" => 201, "message" => 'Incorrect login credintials');
    }
}
else{
    $json = array("response" => 'error', "status" => 202, "message" => 'User does not exist');
}

echo json_encode($json);

?>
