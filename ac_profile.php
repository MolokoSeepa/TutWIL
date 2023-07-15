<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");
include('includes/config.php');
include('functions/funcTutAcc.php');
?>
<?php

if(!isset($_SESSION['user_email'])){

	header("location: index.php");

}
else{ ?>
<html>

<head>
<title><?php echo"$user_name"; ?></title>
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
#own_posts{
    border: 5px solid #e6e6e6;
    padding: 40px 50px;
	width:90%;
}
#posts_img {
    height:300px;
   	width:100%;
}
</style>
<body>
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
			$position = $row['user_position'];

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
				$image = $row['user_image'];
				$varsity = $row['user_varsityName'];
				$course = $row['user_courseName'];
				$year = $row['user_year'];
	            $gender = $row['user_gender'];
	            $contact = $row['user_contact'];
	            $position = $row['user_position'];
	            $province = $row['user_province'];
	            $city = $row['user_city'];
	         

			
       echo "
				<div class='w3-row'>
				<!-- Middle Column -->
    <div class='w3-col m7'>
    <div class='w3-row-padding'>
        <div class='w3-col m7'>
          <div class='w3-card w3-round w3-indigo'>
            <div class='w3-container w3-padding'>
<img class='w3-circle' src='user/$image' width='100' height='100' />
<a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='ac_profile.php?u_id=$user_id'><br>$name</a><br>
                           
 </div>
 </div>
 </div>
 </div>
 </div><br><br>
               
				<div class='w3-row'>
				<!-- Middle Column -->
    <div class='w3-col m7'>
    <div class='w3-row-padding'>
        <div class='w3-col m7'>
          <div class='w3-card w3-round w3-white'>
            <div  class='w3-container w3-padding'>
                    <ul class='list-group'>
                     <li class='list-group-item' title='varsity' style='color:teal';><small><b>University:</b></small><br><small style='color:green'>$varsity</small></li>
					 <li class='list-group-item' title='course'  style='color:teal';><small><b>Course:</b></small><br><small style='color:green'>$course</small></li>
                      <li class='list-group-item' title='level'  style='color:teal';><small><b>Level:</b></small><br><small style='color:green'>$year</small></li>
					  <li class='list-group-item' title='Gender'  style='color:teal';><small><b>Gender:</b></small><br><small style='color:green'>$gender</small></li>
					  <li class='list-group-item' title='contact'  style='color:teal';><small><b>Contact:</b></small><br><small style='color:green'>$contact</small></li>
					  <li class='list-group-item' title='position'  style='color:teal';><small><b>Position:</b></small><br><small style='color:green'>$position</small></li>
					  <li class='list-group-item' title='city'  style='color:teal';><small><b>Nearest City/Town:</b></small><br><small style='color:green'>$city</small></li>
					  <li class='list-group-item' title='province'  style='color:teal';><small><b>Province:</b</small><br><small style='color:green'>$province</small></li><br>
					  </ul>
					
					
					 </div>
					 </div>
					 </div>
					 </div>
					 </div>
					 </div>
					"
					;



					$user = $_SESSION['user_email'];
					$get_user = "select * from user where user_email='$user'";
					$run_user = mysqli_query($con,$get_user);
					$row=mysqli_fetch_array($run_user);

					$userown_id = $row['user_id'];
					$user_name = $row['user_name'];
					$user_image = $row['user_image'];
					$user_varsityName=$row['user_varsityName'];
					$user_courseName=$row['user_courseName'];
					$user_year=$row['user_year'];
                    $user_gender=$row['user_gender'];
                    $user_contact=$row['user_contact'];
                    $user_position=$row['user_position'];
                    $user_province=$row['user_province'];
                    $user_city=$row['user_city'];
                  
                    
					if($user_id == $userown_id){
						echo"
						
				<div class='w3-row'>
				<!-- Middle Column -->
    <div class='w3-col m7'>
    <div class='w3-row-padding'>
        <div class='w3-col m7'>
          <div class='w3-card w3-round w3-white'>
            <div class='w3-container w3-padding'>
						<a href='edit_profile.php?u_id=$userown_id' style='width:140px' class='btn btn-secondary'/>Edit Profile</a><br></div></div></div></div></div></div><br>"
                        ;
                        
					}

					else {

						echo"

						
				<div class='w3-row'>
				<!-- Middle Column -->
    <div class='w3-col m7'>
    <div class='w3-row-padding'>
        <div class='w3-col m7'>
          <div class='w3-card w3-round w3-white'>
            <div class='w3-container w3-padding'>
              <a style='width:140px;' href='chat.php?u_id=$user_id' class='btn btn-primary'/>Messege</a></button><br></div></div></div></div></div></div><br>
                    </ul>"

                    ;
                }

				}

			?>
			<br>
	<div class='col-sm-8'>
		
			<?php
				global $con;

				if(isset($_GET['u_id'])){
				$u_id = $_GET['u_id'];
				}
				$get_posts = "select * from accposts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
			

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
					<div style='width-width: 300px;' class='row'>
                     <div style='width-width: 350px; class='w3-col'>
                      <div class='w3-col-6'>
                       <div class='w3-card w3-round w3-white'>
						       <p class='text-secondary'><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='ac_profile.php?u_id=$user_id'><img src='user/$user_image'class='w3-left w3-circle w3-margin-right' style='width:30px'>$user_name</a>$user_position<br>$post_date</p><hr>
                            <small><p class='text-secondary'>$content</p></small><hr>

                            <a href='singlehac.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>

                            

                            </div>
                            </div>
                            </div>
                            </div>
                            <br>


    </div>  <br><div class='new1'>

    </div>
<br>
<div class='row'>
</div><br>

    
				";


				}
				else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
				echo "
		
                     
		
    
                  <div class='w3-col m13'>
                 <div class='w3-row-padding'>
               <div class='w3-col m7'>
          <div class='w3-card w3-round w3-white'>
            <div class='w3-container w3-padding'>
                  <h6 class='text-secondary'><img src='user/$user_image'class='w3-margin-right w3-circle w3-margin-right' style='width:40px'><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='ac_profile.php?u_id=$user_id'>$user_name</a>$user_position<br>$post_date</h6>
                 <img id='accposts-img' src='imagepost/$upload_image' style='width:100%'><hr>
                <small><p class='text-black'>$content</p></small>


                <a href='singlehac.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                  



				
         <div class='new1'>

    </div>
    </div>
</div>
</div>
</div>

<div class='row'>
<hr>
</div>

				";


				}
				else{

				echo "
                        
			
    <div class='w3-col m13'>
    <div class='w3-row-padding'>
        <div class='w3-col m7'>
          <div class='w3-card w3-round w3-white'>
            <div class='w3-container w3-padding'>
				
						<h6 class='text-secondary'><img src='user/$user_image'class='w3-margin-right w3-circle w3-margin-right' style='width:40px'><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='ac_profile.php?u_id=$user_id'>$user_name</a>$user_position<br>$post_date</h6><hr>
						<small><p>$content</p></small><hr>
						
						<a href='singlehac.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>

					<div class='new1'></div>

    </div>
    </div>
</div>
</div>
</div>

<div class='row'>
<hr>
</div>
     
               ";


			}
		}
		?>
		</div>
	</div>
</div></div>
<?php } //else hehe ends ?>

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
