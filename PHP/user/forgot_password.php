<?php
include "config.php";
require 'PHPMailer/includes/PHPMailer.php';
require 'PHPMailer/includes/SMTP.php';
require 'PHPMailer/includes/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 8; $i++) 
    {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

if(isset($_POST['submit']))
{
    $pass=randomPassword();
    $email=$_POST['email'];

    $query="UPDATE user SET password='$pass' where email='$email'";
    $result=mysqli_query($conn,$query);
    if(!$result)
    {
        die("Query failed");
    }
    else
    {
        
        $mail = new PHPMailer(true);
    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;  
     
        $config_email = "prakrutiukani@gmail.com";
        $mail->Username = $config_email;
        $mail->Password = "Prakruti@ukani1999";   
     
        $mail->setFrom($config_email, 'NoteMarketPlace');  
        
        $mail->addAddress($email);  
        $mail->addReplyTo($email);   

        $mail->IsHTML(true); 
        $mail->Subject = " New Temporary Password has been created for you";      
        $mail->Body = "Hello,<br><br> We have generated a new password for you Password: $pass<br><br>Regards,<br>NoteMarketPlace";   
        $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';  
     
        $mail->send();
        echo "Email message sent.";
        header("location:login.php");
    } 
    catch (Exception $e) {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <!--title-->
        <title>Notes Marketplace</title>

        <!--favicon-->
        <link rel="shortcut icon" href="img/front/favicon.ico">

       <!--font-->
       <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

       <!--bootstrap css-->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">


       <!--custom css-->
        <link rel="stylesheet" href="css/custom_css/style.css">

    </head>
    <body>
        <section id="forgot">
            <div class="container">
                <div class="row">
                    <div id="logo">
                        <img src="img/login/top-logo.png" alt="logo">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="login-form">
                                <p><span id="label1">Forgot Password?</span></p>
                                <p><span id="label2">Enter your email to reset your password</span></p>
                            <form id="login-form-field" method="post" action="forgot_password.php">
                              <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                              </div>
                              
                              <button type="submit" name="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        



        <!--jquery-->
        <script src="js/jquery.js"></script>

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        
    </body>
</html> 
















