<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'connects.php';


if(isset($_POST["submit"])){

     $emailTo = $_POST["email"];

        $sql = "SELECT * FROM `usersreg` WHERE email = '$emailTo' ";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
    if($count == 1){

         $_SESSION["id"]=$row['user_id'];
    $code = uniqid(true);
    $query = mysqli_query($con, "INSERT INTO rescode (code,email) VALUES ('$code','$emailTo')");
}else {
    $err_message1 = "Your Email is incorrect";
}
    

$mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'MarkAntipala102@gmail.com';                     //SMTP username
        $mail->Password   = 'Markjason222';                               //SMTP password
        $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('CookiosDessertShop@gmail.com', 'Admin');
        $mail->addAddress($emailTo);     //Add a recipient             //Name is optional
        $mail->addReplyTo('No-Reply@DSH.com', 'No Reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/reset.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'This is the link for Reset Password';
        $mail->Body    = "<h1> You are requested a password reset</h1>
                                Click this <a href='$url'>Reset Password link</a> ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

       $Msg1 ='Reset Password link is send to your email';
    } catch (Exception $e) {
        $Msg = "Please put an Email First";
    }
    
    }

?>
<link rel ="stylesheet" type ="text/css" href="resetdesign.css">
<title>FORGOT PASSWORD </title>

<body>
<form method="POSt">
    <fieldset class="a2">
        
        <h1>Put Your Email Here</h1>
         <span class="msg1"><?php echo $Msg1 ?></span>
         <br>
        <span class="msg"><?php echo $err_message1 ?></span>
        <br>
    <input type="email" name=email placeholder="Email" autocomplete="off" class="input" >
    <br>
    <button  type="submit" name=submit value="Send Email" class="but"> Send Email </button>
   <a href="logs.php"> <button type="button" name="submit"  class="but">BACK</button></a>
   </fieldset> 


</form>
