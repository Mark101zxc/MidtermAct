<?php 
$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'loginpage' ) or die(mysqli_error($db));

session_start();
     $date=date_default_timezone_set("Asia/Manila");
    $dates = date("Y-m-d");
    $time = date("h:i:sa");
  $unames = $_SESSION["uname"];
if(isset($_POST['sendcode'])){

     $passw = $_POST['password'];
     $code = $_POST['otp'];
        $sql = "SELECT code FROM `codes` WHERE code = '$code' ";  
        $result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
         $_SESSION["ids"]=$row['id'];



             if($count == 1){  
                 $sql =  "INSERT INTO `user_logs` (username,activity_logs,date_logs,time_logs) VALUES ('$unames','Just Logged in','$dates','$time')";
            $result = mysqli_query($db,$sql);
              

                 
            ?>
            <script>
                alert("You are now directing to Homepage");
            </script>

            <?php
            ?>
            <script>
                window.location="Welcome.php";
            </script>

            <?php

            
}else {             
             
                $err_code="Your Authentication Code is Incorrect ";  
               
                
            header("logs.php");

}   
}

?>

<?php
 include 'connection.php';
  session_start();
$id=$_SESSION['id'];
$query=mysqli_query($db,"SELECT * FROM `usersreg` where user_id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
?>

<?php
    
?>

<!DOCTYPE html>
<html>  
<head>  
    <title>PHP login system</title>  
      
    <link rel = "stylesheet" type = "text/css" href = "style.css"> 

    
</head> 
 
<body>  

<br>
    <div id = "frm">  
            
       <center> <h1>Login</h1> </center> 
       <fieldset style="width: 70%; height: 25%; margin-left: 20%; border:transparent;">
        <p style="margin-left: 2%; color:green;"><?php echo $_SESSION['suc_message']; ?><?php echo $_SESSION['code']; ?></p> <br>
                                    
                        <p style="margin-left: 10%; margin-top:-2%; color:#FFD700;">  <?php echo $_SESSION['war_message']; ?><?php echo $_SESSION['timer']; ?></p>

            <p style="color:red; margin-left:6%;margin-bottom: 10%;"><?php echo $err_code  ?></p>
                                
   </fieldset>
        <form  action="" method="POST" id="loginform">  
     
            
           
            <div class="block" style=" margin:10px;margin-top: 10%;">
                <label> Username: </label> 
                <input type="text" id ="uname" name="uname" value=" <?php  echo  $row['username']; ?>" onkeyup="manage(this)" readonly> <br> 
            </div>
             <div class="block" style=" margin:10px;">
                <label> Password: </label> 
                <input type="password" id="password" name="password" value=" <?php  echo  $row['password']; ?>" onkeyup="manage(this)"/readonly> <br> 
            </div>
                <br> 
                <button type="submit" id="btnsub"  class="btn" name="submit" value="Login" disabled>LOGIN</button> 
                <br><br>

          
        </form>


                <form action="" method="POST" >
                        <div class="block" style=" margin:10px; margin-bottom: 5%;">
                        <label> Authentication Code: </label>
                        <input type="text" id="otp" name="otp" > <br> 
                        </div>
                <button type="submit" id="" class="scode" name="sendcode" value="Sendcode" maxlength="6">Send Code</button>
           
                 </form>

        <br><br>
                 
              <p>You dont have an Account? <a href="Signup.php"> Register </a></p>
            
    </div>  
    
    
</body>  

</html>