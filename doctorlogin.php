<?php
session_start();

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

    <title>Doctor Login Page</title>
  </head>
  <body>
  <?php
  include ('include/header.php');
  ?>

  <?php
  if(isset($_POST['login'])){
      $uname=$_POST['uname'];
      $pass=$_POST['pass'];
      $error=array();
      $sql="SELECT * FROM `doctor` WHERE `username`='$uname' AND `password`='$pass'";
      $result=mysqli_query($conn,$sql);
      $num=mysqli_num_rows($result);
      if(empty($uname)){
          $error['login']="Please enter your username";
      }elseif(empty($pass)){
          $error['login']="please enter your password";
      }elseif($num==0){
          $error['login']="Invalid Username and Password";
      }
      if(count($error)==0 || ($num==1)){
          session_start();
          $_SESSION['login']=true;
          $_SESSION['doctor']=$uname;
          header("location:doctor/index.php");
      }
  }
  if(isset($error['login'])){
      $err=$error['login'];
      $showErr="<h5 class='alert alert-danger text-center'>$err</h5>";
  }else{
      $showErr="";
  }

  ?>
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6 ">
  
  <h5 class="text-center my-4">Doctor Login</h5>
  <div>
  <?php
  echo $showErr;

  ?>
  </div>
  <img class=" mx-auto d-block" src="img/doc-login.png" alt="" width="300px" height="200px">

<form method="POST" >
  <div class="mb-3">
    <label for="email" class="form-label">Username</label>
    <input type="text" class="form-control" placeholder="Enter Username" autocomplete="off" id="email" name="uname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Enter Password" autocomplete="off"  name="pass">
  </div>
  
  <input type="submit" name="login" value="Doctor Login" class="btn btn-success">
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