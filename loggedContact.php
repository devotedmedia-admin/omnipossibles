<!-- PHP -->
<?php
    session_start();
?>

<?php

require 'connection.php';

if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $insertQuery = "INSERT INTO queries(name, surname, email, phone, message) VALUES('$name', '$surname', '$email', '$phone', '$message')";
    $result = mysqli_query($con, $insertQuery);

    // if ($result) {
    //     $json = array("response" => 'success', "status" => 200, "message" => 'Message Successfully Sent');
    // } else {
    //     $json = array("response" => 'error', "status" => 201, "message" => 'Message Sending Failed');
    // }

    // echo json_encode($json);
    
    if ($result) {
        $alert = "<script>alert('Message Successfully Sent. Expect response within the next 24hrs.');</script>";
        
    } else {
        $alert = "<script>alert('Message Sending Failure');</script>";
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
    <style>
        .container {
            margin-top: 10px;

            min-height: 10vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: transparent;
        }

        .container .card {
            height: 500px;
            width: 1200px;
            background-color: #fff;
            position: relative;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            cursor: pointer
        }

        .container .card .form {
            width: 100%;
            height: 100%;
            display: flex
        }

        .container .card .left-side {
            width: 40%;
            background-color: #3e2093;
            height: 100%;
            border-radius: 10px;
            position: relative;
            overflow: hidden
        }

        .left-side .top {
            color: #fff;
            padding: 30px
        }

        .top h4 {
            font-size: 19px;
            margin-bottom: 10px
        }

        .top p {
            color: #ded9ec;
            font-size: 14px
        }

        .medium {
            display: flex;
            align-items: start;
            flex-direction: column;
            padding: 0 30px;
            color: white;
            position: relative;
            margin-top: 25px
        }

        .medium .fa-phone {
            position: absolute;
            font-size: 20px;
            transition: all 0.5s;
            left: -50px
        }

        .medium p:nth-child(2) {
            position: absolute;
            top: 1px;
            left: 20px;
            margin-left: 10px;
            font-size: 13px;
            transition: all 0.5s
        }

        .left-side:hover .medium p:nth-child(2) {
            left: 50px
        }

        .medium .fa-envelope-o {
            padding-top: 35px;
            font-size: 17px;
            position: absolute;
            left: -50px;
            top: 22px;
            transition: all 0.5s
        }

        .medium p:nth-child(4) {
            position: absolute;
            top: 55px;
            left: 20px;
            margin-left: 10px;
            font-size: 13px;
            transition: all 0.5s
        }

        .left-side:hover .medium p:nth-child(4) {
            left: 50px
        }

        .medium .fa-map-marker {
            padding-top: 35px;
            font-size: 20px;
            position: absolute;
            top: 72px;
            left: -50px;
            transition: all 0.5s
        }

        .medium p:nth-child(6) {
            position: absolute;
            top: 108px;
            left: 20px;
            margin-left: 10px;
            font-size: 13px;
            transition: all 0.5s
        }

        .left-side:hover .medium p:nth-child(6) {
            left: 50px
        }

        .left-side:hover .fa-phone {
            top: 1px;
            left: 30px;
            position: absolute
        }

        .left-side:hover .fa-envelope-o {
            position: absolute;
            left: 30px
        }

        .left-side:hover .fa-map-marker {
            position: absolute;
            left: 30px
        }

        .last {
            padding: 0 30px;
            padding-top: 272px;
            position: relative;
            letter-spacing: 10px;
            font-size: 15px;
            color: #ccc3e2
        }

        .last .fa-facebook-f {
            position: absolute;
            left: -50px;
            top: 275px;
            transition-delay: 0.6s;
            transition: all 0.5s
        }

        .left-side:hover .fa-facebook-f {
            position: absolute;
            left: 30px
        }

        .last .fa-twitter {
            position: absolute;
            top: 275px;
            left: -50px;
            transition: all 0.5s;
            transition-delay: 0.2s
        }

        .left-side:hover .fa-twitter {
            position: absolute;
            left: 58px
        }

        .last .fa-instagram {
            position: absolute;
            left: -50px;
            top: 275px;
            transition: all 0.5s;
            transition-delay: 0.4s
        }

        .left-side:hover .fa-instagram {
            position: absolute;
            left: 90px
        }

        .last .fa-linkedin {
            position: absolute;
            left: -50px;
            top: 275px;
            transition: all 0.5s;
            transition-delay: 0.6s
        }

        .left-side:hover .fa-linkedin {
            position: absolute;
            left: 120px
        }

        .last:nth-child(5) {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            background-color: #fa949d
        }

        .left-side::before {
            content: '';
            position: absolute;
            background-color: #fa949d;
            height: 270px;
            width: 270px;
            bottom: -120px;
            right: -120px;
            border-radius: 50%
        }

        .left-side::after {
            content: '';
            position: absolute;
            background-color: #7e53f9;
            height: 120px;
            width: 120px;
            bottom: 50px;
            right: 65px;
            border-radius: 50%;
            opacity: 0.9
        }

        .container .card .right-side {
            width: 55%;
            background-color: #fff;
            height: 100%;
            border-radius: 10px;
            padding: 15px 30px;
            position: relative
        }

        .card-details {
            width: 100%;
            position: relative
        }

        .input-group {
            display: flex;
            box-sizing: border-box;
            gap: 10px;
            width: 100%;
            margin-bottom: 20px
        }

        .input-group .input {
            width: 100%
        }

        input[type='text'] {
            height: 25px;
            width: 100%;
            box-sizing: border-box;
            outline: 0;
            border: none;
            border-bottom: 2px solid #ccc
        }

        .input {
            position: relative;
            margin-bottom: 13px
        }

        .input span {
            position: absolute;
            top: 0;
            font-size: 14px;
            left: 0;
            transition: all 0.5s
        }

        .input input:focus~span,
        .input input:valid~span {
            position: absolute;
            top: -13px;
            font-size: 11px
        }

        .card-detalis .input input[type='text']:nth-child(1) {
            position: absolute;
            top: 10px;
            left: 50px
        }

        .right-side p {
            position: absolute;
            top: 220px;
            font-weight: 700;
            font-size: 13px
        }

        .right-side .radio {
            position: relative
        }

        .right-side .radio input:nth-child(1) {
            position: absolute;
            top: 240px;
            left: -225px
        }

        .right-side .radio p:nth-child(2) {
            top: 239px;
            left: -205px;
            font-size: 11px
        }

        .right-side .radio input:nth-child(3) {
            position: absolute;
            top: 240px;
            left: -115px
        }

        .right-side .radio p:nth-child(4) {
            top: 239px;
            left: -95px;
            font-size: 11px
        }

        .right-side .radio input:nth-child(5) {
            position: absolute;
            top: 240px;
            left: 30px
        }

        .right-side .radio p:nth-child(6) {
            top: 239px;
            left: 55px;
            font-size: 11px
        }

        .right-side .radio input:nth-child(7) {
            position: absolute;
            top: 240px;
            left: 160px
        }

        .right-side .radio p:nth-child(8) {
            top: 239px;
            left: 180px;
            font-size: 11px
        }

        .centered {
            display: flex;
            align-items: center;
            font-size: 12px;
            gap: 6px;
            padding-top: 10px
        }

        input[type="radio"] {
            display: none
        }

        input[type="radio"]+label {
            appearance: none;
            cursor: pointer;
            display: inline-block;
            padding-left: 34px;
            position: relative;
            vertical-align: middle
        }

        input[type="radio"]:checked+label {
            backface-visibility: hidden;
            animation: checked 200ms ease 1
        }

        input[type="radio"]+label:before {
            background: none repeat scroll 0 0 rgba(255, 255, 255, 0);
            border-radius: 100% 100% 100% 100%;
            content: "";
            height: 7px;
            left: 12px;
            position: absolute;
            top: 6px;
            width: 7px
        }

        input[type="radio"]+label:hover:before {
            background: none repeat scroll 0 0 rgba(255, 255, 255, 0.5)
        }

        input[type="radio"]:checked+label:before {
            background: none repeat scroll 0 0 blue
        }

        input[type="radio"]+label:after {
            border: 3px solid #ccc;
            border-radius: 100% 100% 100% 100%;
            content: "";
            height: 15px;
            left: 5px;
            position: absolute;
            top: -1px;
            width: 15px
        }

        input[type="radio"]:checked+label:after {
            border-color: blue
        }

        @keyframes checked {
            0% {
                tranform: scale(1)
            }

            50% {
                transform: scale(1.05)
            }

            100% {
                transform: scale(1)
            }
        }

        .text-area {
            margin-top: 30px;
            position: relative
        }

        .text-area span {
            position: absolute;
            top: 0px;
            left: 0;
            transition: all 0.5s
        }

        .text-area textarea:focus~span,
        .text-area textarea:valid~span {
            position: absolute;
            top: -15px;
            font-size: 11px
        }

        .text-area textarea {
            width: 100%;
            height: 100px;
            resize: none;
            border: none;
            border-bottom: 2px solid #ccc;
            outline: none
        }

        .button {
            position: relative
        }

        .button button {
            height: 45px;
            width: 140px;
            background-color: blue;
            color: white;
            font-size: 12px;
            position: absolute;
            bottom: -100px;
            right: 20px;
            border-radius: 7px;
            transition: all 0.5s;
            outline: none;
            border: none;
        }

        .button:hover button {
            background-color: darkblue;
            cursor: pointer
        }

        @media (max-width:750px) {
            .input {
                width: 100%
            }

            .container .card {
                max-width: 350px
            }

            .container .card .right-side {
                width: 100%;
                display: none
            }

            .container .card .left-side {
                width: 100%
            }

            .input-group {
                display: block
            }
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
                    <a href="loggedHome.php" class="nav-item nav-link">HOME</a>
                    <a href="loggedAbout.php" class="nav-item nav-link">ABOUT US</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">SERVICES</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="booking.php" class="dropdown-item">BOOK A SERVICE</a>
                            <a href="loggedQuotation.php" class="dropdown-item">GET QUOTE</a>
                        </div>
                    </div>
                    <a href="" class="nav-item nav-link">CONTACT US</a>
                </div>
                <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="ms-3">
                        <a href="logout.php" class="nav-item nav-link text-white">Sign Out</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <iframe class=" container position-relative w-100 py-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57253.284562264205!2d27.796038858203126!3d-26.250941899999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e95a710273836b1%3A0x9d3e7a097c70fc15!2sOmnipossibles%20(pty)%20Ltd!5e0!3m2!1sen!2sza!4v1663679926512!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        frameborder="0" style="height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
        tabindex="0">
    </iframe>

    <div class="container-xxl py-5">
        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="background-color:transparent">
            <h6 class="text-secondary text-uppercase">TALK WITH US</h6>
            <h1 class="mb-4">Contact Us For Any Query</h1>

        </div>
    </div>

    <!-- Contact Start -->
    <div class="container mb-5">
        <div class="card mb-5">
            <div class="form">
                <div class="left-side">
                    <div class="top">
                        <h4 style="color:orange">Contact Information</h4>
                        <p>Fill up the form and our Team will get back to you within 24 hours.</p>
                    </div>
                    <div class="medium">
                        <i class="fa fa-phone"></i>
                        <p>+27 73 451 8986</p>
                        <i class="fa fa-envelope-"></i>
                        <p>omnipossibles@gmail.com</p>
                        <i class="fa fa-map-marker"></i>
                        <p>119 Mdikaledi St, Molapo, Soweto, 1818</p>
                    </div>
                    <div class="last">
                        <span><i class="fa fa-facebook-f"></i></span>
                        <span> <i class="fa fa-twitter"></i></span>
                        <span><i class="fa fa-instagram"></i></span>
                        <span><i class="fa fa-linkedin"></i></span>
                    </div>
                </div>
                <div class="right-side">
                    <form method="POST">
                        <div class="card-details">
                            <div class="input-group">
                                <div class="input">
                                    <input name="name" type="text" required="required">
                                    <span>First Name</span>
                                </div>
                                <div class="input">
                                    <input name="surname" type="text" required="required">
                                    <span>Last Name</span>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input">
                                    <label for="eA">Enter a email:</label>
                                    <input id="eA" name="email" type="email" required="required" placeholder=" luthando@gmail.com" style="width:50%;">
                                </div>
                                <div class="input">
                                    <label for="phoneNo">Enter a phone number:</label>
                                    <input id="phoneNo" name="phone" type="tel" pattern=".{10,10}" required="required" placeholder=" 0659892475" style="width:20%;">
                                </div>
                            </div>
                        </div>
                        <div class="below-content">
                            <div class="text-area">
                                <textarea name="message" required="required"></textarea>
                                <span>Message</span>
                            </div>
                            <div class="button">
                                <button style="width:90%;" name="contact" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>

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