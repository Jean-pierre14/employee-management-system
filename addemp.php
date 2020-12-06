<?php 
session_start();
if (!isset($_SESSION["email"])) {
  header("location: alogin.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Tea Company Management System</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!--<link rel="stylesheet" type="text/css" href="styleapply.css">-->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS
    <link href="css/main.css" rel="stylesheet" media="all"> -->

</head>

<body>
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg p-0 navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logonew.png" alt="" width="200">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="aloginwel.php">Home</a></li>
                        <li class="nav-item active"><a class="nav-link" href="addemp.php">Add Employee</a></li>

                        <li class="nav-item"><a class="nav-link" href="assign.php">Assign Project</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">All
                                pages</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="viewemp.php">View Employee</a>
                                <a class="dropdown-item" href="salaryemp.php">Salary Table</a>
                                <a class="dropdown-item" href="empleave.php">Employee Leave</a>
                                <a class="dropdown-item" href="assignproject.php">Project Status</a>

                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="sniper.php?logout">LogOut</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!--========================================================-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center" style="margin-top: 80px;">
                    <p>Employee Registration</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="process/addempprocess.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fn">First name</label>
                            <input class="form-control" id="fn" type="text" placeholder="First Name" name="firstName"
                                required="required">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ln">Last name</label>
                            <input class="form-control" id="ln" type="text" placeholder="Last Name" name="lastName"
                                required="required">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="em">email</label>
                            <input class="form-control" id="email" type="email" placeholder="Email" name="email"
                                required="required">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dob">birth date</label>
                            <input type="date" id="dob" name="birthday" placeholder="BIRTHDATE" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option disabled="disabled" selected="selected">GENDER</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="ph">Phone</label>
                            <input class="form-control" id="ph" type="number" placeholder="Contact Number"
                                name="contact" required="required">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="num">NID</label>
                            <input class="form-control" type="number" placeholder="NID" name="nid" required="required">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ad">Address</label>
                            <input class="form-control" type="text" placeholder="Address" name="address"
                                required="required">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dep">department</label>
                            <select name="dept" class="form-control">
                                <option disabled="disabled" selected="selected">DEPARTMENT</option>
                                <option value="Production">Production</option>
                                <option value="Plantation">Plantation</option>
                                <option value="Finance">Finance</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Tea making">Tea making</option>
                                <option value="Administration">Administration</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="degree">Degree</label>
                            <input class="form-control" id="degree" type="text" placeholder="Degree" name="degree"
                                required="required">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="salary">Salary</label>
                            <input class="form-control" type="number" placeholder="Salary" name="salary">
                        </div>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <footer class="footer-area bg-f">

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="company-name">All Rights Reserved. &copy; 2020 <a href="#">Employees Management
                                System</a> Design By :
                            <a href="#">Eloi & Aggee</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o"
            aria-hidden="true"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>