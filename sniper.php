<?php
    include("./process/dbh.php");
    $output = '';
    session_start();
    if(isset($_GET['logout'])){
        session_destroy();
        header('Location: elogin.html');
    }
    if(isset($_POST['action'])){
        if($_POST['action'] == 'all'){
            $sql = mysqli_query($conn, "SELECT COUNT(id) AS countItem FROM employee");

            if(@mysqli_num_rows($sql) > 0){
                $data = mysqli_fetch_array($sql);
                $output .= $data['countItem'];
            }else{
                $output .= 'Zero data';
            }
            print $output;
        }
        if($_POST['action'] == 'allM'){
            $sql = mysqli_query($conn, "SELECT COUNT(id) AS countItem FROM employee WHERE gender = 'Male'");

            if(@mysqli_num_rows($sql) > 0){
                $data = mysqli_fetch_array($sql);
                $output .= $data['countItem'];
            }else{
                $output .= 'Zero data';
            }
            print $output;
        }
        if($_POST['action'] == 'allF'){
            $sql = mysqli_query($conn, "SELECT COUNT(id) AS countItem FROM employee WHERE gender = 'Female'");

            if(@mysqli_num_rows($sql) > 0){
                $data = mysqli_fetch_array($sql);
                $output .= $data['countItem'];
            }else{
                $output .= 'Zero data';
            }
            print $output;
        }
        if($_POST['action'] == 'allL'){
            $sql = mysqli_query($conn, "SELECT COUNT(id) AS countItem FROM employee_leave");

            if(@mysqli_num_rows($sql) > 0){
                $data = mysqli_fetch_array($sql);
                $output .= $data['countItem'];
            }else{
                $output .= 'Zero data';
            }
            print $output;
        }
        if($_POST['action'] == 'allFe'){
            $sql = mysqli_query($conn, "SELECT COUNT(id) AS countItem FROM former_employees");
            if(@mysqli_num_rows($sql) > 0){
                $data = mysqli_fetch_array($sql);
                $output .= $data['countItem'];
            }else{
                $output .= 'Zero data';
            }
            print $output;
        }
        if($_POST['action'] == 'allPr'){
            $sql = mysqli_query($conn, "SELECT COUNT(pid) AS countItem FROM project");
            if(@mysqli_num_rows($sql) > 0){
                $data = mysqli_fetch_array($sql);
                $output .= $data['countItem'];
            }else{
                $output .= 'Zero data';
            }
            print $output;
        }
        if($_POST['action'] == 'projects'){
            $sql = mysqli_query($conn, "SELECT * FROM project ORDER BY pid DESC LIMIT 5");
            if(@mysqli_num_rows($sql) > 0){
                $output .= '
                <div class="card">
                        <div class="card-header">
                            <h3>Projects</h3>
                        </div>
                        <div class="card-body px-0">
                            <ul class="list-group list-group-flush">
                ';
                while($data = mysqli_fetch_array($sql)){
                    $output .= '
                                <li class="list-group-item list-group-item-action list-group-item-success">
                                    '.$data['pname'].' <small class="badge badge-primary shadow-sm">'.$data['status'].'</small>
                                </li>
                    ';
                }
                $output .= '
                            </ul>
                        </div>
                    </div>
                ';
            }else{
                $output .= 'Zero Project saved';
            }
            print $output;
        }
        if($_POST['action'] == 'results-a'){
            $sql = mysqli_query($conn, "SELECT * FROM former_employees ORDER BY id DESC");
            if(@mysqli_num_rows($sql) > 0){
                $output .= '
                <table class="table table-sm table-bordered table-striped table-action">
                    <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>department</th>
                        </tr>
                    </thead>
                    <tbody>
                ';
                while($row = mysqli_fetch_array($sql)){
                    $output .= '
                    <tr>
                        <td>'.$row['firstName'].'</td>
                        <td>'.$row['lastName'].'</td>
                        <td>'.$row['gender'].'</td>
                        <td>'.$row['contact'].'</td>
                        <td>'.$row['department'].'</td>
                    </tr>
                    ';
                }
                $output .= '
                </tbody>
                </table>
                ';
            }else{
                $output .= '<p class="alert alert-danger">there no data</p>';
            }
            print $output;
        }
    }