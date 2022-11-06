<?php

session_start();

require 'connection.php';

if(!isset($_SESSION['user'])){
    header('Location:login.php');
}

    $user_id = $_SESSION['user'];


?>
     <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Omnipossibles Solutions</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Selector style -->
    <style>
        .multi_selector{
            margin: 80px auto;
        }
        .multi_selector select{
            width: 100%;
        }
        .adminContent{
            margin:2% 0 1% 5%;
        }
        input{
            background: blue;
            color:white;
            border: 3px solid skyblue;
            margin: 2% 3% 2% 2%;
            width: 25%;
        }
        table{
            width: 90%;
        }
        th{
            margin: 5%;
            background-color: skyblue;
            width: 20%;
            border-bottom: 2px solid black;
        }
        td{
            border-bottom: 2px solid black;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <h1 class="text-primary m-0">OMNIPOSSIBLE SOLUTIONS</h1>
                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <p class="m-0">119 Mdikaledi St, Molapo, Soweto, 1818</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far fa-envelope-open text-primary me-2"></i>
                    <p class="m-0">omnipossibles@gmail.com</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="ms-3">
                        <a href="logout.php" class="nav-item nav-link text-white">Sign Out</a>
                    </div>
                </div>
    <!-- Topbar End -->

    <div class="container adminContent">

    
<form method="post">
<input type="submit" name="viewBookings" value="VIEW BOOKINGS" >
<input type="submit" name="viewQueries" value="VIEW QUERIES" >
<input type="submit" name="viewUsers" value="VIEW USERS" >


<?php

if(!isset($_REQUEST['viewBookings']) && !isset($_REQUEST['viewQueries']) && !isset($_REQUEST['viewUsers'])){
    
    echo "<img class='container' src='img/res2.png' alt='img'>";
}

if(isset($_REQUEST['viewBookings'])){
    $sql = "SELECT * FROM bookings";
    if($results = mysqli_query($con, $sql)){
        if(mysqli_num_rows($results) > 0){
            echo "<table>";
            echo '<thead style="background:skyblue">';
                    echo "<tr>";
                    echo "<td>Booking ID</td>";
                    echo "<td>User ID</td>";
                    echo "<td>Service </td>";
                    echo "<td>Date</td>";
                    echo "<td>Address</td>";

                
                 
                echo "</tr>";
                echo "</thead>";
            while($row = mysqli_fetch_array($results)){
                echo "<tbody>";
                echo "<tr>";
                   echo "<td>" .$row['id'] . "</td>";
                   echo "<td>" .$row['user_id'] . "</td>";
                    echo "<td>" . $row['service'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";

                echo "</tr>";
                echo "</tbody>";
            }
            echo "</table>";
            mysqli_free_result($results);
        } else{
            echo "No  bookings have been made.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    }

    if(isset($_REQUEST['viewQueries'])){
        $sql = "SELECT * FROM queries";
        if($results = mysqli_query($con, $sql)){
            if(mysqli_num_rows($results) > 0){
                echo "<table>";
                echo "<tr>";
                        echo "<th>Query ID</th>";
                        echo "<th>Email</th>";
                        echo "<th>Message</th>";
                    
                     
                echo "</tr>";

                while($row = mysqli_fetch_array($results)){

                    echo "<tr>";
                       echo '<td>' .$row['id'] . '</td>';
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['message'] . "</td>";
    
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($results);
            } else{
                echo "No  bookings have been made.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        }



        if(isset($_REQUEST['viewUsers'])){
            $sql = "SELECT * FROM user";
            if($results = mysqli_query($con, $sql)){
                if(mysqli_num_rows($results) > 0){
                    echo "<table>";
                    echo '<thead style="background:skyblue">';
                            echo "<tr>";
                            echo "<td>User ID</td>";
                            echo "<td>Name </td>";
                            echo "<td>Surname</td>";
                            echo "<td>Email</td>";
                        
                         
                        echo "</tr>";
                        echo "</thead>";
                    while($row = mysqli_fetch_array($results)){
                        echo "<tbody>";
                        echo "<tr>";
                           echo "<td>" .$row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['surname'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
        
                        echo "</tr>";
                        echo "</tbody>";
                    }
                    echo "</table>";
                    mysqli_free_result($results);
                } else{
                    echo "No  users have been made.";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
            }

    // Close connection
    mysqli_close($con);
    ?>
     

</div>
 
</form>
            
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5 col-md-6">
                <h4 class="text-light mb-4">Address</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>119 Mdikaledi St, Molapo, Soweto, 1818</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+27 73 451 8986</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>omnipossibles@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <h4 class="text-light mb-4">Operation Hours</h4>
                <h6 class="text-light">Monday - Friday:</h6>
                <p class="mb-4">09.00 AM - 09.00 PM</p>
                <h6 class="text-light">Saturday - Sunday:</h6>
                <p class="mb-0">09.00 AM - 12.00 PM</p>
            </div>
            <div class="col-lg-3 col-md-4">
                <h4 class="text-light mb-4">Services</h4>
                <p class="btn btn-link" href="">Clogged drains Repairs</a>
                <a class="btn btn-link" href="">Toilet pipes Repairs</a>
                <a class="btn btn-link" href="">Sewer Line Repairs</a>
                <a class="btn btn-link" href="">Water heater Repairs</a>
                <a class="btn btn-link" href="">Leaky faucets&pipes Repairs</a>
                <a class="btn btn-link" href="">Low water pressure Repairs</a>
            </div>
        </div>
    </div>
</div>

    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

     </html>




