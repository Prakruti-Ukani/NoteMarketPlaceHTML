<?php 
include "config.php";
session_start();

$profile_msg="";

if(isset($_SESSION['login']))
{
    $email=$_SESSION['email'];
    $uid=$_SESSION['userid'];
    $user_data=mysqli_query($conn,"SELECT * FROM user WHERE email='$email'");
    while ($row=mysqli_fetch_assoc($user_data))
    {
        $fn=$row['first_name'];
        $ln=$row['last_name'];
    }
}

$fetch_userdata=mysqli_query($conn,"SELECT * FROM user_profile where user_id=$uid");
$count=mysqli_num_rows($fetch_userdata);

    if($count>0)
    {
        if(isset($_POST['update']))
        {
            $fn=$_POST['fn'];
            $ln=$_POST['ln'];
            $dob=$_POST['dob'];
            $gender=$_POST['gender'];
            $code=$_POST['code'];
            $phone=$_POST['phone'];
            $add1=$_POST['add1'];
            $add2=$_POST['add2'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $zipcode=$_POST['zipcode'];
            $country=$_POST['country'];
            $university=$_POST['university'];
            $college=$_POST['college'];

            $update_user=mysqli_query($conn,"UPDATE user SET first_name='$fn',last_name='$ln' WHERE id=$uid");

            $update_profile=mysqli_query($conn,"UPDATE user_profile SET dob='$dob',gender=$gender,country_code=$code,phone_no=$phone,address_line_1='$add1',address_line_2='$add2',city='$city',state='$state',zip_code=$zipcode,country=$country,university='$university',college='$college',modified_date=NOW() WHERE user_id=$uid");

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

        }
    }
    else if(isset($_POST['submit']))
    {
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $code=$_POST['code'];
        $phone=$_POST['phone'];
        $add1=$_POST['add1'];
        $add2=$_POST['add2'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $zipcode=$_POST['zipcode'];
        $country=$_POST['country'];
        $university=$_POST['university'];
        $college=$_POST['college'];

            $insert_query="INSERT INTO user_profile(user_id, dob, gender, country_code, phone_no,profile_picture, address_line_1, address_line_2, city, state, zip_code, country, university, college, created_date, created_by, modified_date, modified_by) VALUES ($uid,'$dob',$gender,$code,$phone,'../upload/member/default/default-user.png','$add1','$add2','$city','$state','$zipcode','$country','$university','$college',NOW(),$uid,NOW(),$uid)";
            $insert_result=mysqli_query($conn,$insert_query);
            if($insert_result)
            {
                header("location:profile.php");
            }
            else
            {
                echo $insert_query;
                die(mysqli_error($conn));
            }

                $profile_file=$_FILES['profile']['name'];
                if($profile_file)
                {
                    $profile_tmpfile=$_FILES['profile']['tmp_name'];
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
                        move_uploaded_file($profile_tmpfile, $profile_destination);

                        $profile_result=mysqli_query($conn,"UPDATE user_profile SET profile_picture='$profile_destination'  where user_id=$uid");
                    }
                    else
                    {
                        $profile_error=false;
                    }
                }    
    }

$get_profile_data=mysqli_query($conn,"SELECT * FROM user_profile WHERE user_id=$uid");
while($get_row=mysqli_fetch_assoc($get_profile_data)) 
{
    $db_add=$get_row['address_line_1']; 
    $db_city=$get_row['city'];
    $db_zipcode=$get_row['zip_code']; 
    $db_add2=$get_row['address_line_2'];
    $db_state=$get_row['state'];
    $db_university=$get_row['university'];
    $db_college=$get_row['college'];
    $db_phone=$get_row['phone_no'];
    $db_dob=$get_row['dob'];
    $db_country=$get_row['country'];
    $db_code=$get_row['country_code'];
    $db_gender=$get_row['gender'];
    $db_profile=$get_row['profile_picture'];

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
        <?php include "header.php" ?>
        <!--navbar end-->
        <section id="top-title">
                <div class="container"> 
                    <div class="row">
                        <div class="col-md-12">
                            <div id="title-text" class="text-center">
                                <h3>User Profile</h3>
                            </div>
                        </div>
                    </div>
                </div>
            
        </section>
        <section id="details">
            <div class ="container">
                
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Basic Profile Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>First Name *</label>
                                    <?php if(isset($_SESSION['login']))
                                    { ?>
                                        <input type="text" class="form-control" id="fn" placeholder="Enter your First name" value="<?php echo $fn ?>" name="fn">
                                    <?php } ?>
                            </div>
                            <div class="form-group">
                                    <label>Email *</label>
                                    <?php if(isset($_SESSION['login']))
                                    { ?>
                                        <input type="email" class="form-control" id="email" placeholder="Enter your email address" value="<?php echo $email ?>" disabled>
                                    <?php } ?>
                            </div>
                            <div class="form-group">
                                    <label>Gender</label>
                                    <select id="gender" class="form-control filter arrow-down" name="gender">
                                            <option selected disabled>Select Your Gender</option>
                                            <?php
                                                    $result=mysqli_query($conn,"SELECT * FROM reference_data WHERE id BETWEEN 1 AND 3 AND isactive=1");
                                                    while($row=mysqli_fetch_assoc($result))
                                                    {
                                                        $value=$row['value'];
                                                        $refid=$row['id']; 
                                                        if($count>0){ ?>
                                                            <option value='<?php echo $refid ?>' <?php if( $refid == $db_gender): ?> selected="selected"<?php endif; ?>><?php echo "$value" ?></option>
                                                        <?php }else{ ?>
                                                            <option value='<?php echo $refid ?>'><?php echo "$value" ?></option>

                                                    <?php } } 
                                            ?>
                                    </select>
                            </div>
                            <div class="form-group ">
                                    <label>Profile Picture</label>
                                    <div class="picture-upload">
                                        <label for="file-input">
                                            <img src="img/profile/upload.png">
                                        </label>
                                        <input id="file-input" type="file" name="profile">
                                        <input type="hidden" name="profile_url" value="<?php echo $db_profile ?>">
                                        <span class="filename" style="position: absolute;left: 0;margin-left: 50px;"><?= ($count>0)?$db_profile:'' ?></span>
                                    </div>
                                    <span style="color: red;"><?php echo $profile_msg; ?></span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Last Name *</label>
                                    <?php if(isset($_SESSION['login']))
                                    { ?>
                                        <input type="text" class="form-control" id="ln" placeholder="Enter your Last name" value="<?php echo $ln ?>" name="ln">
                                    <?php } ?>
                            </div>
                            <div class="form-group">
                                    <label>Date of Birth</label>
                                    <?php if($count>0){?>
                                            <input type="date" class="form-control" id="dob" name="dob" value=<?php echo $db_dob ?>>
                                    <?php }else{ ?>
                                            <input type="date" class="form-control" id="dob" name="dob" >
                                    <?php } ?>
                                    
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
                                                                <option value='<?php echo $codeid ?>' <?php if( $codeid == $db_code): ?> selected="selected"<?php endif; ?>><?php echo "+$code" ?></option>
                                                            <?php }else{ ?>
                                                                <option value='<?php echo $codeid ?>' ><?php echo "+$code" ?></option>
                                                        <?php }
                                                     } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="phone" placeholder="Enter your Phone number" required name="phone" value="<?= (($count>0)?$db_phone:'')?>">
                                        </div>
                                    </div>
                            </div> 

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Address Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Address line 1 *</label>
                                    <input type="text" class="form-control" id="add1" placeholder="Enter your address" required name="add1" value="<?= (($count>0)?$db_add:'')?>">
                            </div>
                            <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter your city" required name="city" value="<?= (($count>0)?$db_city:'')?>">
                            </div>
                            <div class="form-group">
                                    <label>Zipcode</label>
                                    <input type="text" class="form-control" id="zipcode" placeholder="Enter your zipcode"  name="zipcode" value="<?= (($count>0)?$db_zipcode:'')?>">
                            </div>
                            

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Address line 2 </label>
                                    <input type="text" class="form-control" id="add2" placeholder="Enter your address"  name="add2" value="<?= (($count>0)?$db_add2:'')?>">
                            </div>
                            <div class="form-group">
                                    <label>State *</label>
                                    <input type="text" class="form-control" id="state" placeholder="Enter your state" required name="state" value="<?= (($count>0)?$db_state:'')?>">
                            </div>
                            <div class="form-group">
                                    <label>Country *</label>
                                    <select id="country" class="form-control arrow-down" name="country">
                                            <option disabled selected>Select Your country</option>
                                            <?php
                                                $result=mysqli_query($conn,"SELECT * FROM country WHERE isactive=1");
                                                    while($row=mysqli_fetch_assoc($result))
                                                    {
                                                        $coun_name=$row['name'];
                                                        $counid=$row['id']; 
                                                        if($count>0){ ?>
                                                            <option value='<?php echo $counid ?>' <?php if( $counid == $db_country): ?> selected="selected"<?php endif; ?>><?php echo "$coun_name" ?></option>
                                                        <?php }else{ ?>
                                                            <option value='<?php echo $counid ?>' ><?php echo "$coun_name" ?></option>
                                                        <?php  }
                                                     } ?>
                                    </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>University and College Information</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>University</label>
                                    <input type="text" class="form-control" id="university" placeholder="Enter your university" required name="university" value="<?= (($count>0)?$db_university:'')?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>College</label>
                                    <input type="text" class="form-control" id="college" placeholder="Enter your college" required name="college" value="<?= (($count>0)?$db_college:'')?>">
                            </div>
                        </div>
                    </div>
                    <?php
                    if($count>0)
                    { ?>
                        <button type="submit" name="update">UPDATE</button>
                    <?php }else{ ?>
                        <button type="submit" name="submit">SUBMIT</button>
                    <?php } ?>
                </form>
           
            </div>
        </section>

        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        



        <!--jquery-->
        <script src="js/jquery.js"></script>

        <!--popper js-->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <script src="js/script.js"></script>
        
    </body>
</html> 
















