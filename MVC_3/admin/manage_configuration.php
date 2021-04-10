<?php
include "config.php";
session_start();

$uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";

$find_sup_email=mysqli_query($conn,"SELECT * FROM configuration WHERE config_key='SupportEmail'");
$support_email_count=mysqli_num_rows($find_sup_email);
foreach ($find_sup_email as $row) {
    $db_sup_email=$row['value'];
}
$find_phone=mysqli_query($conn,"SELECT * FROM configuration WHERE config_key='SupportPhone'");
$phone_count=mysqli_num_rows($find_phone);
foreach ($find_phone as $row) {
    $db_phone=$row['value'];
}

$find_email=mysqli_query($conn,"SELECT * FROM configuration WHERE config_key='EmailForNotify'");
$email_count=mysqli_num_rows($find_email);
foreach ($find_email as $row) {
    $db_email=$row['value'];
}

$find_facebook=mysqli_query($conn,"SELECT * FROM configuration WHERE config_key='FacebookURL'");
$facebook_count=mysqli_num_rows($find_facebook);
foreach ($find_facebook as $row) {
    $db_furl=$row['value'];
}

$find_twitter=mysqli_query($conn,"SELECT * FROM configuration WHERE config_key='TwitterURL'");
$twitter_count=mysqli_num_rows($find_twitter);
foreach ($find_twitter as $row) {
    $db_turl=$row['value'];
}

$find_linkedin=mysqli_query($conn,"SELECT * FROM configuration WHERE config_key='LinkedinURL'");
$linkedin_count=mysqli_num_rows($find_linkedin);
foreach ($find_linkedin as $row) {
    $db_lurl=$row['value'];
}

$find_profile=mysqli_query($conn,"SELECT * FROM configuration WHERE config_key='DefaultProfile'");
$profile_count=mysqli_num_rows($find_profile);
foreach ($find_profile as $row) {
    $db_pro_pic=$row['value'];
}

$find_note=mysqli_query($conn,"SELECT * FROM configuration WHERE config_key='DefaultNote'");
$display_count=mysqli_num_rows($find_note);
foreach ($find_note as $row) {
    $db_display_pic=$row['value'];
}

if(isset($_POST['submit']))
{
    $sup_email=$_POST['sup_email'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $furl=$_POST['furl'];
    $turl=$_POST['turl'];
    $lurl=$_POST['lurl'];
    $profile_file=$_FILES['profile']['name'];
    $display_file=$_FILES['display_pic']['name'];
    if($support_email_count==0)
    {
        mysqli_query($conn,"INSERT INTO configuration(config_key, value, created_date, created_by, modified_date, modified_by, isactive) VALUES ('SupportEmail','$sup_email',NOW(),$uid,NOW(),$uid,1)");
    }
    else
    {
        mysqli_query($conn,"UPDATE configuration SET value='$sup_email' WHERE config_key='SupportEmail'");
    }
    if($phone_count==0)
    {
        mysqli_query($conn,"INSERT INTO configuration(config_key, value, created_date, created_by, modified_date, modified_by, isactive) VALUES ('SupportPhone','$phone',NOW(),$uid,NOW(),$uid,1)");
    }
    else
    {
        mysqli_query($conn,"UPDATE configuration SET value='$phone' WHERE config_key='SupportPhone'");
    }
    if($email_count==0)
    {
        mysqli_query($conn,"INSERT INTO configuration(config_key, value, created_date, created_by, modified_date, modified_by, isactive) VALUES ('EmailForNotify','$email',NOW(),$uid,NOW(),$uid,1)");
    }
    else
    {
        mysqli_query($conn,"UPDATE configuration SET value='$email' WHERE config_key='EmailForNotify'");
    }
    if($facebook_count==0)
    {
        mysqli_query($conn,"INSERT INTO configuration(config_key, value, created_date, created_by, modified_date, modified_by, isactive) VALUES ('FacebookURL','$furl',NOW(),$uid,NOW(),$uid,1)");
    }
    else
    {
        mysqli_query($conn,"UPDATE configuration SET value='$furl' WHERE config_key='FacebookURL'");
    }
    if($twitter_count==0)
    {
        mysqli_query($conn,"INSERT INTO configuration(config_key, value, created_date, created_by, modified_date, modified_by, isactive) VALUES ('TwitterURL','$turl',NOW(),$uid,NOW(),$uid,1)");
    }
    else
    {
        mysqli_query($conn,"UPDATE configuration SET value='$turl' WHERE config_key='TwitterURL'");
    }
    if($linkedin_count==0)
    {
        mysqli_query($conn,"INSERT INTO configuration(config_key, value, created_date, created_by, modified_date, modified_by, isactive) VALUES ('LinkedinURL','$lurl',NOW(),$uid,NOW(),$uid,1)");
    }
    else
    {
        mysqli_query($conn,"UPDATE configuration SET value='$lurl' WHERE config_key='LinkedinURL'");
    }

    if($profile_count==0)
    {
            if($profile_file)
            {

                $profile_file=$_FILES['profile']['name'];
                $profile_tmpfile=$_FILES['profile']['tmp_name'];
                $profile_ext=pathinfo($profile_file,PATHINFO_EXTENSION);
                if($profile_ext=="jpg" || $profile_ext=="jpeg" || $profile_ext=="png") 
                {
                    
                    $profile_file="default-user".".".$profile_ext;
                    

                    $profile_destination='../upload/member/default/'.$profile_file;
                    move_uploaded_file($profile_tmpfile, $profile_destination);
                    $profile_query=mysqli_query($conn,"INSERT INTO configuration(config_key, value, created_date, created_by, modified_date, modified_by, isactive) VALUES ('DefaultProfile','$profile_destination',NOW(),$uid,NOW(),$uid,1)");
                }
                
            }
    }
    else
    {
        if($profile_file)
        {

            $profile_file=$_FILES['profile']['name'];
            $profile_tmpfile=$_FILES['profile']['tmp_name'];
            $profile_ext=pathinfo($profile_file,PATHINFO_EXTENSION);
            if($profile_ext=="jpg" || $profile_ext=="jpeg" || $profile_ext=="png") 
            {
                
                $profile_file="default-user".".".$profile_ext;
                

                $profile_destination='../upload/member/default/'.$profile_file;
                move_uploaded_file($profile_tmpfile, $profile_destination);
                $profile_query=mysqli_query($conn,"UPDATE configuration SET value='$profile_destination' WHERE config_key='DefaultProfile'");
            }
        
        }

    }
    if($display_count==0)
    {
            if($display_file)
            {

                $display_tmpfile=$_FILES['display_pic']['tmp_name'];
                $display_ext=pathinfo($display_file,PATHINFO_EXTENSION);
                if($display_ext=="jpg" || $display_ext=="jpeg" || $display_ext=="png") 
                {
                    
                    $display_file="default_display".".".$display_ext;
                    

                    $display_destination='../upload/member/default/'.$display_file;
                    move_uploaded_file($display_tmpfile, $display_destination);
                    $display_query=mysqli_query($conn,"INSERT INTO configuration(config_key, value, created_date, created_by, modified_date, modified_by, isactive) VALUES ('DefaultNote','$display_destination',NOW(),$uid,NOW(),$uid,1)");
                }
                
            }
    }
    else
    {
        if($display_file)
            {

                $display_tmpfile=$_FILES['display_pic']['tmp_name'];
                $display_ext=pathinfo($display_file,PATHINFO_EXTENSION);
                if($display_ext=="jpg" || $display_ext=="jpeg" || $display_ext=="png") 
                {
                    
                    $display_file="default_display".".".$display_ext;
                    

                    $display_destination='../upload/member/default/'.$display_file;
                    move_uploaded_file($display_tmpfile, $display_destination);
                    $profile_query=mysqli_query($conn,"UPDATE configuration SET value='$display_destination' WHERE config_key='DefaultNote'");
                   
            }
        
        }

    }
    header("location:manage_configuration.php");
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
        <link rel="shortcut icon" href="img/all/favicon.ico">

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
       
        <section id="add_page">
           <div class="content-box-md">
            <div class ="container">
                <div class="row" style="padding-top: 60px;">
                        <div class="col-md-8">
                            <div class="heading" style="margin-bottom: 20px;">
                                <h3>Manage System Configuration</h3>
                            </div>
                        </div>
                    </div>
                
                <form action=" " method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>Support emails address *</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required name="sup_email" 
                                    value="<?php if($support_email_count==0)
                                                {
                                                    echo '';
                                                }
                                                else
                                                {
                                                    echo $db_sup_email;
                                                }
                                         ?>">
                            </div>
                            <div class="form-group">
                                    <label>Supprt phone number *</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone"
                                    value="<?php if($phone_count==0)
                                                {
                                                    echo '';
                                                }
                                                else
                                                {
                                                    echo $db_phone;
                                                }
                                         ?>">
                            </div>
                            <div class="form-group">
                                    <label>Email Address(es)(for various events system will send notifications to these users)*</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your EmailId" name="email" 
                                    value="<?php if($email_count==0)
                                                {
                                                    echo '';
                                                }
                                                else
                                                {
                                                    echo $db_email;
                                                }
                                         ?>">
                            </div>
                            <div class="form-group">
                                    <label>Facebook URL </label>
                                    <input type="text" class="form-control" id="furl" placeholder="Enter facebook url" name="furl"
                                    value="<?php if($facebook_count==0)
                                                {
                                                    echo '';
                                                }
                                                else
                                                {
                                                    echo $db_furl;
                                                }
                                         ?>">
                            </div>
                            <div class="form-group">
                                    <label>Twitter URL </label>
                                    <input type="text" class="form-control" id="turl" placeholder="Enter twitter url" name="turl"
                                     value="<?php if($twitter_count==0)
                                                {
                                                    echo '';
                                                }
                                                else
                                                {
                                                    echo $db_turl;
                                                }
                                         ?>">
                            </div>
                            <div class="form-group">
                                    <label>LinkedIn URL </label>
                                    <input type="text" class="form-control" id="lurl" placeholder="Enter linkedin url" name="lurl" 
                                    value="<?php if($linkedin_count==0)
                                                {
                                                    echo '';
                                                }
                                                else
                                                {
                                                    echo $db_lurl;
                                                }
                                         ?>">
                            </div>
                           <div class="form-group">
                                    <label>Default image of notes (if seller do not upload) </label>
                                    <div class="picture-upload">
                                        <label for="display-input">
                                            <img src="img/all/upload-file.png">
                                        </label>
                                        <input  type="file" id="display-input" name="display_pic" >
                                        <span class="filename" style="position: absolute;left: 0;margin-left: 50px;"><?= ($display_count>0)?$db_display_pic:'' ?></span>
                                    </div>

                            </div>
                            <div class="form-group">
                                    <label>Default profile picture (if seller do not upload) </label>
                                    <div class="picture-upload">
                                        <label for="profile-input">
                                            <img src="img/all/upload-file.png">
                                        </label>
                                        <input id="profile-input" type="file" name="profile">
                                        <span class="filename" style="position: absolute;left: 0;margin-left: 50px;"><?= ($profile_count>0)?$db_pro_pic:'' ?></span>
                                    </div>
                                    
                            </div>
                                    
                        </div>
                    </div>
                        
                    <button type="submit" name="submit">SUBMIT</button>
                </form>
            </div>
           </div>
        </section>

        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        



        <!--jquery-->
        <script src="js/jquery.js"></script>

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <script src="js/script.js"></script>
        
    </body>
</html> 
















