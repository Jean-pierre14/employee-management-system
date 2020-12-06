<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);


  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $sql = "SELECT * from `employee` WHERE id=$id";
  $sql2 = "SELECT total from `salary` WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn , $sql2);
  $salary = mysqli_fetch_array($result2);
  $empS = ($salary['total']);
 
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $firstname = $res['firstName'];
  $lastname = $res['lastName'];
  $email = $res['email'];
  $contact = $res['contact'];
  $address = $res['address'];
  $gender = $res['gender'];
  $birthday = $res['birthday'];
  $nid = $res['nid'];
  $dept = $res['dept'];
  $degree = $res['degree'];
  $pic = $res['pic'];
}
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

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

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
                        <li class="nav-item "><a class="nav-link" href="eloginwel.php?id=<?php echo $id?>">Home</a></li>
                        <li class="nav-item active"><a class="nav-link" href="myprofile.php?id=<?php echo $id?>">My
                                Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="empproject.php?id=<?php echo $id?>">My
                                Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="applyleave.php?id=<?php echo $id?>">Apply
                                Leave</a></li>


                        <li class="nav-item"><a class="nav-link" href="sniper.php?logout">LogOut</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- <form id = "registration" action="edit.php" method="POST"> -->
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">My Info</h2>
                    <form method="POST" action="myprofileup.php?id=<?php echo $id?>">

                        <div class="input-group">
                            <img src="process/<?php echo $pic;?>" height=150px width=150px>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <p>First Name</p>
                                    <input class="input--style-1" type="text" name="firstName"
                                        value="<?php echo $firstname;?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <p>Last Name</p>
                                    <input class="input--style-1" type="text" name="lastName"
                                        value="<?php echo $lastname;?>" readonly>
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                            <p>Email</p>
                            <input class="input--style-1" type="email" name="email" value="<?php echo $email;?>"
                                readonly>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <p>Date of Birth</p>
                                    <input class="input--style-1" type="text" name="birthday"
                                        value="<?php echo $birthday;?>" readonly>

                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <p>Gender</p>
                                    <input class="input--style-1" type="text" name="gender"
                                        value="<?php echo $gender;?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <p>Contact Number</p>
                            <input class="input--style-1" type="number" name="contact" value="<?php echo $contact;?>"
                                readonly>
                        </div>

                        <div class="input-group">
                            <p>NID</p>
                            <input class="input--style-1" type="number" name="nid" value="<?php echo $nid;?>" readonly>
                        </div>


                        <div class="input-group">
                            <p>Address</p>
                            <input class="input--style-1" type="text" name="address" value="<?php echo $address;?>"
                                readonly>
                        </div>

                        <div class="input-group">
                            <p>Department</p>
                            <input class="input--style-1" type="text" name="dept" value="<?php echo $dept;?>" readonly>
                        </div>

                        <div class="input-group">
                            <p>Degree</p>
                            <input class="input--style-1" type="text" name="degree" value="<?php echo $degree;?>"
                                readonly>
                        </div>


                        <div class="input-group">
                            <p>Total Salary</p>
                            <input class="input--style-1" type="text" name="degree" value="<?php echo $empS;?>"
                                readonly>
                        </div>

                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>"
                            required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name="send">Update Info</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
    <footer class="footer-area bg-f">

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="company-name">All Rights Reserved. &copy; 2020 <a href="#">Employees Management
                                System</a> Design By :
                            <a href="#">Eloi</a>
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