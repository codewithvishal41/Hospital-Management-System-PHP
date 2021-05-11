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

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    <title>Total Appoinment</title>
  </head>
  <body>
   <?php
   include '../include/header.php';


   ?>

   <div class="container-row">
    <div class="row">
        <div class="col-md-2" style=margin-left:-15px;>

          <?php
          include 'nav.php';

          ?>
        </div>
        <div class="col-md-10">
        <h5 class="text-center my-3">Total Patients</h5>

        <table class="table table-bordered table-striped" id="myTable">
          <thead>
              <tr>
                  <th>Sr.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Gender</th>
                  <th>Symptoms</th>
                  <th>Booked Date</th>
                  <th>Action</th>
                  
              </tr>
          </thead>

          <?php
           $sql="SELECT * FROM `book` WHERE `status`='pending'";
           $result=mysqli_query($conn,$sql);
           $num=mysqli_num_rows($result);
           $sr=0;
           
           if($num<1){
               echo " 
               <tr>
               <td class='text-center' colspan='8'>No Appointment yet yet</td>
               </tr>
               ";
           }
           while($row=mysqli_fetch_assoc($result)){
               $sr=$sr+1;
               echo "
               <tr>
               <td>$sr</td>
               <td>".$row['name']."</td>
               <td>".$row['email']."</td>
               <td>".$row['phone']."</td>
               <td>".$row['gender']."</td>
               <td>".$row['symptoms']."</td>
               <td>".$row['booked_date']."</td>
               <td>
               <a href='discharge.php?id=".$row['Sr.No']."'>
               <button class='btn btn-primary'>Check</button>
               </a>
               </td>
               </tr>
               
               ";
           }
          ?>

        </table>

        </div>
    </div> 

   </div>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

   
  </body>
</html>