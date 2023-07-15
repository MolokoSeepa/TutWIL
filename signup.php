<?php
include('includes/config.php');
  if(isset($_POST['submit'])){

  $user_name = htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
  $pass = htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));
  $email = htmlentities(mysqli_real_escape_string($con,$_POST['user_email']));
  $user_varsityName = htmlentities(mysqli_real_escape_string($con,$_POST['user_varsityName']));
  $user_courseName = htmlentities(mysqli_real_escape_string($con,$_POST['user_courseName']));
  $user_year = htmlentities(mysqli_real_escape_string($con,$_POST['user_year']));
  $user_gender = htmlentities(mysqli_real_escape_string($con,$_POST['user_gender']));
  $user_contact = htmlentities(mysqli_real_escape_string($con,$_POST['user_contact']));
  $user_position = htmlentities(mysqli_real_escape_string($con,$_POST['user_position']));
  $user_province = htmlentities(mysqli_real_escape_string($con,$_POST['user_province']));
  


  $status = "verified";
  $posts = "no";
 
  
  $username = strtolower($user_name . ":" );
  $check_username_query = "select user_name from user where user_email='$email'";
  $run_username = mysqli_query($con,$check_username_query);
  

  if(strlen($pass)<9){

  echo "<script>alert('Password should be minimum 9 characters!')</script>";
  exit();
  }



  $check_email = "select * from user where user_email='$email'";
  $run_email = mysqli_query($con,$check_email);

  $check = mysqli_num_rows($run_email);

  if($check==1){

  echo "<script>alert('Email already exist, please try another!')</script>";
  echo "<script>window.open('signup.php','_self')</script>";
  exit();
  }
  

  $insert = "insert into user(user_name,user_pass,user_email,user_varsityName,user_courseName,user_year,user_gender,user_contact,user_position,user_province,user_reg_date,status) values ('$user_name','$pass','$email','$user_varsityName','$user_courseName','$user_year','$user_gender','$user_contact','$user_position','$user_province',NOW(),'$status')";

  $query = mysqli_query($con,$insert);

  if($query){

  echo "<script>alert('$user_name, your account is created.')</script>";
  echo "<script>window.open('index.php','_self')</script>";

  }
  else {

  echo "<script>alert('Registration failed, try again!')</script>";
  echo "<script>window.open('signup.php','_self')</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<title>Choose course</title>
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
hr {
    height: 12px;
    border: 0;
    box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
}
</style>
<body><br><br>
<center><div style="width:280px; " class="container"></center>
  <center>
  <div class="col-sm-4">
   <div class="card">
     <div class="card-body">
     	
<h3> <center>Sign Up</center></h3>

<form class="" action="" method="POST">
	<div class="form-group">
      <label for="name"></label>
      <input type="text" class="form-control" id="user_name" maxlength="9" placeholder="Enter Student/Staff Number" name="user_name" required>
    </div>
<div class="form-group">
      <label for="email"></label>
      <input type="email" class="form-control" id="email" maxlength="30" placeholder="Enter Student/Staff TUT Email" name="user_email" required>
    </div>
    

         <div class="form-group">
      <select name="user_varsityName" class="custom-select mb-3" required>
        <option value=" select">Select your varsity</option>
        <option value="TUT">Tshwane University of Technology</option>
        
      </select>
</div>


    <div class="form-group">
      <select name="user_courseName" class="custom-select mb-3" required>
      <option selected>select your faculty</option>
      <option value="Information And Communication Technology">Information And Communication Technology</option>
      <option value="Humanities">Humanities</option>
      <option value="Management Science">Management Science</option>
      <option value="Art And Design">Art And Design</option>
      <option value="Science">Science</option>
      <option value="Economics And Finance">Economics And Finance</option>
      <option value="Engineering AND The Built Environment">Engineering AND The Built Environment</option>
    </select>
        </div>

<div class="form-group">
      <select name="user_year" class="custom-select mb-3" required>
      <option selected>select your level</option>
      <option value="Final Year">Final year</option>
      <option value="Alumni">Alumni</option>
      <option value="Staff">Staff</option>
        </select>
        </div>

     <div class="form-group">
      <select name="user_position" class="custom-select mb-3" required>
      <option selected>Are you?</option>
      <option value="Tutor">Graduate/Alumni</option>
      <option value="Student">Undergraduate</option>
       <option value="Student">TUT Staff</option>
    </select>
        </div>
 <div class="form-group">
      <label for="number"></label>
      <input type="integer" class="form-control" id="user_contact" placeholder="Enter contact" name="user_contact" required>
    </div>
    

     <div class="form-group">
      <select name="user_province" class="custom-select mb-3" required>
        <option value=" select">Select your Campus</option>
        <option value="Soshanguve South Campus">Soshanguve South Campus</option>
        <option value="Emalahleni Campus">Emalahleni Campus</option>
        <option value="Polokwane Campus">Polokwane Campus</option>
        <option value="Pretoria Campus">Pretoria Campus</option>
        <option value="Other">Other</option>
      </select>
</div>
 <div class="form-group">  
<select name="user_gender" class="custom-select mb-3" required>
      <option selected>Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Others">Others</option>
    </select>
   </div>
<div class="form-group">
      <label for="password"></label>
     <input type="password" class="form-control" placeholder="Enter password" id="pass" name="user_pass" required>
    </div>
<button class="btn btn-primary btn-block"  type="submit" name="submit" id="submit"><i class="fa fa-user"></i>Sign up</button>
   <a href="index.php" class="btn btn-success btn-block">Login</a>
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

</body>
</html>
