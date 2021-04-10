<?php
include "config.php";
session_start();

$profile_msg=" ";

$uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
if(isset($_SESSION['login']))
{
    $user_data=mysqli_query($conn,"SELECT * FROM user WHERE id='$uid'");
    while ($row=mysqli_fetch_assoc($user_data))
    {
        $db_fn=$row['first_name'];
        $db_ln=$row['last_name'];
    }
}
$fetch_user_profile=mysqli_query($conn,"SELECT * FROM user_profile WHERE user_id=$uid");
foreach ($fetch_user_profile as $get_row) {
        $db_phone=$get_row['phone_no'];
        $db_sec_email=$get_row['secondary_email'];
        $db_pro_pic=$get_row['profile_picture'];
        $db_code=$get_row['country_code'];
    }
$count=mysqli_num_rows($fetch_user_profile);
if($count>0)
{
    
    if(isset($_POST['update']))
    {
        $coun_code=$_POST['code'];
        $phone=$_POST['phone'];
        $sec_email=$_POST['sec_email'];
        $fn=$_POST['fn'];
        $ln=$_POST['ln'];
        $update_user=mysqli_query($conn,"UPDATE user SET first_name='$fn',last_name='$ln' WHERE id=$uid");
        if(!$update_user)
        {
            diq(mysqli_error($conn));
        }
        $update_query=mysqli_query($conn,"UPDATE user_profile SET country_code=$coun_code,phone_no='$phone',secondary_email='$sec_email' WHERE user_id=$uid");

        if(!$update_query)
        {
            die(mysqli_error($conn));
        }
            $profile_filearray = $_POST['profile_url'];
            $profile_pieces = explode("/", $profile_filearray);
            $profile_getfile=$profile_pieces[4];
                
            $profile_file=$_FILES['profile']['name'];
            if($profile_file != $profile_getfile)
            {
                $profile_tmpfile = $_FILES['profile']['tmp_name'];
                $profile_ext=pathinfo($profile_file,PATHINFO_EXTENSION);
                if($profile_ext=="jpg" || $profile_ext=="jpeg" || $profile_ext=="png")
                {           
                    $profile_file="DP_".time().".".$profile_ext;
                    if ( ! is_dir('../upload/member/')) {
                        mkdir('../upload/member');
                    } 

                    if ( ! is_dir('../upload/member/'.$uid)) {
                        mkdir('../upload/member/'.$uid);
                    }

                    $profile_destination='../upload/member/'.$uid.'/'.$profile_file;
                    $hasprofileuploaded=move_uploaded_file($profile_tmpfile, $profile_destination);
                    $profile_affected=mysqli_query($conn,"UPDATE user_profile SET profile_picture='$profile_destination' WHERE user_id=$uid;");
                    if($profile_affected && $profile_filearray!="../upload/member/default/default-user.png")
                    {
                        unlink('../upload/member/'.$uid.'/'.$profile_getfile);
                    }
                }
                else 
                {  
                    $profile_pic_error=false;
                }
            }
            header("location:update_profile.php");
    }
}


if(isset($_SESSION['login']))
{

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
                                <h3>My Profile</h3>
                            </div>
                        </div>
                    </div>
                
                <form action=" " method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" name="fn" class="form-control" id="fn" placeholder="Enter your first name"  value="<?= (($count>0)?$db_fn:$_SESSION['first_name']); ?>">
                            </div>
                            <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="text" name="ln" class="form-control" id="ln" placeholder="Enter your last name" value="<?= (($count>0)?$db_ln:$_SESSION['last_name']); ?>">
                            </div>
                            <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your EmailId" disabled value="<?php echo $_SESSION['email']; ?>">
                            </div>
                            <div class="form-group">
                                    <label>Secondary Email </label>
                                    <input type="email" name="sec_email" class="form-control" id="semail" placeholder="Enter your EmailId" value="<?= ($count>0)?$db_sec_email:" "; ?>">
                            </div>
                            <div class="form-group">
                                    <label>Phone Number</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            
                                         <select id="phone" class="form-control filter arrow-down" name="code">
                                            <?php
                                            $result=mysqli_query($conn,"SELECT * FROM country WHERE isactive=1");
                                            while($row=mysqli_fetch_assoc($result))
                                                {
                                                    $code=$row['country_code'];
                                                    $codeid=$row['id']; 
                                                    if($count>0){ ?>
                                                        <option value="<?php echo $codeid ?>" <?php if( $codeid == $db_code): ?> selected="selected"<?php endif; ?>><?php echo "+".$code ?></option>;
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $codeid ?>" ><?php echo "+".$code ?></option>;
                                                <?php } }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="phone" placeholder="Enter your Phone number" name="phone" value="<?= (($count>0)?$db_phone:"");  ?>">
                                        </div>
                                    </div>
                            </div> 
                            <div class="form-group">
                                    <label>Profile Picture</label>
                                    <div class="picture-upload">
                                        <label for="file-input">
                                            <img src="img/all/upload-file.png">
                                        </label>
                                        <input id="file-input" type="file" name="profile">
                                        <input type="hidden" name="profile_url" value="<?php echo $db_pro_pic; ?>">
                                        <span class="filename" style="position: absolute;left: 0;margin-left: 50px;"><?= ($count>0)?$db_pro_pic:'' ?></span>
                                    </div>
                                    <span style="color: red;"><?php echo $profile_msg; ?></span>
                            </div>
                            
                                    
                        </div>
                    </div>
                        
                    <?php
                    if($count>0)
                    {
                        echo '<button type="submit" name="update">UPDATE</button>';
                    }
                    ?>
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
<?php }else{
    header("location:login.php");               
}?>















