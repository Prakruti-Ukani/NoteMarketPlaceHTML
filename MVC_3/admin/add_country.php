<?php
include "config.php";
session_start();
$uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
$cid=(isset($_GET['coun_id']))?$_GET['coun_id']:" ";
$get_country=mysqli_query($conn,"SELECT * FROM country WHERE id=$cid");
foreach($get_country as $country_row)
{
    $db_name=$country_row['name'];
    $db_code=$country_row['country_code'];
}
if(isset($_POST['submit']))
{
    $country_name=$_POST['country_name'];
    $coun_code=$_POST['coun_code'];
    $insert_country=mysqli_query($conn,"INSERT INTO country(name,country_code,created_date,created_by,modified_date,modified_by,isactive) VALUES('$country_name',$coun_code,NOW(),$uid,NOW(),$uid,1)");
}
if(isset($_POST['update']))
{
    $country_name=$_POST['country_name'];
    $coun_code=$_POST['coun_code'];
    $update_country=mysqli_query($conn,"UPDATE country SET name='$country_name',country_code=$coun_code,modified_by=$uid,modified_date=NOW() WHERE id=$cid");
    if(!$update_country)
    {
        die(mysqli_error($conn));
    }
    header("location:manage_country.php");
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
                                <h3>Add Country</h3>
                            </div>
                        </div>
                    </div>
                
                <form action=" " method="post">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>Country Name *</label>
                                    <input type="text" class="form-control" id="coun_name" placeholder="Country name" required name="country_name" value="<?= (isset($_GET['coun_id'])?$db_name:''); ?>">
                            </div>
                            <div class="form-group">
                                    <label>Country Code *</label>
                                    <input type="text" class="form-control" id="coun_code" placeholder="Country code" required name="coun_code" value="<?= (isset($_GET['coun_id'])?$db_code:''); ?>">
                            </div>
                        </div>
                    </div>
                        
                    <?php
                    if(isset($_GET['coun_id']))
                    {
                        echo '<button type="submit" name="update">SUBMIT</button>';
                    }
                    else
                    {
                        echo '<button type="submit" name="submit">SUBMIT</button>';
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
        
    </body>
</html> 
















