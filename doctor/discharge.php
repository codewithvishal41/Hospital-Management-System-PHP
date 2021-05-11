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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Patient Appointment</title>
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
                  <h5 class="text-center my-3">Total Appoinment</h5>


                   <?php
                  if(isset($_GET['id'])){

                    $id=$_GET['id'];
                    $query="SELECT * FROM `book` WHERE `Sr.NO`='$id'";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_array($result);

                  }

                  ?>

                  <div class="row">
                      <div class="col-md-6">
                          <table class="table table-bordered">
                           <tr>
                               <td class="text-center" colspan="2"><b>Appoinment Details</b></td>
            
                            </tr>

                            <tr>
                                <td>Name</td>
                                <td><?php echo $row['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone No.</td>
                                <td><?php echo $row['phone']; ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $row['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Symptoms</td>
                                <td><?php echo $row['symptoms']; ?></td>
                            </tr>
                            <tr>
                                <td>Appointment Date</td>
                                <td><?php echo $row['appoint_date']; ?></td>
                            </tr>
                           

                          </table>
                      </div>
                      
                      <div class="col-md-6">
                      
                          <h5 class="text-center my-1">Invoice</h5>

                          <?php
                          if(isset($_POST['send'])){
                              $fee=$_POST['fee'];
                              $des=$_POST['des'];
                              if(empty($fee)){

                              }elseif(empty($des)){

                              }else{
                                  $doc=$_SESSION['doctor'];
                                  $name=$row['name'];
                                  $sql="INSERT INTO `income`( `doctor`, `patient`, `amount_paid`, `date_of_discharge`, `description`) VALUES('$doc','$name','$fee',NOW(),'$des')";
                                  $result=mysqli_query($conn,$sql);
                                  
                                  if($result){
                                      echo " 
                                      <script>Swal.fire('You have sent invoice successfully')</script>
                                      ";
                                      $sql="UPDATE `book` SET `status`='Discharge' WHERE `Sr.No`='$id'";
                                      $result=mysqli_query($conn,$sql);
                                  }
                              }
                          }

                          ?>
                          <form method="POST">
                              <div class="form-group">
                                  <label for="fee">Fee</label>
                                  <input type="number" name="fee" id="fee" class="form-control">
                              </div>

                              <div class="form-group">
                                  <label for="des">Description</label>
                                  <input type="text" name="des" id="des" class="form-control">
                              </div>
                              <input type="submit" name="send" value="SEND" class="btn btn-primary my-2">
                          </form>
                          
                      </div>
                     
                  </div>
              </div>
          </div>
      </div>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    
  </body>
</html>