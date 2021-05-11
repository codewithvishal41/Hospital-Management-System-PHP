<?php
include ('include/connection.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Patients Register</title>
  </head>
  <body>
  <?php
  include ('include/header.php');
  if(isset($_POST['register'])){
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $con=$_POST['cpass'];
    $img=$_FILES['img']['name'];

    $error=array();

    $sqlExist="SELECT * FROM `patient` WHERE `username`='$uname'";
    $res=mysqli_query($conn,$sqlExist);
    $row=mysqli_num_rows($res);

    if(empty($fname)){
      $error['r']="Enter your name";
    }elseif(empty($email)){
      $error['r']="Enter your Email";
    }elseif(empty($phone)){
      $error['r']="Enter your Phone";
    }elseif($gender== ""){
      $error['r']="Please select your gender";
    }elseif($row>0){
      $error['r']="Username already exist,please choose other username";
    }
    elseif(empty($pass)){
      $error['r']="Enter your password";
    }elseif($pass!=$con){
      $error['r']="Both password should be same";
    }elseif(empty($img)){
      $error['r']="Choose your profile picture";
    }

    if(count($error)==0){
      $sql="INSERT INTO `patient`(`Sr.No`, `name`, `email`, `phone`, `gender`, `username`, `password`, `image`, `date-of-register`) VALUES (NULL,'$fname','$email','$phone','$gender','$uname','$pass','$img', current_timestamp())";
    $result=mysqli_query($conn,$sql);
    if($result){
      move_uploaded_file($_FILES['img']['tmp_name'],"pimages/$img");
      echo "
      <script> 
      Swal.fire('Registered Successfully,login with your Username & Password')</script>";

      
      header("location:patientslogin.php");

      
     
      
      
    } 
    
    // else{
    //   echo "error". mysqli_error($conn);
    // }

    }
     }
     if(isset($error['r'])){
       $err=$error['r'];
       $showErr="<h5 class='text-center alert alert-danger'>$err</h5>";
     }
     else{
       $showErr= "";
     }
     
  ?>
  <div class="container-fluid" style="margin-bottom:20px;">
  <div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6 ">
  <h5 class="text-center my-4">Create an Patient Account</h5>
  <div>
    <?php
    echo $showErr;

    ?>
  </div>
  <img class=" mx-auto d-block" src="img/reg.png" alt="" width="300px" height="200px">

  <form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="fname" class="form-label">Patient's Name</label>
    <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" name="fname" placeholder="Enter Patient's Name">
   
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Phone No.</label>
    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
  </div>

  <div class="mb-3">
    <label for="gender" class="form-label">Gender</label>
    <select name="gender" class="form-control" id="gender">
      <option value ="">Select your Gender</option>
      <option value ="Male">Male</option>
      <option value ="Female">female</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="uname" class="form-label">Username</label>
    <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username">
  </div>

  <div class="mb-3">
    <label for="pass" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password">
  </div>

  <div class="mb-3">
    <label for="cpass" class="form-label">Confirm Passward</label>
    <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm Password">
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Profile image</label>
    <input type="file" class="form-control" id="image" name="img" >
  </div>

  
  

  <input type="submit" class="btn btn-primary" name="register" value="Create Account">
  <p>Already have an account <a class="text-primary" href="patientslogin.php">Login Here</a></p>
  
 
</form>
  </div>
  <div class="col-md-3"></div>
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