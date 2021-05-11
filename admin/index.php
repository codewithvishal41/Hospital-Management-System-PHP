<?php
include('../include/connection.php');
session_start();


if(!isset($_SESSION['logged'])|| $_SESSION['logged']!=true){
    header("location:../adminlogin.php");
    
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

    <title>Admin</title>

</head>

<body>
    <?php
   include("../include/header.php");
   ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left: -15px;">
                <?php
           require ('nav.php');
           ?>
            </div>
            <div class="col-md-10">
                <h4 class="my-3">Admin Dashboard</h4>

                     <!-- first row Start  -->
                    <div class="row">

                    <!-- total admin start  -->
                    <div class="col-md-3 mx-3 bg-success" style="height: 150px;">
                        <div class="row my-3">
                            <div class="col-md-8 ">
                                <?php
                                $sql= "SELECT * FROM `admin`";
                                $result=mysqli_query($conn,$sql);
                                $num=mysqli_num_rows($result);
                                ?>
                                <h4 class="text-white">
                                    <?php echo $num;?>
                                </h4>
                                <h4 class="text-white">Total</h4>
                                <h4 class="text-white">Admin</h4>
                            </div>
                            <div class="col-md-4">
                                <a href="admin.php"> <i class="fas fa-users-cog fa-3x my-4"
                                        style="color: white;"></i></a>
                            </div>
                        </div>



                    </div>

                    <!-- total admin end  -->

                       <!-- total doctor start  -->
                    <div class="col-md-3 mx-3 bg-warning" style="height: 150px;">
                        <div class="row my-3">
                            <div class="col-md-8 ">
                                <?php
                                $sql= "SELECT * FROM `doctor`";
                                $result=mysqli_query($conn,$sql);
                                $num=mysqli_num_rows($result);
                                ?>

                                <h4 class="text-white">
                                    <?php echo $num;?>
                                </h4>
                                <h4 class="text-white">Total</h4>
                                <h4 class="text-white">Doctor</h4>
                            </div>
                            <div class="col-md-4">
                                <a href="doctor.php"> <i class="fas fa-user-md fa-3x my-4"
                                        style="color: white;"></i></a>
                            </div>
                        </div>
                    </div>

                      <!-- total doctor End  -->

                      <!-- total Patient start  -->
                    <div class="col-md-3 mx-3 bg-danger" style="height: 150px;">
                        <div class="row my-3">
                            <div class="col-md-8 ">
                                <?php
                            $sql="SELECT * FROM `patient`";
                            $result=mysqli_query($conn,$sql);
                            $num=mysqli_num_rows($result);


                             ?>
                                <h4 class="text-white">
                                    <?php echo $num;?>
                                </h4>
                                <h4 class="text-white">Total</h4>
                                <h4 class="text-white">Patients</h4>
                            </div>
                            <div class="col-md-4">
                                <a href="patient.php"> <i class="fas fa-hospital-user fa-3x my-4"
                                        style="color: white;"></i></a>
                            </div>

                        </div>


                    </div>

                      <!-- total patient End  -->
                </div>
                <!-- First row End  -->
                
                <!-- Second start start  -->
                <div class="row my-3">


                  <!-- total Query start  -->
                    <div class="col-md-3 mx-3 bg-info" style="height: 150px;">
                        <div class="row my-3">
                            <div class="col-md-8 ">
                                <?php
                            $sql="SELECT * FROM `report`";
                            $result=mysqli_query($conn,$sql);
                            $num=mysqli_num_rows($result);


                             ?>
                                <h4 class="text-white">
                                    <?php echo $num;?>
                                </h4>
                                <h4 class="text-white">Total</h4>
                                <h4 class="text-white">Query</h4>
                            </div>
                            <div class="col-md-4">
                                <a href="report.php"> <i class="fas fa-inbox fa-3x my-4" style="color: white;"></i></a>


                            </div>




                        </div>
                    </div>

                      <!-- total Query End  -->
                      

                        <!-- total Income start  -->
                    <div class="col-md-3 mx-3 bg-success" style="height: 150px;">
                        <div class="row my-3">
                            <div class="col-md-8 ">
                                <?php
                            $sql="SELECT sum(amount_paid) as profit FROM `income` ";
                            $result=mysqli_query($conn,$sql);
                            $row=mysqli_fetch_assoc($result);
                            $income=$row['profit'];

                            ?>
                                <h4 class="text-white"><i class="fas fa-rupee-sign"></i>
                                    <?php echo $income;?>
                                </h4>
                                <h4 class="text-white">Total</h4>
                                <h4 class="text-white">Income</h4>
                            </div>
                            <div class="col-md-4">
                                <a href="income.php"> <i class="fas fa-money-check-alt fa-3x my-4"
                                        style="color: white;"></i></a>
                            </div>




                        </div>
                    </div>

                    <!-- total income end  -->


                </div>
                <!-- Second row End -->






            </div>





        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    
</body>

</html>