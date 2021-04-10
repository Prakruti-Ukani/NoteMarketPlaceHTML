<?php
include "config.php";
session_start();

$uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
$admin_id=(isset($_GET['admin_id']))?$_GET['admin_id']:" ";

$get_data=mysqli_query($conn,"SELECT u.first_name,u.last_name,u.email,up.country_code,up.phone_no FROM user u LEFT JOIN user_profile up ON u.id=up.user_id WHERE u.id=$admin_id");
foreach ($get_data as $get_row) 
{
    $db_fn=$get_row['first_name'];
    $db_ln=$get_row['last_name'];
    $db_email=$get_row['email'];
    $db_code=$get_row['country_code'];
    $db_phone=$get_row['phone_no'];
}

if(isset($_POST['submit']))
{
    $fn=$_POST['fn'];
    $ln=$_POST['ln'];
    $email=$_POST['email'];
    $password='admin@123';
    $code=$_POST['code'];
    $phone=$_POST['phone'];

    $insert_user=mysqli_query($conn,"INSERT INTO user(role_id,first_name,last_name,email,password,created_date,created_by,modified_date,modified_by,isactive) VALUES(2,'$fn','$ln','$email','$password',NOW(),$uid,NOW(),$uid,1)");
    if(!$insert_user)
    {
        die(mysqli_error($conn));
    }
    $current_uid=mysqli_insert_id($conn);
    
    $insert_profile=mysqli_query($conn,"INSERT INTO user_profile(user_id,country_code,phone_no,profile_picture) VALUES($current_uid,$code,'$phone','../upload/member/default/default-user.png')");

    
}
if(isset($_POST['update']))
{
    $fn=$_POST['fn'];
    $ln=$_POST['ln'];
    $email=$_POST['email'];
    $code=$_POST['code'];
    $phone=$_POST['phone'];

    $update_user=mysqli_query($conn,"UPDATE user SET first_name='$fn',last_name='$ln',email='$email' WHERE id=$admin_id");

    $update_profile=mysqli_query($conn,"UPDATE user_profile SET country_code=$code,phone_no='$phone' WHERE user_id=$admin_id");
        
    header("location:manage_admin.php");
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
                                <h3>Add Administrator</h3>
                            </div>
                        </div>
                    </div>
                
                <form action=" " method="post">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" class="form-control" id="fn" placeholder="Enter your first name" required name="fn" value="<?= (isset($_GET['admin_id'])?$db_fn:''); ?>">
                            </div>
                            <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="text" class="form-control" id="ln" placeholder="Enter your last name" required name="ln" value="<?= (isset($_GET['admin_id'])?$db_ln:''); ?>">
                            </div>
                            <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your EmailId" required name="email" value="<?= (isset($_GET['admin_id'])?$db_email:''); ?>">
                            </div>
                            <div class="form-group">
                                    <label>Phone Number</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            
                                            <select name="code" id="phone" class="form-control filter arrow-down">
                                                 <?php
                                                    $result=mysqli_query($conn,"SELECT * FROM country WHERE isactive=1");
                                                    while($row=mysqli_fetch_assoc($result))
                                                        {
                                                            $code=$row['country_code'];
                                                            $codeid=$row['id']; 
                                                            if($db_code==$codeid){
                                                            ?>
                                                                <option value="<?php echo $codeid ?>" selected="selected"><?php echo "+".$code ?></option>;
                                                            <?php }else{ ?>
                                                                <option value="<?php echo $codeid ?>" ><?php echo "+".$code ?></option>;

                                                    <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="phone" placeholder="Enter your Phone number" name="phone" value="<?= (isset($_GET['admin_id'])?$db_phone:''); ?>">
                                        </div>
                                    </div>
                            </div> 
                              
                        </div>
                    </div>

                    <?php if(isset($_GET['admin_id']))
                    { ?>
                        <button type="submit" name="update">SUBMIT</button>
                    <?php }else{ ?>
                            <button type="submit" name="submit">SUBMIT</button>
                    <?php } ?>
                </form>
            </div>
           </div>
        </section>
        
        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        
        <!--jquery-->
        <script src="js/jquery.min.js"></script>

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        
    </body>
</html> 
















