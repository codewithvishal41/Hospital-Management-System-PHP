<?php
ob_start();
session_start();
$showalert=false;
include '../include/connection.php';
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

    <title>Doctor's Profile</title>
</head>

<body>
    <?php
  include ('../include/header.php');

  ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-2 responsive" style="margin-left: -15px;">
                <?php
          include ('nav.php');

          ?>
            </div>
            <div class="col-md-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 my-4">
                            <?php
                  $doc=$_SESSION['doctor'];
                  $sql="SELECT * FROM `doctor` WHERE `username`='$doc'";
                  $result=mysqli_query($conn,$sql);
                  $row=mysqli_fetch_assoc($result);

                  if(isset($_POST['upload'])){
                      $img= $_FILES['img']['name'];
                      if(empty($img)){

                      }
                      else{
                          $sql="UPDATE `doctor` SET `image`='$img' WHERE username='$doc'";
                          $result=mysqli_query($conn,$sql);
                          if($result){
                              move_uploaded_file($_FILES['img']['tmp_name'],"images/$img");
                          }
                      }
                      header("location:profile.php");
                  }
                 

                   ?>
                            <form method="POST" enctype="multipart/form-data">
                                <?php
                       echo "<img src='images/".$row['image']." '  style='height: 300px; ' class='col-md-12'>"; 

                       ?>
                                <br><br><input type="file" name="img" class="form-control"><br>
                                <input type="submit" name="upload" value="Update Profile" class="btn btn-success">

                            </form>


                        </div>
                        <div class="col-md-6">

                            <h5 class="text-center my-2">Change Username</h5>
                            <?php
                     if(isset($_POST['submit'])){
                         $uname=$_POST['uname'];
                         if(empty($uname)){

                         }else{
                             $sql="UPDATE `doctor` SET `username`='$uname' WHERE `username`='$doc'";
                             $result=mysqli_query($conn,$sql);
                             if($result){
                                 $_SESSION['doctor']=$uname;
                             }
                         }
                         header("location:profile.php");
                     }

                        ?>
                            <form method="POST">

                                <input type="text" name="uname" id="uname" class="form-control"
                                    placeholder="New Username"><br>
                                <input type="Submit" name="submit" value="Change Username" class="btn btn-primary">

                            </form>
                            <br><br>


                            <?php
                       if(isset($_POST['change'])){
                           $old=$_POST['opass'];
                           $new=$_POST['npass'];
                           $conp=$_POST['cpass'];

                           $error=array();

                           $sql="SELECT * FROM `doctor` WHERE `username`='$doc'";
                           $result=mysqli_query($conn,$sql);
                           $row=mysqli_fetch_assoc($result);
                           $pass=$row['password'];

                           if(empty($old)){
                               $error['p']="Enter old Password";
                           }elseif(empty($new)){
                            $error['p']="Enter new password";

                           }elseif($old!=$pass){
                            $error['p']="Invalid Password";
                           }
                           elseif($new!=$conp){
                            $error['p']=" new password and confirm password should be same";
                           }
                           

                           if(count($error)==0){
                               $sql="UPDATE `doctor` SET `password`='$new' WHERE `username`='$doc'";
                               $result=mysqli_query($conn,$sql);
                               $showalert=true;
                           }
                       }
                       if(isset($error['p'])){
                           $err=$error['p'];
                           $showErr="<h5 class='alert alert-danger text-center'>$err</h5>";
                       }
                       else{
                           $showErr="";
                       }

                       ?>
                     <h5 class="text-center">Change Password</h5>
                            <?php
                      if($showalert){
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> You password is successfully changed.
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                      }

                      ?>
                            <div>
                                <?php
                            echo $showErr;
                             ?>
                            </div>
                            <form method="POST">
                                <div class="form-group">
                                    <label for="old">Old Password</label>
                                    <input type="password" name="opass" id="old" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="new">New Password</label>
                                    <input type="password" name="npass" id="new" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="conf">Confirm Password</label>
                                    <input type="password" name="cpass" id="cong" class="form-control">
                                </div>
                                <br>

                                <input type="submit" name="change" Value="Change Password" class="btn btn-primary">
                            </form>


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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>