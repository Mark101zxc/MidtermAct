 <?php

$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'loginpage' ) or die(mysqli_error($db));
session_start();
    $from_time = date('Y-m-d H:i:s');
    $to_time1=$_SESSION["expired"];

    
 $date=date_default_timezone_set("Asia/Manila");
$dates = date("Y-m-d h:i:sa");
$date1= date("h:i:s",strtotime('+5 minutes',strtotime($dates)));;
if(isset($_POST['submit'])){

    $uname = $_POST['uname'];
     $pass = $_POST['password'];
    
        $sql = "SELECT * FROM `usersreg` WHERE username = '$uname' and password = '$pass'";  
        $result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        $_SESSION["id"]=$row['user_id'];
    if($count>0) {
       
         // generate OTP
        $otp = rand(100000,999999);
   
        // Send OTP
            $sql =  "INSERT INTO `codes` (code,user_email,created,expired) VALUES ('$otp','$uname','$dates','$date1')";
            $result = mysqli_query($db,$sql);
            
            
                    
                 $_SESSION['suc_message'] = "Put this Authentication Code First:";
                  $_SESSION['war_message'] = "This Code Will Expire in:";
                 $usename=$_POST['uname'];
                 $usepass=$_POST['password'];
                 $_SESSION['uname']="$uname";
                 $_SESSION['code']="$otp";
                 $_SESSION['timer']="$date1";
            header("location:logsA.php");
         $timestamp =  $_SERVER["REQUEST_TIME"];  // record the current time stamp 
    if(($timestamp - $_SESSION['time']) > 300)  // 300 refers to 300 seconds
    {
            }
    
     
    } else {
        $error_message = "Your Username or Password is Invalid Please Try Again!";
        

    }
}

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
       <fieldset style="width: 70%; height: 20%; margin-left: 20%; border:transparent;">
        <p style="margin-right: 20%; color:green;">
       <p style="margin-left: -10%; color:red;"> 
                                    <?php echo $error_message  ?>
                                       
       </p>
                               
                                
   </fieldset>
        <form  action="" method="POST" id="loginform">  
     
            
           
            <div class="block" style=" margin:10px;">
                <label> Username: </label> 
                <input type="text" id ="uname" name="uname" value="<?php echo $usename  ?>" onkeyup="manage(this)"/> <br> 
            </div>
             <div class="block" style=" margin:10px;">
                <label> Password: </label> 
                <input type="password" id="password" name="password" value="<?php echo $usepass ?>" onkeyup="manage(this)"/> <br> 
            </div>
                <br> 
                <button type="submit" id="btnsub"  class="btn" name="submit" value="Login" disabled>LOGIN</button> 
                <br><br>
                
              
           
           <script>
            
        function manage(txt) {
        var bt = document.getElementById('btnsub');
        if (uname.value != '' && password.value != '') {
            bt.disabled = false;
        }
        else {
            bt.disabled = true;
        }
         }    
        </script>
        </form>


                <form action="" method="POST" ><?php echo $unames  ?><?php echo $passw  ?>
                        <div class="block" style=" margin:10px; margin-bottom: 5%;">
                        <label> Authentication Code: </label>
                        <input type="text" id="otp" name="otp" disabled> <br> 
                        </div>
                <button type="submit" id="" class="scode" name="sendcode" value="Sendcode" disabled>Send Code</button>

                 </form>

        <br><br>
                 
              <p>You dont have an Account? <a href="Signup.php"> Register </a></p>
              <p>You Forgot your Password? <a href="request.php"> Forgot Password </a></p>
            
    </div>  
    
    
</body>  

</html>  