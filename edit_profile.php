<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");
include('includes/config.php');
?>
<?php 

if(!isset($_SESSION['user_email'])){
	
	header("location: index.php");

}
else{ ?>
<html>
<head>
	<title>Edit profile</title>
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

</style>
<body>
<div class="w3-13">
	<div class="col">
	</div>
	<div class="col">
		<?php 

		if(isset($_GET['u_id'])){

				global $con;

				$user_id = $_GET['u_id'];

				$select ="select * from user where user_id='$user_id'";
				$run = mysqli_query($con,$select);
				$row=mysqli_fetch_array($run);

				$u_id = $row['user_id'];
				$username = $row['user_name'];
				$email = $row['user_email'];
				$pass = $row['user_pass'];
				$varsityName = $row['user_varsityName'];
				$courseName = $row['user_courseName'];
				$year = $row['user_year'];
	            $gender = $row['user_gender'];
	            $contact = $row['user_contact'];
	            $position = $row['user_position'];
	            $province = $row['user_province'];
	            $city = $row['user_city'];



	            ?>



				
						<center><tr align="center">
							<td style="color: indigo" colspan="6" class="active"><h4>Edit Your Profile</h4></td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Change Username</td>
							<td>
							<input class="form-control" type="text" name="user_name" required="required" value="<?php echo $username;?>"/>
							</td>
						</tr>


						<tr>
							<td style="font-weight: bold;">Change Varsity</td>
							<td>
							    <select class="form-control" name="user_varsityName">
								<option><?php echo $varsityName;?></option>
                                  <option value="TUT">TUT</option>
                                   <option value="UP">UP</option>
                                   <option value="UL">UL</option>
                                   <option value="VUT">VUT</option>
                                   <option value="UCT">UCT</option>
                                   <option value="KZN">KZN</option>
                                    <option value="Unisa">Unisa</option>
                                    <option value="MEDUNSA">MEDUNSA</option>
                                    <option value="UNIVEN">UNIVEN</option>
                                     <option value="FortHare">Fort Hare</option>
                                 <option value="freestate">Free State</option>
                                     <option value="Zululand">Zululand</option>
                                  <option value="UJ">UJ</option>
                                  <option value="Sisulu">Walter Sisulu</option>
                                       <option value="Monash">Monash</option>
                                     <option value="capePeninsula">Cape Peninsula</option>
                                   <option value="Metropolitian">Metropolitian</option>
                                       <option value="Rhodes">Rhodes</option>
                                    <option value="Stellenbosch">Stellenbosch</option>
                                     <option value="Witwatersrand">Witwatersrand</option>
                                    <option value="NorthWest">North West </option>
                                        <option value="WesternCape">Western Cape</option>
                                      <option value="CUT">Central University Of Technology</option><br>

							</select>
							</td>
						</tr>
						
						<tr>
							<td style="font-weight: bold;">Change Course</td>
							<td>
								<select class="form-control" name="user_courseName">
								<option><?php echo $courseName;?></option>
								<option value="IT">ICT</option>
                                <option value="Humanities">Humanities</option>
                                <option value="health">health And Science</option>
                                <option value="Art">Art And Design</option>
                                <option value="Law">Law</option>
                                 <option value="Accounting">Accounting science</option>
                                <option value="Engineering">Engineering Science</option>
							</select>
							</td>
						</tr>


						<tr>
							<td style="font-weight: bold;">Change your level</td>
							<td>
							<select class="form-control" name="user_year">
								<option><?php echo $year;?></option>
								<option value="1st year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                                <option value="5th Year">5th Year</option>
                                <option value="6th Year">6th Year</option>
                                <option value="7th Year">7th Year</option>
							</select>
							</td>
						</tr>





						<tr>
							<td style="font-weight: bold;">Change Position</td>
							<td>
							<select class="form-control" name="user_position">
								<option><?php echo $position;?></option>
								<option value="IT">Tutor</option>
                                <option value="Humanities">Student</option>
                                <option value="health">None</option>
							</select>
							</td>
						</tr>



                        <tr>
							<td style="font-weight: bold;">Contact</td>
							<td>
							 <input type="integer" class="form-control" name="user_contact" required="required" value="<?php echo $contact;?>"/>

							</td>
						</tr>
						


						<tr>
							<td style="font-weight: bold;">Change Province</td>
							<td>
							<select class="form-control" name="user_province">
								<option><?php echo $province;?></option>
								<option value="Limpopo">Limpopo</option>
                               <option value="Mpumalanga">Mpumalanga</option>
                                <option value="Gauteng">Gauteng</option>
                               <option value="North West">North west</option>
                                <option value="Freestate">Freestate</option>
                               <option value="Kwazulu Natal">Kwazulu natal</option>
                               <option value="Western Cape">Western cape</option>
                               <option value="Eastern cape">Eastern Cape</option>
                                <option value="UNIVEN">Northern Cape</option>
                                <option value="Other">Other</option>
							</select>
							</td>
						</tr>
                          <tr>
							<td style="font-weight: bold;">Change city/Town</td>
							<td>
							<input class="form-control" type="text" name="user_city" required="required" value="<?php echo $city;?>"/>
							</td>
						</tr><br>

						
						<tr>
							<td style="font-weight: bold;">Password</td>
							<td>
							<input type="Password" class="form-control" name="user_pass" required="required" value="<?php echo $pass;?>"><!-- onfocus="this.value=''" -->
							<input type="checkbox" onclick="show_password()"> <strong>Show Password</strong>
							</td>
						</tr><br>
						
						<tr>
							<td style="font-weight: bold;">Email</td>
							<td>
							<input class="form-control" type="email" name="user_email" required="required" value="<?php echo $email;?>"/>
						</td>
						</tr>
						
						
						
						<tr>
							<td style="font-weight: bold;">Gender</td>
							<td>
							<select class="form-control" name="user_gender">
								<option><?php echo $gender;?></option>
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
							</td>
						</tr><br>

						   <center><tr align="center">
							<td colspan="6">
							<input class="btn btn-info" style="width: 150px;" type="submit" name="submit" value="Update"/>
							</td></tr></center>
				              </form></center>
                            </div>

                            <?php  
                    

                    
                }

				?>
	<?php 
	if(isset($_POST['update']))
	{
		$con=mysql_connect(" $username,$email,$pass,$varsityName,$courseName,$year,$gender,$contact,$position,$province,$city where user_id='$u_id'");
		$u_id = htmlentities($_POST['user_id']);
		$username = htmlentities($_POST['user_name']);
		$email = htmlentities($_POST['user_email']);
		$image = htmlentities($_POST['user_image']);
		$pass = htmlentities($_POST['user_pass']);
		$varsityName = htmlentities($_POST['user_varsityName']);
		$courseName = htmlentities($_POST['user_courseName']);
		$year = htmlentities($_POST['user_year']);
		$gender = htmlentities($_POST['user_gender']);
		$contact = htmlentities($_POST['user_contact']);
		$position = htmlentities($_POST['user_position']);
		$province = htmlentities($_POST['user_province']);
		$city = htmlentities($_POST['user_city']);
     $update = "update user  set  $username,$email,$pass,$varsityName,$courseName,$year,$gender,$contact,$position,$province,$city where user_id='$u_id'";
       if($con->query($update)===TRUE){
		 $run = mysqli_query($con,$update); 
		 echo "<script>alert('Your Profile Updated!')</script>";
		 echo "<script>window.open('home.php','_self')</script>";
		}
		else
		{
          echo"<script>alert('your profile failed to update!')</script>";
          echo "<script>window.open('edit_profile.php','_self')</script>";
		}
	
	}


?>

<script>
function show_password() {
    var x = document.getElementById("mypass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
</body>
</html>
<?php } ?>
