<?php

require 'PHPMailer/includes/PHPMailer.php';
require 'PHPMailer/includes/SMTP.php';
require 'PHPMailer/includes/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit']))
{
	$email_from=$_POST['email'];
    $fn=$_POST['fn'];
	$mail = new PHPMailer(true);
     
    try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;  // This is fixed port for gmail SMTP
         
            $config_email = "prakrutiukani@gmail.com";
            $mail->Username = $config_email; 
            $mail->Password = "Prakruti@ukani1999";  

            $mail->setFrom($email_from, $fn);  
         
            $mail->addAddress('prakrutiukani@gmail.com', 'prakruti Ukani');  
            $mail->addReplyTo($email_from, $fn);  
         
            // Setting the email content
            $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
            $mail->Subject = $_POST['subject'];       //subject line of email
            $mail->Body = "Hello,<br><br>".$_POST['comment']."<br><br>Regards,<br>".$_POST['fn'];   //Email body
            $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';  
         
            $mail->send();
            echo "Email message sent.";
        } 
        catch (Exception $e) {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
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
        <link rel="stylesheet" href="css/responsive.css">

    </head>
    <body>
        <!--navbar-->
        <?php include "header.php"; ?>
        <!--navbar end-->
        <section id="top-title">
            
                <div class="container"> 
                    <div class="row">
                        <div class="col-md-12">
                            <div id="title-text" class="text-center">
                                <h3>Contact Us</h3>
                            </div>
                        </div>
                    </div>
                </div>
            
        </section>
        <section id="contact">
            <div class="content-box-md">
                <div class ="container">
                
                    <form action="contact_us.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading">
                                    <h3>Get In Touch</h3>
                                    <p>let us know how to get back to you</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>Full Name *</label>
                                        <input type="text" class="form-control" id="fn" name="fn" placeholder="Enter your Full name" required>
                                </div>
                                <div class="form-group">
                                        <label>Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                                </div>
                                <div class="form-group">
                                        <label>Subject *</label>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your subject" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>Comment / Questions *</label>
                                        <textarea class="form-control" id="ln" placeholder="Comments" name="comment" required cols="0"></textarea>
                                </div>
                                

                            </div>
                        </div>
                     
                        <button type="submit"  name="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </section>

        <!--footer-->
        <?php include "footer.php" ?>
        <!--footer end-->
        



        <!--jquery-->
        <script src="js/jquery.js"></script>

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        
    </body>
</html> 
















