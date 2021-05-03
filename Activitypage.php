<!DOCTYPE html>
<html>
<head>
	<title>LOG IN</title>
</head>
<body>
		<div id="main">
			<h1> SIMPLE LOGIN </h1>
			<form method="POST">
			Username: <input type="text" name="ADMIN" class="text" autocomplete="off" required>
			Password: <input type="password" name="ADMIN123" class="text" required>

			<input type="Submit" name="subm" id="sub">
			</form>
		</div>

</body>
</html>

<?php
$servername='localhost';
$rt='root';
$pswd='';
$data='loginpage';

	//mysql_connect("localhost","root","password");
	

	$conn = mysqli_connect($servername, $rt, $pswd,$data);
//mysql_select_db("loginpage");

	if (isset($_POST['subm'])) {
		$un=$_POST['ADMIN'];
		$pasw=$_POST['ADMIN123'];
		$data=("select password from admin where username='$un'");
			if ($row=($data)){
				if ($pasw=$row['password']){
			header("location:Sample.html");
			exit();
		}
		 else
			echo "Invalid Password";
		}

		 else
			echo "Invalid Username";
	}


?>