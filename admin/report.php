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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Report's</title>
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
   <h5 class="text-center">Total Report</h5> 
   <table class="table table-bordered">
   <tr>
   <th>Sr. NO</th>
   <th>Subject</th>
   <th>Message</th>
   <th>Username</th>
   <th>Date of Message</th>
   </tr>
  <?php

  $sql="SELECT * FROM `report`";
  $result=mysqli_query($conn,$sql);
  
  $num=mysqli_num_rows($result);
  $sr=0;
  if($num<1){
      echo "
      <tr>
      <td class='text-center' colspan='5'>No report yet</td> </tr>
      ";
  }
  while($row=mysqli_fetch_assoc($result)){
      $sr=$sr+1;
      echo "
      <tr>
      <td>$sr</td>
      <td>".$row['title']."</td>
      <td>".$row['msg']."</td>
      <td>".$row['username']."</td>
      <td>".$row['date']."</td>
      </tr>
      ";
  }

  ?>

   </table>
  </div>
  </div>
  </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>