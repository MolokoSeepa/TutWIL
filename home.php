<!DOCTYPE html>
<?php
session_start();
include("includes/config.php");
?>
<?php

if(!isset($_SESSION['user_email'])){
	global $con;

				$user_id = $_GET['u_id'];
				$user_count = $_GET['user_count'];
				$varsity = $_GET['user_varsityName'];

				$select = "select * from user where user_id='$user_id'";
				$run = mysqli_query($con,$select);
				$row=mysqli_fetch_array($u_count);

				$id = $row['user_id'];
				$name = $row['user_name'];
				$image = $row['user_image'];
				$varsity = $row['user_varsityName'];
				$course = $row['user_courseName'];
				$year = $row['user_year'];
	      $gender = $row['user_gender'];
	      $contact = $row['user_contact'];
	      $position = $row['user_position'];
	     $province = $row['user_province'];
	     $city = $row['user_city'];
	           


  header("location: index.php");

}
else{ ?>
<html>
<head>
<title>Choosing</title>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="assets/css/sweepcss.css">
<link rel="stylesheet" href="assets/css/awesome.css">
<link rel="stylesheet" href="assets/icons/icons.css">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles/home_style2.css" media="all"/>


<link href="css/sweepcss.css" rel="stylesheet">
<link href="css/w3.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

</head>
<style>
body{
background-color:#fff;
background-position: center;
background-repeat: no-repeat;

}
</style>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-primary">
   <a href="" class="float-left btn btn-success"><b>Choose</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button><br>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li style="color:yellow " class="nav-item">
        <a class="nav-link">UNIVERSITIES</a>
      </li><br>
      <li style="color:grey" class="nav-item">
        <a class="nav-link" href="index.php">Logout</a>
      </li>
      <li class="nav-item">
        
      </li>    
    </ul>
  </div>  
</nav><br><br>


<center><div class="w3-container"></center>
 <center> <h4 class="w3-hide-large">Tshwane University Of Technology WIL</h4></center>
 <center> <p class="w3-hide-small">Select from a range of our universities</p></center>
  <ul class="w3-ul w3-card-4">
  
    <li class="w3-bar" >
      <img src="img/tut3.png" class="w3-bar-item w3-circle" style="width:65px">
      <a class="w3-bar-item" href="tutC.php">
        <span class="w3-large">TUT</span><br>
        <span>Tshwane University of Technology</span>
    </a>  
     <img src="img/clean3.jpg" class="w3-bar-item w3-circle" style="width:70px">
      <?php 
                   
$rt = mysqli_query($con,"SELECT (user_id) FROM user where user_varsityName='TUT'");
$num1 = mysqli_num_rows($rt);
{?>
   <p style="color: teal">Registered Alumni/Undergraduate: <big><?php echo htmlentities($num1);?></big></p>
                  
                        </div>
                  
                      </div>
                      <?php }?>
  </li>

   

 </ul>
</div>

</body>
</html>
<?php } ?>
