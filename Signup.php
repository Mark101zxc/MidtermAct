<?php
require_once "cons.php";
if (isset($_POST['signup'])) {
$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);


if (!preg_match("#.*(?=.*[a-z])(?=.*[0-9]).*$#",$uname)) {
$uname_error = "Username need atleast and 1 Number";
  
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$email_error = "Please Enter Valid Email ID";

}
if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$password)) {
$password_error = "Password must be 8 in Characters
				  <br>Need Atleast 1 Number
				  <br>Need Atleast 1 Uppercase
				  <br>Need Atleast 1 Characters";

}       
if($password === $cpassword) {
	if(mysqli_query($conn, "INSERT INTO usersreg (username, email,password) VALUES('$uname','$email','$password')"))
	{
		?>
 		<script>
 		alert("Success Fully Register you can now login");

 	  </script>
 	  <?php
		?>
 		<script>
 		window.location="logs.php";
 		
 	  </script>
 	  <?php

	} else {
			$cpassword_error = "Password and Confirm Password doesnt match";
		
}	 
}


mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registration Validation</title>


<style>
	body {
		background-color: #CCCCCC;
	}
	.field {
 border: 1px solid rgb(255,232,57);
  width: 500px;
  margin-top:3%;
  margin-left: 35%;
  padding-top: 30px;
  background-color:white;
}

input {
	width: 50%;
	height: 20px;
	margin:0;
	float:right;
}
label {
	margin-left:25px;
	font-size:  19px;
}

}

.but {
	width: 10%;
	
	
	
}
</style>
</head>
<body>

	<br><br><br><br><br><br>
	<fieldset class="field">
<div class="container">

<h2>Registration Form </h2>
</div>
<p>Please fill all fields in the form</p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class=""><p style="margin-left: 25%; color:red;"><?php echo $email_error ?>
												<br><?php echo $uname_error ?>
												<br><?php echo $password_error ?> 
											   <br><?php echo $cpassword_error ?></p>
<label>Username: </label>
<input type="text" name="uname" class="form-control" maxlength="50" required><br>


</div>
<br>
<div class="form-group ">
<label>Email:</label>
<input type="email" name="email" class="form-control" value="" maxlength="30" >

</div>
<br>
<div class="form-group">
<label>Password:</label>
<input type="password" name="password" class="form-control" value="" maxlength="15" required>

</div>  
<br>
<div class="form-group">
<label>Confirm Password:</label>
<input type="password" name="cpassword" class="form-control" value="" maxlength="15" required>

</div>
<br><br>
<fieldset style="border:transparent;">
<button type="submit"  name="signup" style="width:30%; color: #fff; background-color:#3369ff; height: 30px; margin-left: 60%;">Submit</button>
<br><br>
<a href="logs.php"><button type="button" style="width:30%; color: #fff; background-color:#3369ff; height: 30px; margin-left: 60%; ">Login</button></a>
<p style="margin-left:45%; ">Already Have an account? Click login </p>
</fieldset>
</form>
   

</fieldset>
</body>
</html>