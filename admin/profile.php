<!-- PHP Code Start  -->

<?php
ob_start();
$showalert=false;
session_start();
include ('../include/connection.php');
?>

<!-- PHP Code End  -->
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Admin Profile</title>
</head>

<body>
  
  <!-- PHP Code Start  -->
  <?php
  include ('../include/header.php');
   $user= $_SESSION['admin'];
   $sql="SELECT * FROM `admin` WHERE `username`='$user'";
   $result=mysqli_query($conn,$sql);
   while($data=mysqli_fetch_assoc($result)){
       $username=$data['username'];
       $profile=$data['profile'];
   }

  ?>

  <!-- PHP Code End  -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2" style="margin-left: -20px;">

        <?php
        include ('nav.php');
        ?>
        
      </div>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-6">

            <?php
            if(isset($_POST['submit'])){
            $profiles=$_FILES['img']['name'];
            $sql="UPDATE `admin` SET `profile`='$profiles' WHERE `username`='$user'";
            if(empty($profiles)){
         

          }
          else{
           $result=mysqli_query($conn,$sql);
           if($result){
          move_uploaded_file($_FILES['img']['tmp_name'],"images/$profiles");
            }
          header("location:profile.php");
          }
          }

          ?>
            <h4>
              <?php echo $username; ?> Profile
            </h4>

            <form method="POST" enctype="multipart/form-data">
              <?php
  
  echo"<img src='images/$profile' class='img-fluid' style='height:300px'>";

  ?>
              <br><br>
              <div class="form-group">
                <label for="update">Update Profile</label>
                <input type="file" name="img" id="update" class="form-control">
              </div>
              <br>
              <input type="submit" name="submit" value="Update Profile" class="btn btn-primary">
            </form>

          </div>
          <div class="col-md-6">
            <?php
if(isset($_POST['change'])){
    $uname=$_POST['uname'];
    
    $sql="UPDATE `admin` SET `username`='$uname' WHERE `username`='$user'";
    if(empty($uname)){

    }
    else{
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['admin']=$uname;
    }
}
    header("location:profile.php");
}


?>

            <form method="POST">
              <div class="form-group">
                <label for="uname"><b>Change Username</b></label>

                <input type="text" name="uname" id="uname" class="form-control"><br>
                <input type="submit" value="Change" name="change" class="btn btn-primary">

              </div>

            </form>
            <br><br><br>

            <?php
  if(isset($_POST['changePass'])){
      $old_pass=$_POST['opass'];
      $new_pass=$_POST['npass'];
      $con_pass=$_POST['cpass'];
      $error=array();

      $Old_sql="SELECT * FROM `admin` WHERE `username`='$user'";
      $res=mysqli_query($conn,$Old_sql);
      $row=mysqli_fetch_assoc($res);
      $pass=$row['password'];

      if(empty($old_pass)){
          $error['p']="Enter Old Password";
      }elseif(empty($new_pass)){
          $error['p']="Enter New Password";
      }elseif(empty($con_pass)){
          $error['p']="Enter Confirm Password";
      }elseif($old_pass!=$pass){
          $error['p']="Invalid Old Password";
      }elseif($new_pass!=$con_pass){
          $error['p']="New password and confirm password should be same";

      }
      
          
          if(count($error)==0){
              $sql="UPDATE `admin` SET `password`='$new_pass' WHERE `username`='$user'";
              $result=mysqli_query($conn,$sql);
              $showalert=true;
          }
          
          
      }
     
  
  if(isset($error['p'])){
    $Err=$error['p'];
    $showError="<h5 class='alert alert-danger text-center'>$Err</h5>";

   }
else{ 
    $showError="";
}



  ?>

            <form method="POST">
              <h5 class="text-center my-3">Change Password</h5>
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
  echo $showError;
?>
              </div>

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
                <input type="password" name="cpass" id="conf" class="form-control">
              </div>
              <br>
              <input type="submit" name="changePass" value="Change Password" class="btn btn-success">

            </form>
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