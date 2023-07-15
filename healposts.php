<?php
session_start();
include('includes/config.php');
include('functions/funcTutHea.php');
?>
<?php 

if(!isset($_SESSION['user_email'])){
  
  header("location:index.php");

}
else{ ?>
<!DOCTYPE html>
<html>
<head>
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
</head>

<style>

body{

background-size: 1000;
 background-position: center;
background-repeat: no-repeat;



}
</style>
<body>
   <title>Home</title>

  <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:90%;min-width:300px" id="mySidebar">
<?php 
      $user = $_SESSION['user_email'];
      $get_user = "select * from user where user_email='$user'"; 
      $run_user = mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
          
      $user_id = $row['user_id']; 
      $user_name = $row['user_name'];

      $user_pass = $row['user_pass'];
      $user_email = $row['user_email'];

      $user_gender = $row['user_gender'];
      $user_position = $row['user_position'];
     
      $user_image = $row['user_image'];
      $user_cover = $row['user_cover'];
     
      $register_date = $row['user_reg_date'];
          
          
      $user_posts = "select * from user where user_id='$user_id'"; 
      $run_posts = mysqli_query($con,$user_posts); 
      $posts = mysqli_num_rows($run_posts);
      ?>

    <div class='w3-card' style="width:500px;"><hr>
<small><a href="javascript:void(0)" onclick="w3_close()" style="color:yellow;"
    id="btn-post">Back</a></small>
 <small><a style="color:green;"  href="home.php">Home</a></small>
<small><a style="color:red;"  href="logout.php" onclick="w3_close()">Logout</a></small><br>
  <small><a style="color:blue;" href='hea_profile.php?<?php echo "u_id=$user_id" ?>'  href="hea_profile.php?u_id=$userown_id">Profile</a></small><hr><hr><hr><hr>

  
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-teal w3-large" style="max-width:1000px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">&#9776;</div>
    
    <div class="w3 w3-padding-16"><h5 class="w3-text-white">Graduates/Undergraduates Tweets</h5></div>
  </div>
</div>

<br><br><br><br>
<div class="container">
  <div class="row">
      <div class="col-sm-6">
     
     <form action="healposts.php?id=<?php echo $user_id;?>" method="post" id="f" enctype='multipart/form-data'>
      <div class="form-group">
      <label for="text"></label>
      <textarea class="form-control" id="content" name="content" required="required" placeholder="Post a question and share insights with us:">
</textarea></div>
   <br>
<section id="faq" class="faq wow fadeInUp">
    <a data-toggle="collapse" class="btn btn-secondary" href="#faq1"><i class='fa fa-image'></i>Image</a>
  </section>
     <div id="faq1" class="collapse" data-parent="#faq1">
    <label class="btn btn-secondary" id="upload_image_button"> 
    <input type='file' name='upload_image' size="200">
    </label></div><br>


    <button id="btn-post" class="btn btn-primary btn-block" name="sub">Post</button><br>
      <a class="w3-left w3-padding-6 w3-icon"  href="messeges.php"><small><h5 class=w3-text-teal><b>View chats</b></h5></small></a>


  <div class='w3'>
  <div class='w3-container-6'>
    <div class='row'>
   <div class='col-md col-lg wow bounceInUp' data-wow-duration='1.4s'>
   <div  class='w3-card w3-container w3-white' style='min-width-width:800px'></div>
  <small><?php insertPost();?></small>
  </div>
</div>
</div>
</div>
</form>


 </div></div>   
 <div class="col-lg-8">
<h5>Feed...</h5></div>
<hr>

<div style="position:margin-left" class="w3"></div>
 <hr class='new1'>

  <div class='w3-container-6'>
    <div class='row'>
    <div style="border-width:800px"></div>
   <small><?php get_posts();?></small>
  </div>
</div>







<div class="head"></div>

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
  <script src="js/s.
  b-admin-2.min.js"></script>
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
function myFunction(id){
var x =
document.getElementById(id);
if (x.className. indexOf("w3-show") == -1) {
  x.className += "w3-show";
  } else {
x.className = x.className.replace("w3-show","");

  }
}

  </script>
<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

$(document).ready(function(){
  $('.toast').toast('show');
});
</script>

</body>
</html>
<?php } ?>







