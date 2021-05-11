<?php
ob_start();
$showalert=false;
$showError=false;
$showErr=false;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Admin</title>
</head>

<body>
    <?php
   include ('../include/header.php');

   ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left: -20px;">
                <?php
               include('nav.php');
               ?>
            </div>
            <div class="col-md-10 my-2">

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-center">List of Admin</h5>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Username</th>
                                   
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <!-- ".$data['Sr.No']."
                       ".$data['username']." -->

                            <tbody>
                                <?php
                   
                   $sql="SELECT * FROM `admin`";
                   $result=mysqli_query($conn,$sql);
                   $num=mysqli_num_rows($result);
                   if($num<1){
                       echo' <tr><td colspan="3"><h5 class="text-center">No New Admin</h5></td></tr>';
                   }
                   $srNo=0;
                   while($data=mysqli_fetch_assoc($result)){
                       $srNo=$srNo+1;
                       $id=$data['Sr.No'];
                       $user=$data['username'];
                       $image=$data['profile'];
                             echo "<tr>
                               <td>$srNo</td>
                               <td>$user</td>
                             
                               <td>
                              <a href='admin.php?id=$id'><button class='btn btn-danger'>Delete</button></a> </td>
                               
                           </tr>";
                       
                          
                }

                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $sql="DELETE FROM `admin` WHERE `Sr.No`='$id'";
                    $result=mysqli_query($conn,$sql);
                    header("location:admin.php");
                   
                }
                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-center">Add Admin</h5>




                        <?php
                        if(isset($_POST['add'])){
                            $username=$_POST['uname'];
                            $password=$_POST['pass'];
                            $cpassword=$_POST['cpass'];
                            //image uplaod
                            $profile=$_FILES['img']['name'];

                        
                            
                            //check username is exist
                            $existSql="SELECT * FROM `admin` WHERE `username`='$username' ";
                            $result=mysqli_query($conn,$existSql);
                            $existRow= mysqli_num_rows($result);
                            if($existRow>0){
                                $showErr=true;
                            }
                            else{
                        
                            // check password or confirm password is same 
                            if($password==$cpassword){

                           $sql="INSERT INTO `admin` (`username`,`password`,`profile`) VALUES('$username','$password','$profile')";
                            $result=mysqli_query($conn,$sql);
                            if($result){
                                move_uploaded_file($_FILES['img']['tmp_name'],"images/$profile");
                                
                                $showalert=true;
                                

                            
                                 }
                                 header("location:admin.php");
                            }
                            
                            else{
                                $showError=true;

                            }
                            
                        }
                    }
                        


                        ?>
                        <form action="admin.php" method="POST" enctype="multipart/form-data">
                            <?php
                            if($showalert){
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success</strong> New admin is added is successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }

                            if($showErr){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error</strong> Username is already exist.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                            ?>
                            <?php
                            if($showError){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Failed!</strong> Password do not match.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }

                            ?>




                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="uname" id="username"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control" id="password">
                            </div>

                            <div class="mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" name="cpass" class="form-control" id="cpassword">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Profile image</label>
                                <input type="file" name="img" class="form-control" id="image">
                            </div>

                            <!-- <div class="mb-3">
                                <label for="Image" class="form-label">Upload image</label>
                                <input type="file" name="image" class="form-control" id="Image">
                            </div> -->

                            <input type="submit" name="add" value="Add Admin" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>