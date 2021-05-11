<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>View Patient Details</title>
  </head>
  <body>

  <?php
   include '../include/header.php';

  ?>
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-2" style="margin-left:-15px;">
   <?php
   include 'nav.php';

   ?>
  </div>
  <div class="col-md-10">
  <h5 class="text-center my-3">View Patient Details</h5>
  
  <?php
  if(isset($_GET['id'])){
      $id=$_GET['id'];
      $query="SELECT * FROM `patient` WHERE `Sr.No`='$id'";
      $res=mysqli_query($conn,$query);
      $data=mysqli_fetch_assoc($res);
      $img=$data['image'];
  }


   ?>
   <div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-6">
   <?php
   echo "
    <img src='../pimages/$img' class='img-fluid' height='200px;'>";

    ?>
    <table class="table table-striped my-4">
    <tr>
    <th class="text-center" colspan="2"> <?php echo $data['name'];?>'s Details</th>
    </tr>

    <tr>
    <td>Name</td>
    <td><?php echo $data['name'];?></td>
    </tr>

    <tr>
    <td>Email</td>
    <td><?php echo $data['email'];?></td>
    </tr>

    <tr>
    <td>Phone No.</td>
    <td><?php echo $data['phone'];?></td>
    </tr>

    <tr>
    <td>Gender</td>
    <td><?php echo $data['gender'];?></td>
    </tr>

    <tr>
    <td>Username</td>
    <td><?php echo $data['username'];?></td>
    </tr>

    <tr>
    <td>Date of registration</td>
    <td><?php echo $data['date-of-register'];?></td>
    </tr>

    
    </table>
   </div>
   <div class="col-md-3"></div>
   </div>


  </div>
  </div>
  </div>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    
  </body>
</html>