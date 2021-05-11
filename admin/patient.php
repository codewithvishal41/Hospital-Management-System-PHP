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

 

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

 


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
  <h5 class="text-center">Total Patient</h5>
  <table id="myTable" class="table table-hover my-5" >
  <thead>
  <tr>
  <th>Sr.No</th>
  <th>Name</th>
  
  <th>Gender</th>
  <th>Username</th>
  
  <th>Action</th>
  </tr>
  </thead>
  
  <tbody>

  <?php
  $sql="SELECT * FROM `patient`";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($result);
  $num=0;
  if($row<1){
      echo "
      <tr>
      <td class='text-center' colspan='5'>No Patients Yet</td>
      </tr>
      ";
  }
  while($data=mysqli_fetch_assoc($result)){
     
      $num=$num+1;
      echo "
      <tr>
      <td>$num</td>
      <td>".$data['name']."</td>
      
      <td>".$data['gender']."</td>
      <td>".$data['username']."</td>
     
      <td>
      <a href='viewpatient.php?id=".$data['Sr.No']."'>
      <button class='btn btn-danger'>View</button></td><a><
      </tr>
      
      ";
  }

?>
  
  </tbody>

  </table>
  </div>
  </div>
  </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    

    <script>
     $(document).ready( function () {
    $('#myTable').DataTable();
     } );
    </script>

   

   
  </body>
</html>