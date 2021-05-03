
<!DOCTYPE html>
<html>
<head>
	<title>User Activity Logs</title>
</head>
<style>
body {
	background: #FFFAF0;
}
table {
	width: 60%;
	border:1px solid black;
	margin-left:20%;
	margin-top: 3%;
	background: #FCE6C9;
}
td {
	text-align: center;
	padding: 1%;
	
}
.a1 {
	color:#EEE9BF;
	height:50px;
	background-color:black;
}
h1  {
	text-align: center;
}
</style>
<body>
		<h1> USERS LOGS </h1>
	<table>
			<tr class="a1">
				<th>Username </th>
				<th>Activity of Users </th>
				<th>Date Logs </th>
				<th>Time logs </th>
			</tr>
			
<?php
$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'loginpage' ) or die(mysqli_error($db));

$sql = "SELECT username, activity_logs, date_logs, time_logs FROM user_logs";
$result = $db->query($sql);
 $_SESSION["id"]=$row['id'];

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
        echo "<tr><td> " . $row["username"]. " </td><td> " . $row["activity_logs"]. "</td><td> " . $row["date_logs"]. "</td><td> " . $row["time_logs"]. "</td><tr>";
    }
} else {
    echo "0 results";
}
$db->close();



?>

	</table>

</body>
</html>
