<?php
include ('../include/connection.php');
session_start();


if(!isset($_SESSION['login'])|| $_SESSION['login']!=true){
    header("location:../doctorlogin.php");
    
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Doctor's Dashboard</title>
</head>

<body>
    <?php
   include ('../include/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left: -15px;">
                <?php
   include ('nav.php'); ?>
            </div>
            <div class="col-md-10">
                <div class="container-fluid ">
                    <div class="row ">
                        <div class="col-md-3 bg-info my-3 mx-2" style="height:150px">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="text-white my-4">My Profile</h5>

                                </div>
                                <div class="col-md-4">
                                    <a href="profile.php"><i class="fas fa-user-md fa-3x my-4"
                                            style="color:white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-danger my-3 mx-2" style="height:150px">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                            $sql="SELECT * FROM `patient`";
                            $result=mysqli_query($conn,$sql);
                            $num=mysqli_num_rows($result);


                             ?>
                                    <h5 class="text-white my-2">
                                        <?php echo $num;?>
                                    </h5>
                                    <h5 class="text-white ">Total</h5>
                                    <h5 class="text-white ">Patients</h5>

                                </div>
                                <div class="col-md-4">
                                    <a href="patient.php"><i class="fas fa-hospital-user fa-3x my-4"
                                            style="color:white"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 bg-success my-3 mx-2" style="height:150px">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                            $sql="SELECT * FROM `book` WHERE `status`='pending'";
                            $result=mysqli_query($conn,$sql);
                            $num=mysqli_num_rows($result);


                             ?>
                                    <h5 class="text-white my-2">
                                        <?php echo $num;?>
                                    </h5>
                                    <h5 class="text-white ">Total</h5>
                                    <h5 class="text-white ">Appointment</h5>

                                </div>
                                <div class="col-md-4">
                                    <a href="appoinment.php"><i class="fas fa-calendar-check fa-3x my-4"
                                            style="color:white"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>