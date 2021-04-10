<?php
include "config.php";
session_start();

$uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
$cid=(isset($_GET['cat_id']))?$_GET['cat_id']:" ";
$get_category=mysqli_query($conn,"SELECT * FROM category WHERE id=$cid");
foreach($get_category as $cat_row)
{
    $db_name=$cat_row['name'];
    $db_desc=$cat_row['description'];
}
if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    $desc=$_POST['desc'];
    $insert_category=mysqli_query($conn,"INSERT INTO category(name,description,created_date,created_by,modified_date,modified_by,isactive) VALUES('$category','$desc',NOW(),$uid,NOW(),$uid,1)");
    if(!$insert_category)
    {
        die(mysqli_error($conn));
    }
}
if(isset($_POST['update']))
{
    $category=$_POST['category'];
    $desc=$_POST['desc'];
    $update_category=mysqli_query($conn,"UPDATE category SET name='$category',description='$desc',modified_by=$uid,modified_date=NOW() WHERE id=$cid");
    if(!$update_category)
    {
        die(mysqli_error($conn));
    }
    header("location:manage_catagory.php");
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
                                <h3>Add Catagory</h3>
                            </div>
                        </div>
                    </div>
                
                <form action=" " method="post">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>Catagory Name *</label>
                                    <input type="text" class="form-control" id="cat_name" placeholder="Catagory name" required name="category" value="<?= (isset($_GET['cat_id'])?$db_name:' '); ?>">
                            </div>
                            <div class="form-group">
                                    <label>Description *</label>
                                    <textarea class="form-control desc-text" id="ln" placeholder="Enter your description" required cols="0" name="desc" ><?= (isset($_GET['cat_id'])?$db_desc:' '); ?></textarea>
                            </div>
                        </div>
                    </div>
                        
                    <?php
                    if(isset($_GET['cat_id']))
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
















