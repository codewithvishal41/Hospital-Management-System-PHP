
<style>
  .navbar-nav{
    margin-left: auto;

  }
  </style>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">iHospital</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
if(isset($_SESSION['admin'])){
  $user=$_SESSION['admin'];
  echo '
  <ul class="navbar-nav  mb-2 mb-lg-0 " style>
        <li class="nav-item">
          
        <li class="nav-item">
          <a class="nav-link" href="#">'.$user.'</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../admin/logout.php">Logout</a>
        </li>';

      
}

      elseif(isset($_SESSION['doctor'])){
        $user=$_SESSION['doctor'];
        echo '
        <ul class="navbar-nav  mb-2 mb-lg-0 " style>
              <li class="nav-item">
                
              <li class="nav-item">
                <a class="nav-link" href="#">'.$user.'</a>
              </li>
      
              <li class="nav-item">
                <a class="nav-link" href="../doctor/logout.php">Logout</a>
              </li>';
      

      }
      elseif(isset($_SESSION['patient'])){
        $user=$_SESSION['patient'];
        echo '
        <ul class="navbar-nav  mb-2 mb-lg-0 " style>
              <li class="nav-item">
                
              <li class="nav-item">
                <a class="nav-link" href="#">'.$user.'</a>
              </li>
      
              <li class="nav-item">
                <a class="nav-link" href="../patient/logout.php">Logout</a>
              </li>';
      

      }
      else{
        echo '
        
      
          <ul class="navbar-nav mb-2 mb-lg-0 ">

          <li class="nav-item">
                <a class="nav-link " aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="adminlogin.php">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="doctorlogin.php">Doctor</a>
              </li>
      
              <li class="nav-item">
                <a class="nav-link" href="patientslogin.php">Patients</a>
              </li>';

      }

      ?>
        
      </form>
    
  </div>
  </div>
</nav>