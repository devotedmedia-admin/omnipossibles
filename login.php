<!-- PHP -->
<?php
    session_start();
?>

<?php
require 'connection.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkUserEmail = "SELECT * FROM user WHERE email = '$email'";
    $resultEmail = mysqli_query($con, $checkUserEmail);

    if(mysqli_num_rows($resultEmail) > 0){
        $checkUser = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
        $resultUser = mysqli_query($con, $checkUser);
        if(mysqli_num_rows($resultUser) > 0){
            while($row = $resultUser->fetch_assoc()){
                $_SESSION['user'] = $row["id"];
                $_SESSION['username'] = $row["name"];

                if($row['email'] == 'admin@omnipossibles.com'){       
                    header('location:admin.php');
                        
                }else{                               
                        header('Location:loggedHome.php');
                }
        }
        }
        else{
            $alert = "<script>alert('Incorrect login credintials');</script>";
        }
    }
    else{
        $alert = "<script>alert('User does not exist. Please register');</script>";
    }

    echo $alert;
    
    }
    
    else if(isset($_POST['register'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $checkUser = "SELECT * FROM user WHERE email = '$email'";
        $checkQuery = mysqli_query($con, $checkUser);

        if(mysqli_num_rows($checkQuery) > 0){
            // $json = array("response" => 'error', "status" => 202, "message" => 'User exists!');
            $alert = "<script>alert('User email exists!');</script>";
        }
        else
        {
            $insertQuery = "INSERT INTO user(name, surname, email, password) VALUES('$name', '$surname', '$email', '$password')";
            $result = mysqli_query($con, $insertQuery);

            if($result){
                $alert = "<script>alert('Registration Successful. Please login');</script>";
            }
            else{
                $alert = "<script>alert('Registration Failed');</script>";
            }

        }
        echo $alert;
        }

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
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
            <a href="" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
                <h1 class="text-primary m-0">OMNIPOSSIBLES</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="home.php" class="nav-item nav-link">HOME</a>
                    <a href="about.php" class="nav-item nav-link">ABOUT US</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">SERVICES</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="booking.php" class="dropdown-item">BOOK A SERVICE</a>
                            <a href="quotation.php" class="dropdown-item">GET QUOTE</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">CONTACT US</a>
                </div>
                <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="ms-3">
                        <a href="" class="nav-item nav-link text-white">Login / Register</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-4">Login</h1>
                    <div class="bg-light p-5 d-flex">
                        <form method="POST">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="loginEmail" placeholder="Email" required="required">
                                        <label for="loginEmail">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="password" type="password" class="form-control" id="loginPassword" placeholder="Password" required="required">
                                        <label for="loginPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="login" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-4">Register</h1>
                    <div class="bg-light p-5 d-flex">
                        <form method="POST">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="name" type="text" class="form-control" id="registerName" placeholder="Name" required="required">
                                        <label for="registerName">Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="surname" type="text" class="form-control" id="registerSurname" placeholder="Surname" required="required">
                                        <label for="registerSurname">Surname</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="registerEmail" placeholder="Email" required="required">
                                        <label for="registerEmail">Email</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="password" type="password" class="form-control" id="registerPassword" placeholder="Password" required="required">
                                        <label for="registerPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="register" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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
                    <a class="btn btn-link" href="">Clogged drains Repairs</a>
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