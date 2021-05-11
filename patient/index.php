<?php
session_start();
$alert=false;
include ('../include/connection.php');
if(!isset($_SESSION['patient'])|| $_SESSION['patient']!=true){
    header('location:../patientslogin.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Patient's Dashboard</title>
    <style>
       
    </style>
  </head>
  <body>
    <?php
    include ('../include/header.php');

    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left:-15px">
                <?php
                include ('nav.php');

                ?>
            </div>
            <?php
            
                $user=$_SESSION['patient'];
                $sql="SELECT * FROM `patient` WHERE `username`='$user'";
                $result=mysqli_query($conn,$sql);
                while($data=mysqli_fetch_assoc($result)){
                    $username=$data['username'];
                    
                }
            

            ?>
            <div class="col-md-10">
                <h5 class="my-3"><?php echo $username;?> Dashboard</h5>
                <div class="row my-2">
                    <div class="col-md-3 mx-2 bg-warning" style="height:200px;">
                     <div class="row">
                         <div class="col-md-8">
                             <h5 class="text-white my-4">My Profile</h5>
                         </div>
                         <div class="col-md-4">
                             <a href="profile.php"><i class="fas fa-hospital-user fa-3x text-white my-4"></i></a>
                         </div>
                     </div>
                </div>
                    <div class="col-md-3 mx-2 bg-success" style="height:200px;">
                    <div class="row">
                         <div class="col-md-8">
                             <h5 class="text-white my-4">Book Appoinment</h5>
                         </div>
                         <div class="col-md-4">
                             <a href="book.php"><i class="fas fa-calendar-check fa-3x text-white my-4"></i></a>
                         </div> 
                     </div> 
                </div>
                    <div class="col-md-3 mx-2 bg-info" style="height:200px;">
                    <div class="row">
                         <div class="col-md-8">
                             <h5 class="text-white my-4">My Invoice</h5>
                         </div>
                         <div class="col-md-4">
                             <a href="invoice.php"><i class="fas fa-receipt fa-3x text-white my-4"></i></a>
                         </div>
                     </div>
                </div>
                
                </div>

                <?php 
                if(isset($_POST['send'])){
                    $title=$_POST['title'];
                    $msg=$_POST['msg'];
                    if(empty($title)){

                    }elseif(empty($msg)){
        
                    }else{
                        $user=$_SESSION['patient'];
                        $sql="INSERT INTO `report`( `title`, `msg`, `username`, `date`) VALUES ('$title','$msg','$user',NOW())";
                        $result=mysqli_query($conn,$sql);
                        if($result){
                            $alert=true;
                        }
                    }
                }


                ?>

                <div class="row my-4 ">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                
                    
                    <form method="POST">
                    
  
                    <h5 class="text-center">Send Query/Message</h5>    
                    
                        <?php
                        if($alert){
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your message is send successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }
                       
                        ?>
                   
                        
                        <div class="form-floating">
                        <input type="text" name="title" id="floatingTitle" class="form-control">
                        <label for="floatingTitle">Title</label>
                      </div><br>

                        <div class="form-floating">
                        <textarea class="form-control" name="msg" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Comments</label>
                      </div><br>

                        <input type="submit" value="Send" name="send" class="btn btn-primary">
            
                    </form>
                    
                </div>
                <div class="col-md-3"></div>
            </div>
                
           
           
           
            </div>
             </div>
            </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>