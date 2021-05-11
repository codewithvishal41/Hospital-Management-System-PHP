<?php
$showalert=false;
session_start();
include ('../include/connection.php');


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>My Profile</title>
    <style>
    body{
        overflow-x:hidden;
    }
    </style>
  </head>
  <body>
  <?php
  include ('../include/header.php');

  ?>
  <div class="conatiner-fluid">
  <div class="row">
  <div class="col-md-2" style="margin-left:-15px;">
  <?php
  include ('nav.php');

  $patient=$_SESSION['patient'];
  $sql="SELECT * FROM `patient` WHERE `username`='$patient'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $myImage=$row['image'];


  ?>
  </div>
  <div class="col-md-10">
  <div class="row">
  <div class="col-md-6">
   <?php
   if(isset($_POST['update'])){
       $img=$_FILES['img']['name'];
       if(empty($img)){

       }else{
           $sql="UPDATE `patient` SET `image`='$img' WHERE `username`='$patient'";
           $result=mysqli_query($conn,$sql);
           if($result){
               move_uploaded_file($_FILES['img']['tmp_name'],"../pimages/$img");
           }
           header("location:profile.php");
       }
   }

   ?>

  <h5 class="my-4">My Profile</h5>
  <form method="POST" enctype="multipart/form-data">
  <?php
  echo "<img src='../pimages/$myImage' class='col-md-12' style='height:300px'>";

  ?>
  <input type="file" name="img" class="form-control my-2">
  <input type="submit" name="update" class='btn btn-primary' value="Update Profile">
  </form>
  <table class="table  table-hover table-dark my-4">
      <thead>
          <tr>
              <th colspan="2" class="text-center">My Details</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td> MY Name</td>
              <td><?php echo $row['name'];  ?></td>
          </tr>

          <tr>
            <td>My Email</td>
            <td><?php echo $row['email'];  ?></td>
        </tr>

        <tr>
            <td>My Phone</td>
            <td><?php echo $row['phone'];  ?></td>
        </tr>

        <tr>
            <td>Gender</td>
            <td><?php echo $row['gender'];  ?></td>
        </tr>

        <tr>
            <td>Username</td>
            <td><?php echo $row['username'];  ?></td>
        </tr>

        <tr>
            <td>Date of Registeration</td>
            <td><?php echo $row['date-of-register'];  ?></td>
        </tr>
      </tbody>
  </table>
  </div>
  <div class="col-md-6">
      <?php
      if(isset($_POST['change'])){
          $old=$_POST['opass'];
          $new=$_POST['npass'];
          $con=$_POST['cpass'];


          $sql="SELECT * FROM `patient` WHERE `username`='$patient'";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
          $pass=$row['password'];

          $error=array();

         
          if(empty($old)){
            $error['c']="Enter old Password";
        }elseif(empty($new)){
         $error['c']="Enter new password";

        }elseif($old!=$pass){
         $error['c']="Invalid Password";
        }
        elseif($new!=$con){
         $error['c']=" new password and confirm password should be same";
        }
        if(count($error)==0){
            $sql="UPDATE `patient` SET `password`='$new' WHERE `username`='$patient'";
            $result=mysqli_query($conn,$sql);
            $showalert=true;
        }
      }

      if(isset($error['c'])){
          $err=$error['c'];
          $showErr="<h5 class='text-center alert alert-danger'>$err</h5>";
      }
      else{
          $showErr="";
      }
      ?>
      <h5 class="text-center my-4">Change Password</h5>
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
            <label for="opass">Old Password</label>
            <input type="password" name="opass" id="opass" class="form-control">
          </div>
          <div class="form-group">
            <label for="npass">New Password</label>
            <input type="password" name="npass" id="npass" class="form-control">
          </div>
          <div class="form-group">
            <label for="cpass">Confirm Password</label>
            <input type="password" name="cpass" id="cpass" class="form-control">
          </div>
          <input type="submit" name="change" class="btn btn-success my-3" value="Change Password">
      </form>
  </div>
  </div>
  </div>
  </div>
  
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>