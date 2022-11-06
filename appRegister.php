<?php

    require 'connection.php';
    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkUser = "SELECT * FROM user WHERE email = '$email'";
    $checkQuery = mysqli_query($con, $checkUser);

    if(mysqli_num_rows($checkQuery) > 0){
        $json = array("response" => 'error', "status" => 202, "message" => 'User exists!');
    }
    else
    {
        $insertQuery = "INSERT INTO user(name, surname, email, password) VALUES('$name', '$surname', '$email', '$password')";
        $result = mysqli_query($con, $insertQuery);

        if($result){
            $json = array("response" => 'success', "status" => 200, "message" => 'Registration Successful');
        }
        else{
            $json = array("response" => 'success', "status" => 200, "message" => 'Registration Successful');
        }

    }
    
    //echo json_encode($json);

?>