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

    <title>Patients Login Page</title>
  </head>
  <body>
  <?php
  include ('include/header.php');
  
if(isset($_POST['login'])){
  $uname=$_POST['uname'];
  $pass=$_POST['pass'];

  $error=array();

  $sql="SELECT * FROM `patient` WHERE `username`='$uname'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($result);
  if(empty($uname)){
    $error['s']="Enter your Username";
  }elseif(empty($pass)){
    $error['s']="Enter your Password";
  }elseif($row==0){
    $error['s']="Invalid Username/Password";
  }
  if(count($error)==0){
    header("location:patient/index.php");

    $_SESSION['patient']=$uname;
  }
}
if(isset($error['s'])){
  $err=$error['s'];
  $showErr="<h6 class='text-center alert alert-danger'>$err</h6>";
}else{
  $showErr="";
}

?>
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6 ">
  <h5 class="text-center my-4">Patients Login Portal</h5>
  <div>
    <?php
    echo $showErr;
?>
  </div>

  <img class=" mx-auto d-block" src="img/pat-login.png" alt="" width="300px" height="200px">

<form method="POST" >
  <div class="mb-3">
    <label for="email" class="form-label">Username</label>
    <input type="text" class="form-control" placeholder="Enter Username" autocomplete="off" id="email" name="uname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Enter Password" autocomplete="off"  name="pass">
  </div>
  
  <input type="submit" name="login" value="Patients Login" class="btn btn-success">
  <p>i don't have an account <a href="patients_Sign.php " class="text-success">Register here </a></p>

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