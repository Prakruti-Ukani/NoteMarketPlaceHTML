<?php
include "config.php";
session_start();
$msg=" ";
if(isset($_POST['submit']))
{

	$email=$_SESSION['email'];
	$oldpwd=$_POST['oldpwd'];
	$newpwd=$_POST['newpwd'];
	$confirmpwd=$_POST['confirmpwd'];
	$fetch_data=mysqli_query($conn,"SELECT * FROM user WHERE email='$email' AND password='$oldpwd'");
	$num=mysqli_fetch_array($fetch_data);
	if($num>0)
	{
		if($newpwd == $confirmpwd)
		{
			$query=mysqli_query($conn,"UPDATE user SET password='$newpwd' WHERE email='$email'");
			if($query)
			{
				header("location:login.php");
			}
		}
		else
		{
			$msg="Confirm password and new password is not match";
		}
	}
	else
	{
		$msg="Old password is not match";
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
        <section id="change-pwd">
            <div class="container">
                <div class="row">
                    <div id="logo">
                        <img src="img/login/top-logo.png" alt="logo">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="login-form">
                                <p><span id="label1">Change Password</span></p>
                                <p><span id="label2">Enter your new password to change your password</span></p>
                            <form id="login-form-field" action="" method="post">
                              <div class="form-group">
                                    <label>Old Password</label>
                                    <input id="old-pwd" type="password" class="form-control" name="oldpwd" placeholder="Password">
                                    <span class="field-icon"><img src="img/front/eye.png" toggle="#old-pwd"  class="toggle-password"></span>
                              </div>
                              <div class="form-group">
                                    <label>New Password</label>
                                    <input id="txtNewPassword" type="password" class="form-control" name="newpwd" placeholder="Password" >
                                    <span class="field-icon"><img src="img/front/eye.png" toggle="#new-pwd"  class="toggle-password"></span>
                                    <span class="error_form" id="password_error_message" ></span>

                              </div>
                              <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input id="confirm-pwd" type="password" class="form-control" name="confirmpwd" placeholder="Password">
                                    <span class="field-icon"><img src="img/front/eye.png" toggle="#confirm-pwd"  class="toggle-password"></span>
                              </div>
                              <span style="color: #F90A0A;"><?php echo $msg; ?></span>
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

        <script src="js/script.js"></script>


        <script type="text/javascript">
	        $(function() {
	         $("#password_error_message").hide(); 
	         const button = document.querySelector('button');

	         $("#txtNewPassword").focusout(function() {
	         	check_password();

	         });

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
	     });
     	</script>
        
    </body>
</html> 
















