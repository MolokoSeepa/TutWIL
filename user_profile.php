<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");
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
	<title><?php echo"$user_name"; ?> </title>
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

  <link rel="stylesheet" href="assets/css/user_profile_style.css" media="all"/>
</head>
<style>
#own_posts{
    border: 5px solid #e6e6e6;
    padding: 30px 30px;
	width:30%;
}
#posts_img {
    height:40px;
   	width:40%;
}
</style>
<body>
<div class="w3-container">
<div class="row">
	<?php
	global $con;

			if(isset($_GET['u_id'])){
			$u_id = $_GET['u_id'];
			}
			if($u_id < 0 OR $u_id == ""){
				echo"<script>window.open('home.php','_self')</script>";
			}else{ //else hehe start

	?>



	<div class="col-sm-12">
		<?php
			if(isset($_GET['u_id'])){

			global $con;

			$user_id = $_GET['u_id'];

			$select = "select * from user where user_id='$user_id'";
			$run = mysqli_query($con,$select);
			$row=mysqli_fetch_array($run);

			$name = $row['user_name'];
			}

		?>


		<?php

		if(isset($_GET['u_id'])){

				global $con;

				$user_id = $_GET['u_id'];

				$select = "select * from user where user_id='$user_id'";
				$run = mysqli_query($con,$select);
				$row=mysqli_fetch_array($run);

				$id = $row['user_id'];
				
				$name = $row['user_name'];
				$gender = $row['user_gender'];
				$user_courseName = $row['user_courseName'];
				$register_date = $row['user_reg_date'];


				echo "
				<div class='w3-row'>

    <!-- Middle Column -->
    <div class='w3-col m7'>
    
      <div class='w3-row-padding'>
        <div class='w3-col m7'>
          <div class='w3-card w3-round w3-white'>
            <div class='w3-container w3-padding'>
<img class='img-circle' src='user/gender2.png' width='30' height='30' />
					
					<ul class='list-group'>
					<li class='list-group-item' title='user'><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='user_profile.php?u_id=$user_id'>$name</a></li>
				
					  <li class='list-group-item' title='Gender'><b>Gender:</b> $gender</li>
					  <li class='list-group-item' title='Faculty'><b>Faculty:</b> $user_courseName</li>
				
					</ul>	
             </div>
        </div>
      </div>
          </div>
        </div>
      </div>
					";
					$user = $_SESSION['user_email'];
					$get_user = "select * from user where user_email='$user'";
					$run_user = mysqli_query($con,$get_user);
					$row=mysqli_fetch_array($run_user);

					$userown_id = $row['user_id'];
					$user_name = $row['user_name'];
					

					if($user_id == $userown_id){
						echo"<a href='edit_profile.php?u_id=$userown_id' class='btn btn-success'/>Edit Profile</a><br><br><br>";
					}

					echo"
					</div>
					</center>
					";
				}
			?>
			<br>
	<div class='col-sm-8'>
		<section id="faq" class="faq wow fadeInUp">
		
			<ul id="faq-list" class="wow fadeInUp">
		<li>
		<a data-toggle="collapse" class="collapsed" href="#faq1">View <?php echo "$name"; ?>,s Posts <i class="ion-android-remove"></i></a></li></ul></section>
			<?php
				global $con;

				if(isset($_GET['u_id'])){
				$u_id = $_GET['u_id'];
				}
				$get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";

				$run_posts = mysqli_query($con,$get_posts);

				while($row_posts=mysqli_fetch_array($run_posts)){

				$post_id = $row_posts['post_id'];
				$user_id = $row_posts['user_id'];
				$content = $row_posts['post_content'];
				$upload_image = $row_posts['upload_image'];
				$post_date = $row_posts['post_date'];

				//getting the user who has posted the thread

				$user = "select * from user where user_id='$user_id' AND posts='yes'";

				$run_user = mysqli_query($con,$user);
				$row_user=mysqli_fetch_array($run_user);

				$user_name = $row_user['user_name'];
				
				$user_image = $row_user['user_image'];


				//now displaying all at once

				if($content=="No" && strlen($upload_image) >= 1){
				echo "
				<div id='own_posts'>
					<div class='row'>
						<div class='col-sm-2'>
							<p><img src='user/gender2.png' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><br><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>

						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
				</div>
				";


				}
				else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
				echo "
		
      		<div id='faq1' class='collapse' data-parent='#faq-list'>
					<div class='w3-container'>
		  <div class='row' float='center'>
   <div class='col-sm-13'>
    	<div class='w3-card w3-container' style='min-height:100px'><br>
<h6 class='text-secondary'><img src='users/$user_image'class='w3-left w3-circle w3-margin-right' style='width:30px'><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h6><hr>


 <img id='posts-img' src='imagepost/$upload_image' style='width:50%'>
         <button class='w3-button w3-light-grey w3-block'><p class='text-primary'><b>$content</b></p></button>
      <p class='text-secondary'>Share your knowledge</p>

      <hr class='new1'>
<form action='' method='post' class='form-inline'>
                   <div class='btn-group'data-toggle='buttons'>
                        <label class='btn btn-light active'>
                                          <input type='content' name='comment'>
                                      </label>
           
                                      </div>  
                    <button class='btn btn-primary pull-right' name='reply'>send</button>
                    </form>

    </div></div>
</div>
</div>
</div><br>
				
				";


				}
				else{

				echo "

				
					<div class='w3-container'>
		  <div class='row' float='center'>
   <div class='col-sm-5'>
    	<div class='w3-card w3-container' style='min-height:200px'><br>
<h6 class='text-secondary'><img src='users/$user_image'class='w3-left w3-circle w3-margin-right' style='width:30px'><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h6><hr>


 <img id='posts-img' src='imagepost/$upload_image' style='width:100%'>
         <button class='w3-button w3-light-grey w3-block'><p class='text-primary'><b>$content</b></p></button>
      <p class='text-secondary'>share your knowledge</p>



      <hr class='new1'>
<form action='' method='post' class='form-inline'>
                   <div class='btn-group'data-toggle='buttons'>
                        <label class='btn btn-light active'>
                                          <input type='content'>
                                      </label>
                                      </div>  
                    <button class='btn btn-primary pull-right' name='reply'>send</button>
                    </form>

    </div></div>
</div>
</div></div>
				
				";


			}
		}
		?>
		</div>
	</div>
</div></div>
<?php } //else hehe ends ?>
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

</body>
</html>
<?php } ?>
