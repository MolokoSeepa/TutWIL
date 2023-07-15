<!DOCTYPE html>
<?php
session_start();
include('includes/config.php');

?>
<?php

if(!isset($_SESSION['user_email'])){

  header("location: index.php");

}
else{ ?>
<html>
<head>
  <title>Registered Alumni/Undergraduates</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="assets/css/sweepcss.css">
<link rel="stylesheet" href="assets/css/awesome.css">
<link rel="stylesheet" href="assets/css/flo.css">
<link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<style>
  hr.head {
    height: 12px;
    border: 0;
    box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
}
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  overflow: hidden;
  background: #fff;
}

#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #1acc8d;
  border-top-color: #d2f9eb;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  -webkit-animation: animate-preloader 1s linear infinite;
  animation: animate-preloader 1s linear infinite;
}

@-webkit-keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
<body>
 <div id="preloader"></div> 
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
<?php 
      $user = $_SESSION['user_email'];
      $get_user = "select * from user where user_email='$user'"; 
      $run_user = mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
          
      $user_id = $row['user_id']; 
      $user_name = $row['user_name'];
      $userImage = $row['userImage'];
      $user_courseName = $row['user_courseName'];
      $user_province = $row['user_province'];
    
      $user_posts = "select * from posts where user_id='$user_id'"; 
      $run_posts = mysqli_query($con,$user_posts); 
      $posts = mysqli_num_rows($run_posts);
      ?>


    <div class='w3-card w3-round w3-white'>
    <div class='w3-container w3-padding'>
  <small><a href="javascript:void(0)" onclick="w3_close()" style="color:black;">Close</a></small>
  <small><a style="color:green;"  href="home.php" onclick="w3_close()">Home</a></small>
<small><a style="color:red;"  href="logout.php" onclick="w3_close()">Logout</a></small><br>
<small><a href='user_profile.php?<?php echo "u_id=$user_id" ?>' href="user_profile.php?u_id=$userown_id">Profile</a></small>
  </div>
</div>
</nav>


<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-large" style="max-width:1000px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">&#9776;</div>
    <a class="w3-right w3-padding-16 w3-icon"  href="home.php"><h6><b>Home</b></h6></a>
    <div class="w3-center w3-padding-16"><h5 class="w3-text-teal">UNICOM REGISTERED USERS</h5></div>
  </div>
</div>
<br><br><hr class="head">

<div class="w3-container">

    <?php
      
      $user = "select * from user where user_courseName='$user_courseName' AND user_province='$user_province'";

      $run_user = mysqli_query($con,$user);

      while ($row_user=mysqli_fetch_array($run_user)){

      $user_id = $row_user['user_id'];
      $user_name = $row_user['user_name'];
      
      $user_varsityName = $row_user['user_varsityName'];
      $user_email = $row_user['user_email'];
      $user_courseName = $row_user['user_courseName'];
      echo"

      <div color:teal;' class='w2-container'>
       <ul class='list-group'>
       <li class='list-group-item'>
        <a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='chat.php?u_id=$user_id'>
        <img class='w3-circle' src='user/gender2.png' width='50px' height='50px' title='$user_name' /><br><small style='color:teal'>$user_email :$user_courseName</small><br><br>
        </a>
        </li>
        </ul><br>
      </div>

      ";
      }
    ?>
  </div>
  <hr>
<?php include("includes/footer.php");?>
<script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/mobile-nav/mobile-nav.js"></script>
  <script src="assets/vendor/wow/wow.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
   <script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
<script>
  var div = document.getElementById("scroll_messages");
  div.scrollTop = div.scrollHeight;
</script>
</body>
</html>
<?php } ?>