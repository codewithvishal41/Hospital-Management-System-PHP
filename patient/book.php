<?php
session_start();
include '../include/connection.php';


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <title>Book Appointment</title>
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
        <h5 class="text-center my-3">Book an Appoinment</h5>


        <?php
   $pat=$_SESSION['patient'];
   $sql="SELECT * FROM `patient` WHERE `username`='$pat'";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);
   $name=$row['name'];
   $email=$row['email'];
   $phone=$row['phone'];
   $gender=$row['gender'];

   if(isset($_POST['book'])){
      $date=$_POST['appoint'];
      $sym=$_POST['sym'];

      if(empty($sym)){

      }
      else{
          $query="INSERT INTO `book`(`Sr.No`, `name`, `email`, `phone`, `gender`, `symptoms`, `appoint_date`, `status`, `booked_date`) VALUES (NULL,'$name','$email','$phone','$gender','$sym','$date','Pending',NOW())";

          $res=mysqli_query($conn,$query);
          if($res){
              echo "<script>
              swal('You Successfully book an appointment');</script>";
          }
      }
   }

   ?>


        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6 jumbotron my-4">
            <form method="POST">

              <div class="form-group">
                <label for="Appoint">Appointment Date</label>
                <input type="date" name="appoint" id="appoint" class="form-control">
              </div><br>

              <div class="form-group">
                <label for="sym">Symptoms</label>
                <input type="text" name="sym" id="sym" class="form-control">
              </div> <br>


              <input type="submit" name="book" class="btn btn-primary text-center" value="Book Appointment">





            </form>

          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
    crossorigin="anonymous"></script>


</body>

</html>