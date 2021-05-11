<?php
session_start();
$login=false;
$showErr=false;

if($_SERVER['REQUEST_METHOD']=="POST"){
    require ('include/connection.php');

$username=$_POST['uname'];
$password =$_POST['pass'];

$sql="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password' ";
$result=mysqli_query($conn,$sql);
$num= mysqli_num_rows($result);
if($num==1){
    $login=true;
    session_start();
    $_SESSION['logged']=true;
    $_SESSION['admin']=$username;
    header("location:admin/index.php");
}
else{
    $showErr=true;
}

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

  <title>Admin Login</title>
  <style>


  </style>
</head>

<body>
  <?php
      include 'include/header.php'; ?>



  <div class="container my-4">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <?php
      if($login){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your login successfuuly Completed.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }

      ?>

        <?php
      if($showErr){
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Failed!</strong> Invalid credentials.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }

      ?>
        <img class=" mx-auto d-block" src="img/adminlogin.jpg" alt="" width="300px" height="200px">
          

          <!-- login form start  -->

        <form action="adminlogin.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Username</label>
            <input type="text" class="form-control" id="email" name="uname" aria-describedby="emailHelp">

          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="pass">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <input type="submit" value="Login" class="btn btn-success">
        </form>

        <!-- login form end  -->

      </div>
      <div class="col-md-3"></div>
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