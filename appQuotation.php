<?php
    require 'connection.php';

        $service= $_POST['service'];

        $query = "SELECT * FROM services WHERE service = '$service'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0){

            foreach($result as $data){
                echo "".$data['service']." costs ".$data['price']."";
            }
        }
        else{
            echo "Select a single service at a time.";
        }

?>