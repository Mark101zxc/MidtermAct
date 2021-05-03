<?php
include ("connects.php");

if (!isset($_GET["code"])){
	exit("Cant Find Page");
}

$code = $_GET["code"];

$id=$_SESSION['id'];
$query=mysqli_query($con,"SELECT * FROM `usersreg` where user_id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);

$getEmailQuery = mysqli_query($con, "SELECT email FROM rescode WHERE code='$code'");
if(mysqli_num_rows($getEmailQuery)==0) {
	
}

if (isset($_POST['password'])){
	$pw = $_POST['password'];
	$pw = ($pw);

		session_start();
	 $unames = $_SESSION['uname'];
	 $date=date_default_timezone_set("Asia/Manila");
	 $dates = date("Y-m-d");
	 $time = date("h:i:sa");

	$row = mysqli_fetch_array($getEmailQuery);
	$email = $row["email"];

	$query = mysqli_query($con, "UPDATE usersreg SET password='$pw' WHERE email='$email' ");

	if ($query){
		$query = mysqli_query($con, "DELETE FROM rescode WHERE code='$code'");
		$Msg = "Your Password is now Updated";

		 $sql =  "INSERT INTO `user_logs` (username,activity_logs,date_logs,time_logs) VALUES ('$unames','Reset Password','$dates','$time')";
         $result = mysqli_query($con,$sql);
	}else {
		exit("Something went wrong");
	}
}
?>
<link rel ="stylesheet" type ="text/css" href="reset.css">
<title>RESET PASSWORD </title>
<form method="POST">
	<fieldset class="res">
		
		<h1 class="head"> Input your new password</h1>
		<span class="msg1"><?php echo$Msg ?></span>
		<br>
	<input type="password" name="password" placeholder="New Password" class="input">
	
	<input type="submit" name="submit" value="Update Password" class="but">
	<a href="logs.php"> <button type="button" name="submit"  class="but">LOGIN </button></a>
	</fieldset>


</form>