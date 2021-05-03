<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "loginpage";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
?>
