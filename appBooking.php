<?php

require 'connection.php';

    $service = $_POST['service'];
    $date = $_POST['date'];
    $address = $_POST['address'];

    $insertQuery = "INSERT INTO bookings(service, date, address) VALUES('$service', '$date', '$address')";
    $result = mysqli_query($con, $insertQuery);

    if ($result) {
        $json = array("response" => 'success', "status" => 200, "message" => 'Booking Successfully Made! Expect response within 3 business days.');
    } else {
        $json = array("response" => 'error', "status" => 201, "message" => 'Booking Failed');
    }

    //echo json_encode($json);

    // if ($result) {
    //     $alert = "<script>alert('Booking Successfully Made!');</script>";
        
    // } else {
    //     $alert = "<script>alert('Booking Failure!');</script>";
    // }

    // echo $alert;


?>