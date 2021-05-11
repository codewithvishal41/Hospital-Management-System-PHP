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

    <title>View Invoice</title>
  </head>
  <body>
      <?php
      include '../include/header.php';

      ?>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-2 " style="margin-left:-15px;">
            <?php
            include 'nav.php';
            ?>
            </div>
              <div class="col-md-10">
                  <h5 class="text-center my-2">View Invoice</h5>
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                          <?php
                          if(isset($_GET['id'])){
                              $id=$_GET['id'];
                              $query="SELECT * FROM `income` WHERE `Sr.No`='$id'";
                              $result=mysqli_query($conn,$query);
                              $row=mysqli_fetch_assoc($result);
                          }


                          ?>
                          <table class="table table-bordered table-striped my-4">
                              <tr>
                                  <td colspan="2" class="text-center"><b>Inovice Details</b></td>
                              </tr>

                              <tr>
                                  <td>Patient Name</td>
                                  <td><?php echo $row['patient'];?></td>   
                              </tr>
                              <tr>
                                  <td>Doctor Name</td>
                                  <td><?php echo $row['doctor'];?></td>   
                              </tr>
                              <tr>
                                  <td>Date of Discharge</td>
                                  <td><?php echo $row['date_of_discharge'];?></td>   
                              </tr>
                              <tr>
                                  <td>Total Amount Paid</td>
                                  <td><?php echo $row['amount_paid'];?></td>   
                              </tr>
                              <tr>
                                  <td>Description</td>
                                  <td><?php echo $row['description'];?></td>   
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