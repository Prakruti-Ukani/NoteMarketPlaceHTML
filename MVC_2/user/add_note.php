<?php include "config.php"; ?>
<?php session_start(); ?>
<?php
$preview_error=true;
$display_pic_error=true;
$note_error=true;
$preview_msg=" ";
$display_msg=" ";
$note_msg=" ";


if(isset($_GET['note_id']))
{
    if(isset($_POST['update']))
    {
        $email=$_SESSION['email'];
        $query="select * from user where email='$email'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $uid=$row['id'];
        }
        $get_id=$_GET['note_id'];
        $title=$_POST['title'];
        $category=$_POST['category'];
        $type=$_POST['type'];
        $pages=$_POST['pages'];
        $desc=$_POST['desc'];
        $university=$_POST['university'];
        $country=$_POST['country'];
        $course=$_POST['course'];
        $code=$_POST['code'];
        $professor=$_POST['professor'];
        $mode=$_POST['mode'];
        if(isset($_POST['price']))
        {
            $price=$_POST['price']; 
        }        
        else
        {
            $price=0;
        }

        $update_get_data=mysqli_query($conn,"UPDATE seller_note SET title='$title',catagory=$category,number_of_pages=$pages,description='$desc',university='$university',country=$country,course='$course',course_code='$code',professor='$professor',ispaid=$mode,note_type=$type,selling_price=$price WHERE id=$get_id;");
            
            if($update_get_data)
            {
                echo "success";
            }
            else
            {
                die(mysqli_error($conn));
            }

            $display_filearray = $_POST['display_url'];
            $display_pieces = explode("/", $display_filearray);
            $display_getfile=$display_pieces[5];
                
            $display_file=$_FILES['display_pic']['name'];
            if($display_file != $display_getfile)
            {
                $display_tmpfile = $_FILES['display_pic']['tmp_name'];
                $display_ext=pathinfo($display_file,PATHINFO_EXTENSION);
                if($display_ext=="jpg" || $display_ext=="jpeg" || $display_ext=="png")
                {           
                    $display_file="DP_".time().".".$display_ext;
                    if ( ! is_dir('../upload/member/')) {
                        mkdir('../upload/member');
                    } 

                    if ( ! is_dir('../upload/member/'.$uid)) {
                        mkdir('../upload/member/'.$uid);
                    }

                    if ( ! is_dir('../upload/member/'.$uid.'/'.$get_id)) {
                        mkdir('../upload/member/'.$uid.'/'.$get_id);
                    } 

                    $display_destination='../upload/member/'.$uid.'/'.$get_id.'/'.$display_file;
                    $hasdisplayuploaded=move_uploaded_file($display_tmpfile, $display_destination);
                    $display_affected=mysqli_query($conn,"UPDATE seller_note SET display_picture='$display_destination' WHERE id=$get_id;");
                    if($display_affected && $display_filearray!="../upload/member/default/default_display.png")
                    {
                        unlink('../upload/member/'.$uid.'/'.$get_id.'/'.$display_getfile);
                    }
                }
                else 
                {  
                    $display_pic_error=false;
                }
            }

            $preview_filearray = $_POST['preview_url'];
            $preview_pieces = explode("/", $preview_filearray);
            $preview_getfile=$preview_pieces[5];
                
            $preview_file=$_FILES['preview']['name'];
            if($preview_file != $preview_getfile)
            {
                $preview_tmpfile = $_FILES['preview']['tmp_name'];
                $preview_ext=pathinfo($preview_file,PATHINFO_EXTENSION);
                if($preview_ext=="pdf")
                {           
                    $preview_file="preview_".time().".".$preview_ext;
                    if ( ! is_dir('../upload/member/')) {
                        mkdir('../upload/member');
                    } 

                    if ( ! is_dir('../upload/member/'.$uid)) {
                        mkdir('../upload/member/'.$uid);
                    }

                    if ( ! is_dir('../upload/member/'.$uid.'/'.$get_id)) {
                        mkdir('../upload/member/'.$uid.'/'.$get_id);
                    } 

                    $preview_destination='../upload/member/'.$uid.'/'.$get_id.'/'.$preview_file;
                    $hasuploaded=move_uploaded_file($preview_tmpfile, $preview_destination);
                    $preview_affected=mysqli_query($conn,"UPDATE seller_note SET notes_preview='$preview_destination' WHERE id=$get_id;");
                    if($preview_affected && $preview_filearray!="../upload/member/default/default_preview.pdf")
                    {
                        unlink('../upload/member/'.$uid.'/'.$get_id.'/'.$preview_getfile);
                    }
                }
                else 
                {  
                    $preview_pic_error=false;
                }
            }
            
            if($note_error==false)
                {
                    $note_msg="choose file in pdf format";
                }
                if($display_pic_error==false)
                {
                    $display_msg="choose file in jpeg,jpg,png format";
                }
                if($preview_error==false)
                {
                    $preview_msg="choose file in jpeg,jpg,png format";
                }

            header("location:dashboard.php");
    }
            $get_id=$_GET['note_id'];
            $get_note_data=mysqli_query($conn,"SELECT * FROM seller_note WHERE id=$get_id");
            while($get_row=mysqli_fetch_assoc($get_note_data))
            {
                $db_title=$get_row['title'];
                $db_category=$get_row['catagory'];
                $db_display_pic=$get_row['display_picture'];
                $db_type=$get_row['note_type'];
                $db_nop=$get_row['number_of_pages'];
                $db_desc=$get_row['description'];
                $db_country=$get_row['country'];
                $db_institute=$get_row['university'];
                $db_course=$get_row['course'];
                $db_code=$get_row['course_code'];
                $db_professor=$get_row['professor'];
                $db_mode=$get_row['ispaid'];
                $db_price=$get_row['selling_price'];
                $db_preview=$get_row['notes_preview'];
                $db_id=$get_row['id'];
            }
}
else
{
    if(isset($_POST['save']))
    {
        $email=$_SESSION['email'];
        $query="select * from user where email='$email'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $uid=$row['id'];
        }
        $title=$_POST['title'];
        $category=$_POST['category'];
        $type=$_POST['type'];
        $pages=$_POST['pages'];
        $desc=$_POST['desc'];
        $university=$_POST['university'];
        $country=$_POST['country'];
        $course=$_POST['course'];
        $code=$_POST['code'];
        $professor=$_POST['professor'];
        $mode=$_POST['mode'];
        $price=$_POST['price'];



        $save_query="INSERT INTO seller_note(seller_id, status, title, catagory, display_picture, note_type, number_of_pages, description, university, country, course, course_code, professor, ispaid, selling_price, notes_preview, created_date, created_by, modified_date, modified_by, isactive) VALUES ($uid,6,'$title',$category,'../upload/member/default/default_display.png',$type,'$pages','$desc','$university',$country,'$course','$code','$professor',$mode,'$price','../upload/member/default/default_preview.pdf',now(),$uid,now(),$uid,1)";

            $data=mysqli_query($conn,$save_query);
   	        if(!$data)
            {
                die('query failed'.mysqli_error($conn));
            }
            $note_id=mysqli_insert_id($conn);
            $preview_file=$_FILES['preview']['name'];
            if($preview_file)
            {
                $preview_file=$_FILES['preview']['name'];
                $preview_tmpfile=$_FILES['preview']['tmp_name'];
                $preview_ext=pathinfo($preview_file,PATHINFO_EXTENSION);
                if($preview_ext=="pdf") 
                {
                    
                    $preview_file="preview_".time().".".$preview_ext;
                    if ( ! is_dir('../upload/member/')) {
                        mkdir('../upload/member');
                    } 

                    if ( ! is_dir('../upload/member/'.$uid)) {
                        mkdir('../upload/member/'.$uid);
                    }

                    if ( ! is_dir('../upload/member/'.$uid.'/'.$note_id)) {
                        mkdir('../upload/member/'.$uid.'/'.$note_id);
                    } 

                    $preview_destination='../upload/member/'.$uid.'/'.$note_id.'/'.$preview_file;
                    move_uploaded_file($preview_tmpfile, $preview_destination);
                    $preview_query=mysqli_query($conn,"UPDATE seller_note SET notes_preview='$preview_destination' WHERE id=$note_id");
                }
                else
                {
                    $preview_error=false;
                }
            }
            $display_file = $_FILES['display_pic']['name'];
                
            if($display_file)
            {
                $display_tmpfile = $_FILES['display_pic']['tmp_name'];
                $display_ext=pathinfo($display_file,PATHINFO_EXTENSION);
                if($display_ext=="jpg" || $display_ext=="jpeg" || $display_ext=="png")
                {           

                    $display_file="DP_".time().".".$display_ext;
                    if ( ! is_dir('../upload/member/')) {
                        mkdir('../upload/member');
                    } 

                    if ( ! is_dir('../upload/member/'.$uid)) {
                        mkdir('../upload/member/'.$uid);
                    }

                    if ( ! is_dir('../upload/member/'.$uid.'/'.$note_id)) {
                        mkdir('../upload/member/'.$uid.'/'.$note_id);
                    } 

                    $display_destination='../upload/member/'.$uid.'/'.$note_id.'/'.$display_file;
                    move_uploaded_file($display_tmpfile, $display_destination);
                    $preview_query=mysqli_query($conn,"UPDATE seller_note SET display_picture='$display_destination' WHERE id=$note_id");
                }
                else 
                {
                    $display_pic_error=false;
                }
            }
            
             $countfiles = count($_FILES['note']['name']);
             for($i=0;$i<$countfiles;$i++)
                {
                    $note_file = $_FILES['note']['name'][$i];
                    $note_ext=pathinfo($note_file,PATHINFO_EXTENSION);
                    if($note_ext=='pdf')
                    {
                        $query=mysqli_query($conn,"INSERT INTO seller_note_attachments(note_id, created_date, created_by, modified_date, modified_by, isactive) VALUES ($note_id,now(),$uid,now(),$uid,1)");

                        $attach_id=mysqli_insert_id($conn);
                        
                        if ( ! is_dir('../upload/member/'))
                        {
                            mkdir('../upload/member');
                        } 

                        if ( ! is_dir('../upload/member/'.$uid)) 
                        {
                            mkdir('../upload/member/'.$uid);
                        }

                        if ( ! is_dir('../upload/member/'.$uid.'/'.$note_id)) 
                        {
                            mkdir('../upload/member/'.$uid.'/'.$note_id);
                        } 

                        if ( ! is_dir('../upload/member/'.$uid.'/'.$note_id.'/attachments')) 
                        {
                            mkdir('../upload/member/'.$uid.'/'.$note_id.'/attachments');
                        } 
                        $note_file=$attach_id."_".time().".".$note_ext;
                        $note_destination='../upload/member/'.$uid.'/'.$note_id.'/attachments/'.$note_file;

                        move_uploaded_file($_FILES['note']['tmp_name'][$i],$note_destination);
                        $attachment_result=mysqli_query($conn,"UPDATE seller_note_attachments SET file_path='$note_destination',file_name='$note_file' where id=$attach_id");
                        
                    }
                    else
                    {
                        $note_error=false;
                    }
                }
                
                if($note_error==false)
                {
                    $note_msg="choose file in pdf format";
                }
                if($display_pic_error==false)
                {
                    $display_msg="choose file in jpeg,jpg,png format";
                }
                if($preview_error==false)
                {
                    $preview_msg="choose file in jpeg,jpg,png format";
                }
                header("location:dashboard.php");

    }
} 



require 'PHPMailer/includes/PHPMailer.php';
require 'PHPMailer/includes/SMTP.php';
require 'PHPMailer/includes/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['publish']))
{
    $get_id=$_GET['note_id'];
    $category=$_POST['category'];
    $session_email=$_SESSION['email'];
    $title=$_POST['title'];

    $update_get_data=mysqli_query($conn,"UPDATE seller_note SET published_date=NOW(),status=9 WHERE id=$get_id;");
    if(!$update_get_data)
    {
        die(mysqli_error($conn));
    }
    
    $get_user_data=mysqli_query($conn,"SELECT * FROM user WHERE email='$session_email'");
    foreach ($get_user_data as $user_row)
    {
        $first_name=$user_row['first_name'];    
    }

    $mail = new PHPMailer(true);
    try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
         
            $config_email = "prakrutiukani@gmail.com";
            $mail->Username = $config_email; 
            $mail->Password = "Prakruti@ukani1999";  

            $mail->setFrom($session_email, $first_name);  
         
            $mail->addAddress('prakrutiukani@gmail.com', 'NoteMarketPlace');  
            $mail->addReplyTo($session_email, $first_name);  
         
            $mail->IsHTML(true);  

            $mail->Subject =$first_name.' sent his note for review';  

            $mail->Body = "Hello Admin,<br><br>We want to inform you that, ".$session_email ." sent his note ".$title." for review. Please look at the notes and take required actions.<br><br>Regards,<br>NoteMarketPlace";   //Email body
              
         
            $mail->send();
           
        } 
        catch (Exception $e) {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }


    header("location:dashboard.php");
}
?>


<?php if(isset($_SESSION['login']))
{ ?>
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
        <?php include "header.php"; ?>    
        <!--navbar end-->
        <section id="top-title">
            
                <div class="container"> 
                    <div class="row">
                        <div class="col-md-12">
                            <div id="title-text" class="text-center">
                                <h3>Add Notes</h3>
                            </div>
                        </div>
                    </div>
                </div>
            
        </section>
        <section id="details-fields">
            <div class ="container">
            
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Basic note Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>Title*</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter your notes title"  name="title" value="<?= ((isset($_GET['note_id']))?$db_title:'')?>" required>
                            </div>
                            <div class="form-group">
                                    <label>Display Picture</label>
                                    <div class="picture-upload">
                                        <label for="display-input">
                                            <img src="img/profile/upload.png">
                                        </label>
                                        <input  type="file" id="display-input" name="display_pic" >
                                        <input type="hidden" name="display_url" value="<?php echo $db_display_pic ?>">
                                        <span class="filename" style="position: absolute;left: 0;margin-left: 50px;"><?= (isset($_GET['note_id']))?$db_display_pic:'' ?></span>
                                    </div>

                                    <span style="color: red;"><?php echo $display_msg; ?></span>
                            </div>
                            <div class="form-group">
                                    <label>Type*</label>
                                    <select id="type" class="form-control arrow-down" name="type">
                                            <option disabled selected>Select Your Type</option>
                                            <?php
                                                $result=mysqli_query($conn,"SELECT * FROM type");
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    $typename=$row['name'];
                                                    $typeid=$row['id']; 
                                                    if(isset($_GET['note_id'])){ ?>
                                                        <option value="<?php echo $typeid ?>" <?php if( $typeid == $db_type): ?> selected="selected"<?php endif; ?>><?php echo $typename ?></option>;
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $typeid ?>" ><?php echo $typename ?></option>;
                                                <?php } }
                                            ?>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Catagory*</label>
                                    <select id="catagory" class="form-control arrow-down" name="category">
                                            <option disabled selected>Select Your category</option>
                                                <?php
                                                $result=mysqli_query($conn,"SELECT * FROM category");
                                                    while($row=mysqli_fetch_assoc($result))
                                                    {
                                                        $catname=$row['name'];
                                                        $catid=$row['id'];
                                                        if(isset($_GET['note_id'])){ ?>
                                                            <option value="<?php echo $catid?>" <?php if( $catid == $db_category): ?> selected="selected"<?php endif; ?>><?php echo $catname ?></option>;
                                                        <?php }else{ ?>
                                                            <option value="<?php echo $catid?>"><?php echo $catname ?></option>;
                                                <?php } } ?>
                                    </select>
                                    
                            </div>
                            <div class="form-group">
                                    <label>Upload Notes*</label>
                                    <div class="picture-upload">
                                        <label for="note-input">
                                            <img src="img/profile/upload.png">
                                        </label>
                                        <input  id="note-input" type="file" name="note[]" multiple <?= ((isset($_GET['note_id']))?'':'required')?>>
                                        <span class="filename" style="position: absolute;left: 0;margin-left: 50px;"></span>
                                        
                                    </div>
                                    <span style="color: red;"><?php echo $note_msg; ?></span>
                            </div>
                            <div class="form-group">
                                    <label>Number of Pages</label>
                                    <input type="text" class="form-control" id="dob" placeholder="Enter number of note page"  name="pages" value="<?= ((isset($_GET['note_id']))?$db_nop:'')?>">
                            </div>
                       
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                    <label>Description*</label>
                                    <textarea class="form-control" id="ln" placeholder="Enter your description"  cols="0" name="desc" required ><?= ((isset($_GET['note_id']))?$db_desc:'')?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Institution Information</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                    <label>Country*</label>
                                    <select id="country" class="form-control arrow-down" name="country">
                                            <option disabled selected>Select Your country</option>
                                            <?php
                                                $result=mysqli_query($conn,"SELECT * FROM country");
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                $counname=$row['name'];
                                                $counid=$row['id'];
                                                if(isset($_GET['note_id'])) {?>
                                                    <option value="<?php echo $counid ?>"<?php if( $counid == $db_country): ?> selected="selected"<?php endif; ?>><?php echo $counname ?></option>;
                                                <?php }else{ ?>
                                                    <option value="<?php echo $counid ?>"><?php echo $counname ?></option>;
                                                <?php } }
                                                ?>
                                    </select>
                                   
                            </div>
                        
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Institute Name</label>
                                    <input type="text" class="form-control" id="institute" placeholder="Enter your institute name"  name="university" value="<?= ((isset($_GET['note_id']))?$db_institute:'')?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Course Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Course name</label>
                                    <input type="text" class="form-control" id="course-name" placeholder="Enter your course name"  name="course" value="<?= ((isset($_GET['note_id']))?$db_course:'')?>">
                            </div>
                            <div class="form-group">
                                    <label>Professor / Lecturer</label>
                                    <input type="text" class="form-control" id="course-name" placeholder="Enter your course name"  name="professor" value="<?= ((isset($_GET['note_id']))?$db_professor:'')?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>course code</label>
                                    <input type="text" class="form-control" id="course-code" placeholder="Enter your course code"  name="code" value="<?= ((isset($_GET['note_id']))?$db_code:'')?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Selling Information</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Sell For*</label><br>

                                    <label for="free">
                                        <input class="form-radio" type="radio" id="free" name="mode" style="height:20px; width:20px;" value="5"  <?=  (isset($_GET['note_id'])?(($db_mode==5)?"checked":' ') : ' ')?>>
                                        <span class="sell-label">Free</span>
                                    </label>
                                    <label for="paid">
                                    <input class="form-radio" type="radio" id="paid" name="mode" style="height:20px; width:20px;" value="4" <?=  (isset($_GET['note_id'])?(($db_mode==4)?"checked":' ') : ' ')?>><span class="sell-label">Paid</span>
                                    </label>
                                    
                            </div>
                            <div class="form-group">
                                    <label>Sell Price</label>
                                    <input type="number" type=".001" class="form-control" id="price" placeholder="Enter your price"  name="price" value="<?= ((isset($_GET['note_id']))?$db_price:'')?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Notes Preview</label>
                                    <div class="picture-upload">
                                        <label for="preview-input">
                                            <img src="img/profile/upload.png">
                                        </label>
                                        <input id="preview-input" type="file" name="preview" >
                                        <input type="hidden" name="preview_url" value="<?php echo $db_preview; ?>">
                                        <span class="filename" style="position: absolute;left: 0;margin-left: 50px;"><?= (isset($_GET['note_id']))?$db_preview:'' ?></span>
                                    </div>
                                    <span style="color: red;"><?php echo $preview_msg; ?></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="note_id" value="<?php echo $db_id ?>">
                    <?php if(isset($_GET['note_id']))
                    {?>
                        <button type="submit" name="update">Update</button>
                        <button name="publish">PUBLISH</button> 
                    <?php }else{ ?>
                        <button type="submit" name="save">SUBMIT</button>
                        <button name="publish" disabled="disabled">PUBLISH</button> 
                    <?php } ?>
                </form>
                
            </div>
        </section>

        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        
        <!--jquery-->
        <script src="js/jquery.js"></script>

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!--custom jquery-->
        <script src="js/script.js"></script>
        <script type="text/javascript">
            $(function () {
                $("input[name='mode']").click(function () {
                    if ($("#paid").is(":checked")) {
                        $("#price").removeAttr("disabled");
                        $("#price").focus();
                    } else {
                        $("#price").attr("value","0");
                        $("#price").attr("disabled", "disabled");
                    }

                });
            });
        </script>    
        
    </body>
</html> 
<?php }else{
    header("location:login.php");
} ?>
