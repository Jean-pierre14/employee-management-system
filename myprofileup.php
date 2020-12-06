<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

  $id = mysqli_real_escape_string($conn, $_POST['id']);
  
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
 


 $result = mysqli_query($conn, "UPDATE `employee` SET `email`='$email',`contact`='$contact',`address`='$address' WHERE id=$id");

 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='myprofile.php?id=$id  ';
    </SCRIPT>");

  
}
?>




<?php
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $sql = "SELECT * from `employee` WHERE id=$id";
  $result = mysqli_query($conn, $sql);
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
  // $salary = $res['salary'];
}
}

?>

<html>

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
    <div class="top-navbar">
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
    </div>

    <!-- <form id = "registration" action="edit.php" method="POST"> -->
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update Employee Info</h2>
                    <form id="registration" action="myprofileup.php" method="POST">



                        <div class="input-group">
                            <p>Email</p>
                            <input class="input--style-1" type="email" name="email" value="<?php echo $email;?>">
                        </div>


                        <div class="input-group">
                            <p>Contact</p>
                            <input class="input--style-1" type="number" name="contact" value="<?php echo $contact;?>">
                        </div>




                        <div class="input-group">
                            <p>Address</p>
                            <input class="input--style-1" type="text" name="address" value="<?php echo $address;?>">
                        </div>


                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>"
                            required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>

                    </form>
                    <br>
                    <button class="btn btn--radius btn--green"
                        onclick="window.location.href = 'changepassemp.php?id=<?php echo $id?>';">Change
                        Password</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>