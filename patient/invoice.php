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

    <title>My Invoice</title>
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
                <h5 class="text-center my-2">My Invoice</h5>

                <table class="table table-bordered table striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Patient's Name</th>
                        <th>Docter' Name</th>
                        <th>Date of Discharge</th>
                        <th>Amount Paid</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

            <?php
            $pat=$_SESSION['patient'];
            $sql="SELECT * FROM `patient` WHERE `username`='$pat'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);

            $name=$row['name'];

            $query="SELECT * FROM `income` WHERE `patient`='$name'";
            $res=mysqli_query($conn,$query);
            $num=mysqli_num_rows($res);
            if($num<1){
                echo "
                <tr>
                <td class='text-center' colspan='7'> No Invoice yet</td>
                </tr>
                ";
            }
            while($row=mysqli_fetch_assoc($res)){
                echo "
                <tr>
                <td>".$row['Sr.No']."</td>
                <td>".$row['patient']."</td>
                <td>".$row['doctor']."</td>
                <td>".$row['date_of_discharge']."</td>
                <td>".$row['amount_paid']."</td>
                <td>".$row['description']."</td>
                <td>
                <a href='view.php?id=".$row['Sr.No']."'>
                <button class='btn btn-primary'>View</button>
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