<?php 
    session_start();
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
    
    if(!$_GET['id']){
        header('Location: elogin.html');
    }
    
    if(!$_SESSION['id']){header("Location: elogin.html");}

	require_once ('process/dbh.php');
	$sql1 = "SELECT * FROM `employee` where id = '$id'";
	$result1 = mysqli_query($conn, $sql1);
	$employeen = mysqli_fetch_array($result1);
	$empName = ($employeen['firstName']);

	$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
	$sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

	$sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";

	$sql3 = "SELECT * FROM `salary` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
?>
<!--=======================================-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Tea</title>
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

</head>

<body>
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg p-0 navbar-light bg-white">
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
                        <li class="nav-item active"><a class="nav-link"
                                href="eloginwel.php?id=<?php echo $id?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="myprofile.php?id=<?php echo $id?>">My Profile</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="empproject.php?id=<?php echo $id?>">My
                                Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="applyleave.php?id=<?php echo $id?>">Apply
                                Leave</a></li>


                        <li class="nav-item"><a class="nav-link" href="sniper.php?logout">LogOut34</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--==========================================-->
    <div class="row">
        <div class="col-lg-12">
            <div class="heading-title text-center" style="margin-top: 80px;">

                <p>Employee Dash board</p>
            </div>
        </div>
    </div>

    <!--- startng of bodyyyy --->
    <h4 class="text-center">Welcome&nbsp;&nbsp;&nbsp;<span class="text-primary"><?php echo "$empName"; ?></span> !</h4>

    <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Empolyee Leaderboard </h2>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>

                            <tr>
                                <th>Seq</th>
                                <th>Emp. ID</th>
                                <th>Name</th>
                                <th>Points</th>


                            </tr>
                        </thead>



                        <?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$seq."</td>";
					echo "<td>".$employee['id']."</td>";
					
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['points']."</td>";
					
					$seq+=1;
				}


			    ?>

                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Due
                                Projects</h2>
                            <table class="table table-bordered table-hover">
                                <thead>

                                    <tr>
                                        <th>Project Name</th>
                                        <th>Due Date</th>

                                    </tr>
                                </thead>



                                <?php
                        while ($employee1 = mysqli_fetch_assoc($result1)) {
                            echo "<tr>";
                            
                            echo "<td>".$employee1['pname']."</td>";
                            
                            echo "<td>".$employee1['duedate']."</td>";

                        }


			            ?>

                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Salary
                            Status</h2>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Base Salary</th>
                                    <th>Bonus</th>
                                    <th>Total Salary</th>

                                </tr>
                            </thead>

                            <?php
                        while ($employee = mysqli_fetch_assoc($result3)) {
                            

                            echo "<tr>";
                            
                            
                            echo "<td>".$employee['base']."</td>";
                            echo "<td>".$employee['bonus']." %</td>";
                            echo "<td>".$employee['total']."</td>";
                            
                        }?>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Leave
                            Status</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>

                                    <tr>

                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Total Days</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php if(@mysqli_num_rows($result2) > 0):?>
                                <?php
                                        while ($employee = mysqli_fetch_assoc($result2)) {
                                            $date1 = new DateTime($employee['start']);
                                            $date2 = new DateTime($employee['end']);
                                            $interval = $date1->diff($date2);
                                            $interval = $date1->diff($date2);

                                            echo "<tr>";
                                            echo "<td>".$employee['start']."</td>";
                                            echo "<td>".$employee['end']."</td>";
                                            echo "<td>".$interval->days."</td>";
                                            echo "<td>".$employee['reason']."</td>";
                                            echo "<td>".$employee['status']."</td>";
                                            
                                        }
                                    ?>
                                <?php else:?>
                                <p class="alert alert-danger">There no data recorded</p>
                                <?php endif;?>
                            </table>
                        </div>
                    </div>
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
                            <a href="#">Eloi & Agge</a>
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