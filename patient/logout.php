<?php
session_start();
session_unset();
session_destroy();
header('location:../patientslogin.php');


// session_start();
// if(isset($_SESSION['patient'])){
//     unset($_SESSION['patient']);
//     header('location:../patientslogin.php');
// }
?>