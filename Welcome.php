<?php
 include 'connection.php';
  session_start();
$id=$_SESSION['id'];
$query=mysqli_query($db,"SELECT * FROM `usersreg` where user_id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
<!DOCTYPE html>

<html>
<head>
	<title>Welcome</title>
</head>
<body style="background-color:#CCCCCC ">
	<form action="" method="POST">
<h2 style="text-align: center;">You are now login as,<br> <?php  echo $row['username']; ?></h2>
<h3 style="text-align: center;">And Your Email is,<br> <?php  echo  $row['email'];?></h3>
<button type="submit" name="logout" style="width: 10%; height:40%; background: blue; color: white; margin-left: 45%;" > Logout </button>
	</form>
</body>
</html>
<?php

if(isset($_POST['logout'])){

 $unames = $_SESSION["uname"];
$date=date_default_timezone_set("Asia/Manila");
 $dates = date("Y-m-d");
  $time = date("h:i:sa");
 $sql =  "INSERT INTO `user_logs` (username,activity_logs,date_logs,time_logs) VALUES ('$unames','Just Log Out','$dates','$time')";
            $result = mysqli_query($db,$sql);

            ?>
            <script>
                alert("You are now Log out");
            </script>

            <?php

			?>
            <script>
                window.location="logs.php";
            </script>

            <?php

}
?>