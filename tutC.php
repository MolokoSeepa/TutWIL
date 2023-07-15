<?php
session_start();
include('includes/config.php');
include('functions/functions.php');
?>
<?php 

if(!isset($_SESSION['user_email'])){
  
  header("location: index.php");

}
else{ ?>
<html>
<head>
<title>Choose your faculty</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
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
</head>
<style>
body{
	background-size:3000;
	background-position:top;
  background-repeat: no-repeat;
  background-image: url(img/tut3.png)


}
</style>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-primary">
   <a href="" class="float-left btn btn-success"><b>Choose Faculty</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li style="color:purple " class="nav-item">
        <a class="nav-link" href="home.php">Home page</a>
      </li>
      <li style="color:red" class="nav-item">
        <a class="nav-link" href="index.php">Logout</a>
      </li>
      <li class="nav-item">
        
      </li>    
    </ul>
  </div> 
  </nav><br><br> 
  <br>

<div class="container"><br>
  <div class="float-centre">
<button class=" btn-secondary btn-block" required="required" ><a href="stdProcess.php"></a><p>TSHWANE UNIVERSITY OF TECHNOLOGY FACULTIES</p></a></button>
<button class=" btn-primary btn-block" required="required"><a href="ITposts.php"><p>Information And Communication Technology Alumni/Undergraduate</p></a></button>
<button class=" btn-primary btn-block" required="required"><a href="humposts.php"><p>Humanities Alumni/Undergraduate</p></a></button>
<button class=" btn-primary btn-block" required="required"><a href="healposts.php"><p>Science Alumni/Undergraduate</p></a></button>
<button class=" btn-primary btn-block" required="required"><a href="artposts.php"><p>Art And Design Alumni/Undergraduate</p></a></button>
<button class=" btn-primary btn-block" required="required"><a href="accposts.php"><p>Economics AND Finance Alumni/Undergraduate</p></a></button>
<button class=" btn-primary btn-block" required="required"><a href="engposts.php"><p>Engeneering And The Built Environment Alumni/Undergraduate</p></a></button>
<button class=" btn-primary btn-block" required="required"><a href="healposts.php"><p>Management Science Alumni/Undergraduate</p></a></button>
</div>
</body>
</html>
<?php } ?>
