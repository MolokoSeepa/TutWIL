<!DOCTYPE html>
<?php
session_start();
include('includes/config.php');
include("functions/functions.php");
?>
<?php

if(!isset($_SESSION['user_email'])){

	header("location: index.php");

}
else{ ?>
<html>
<head>
	<title>Direct Chats</title>
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
</head>
<style>
#scroll_messages{
	max-height: 500px;
	overflow: scroll;
}
#btn-msg{
	width: 20%;
	height: 28px;
	border-radius: 5px;
	margin: 5px;
	border: none;
	color: #fff;
	float: right;
	background-color:steelblue;
}
#select_user{
	max-height: 500px;
	overflow:scroll;
}
#green{
	background-color: #2ecc71;
	border-color: #27ae60;
	color: #fff;
	width:45%;
	padding:2.5px;
	font-size:16px;
	border-radius:3px;
	float: left;
	margin-bottom: 2px;
}
#primary{
	background-color: #3498db;
	border-color: #fff;
	color: #fff;
	width:45%;
	padding:2.5px;
	font-size:16px;
	border-radius:3px;
	float: right;
	margin-bottom: 2px;
}
	html {
		height: 100%;
	}
	body {
		
		margin: 0px;
		padding: 0px;
		height: 100%;
		font-family: Helvetica, Arial, Sans-serif;
		font-size: 14px;
	}
	.msg-container {
		width: 100%;
		height: 100%;
	}
	.header {
	background-color:#fff;
		width: 100%;
		height: 55px;
		border-bottom: 1px solid #fff;
		text-align: center;
		padding: 15px 0px 5px;
		font-size: 20px;
		font-weight: normal;
	}
	.msg-area {
		height: calc(100% - 102px);
		width: 100%;
		background: #eee !important; 
		overflow-y: scroll;
	}
	.msginput {
		padding: 5px;
		margin: 10px;
		font-size: 14px;
		width: calc(100% - 20px);
		outline: none;
	}
	.bottom {
		width: 79%;
		height: 50px;
		position: fixed;
		bottom: 0px;
		border-top: 1px solid #CCC;
		background-color: #EBEBEB;
	}
	#whitebg {
		width: 100%;
		height: 100%;
		background-color: #FFF;
		overflow-y: scroll;
		opacity: 0.6;
		display: none;
		position: absolute;
		top: 0px;
		z-index: 1000;
	}
	#loginbox {
		width: 600px;
		height: 350px;
		border: 1px solid #CCC;
		background-color: #FFF;
		position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
		z-index: 1001;
		display: none;
	}
	
	button {
		background-color: #43ACEC;
		border: none;
		color: #FFF;
		font-size: 16px;
		margin: 0px auto;
		width: 150px;
	}
	.buttonp {
		width: 150px;
		margin: 0px auto;
	}

	.msg {
		margin: 10px 10px;
		background-color: #f1f0f0;
		max-width: calc(45% - 20px);
		color: #000;
		padding: 10px;
		font-size: 14px;
	}
	.msgfrom {
		background-color: #0084ff;
		color: #FFF;
		margin: 10px 10px 10px 55%;
	}
	.msgarr {
		width: 0;
		height: 0;
		border-left: 8px solid transparent;
		border-right: 8px solid transparent;
		border-bottom: 8px solid #f1f0f0;
		transform: rotate(315deg);
		margin: -12px 0px 0px 45px;
	}
	.msgarrfrom {
		border-bottom: 8px solid #0084ff;
		float: right;
		margin-right: 45px;
	}
	.msgsentby {
		color: #8C8C8C;
		font-size: 12px;
		margin: 4px 0px 0px 10px;
	}
	.msgsentbyfrom {
		float: right;
		margin-right: 12px;
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

<div class="msg-container">	
<div style="color: teal" class="header">Direct Messeges
<a href="messeges.php" class="float-left btn btn-light">Back</a> 
</div>	

<?php
		//getting user to id and user from id for messages
			if(isset($_GET['u_id'])){

			global $con;

			$get_id = $_GET['u_id'];

			$get_user = "select * from user where user_id='$get_id'";

			$run_user = mysqli_query($con,$get_user);

			$row_user=mysqli_fetch_array($run_user);

			$user_to_msg = $row_user['user_id'];
			$user_to_name = $row_user['user_name'];
			}

			$user = $_SESSION['user_email'];
			$get_user = "select * from user where user_email='$user'";
			$run_user = mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);
         
			$user_from_msg = $row['user_id'];
         
			$user_from_name = $row['user_name'];

		?>

<div class="msg-area" id="msg-area">
			<?php


				$sel_msg = "select * from user_messages where (user_to='$user_to_msg' AND user_from='$user_from_msg') OR(user_from='$user_to_msg' AND user_to='$user_from_msg') ORDER by 1 ASC";
				$run_msg = mysqli_query($con,$sel_msg);

				while($row_msg=mysqli_fetch_array($run_msg)){
                $id = ['id'];
				$user_to = $row_msg['user_to'];
				$user_from = $row_msg['user_from'];
				$msg_body = $row_msg['msg_body'];
				$msg_date = $row_msg['date'];
		


				?>

				<div id="loaded_msg">

					<p><?php if($user_to == $user_to_msg AND $user_from == $user_from_msg){echo "<div class='message' id='primary' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br>";} else if($user_from == $user_to_msg AND $user_to==$user_from_msg){echo "<div class='message' id='green' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br>";}?></p>

				</div>

				<?php
				}
            

			?>
		</div>
		<?php
			if(isset($_GET['u_id'])){
				$u_id = $_GET['u_id'];
				if($u_id == "new"){
				echo '
<p> No Messeges</p>

				';
				}
				else{
				echo'
				<div class="bottom">
				<form action="" method="POST">
					<input type="text" class="form-control" placeholder="Enter Your Message" name="msg_box" id="message_textarea" />
					</div>
					<input type="submit" name="send_msg" id="btn-msg" value="Send">

				</form>
				';

				}
			}

		?>
		<?php
			if(isset($_POST['send_msg'])){
				$msg = htmlentities($_POST['msg_box']);


			if($msg == ""){
					echo"<h4 style='color:red;text-align:center;'>Message was unable to send!</h4>";
				}else if(strlen($msg) > 1000){
					echo"<h4 style='color:red;text-align:center;'>Message is Too long! Use only 37 characters</h4>";
				}
				else{
				$insert = "insert into user_messages(user_to,user_from,msg_body,date,msg_seen) values ('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";

				$run_insert = mysqli_query($con,$insert);
	
				
			}
			}
		?>
	</div>
	<div class="col-sm-3">
	
	</div>
</div>
<script>
	var div = document.getElementById("scroll_messages");
	div.scrollTop = div.scrollHeight;
</script>
</body>
</html>
<?php } ?>

<!-- <span class='badge badge-secondary'> $count_msg</span> -->
