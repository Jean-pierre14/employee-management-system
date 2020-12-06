<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `employee` , `rank` WHERE employee.id = rank.eid";

//echo "$sql";
$result = mysqli_query($conn, $sql);

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
                        <li class="nav-item"><a class="nav-link" href="addemp.php">Add Employee</a></li>

                        <li class="nav-item"><a class="nav-link" href="assign.php">Assign Project</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">All
                                pages</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item active" href="viewemp.php">View Employee</a>
                                <a class="dropdown-item" href="salaryemp.php">Salary Table</a>
                                <a class="dropdown-item" href="empleave.php">Employee Leave</a>
                                <a class="dropdown-item" href="assignproject.php">Project Status</a>
                                <a class="dropdown-item" href="msg.php">Messages</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="sniper.php?logout">LogOut</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--End of header -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center" style="margin-top: 80px;">

                    <p>Employee Details</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Emp. ID</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Birthday</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>NID</th>
                                <th>Address</th>
                                <th>Department</th>
                                <th>Degree</th>
                                <th>Point</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <?php
                    while ($employee = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>".$employee['id']."</td>";
                      echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
                      echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
                      echo "<td>".$employee['email']."</td>";
                      echo "<td>".$employee['birthday']."</td>";
                      echo "<td>".$employee['gender']."</td>";
                      echo "<td>".$employee['contact']."</td>";
                      echo "<td>".$employee['nid']."</td>";
                      echo "<td>".$employee['address']."</td>";
                      echo "<td>".$employee['dept']."</td>";
                      echo "<td>".$employee['degree']."</td>";
                      echo "<td>".$employee['points']."</td>";              
                      echo "<td><div class='btn-group'>
                        <a href=\"edit.php?id=$employee[id]\" class='btn btn-sm btn-info'>Edit</a>
                        <a href=\"delete.php?id=$employee[id]\" class='btn btn-sm btn-danger' onClick=\"return confirm('Are you sure you want to Remove this person?')\">Delete</a></div></td>";

                    }


			            ?>

                    </table>
                </div>
            </div>
        </div>
    </div>



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