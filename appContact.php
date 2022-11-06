<?php

require 'connection.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $insertQuery = "INSERT INTO queries(name, surname, email, phone, message) VALUES('$name', '$surname', '$email', '$phone', '$message')";
    $result = mysqli_query($con, $insertQuery);

    if ($result) {
        $json = array("response" => 'success', "status" => 200, "message" => 'Message Successfully Sent');
    } else {
        $json = array("response" => 'error', "status" => 201, "message" => 'Message Sending Failed');
    }

    echo json_encode($json);
    
    // if ($result) {
    //     $alert = "<script>alert('Message Successfully Sent');</script>";
        
    // } else {
    //     $alert = "<script>alert('Message Sending Failure');</script>";
    // }

    // echo $alert;

?>