<?php include 'config.php'; ?>
<?php session_start(); ?>

<?php
$msg=" ";
if(isset($_POST['submit']))
{
    $username=$_POST['email'];
    $password=$_POST['password'];
    
    $username=mysqli_real_escape_string($conn,$username);
    $password=mysqli_real_escape_string($conn,$password);

    $query="SELECT * FROM user WHERE email='$username'";
    
    $result=mysqli_query($conn,$query);    
    $count = mysqli_num_rows($result);

    while($row=mysqli_fetch_assoc($result))
    {
        $db_username=$row['email'];
        $db_password=$row['password'];
        $is_verified=$row['is_emailverified'];
        $role_id=$row['role_id'];
        $isactive=$row['isactive'];
        $db_userid=$row['id'];
        $db_first_name=$row['first_name'];
        $db_last_name=$row['last_name'];
    }
    
    if($count==1)
    {
        if($is_verified==1 && $role_id==1 && $isactive==1)
        {
            if($db_password==$password && $db_username==$username)
            {
                $_SESSION['email']=$db_username;
                $_SESSION['login']=true;
                $_SESSION['userid']=$db_userid;
                $_SESSION['first_name']=$db_first_name;
                $_SESSION['last_name']=$db_last_name;
                if(isset($_POST['remember']))
                {
                    setcookie('email',$username,time()+60*60*7);
                    setcookie('password',$password,time()+60*60*7);
                }

                $fetch_userdata=mysqli_query($conn,"SELECT * FROM user_profile where user_id=$db_userid");
                $count=mysqli_num_rows($fetch_userdata);
                if($count>0)
                {
                    header("location: search.php");    
                }
                else
                {
                    header("location: profile.php");
                }
                foreach($fetch_userdata as $user_profile_row)
                {
                    $user_profile=$user_profile_row['profile_picture'];
                }
                $_SESSION['profile_picture']=$user_profile;
            }
            else if($db_username==$db_username && $db_password != $password)
            {
                $msg="password Incorrect";
            }
            
        }
        else
        {
            $msg="Please verified your account";
        }
        
    }
    else
    {
        $msg="Invalid Username and password";
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
        <section id="login">
            <div class="container">
                <div class="row">
                    <div id="logo">
                        <img src="img/login/top-logo.png" alt="logo">
                    </div>
                </div>
                <div class="row">
                  
                    <div class="col-md-12 col-lg-12">
                        <div class="login-form">
                                <p><span id="label1">Login</span></p>
                                <p><span id="label2">Enter your email address and password to login</span></p>
                            <form id="login-form-field" method="post" action="login.php">
                              <div class="form-group">
                                    <label>Email</label>
                                    <?php if(isset($_COOKIE['email']))
                                    { ?>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" required name="email" value="<?php echo $_COOKIE['email'] ?>">
                                    <?php }else{ ?>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email" required name="email">
                                    <?php } ?>
                                    
                              </div>
                              <div class="form-group">
                                    <label>Password</label>
                                    <label><a href="forgot_password.php">Forgot password?</a></label>
                                    <?php if(isset($_COOKIE['password']))
                                    { ?>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $_COOKIE['password'] ?>">
                                        <?php }else{ ?>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                    <?php } ?>
                                    <span class="field-icon"><img src="img/front/eye.png" toggle="#password"  class="toggle-password"></span>
                              </div>
                              <div style="color: red;margin-bottom: 10px;"><?php echo $msg; ?></div>
                              <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox1" name="remember">
                                    <label class="form-check-label">Remember me</label>
                              </div>

                              <button type="submit" name="submit">Login</button>
                            </form>
                            
                            <p id="label3"><span>Don't have an account? <a href="sign_up.php">Sign Up</a> </span></p>
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
        
    </body>
</html> 
















