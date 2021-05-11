<?php
session_start();
include '../include/connection.php'

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

  <title>Total Income</title>
  <style>
    table th {
      text-align: center;
    }
  </style>
</head>

<body>
  <?php
  include '../include/header.php';
   ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2" style="margin-left:-15px" ;>
        <?php
         include 'nav.php';

         ?>
      </div>
      <div class="col-md-10">
        <h5 class="text-center my-4">Total Income</h5>
        <table class="table table-bordered table-primary">
          <tr>
            <th>Sr.No</th>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Amount Paid</th>
            <th>Date of Discharge</th>
          </tr>


     <!-- PHP Code Start  -->
  <?php
   $sql="SELECT * FROM `income`";
   $result=mysqli_query($conn,$sql);
   $num=mysqli_num_rows($result);
   $sr=0;
   if($num<1){
       echo " 
       <tr>

       <td class='text-center' colspan='5'> No Patient is discharge yet </td>
         </tr>
       ";
   } 
   while($row=mysqli_fetch_assoc($result)){
       $sr=$sr+1;
       echo "
       <tr>
       <td>$sr</td>
       <td>".$row['doctor']."</td>
       <td>".$row['patient']."</td>
       <td>".$row['amount_paid']."</td>
       <td>".$row['date_of_discharge']."</td>
       </tr>
       ";
   }

   ?>

   <!-- PHP Code End  -->
        </table>

      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
    crossorigin="anonymous"></script>


</body>

</html>