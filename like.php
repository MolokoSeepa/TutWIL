<?php
if($_POST['like']) {
$sql = "UPDATE table set `likes` = `likes`+1 where `user_id` = '1'";
$result=mysql_query($sql);
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<input type = "submit" value = "You Have a interested potential from" name='like'/>
</form>