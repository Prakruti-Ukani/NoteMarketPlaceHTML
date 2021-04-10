<?php
include "config.php";
session_start();

$uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
$tid=(isset($_GET['type_id']))?$_GET['type_id']:" ";
$get_type=mysqli_query($conn,"SELECT * FROM type WHERE id=$tid");
foreach($get_type as $type_row)
{
    $db_name=$type_row['name'];
    $db_desc=$type_row['description'];
}
if(isset($_POST['submit']))
{
    $type=$_POST['type_txt'];
    $desc=$_POST['desc'];
    $insert_type=mysqli_query($conn,"INSERT INTO type(name,description,created_date,created_by,modified_date,modified_by,isactive) VALUES('$type','$desc',NOW(),$uid,NOW(),$uid,1)");
    if(!$insert_type)
    {
        die(mysqli_error($conn));
    }
    
}
if(isset($_POST['update']))
{
    $type=$_POST['type_txt'];
    $desc=$_POST['desc'];
    $update_type=mysqli_query($conn,"UPDATE type SET name='$type',description='$desc',modified_by=$uid,modified_date=NOW() WHERE id=$tid");
    if(!$update_type)
    {
        die(mysqli_error($conn));
    }
    header("location:manage_type.php");
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
                                <h3>Add Type</h3>
                            </div>
                        </div>
                    </div>
                
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>Type*</label>
                                    <input type="text" class="form-control" id="type" placeholder="Enter Type" required name="type_txt" value="<?= (isset($_GET['type_id'])?$db_name:' '); ?>">
                            </div>
                            <div class="form-group">
                                    <label>Description *</label>
                                    <textarea class="form-control desc-text" id="desc" placeholder="Enter your description" required cols="0" name="desc"><?= (isset($_GET['type_id'])?$db_desc:' '); ?></textarea>
                            </div>
                        </div>
                    </div>
                        
                    <?php
                    if(isset($_GET['type_id']))
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
















