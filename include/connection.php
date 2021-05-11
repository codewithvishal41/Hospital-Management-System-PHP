<?php
$servername='localhost';
$username='root';
$password='';
$database='vhosp';

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("error to connect database". mysqli_connect_error());
   
}
?>