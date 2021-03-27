<?php
include "config.php";
require 'PHPMailer/includes/PHPMailer.php';
require 'PHPMailer/includes/SMTP.php';
require 'PHPMailer/includes/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
 
$msg=" ";
if(isset($_POST['submit']))
{
  $fn=$_POST['fn'];
  $ln=$_POST['ln'];
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];
  $confirm=$_POST['confirmpwd'];

  $fn=mysqli_real_escape_string($conn,$fn);
  $ln=mysqli_real_escape_string($conn,$ln);
  $email=mysqli_real_escape_string($conn,$email);
  $pwd=mysqli_real_escape_string($conn,$pwd);
  $confirm=mysqli_real_escape_string($conn,$confirm);



  $check=mysqli_num_rows(mysqli_query($conn,"select * from user where email='$email'"));
  $headers=" ";
  $ms=" ";
  if($check>0)
  {
    $msg="Email is Already Exists";
  }
  else
  {
    $query="INSERT INTO user(role_id,first_name,last_name,email,password,is_emailverified,isactive,created_date,modified_date) VALUES(1,'$fn','$ln','$email','$pwd',0,1,NOW(),NOW())";
      $result=mysqli_query($conn,$query);
      if(!$result)
      {
          die('query failed'.mysqli_error($query));
      }
      $id=mysqli_insert_id($conn);
      $msg= "Thanks for new Registration.";
          
      $mail = new PHPMailer();
      try {
          
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port = 587;  
       
          $config_email = "prakrutiukani@gmail.com";
          $mail->Username = $config_email;
          $mail->Password = "Prakruti@ukani1999";   
       
          $mail->setFrom($config_email, 'prakruti Ukani');  
          
          $mail->addAddress($email, $fn);  
          $mail->addReplyTo($email, $fn);   

          $mail->IsHTML(true); 
          $mail->AddEmbeddedImage('img/home/logo.png','logo');
          $mail->Subject = "Email verification";      
          $mail->Body = "<html>
                      <body>
                          <table>
                              <tr>
                                  <td style='height: 80px;'><img src='cid:logo' alt='logo'></td>
                              </tr>
                              <tr>
                                  <td style='color: #6255a5;font-size:26px;  font-weight: 600;line-height: 30px; height: 50px;''>Email Verification</td>
                              </tr>
                              <tr>
                                  <td style='height: 30px;font-size: 18px;color: #333333;font-weight: 400;'><b>Dear $fn,</b></td>
                              </tr>
                              <tr>
                                  <td style='font-size: 16px;color: #333333;font-weight: 400;height: 30px;'>Thanks for signing up</td>
                              </tr>
                              <tr>
                                  <td style='font-size: 16px;color: #333333;font-weight: 400;height: 25px;'>Simply click below for email verification.</td>
                              </tr>
                              <tr>
                                  <td style='height: 60px;'><button style='width: 540px;background-color: #6255a5;height: 50px;border-radius: 3px;font-size: 18px;color: #fff;line-height: 22px; border:transparent;text-transform: uppercase;'><a href='http://localhost/MVC_2/user/verify.php?id=$id' style='color:#fff;text-decoration:none'>verify email address</a></button></td>
                              </tr>
                          </table>
                         </body>
                  </html>";   
          $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';  
       
          $mail->send();
          
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
        <link rel="stylesheet" href="css/responsive.css">

    </head>
    <body>
        <section id="signup">
            <div class="container">
                <div class="row">
                    <div id="logo">
                        <img src="img/login/top-logo.png" alt="logo">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="login-form">
                                <p><span id="label1">Create An Account</span></p>
                                <p><span id="label2">Enter your details to signup</span></p>
                            <form id="registration_form" action="sign_up.php" method="post">
                              <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" id="fn" name="fn" placeholder="Enter your First name" required>
                                    <span class="error_form" id="fname_error_message" ></span>
                              </div>
                              <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" id="ln" name="ln" placeholder="Enter your last name" required>
                                    <span class="error_form" id="lname_error_message" ></span>
                              </div>
                              <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                    <span class="error_form" id="email_error_message" ></span>
                              </div>
                              <div class="form-group">
                                    <label>Password</label>
                                    <input id="txtNewPassword" type="password" name="pwd" class="form-control"  placeholder="Password">
                                    <span class="field-icon"><img src="img/front/eye.png" toggle="#txtNewPassword"  class="toggle-password"></span>
                                    <span class="error_form" id="password_error_message" ></span>
                                    
                              </div>
                              <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmpwd" id="txtConfirmPassword" placeholder="Re-enter your password" required>
                                    <span class="field-icon"><img src="img/front/eye.png" toggle="#txtConfirmPassword"  class="toggle-password"></span>
                                    <span class="error_form" id="retype_password_error_message"></span>
        
                              </div>
                             	
                              <button type="submit" name="submit" id="submit" disabled="disabled">SIGN UP</button>
                            </form>
                            <?php echo $msg; ?>
                            <p id="label3"><span>Already have an account? <a href="login.html">Login</a> </span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        

        <!--jquery-->
        <script src="js/jquery.js"></script>

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/script.js"></script>

        <script type="text/javascript">
        $(function() {

         $("#fname_error_message").hide();
         $("#lname_error_message").hide();
         $("#email_error_message").hide();
         $("#password_error_message").hide();
         $("#retype_password_error_message").hide();

         
         const button = document.querySelector('button');

         $("#fn").focusout(function(){
            check_fname();
         });
         $("#ln").focusout(function() {
            check_lname();
         });
         $("#email").focusout(function() {
            check_email();
         });
         $("#txtNewPassword").focusout(function() {
            check_password();
         });
         $("#txtConfirmPassword").focusout(function() {
            check_retype_password();
         });

         function check_fname() {
            var pattern = /^[a-zA-Z]*$/;
            var fname = $("#fn").val();
            if (pattern.test(fname) && fname !== '') {
               $("#fname_error_message").hide();
               $("#fn").css("border","1px solid #495057");
				button.disabled=false;
               
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#fn").css("border","2px solid #F90A0A");
               button.disabled=true;
            }
         }

         function check_lname() {
            var pattern = /^[a-zA-Z]*$/;
            var sname = $("#ln").val()
            if (pattern.test(sname) && sname !== '') {
               $("#lname_error_message").hide();
               $("#ln").css("border","1px solid #495057");
               button.disabled=false;
            } else {
               $("#lname_error_message").html("Should contain only Characters");
               $("#lname_error_message").show();
               $("#ln").css("border","2px solid #F90A0A");
               button.disabled=true;
            }
         }
         function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#email").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#email").css("border","1px solid #495057");
              button.disabled=false;
            } else {
               $("#email_error_message").html("Invalid Email");
               $("#email_error_message").show();
               $("#email").css("border","2px solid #F90A0A");
               button.disabled=true;
            }
         }

        function check_password() {
            var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,24}$/;
            var pass = $("#txtNewPassword").val();
            if (pattern.test(pass) && pass !== '') {
               $("#password_error_message").hide();
               $("#txtNewPassword").css("border","1px solid #495057");
               button.disabled=false;
            } else {
               $("#password_error_message").html("password should contain mixture of uppercase,digit and special character");
               $("#password_error_message").show();
               $("#txtNewPassword").css("border","2px solid #F90A0A");
               button.disabled=true;
            }
         }

         function check_retype_password() {
            var password = $("#txtNewPassword").val();
            var retype_password = $("#txtConfirmPassword").val();
            if (password !== retype_password) {
               $("#retype_password_error_message").html("Passwords Did not Matched");
               $("#retype_password_error_message").show();
               $("#txtConfirmPassword").css("border","2px solid #F90A0A");
               button.disabled=true;
            } else {
               $("#retype_password_error_message").hide();
               $("#txtConfirmPassword").css("border","1px solid #495057");
               button.disabled=false;
            }
         }

         	
            
        });
        </script>
        
    </body>
</html> 
