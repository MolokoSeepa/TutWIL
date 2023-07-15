<?php 
session_start();
include('includes/config.php');

  if(isset($_POST['submit'])){
  
  $email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));
  $pass = htmlentities(mysqli_real_escape_string($con,$_POST['pass']));
  
  $select_user = "select * from user where user_email='$email' AND user_pass='$pass' AND status='verified'";
  
  $query = mysqli_query($con,$select_user); 
  
  $check_user = mysqli_num_rows($query);
  
  if($check_user==1){
  
  $_SESSION['user_email']=$email;
  
  echo "<script>window.open('messeges.php','_self')</script>";
  
  }
  else {
  echo "<script>alert('incorrect details, try again!')</script>";
  }
  
  }


?>
<!DOCTYPE html>
<html>
<head>
<title>Sign In</title>
<title>Choose course</title>
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
    background-size: 3500;
    background-position: center;
    background-repeat: no-repeat;
h1{
text-color: white;
}
</style>
<style>
hr {
    height: 12px;
    border: 0;
    box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
}
</style>
<body><br><br>
  <center><xlarge><P style="color:white"><large>Tshwane university WIL System</large></P></xlarge></center>
<center><div style="width:280px; " class="container"></center>
  <center>
  <div class="col-sm-4">
   <div class="card">
     <div class="card-body">
<center>UNICON LOGIN</center><i class="fa-fa-lock-open"></i>

<form class="" action="" method="POST">
<div class="form-group">
      <input type="text" class="form-control" id="username" placeholder="Staff Email" name="email" required>
    </div>
<div class="form-group">
     <input type="password" class="form-control" placeholder="Enter password" id="password" name="pass" required>
    </div>
<button class="btn btn-success btn-block" name="submit" type="submit"><i class="fa fa-lock"></i><small>LOG IN</small></button>

</form>
</div>
</div>
</div>
</center>
</div>
   <br> 
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

<center><small><P style="color:white">*****Work Experience*****</P></small></center>
<center><i class="fa fa-university w3-xxxlarge"></i></center>

</body>
</html>