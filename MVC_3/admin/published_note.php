<?php
include "config.php";
session_start();

require 'PHPMailer/includes/PHPMailer.php';
require 'PHPMailer/includes/SMTP.php';
require 'PHPMailer/includes/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$admin_id=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
$user_id=(isset($_GET['uid']))?$_GET['uid']: " ";

if(isset($_POST['unpublish-yes']))
{
    $get_note_id=$_POST['get_note_id'];
    $remarks=$_POST['remarks'];
    
    $unpublish_query=mysqli_query($conn,"UPDATE seller_note SET status=11,action_by=$admin_id,remarks='$remarks' WHERE id=$get_note_id");

    $get_user_data=mysqli_query($conn,"SELECT sn.title,sn.remarks,u.email,u.first_name,u.last_name FROM seller_note sn LEFT JOIN user u ON u.id=sn.seller_id WHERE sn.id=$get_note_id");
    foreach ($get_user_data as $row) 
    {
        $get_email=$row['email'];
        $remarks=$row['remarks'];
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $title=$row['title'];  
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
     
        $mail->setFrom($config_email, 'NoteMarketPlace');  
        
        $mail->addAddress($get_email);  
        $mail->addReplyTo($config_email);   

        $mail->IsHTML(true); 
        $mail->Subject = " Sorry! We need to remove your notes from our portal. ";      
        $mail->Body = "Hello ".$first_name." ".$last_name.","."<br><br> We want to inform you that, your note ".$title." has been removed from the portal.Please find our remarks as below - <br><b>".$remarks."</b>
        <br><br>Regards,<br>NoteMarketPlace";   
        

        $mail->send();
    } 
    catch (Exception $e) {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }
    
}

 
if(isset($_GET['dnote_id']))
{
  $dnote_id=$_GET['dnote_id'];
  $attach_query = mysqli_query($conn, "SELECT * FROM seller_note_attachments WHERE note_id=$dnote_id");
  $attach_count=mysqli_num_rows($attach_query);

  if($attach_count<=1)
  {
      foreach ($attach_query as $attach_row) 
      {
            $attach_path = $attach_row['file_path'];
            $file_name=$attach_row['file_name'];
            if (file_exists($attach_path))
            {
                header('Cache-Control: public');
                header('Content-Description: File Transfer');
                header('Content-Disposition: attachment; filename=' . basename($file_name));
                header('Content-Type: application/pdf');
                header('Content-Transfer-Encoding:binary');
                readfile($attach_path);
            }
      }
  }
  else
  {
          $zipName = "zip_" . time() . ".zip";
          $zip_obj = new ZipArchive;
          $zip_obj->open($zipName, ZipArchive::CREATE);
          foreach ($attach_query as $attach_row) 
          {
              $attach_path = $attach_row['file_path'];
              $zip_obj->addFile($attach_path);
          }
          $zip_obj->close();
          header('Content-Type: application/zip');
          header('Content-Disposition: attachment; filename=' . $zipName);
          readfile($zipName);
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
        <link rel="shortcut icon" href="img/all/favicon.ico">

       <!--font-->
       <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

       <!--bootstrap css-->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

        <!-- data table -->
        <link rel="stylesheet" href="css/datatables.min.css">


       <!--custom css-->
        <link rel="stylesheet" href="css/custom_css/style.css">
        <link rel="stylesheet" href="css/responsive.css">

    </head>
    <body>
        <!--navbar-->
        <?php include "header.php"; ?>
        <!--navbar end-->
        
        <section id="table-design">
            <div class ="content-box-md">
                <div class="container">
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Published Notes</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <form class="manage-field">
                                <div class="row">
                                    <div class="col-md-5 col-lg-8 col-xl-8 col-12">
                                      <div class="row">
                                        <div class="col-md-12">
                                          seller
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <select id="seller" class="form-control filter arrow-down" style="width: 170px;" onchange="filterData();">
                                                    <option selected disabled>Seller</option>
                                                    <?php
                                                      $seller_query=mysqli_query($conn,"SELECT DISTINCT sn.seller_id,u.first_name,u.last_name FROM seller_note sn LEFT jOIN user u ON sn.seller_id=u.id");
                                                      foreach($seller_query as $get_seller)
                                                      { ?>
                                                          <option value="<?php echo $get_seller['seller_id']; ?>"><?php echo $get_seller['first_name']." ".$get_seller['last_name']; ?></option>
                                                      <?php }
                                                    ?>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-5 col-lg-3 col-xl-3">
                                        <div class="form-group  search-with-dropdown">
                                          <br>
                                            <img src="img/all/search-icon.png">
                                            <input type="text" class="form-control" placeholder="Search" id="search_txt">
                                        </div>
                                    </div>
                                    <input type="hidden" name="user" value="<?php echo $user_id; ?>" id="user">
                                    <div class="col-md-1 search-btn-1 col-lg-1 col-xl-1">
                                      <br>
                                         <button type="button" onclick="filterData();">Search</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="published_table"></div>
                </div>
                 
            </div>
        </section>

           
           
        
        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        
        <!--jquery-->
        <script src="js/jquery.min.js"></script>

        <!--popper js-->
        <script src="js/popper/popper.min.js"></script>

        <!--datatable js-->
        <script src="js/datatables.min.js"></script>

        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!-- custom js-->
        <script src="js/script.js"></script>

       <script type="text/javascript">
         

         $(function(){
            filterData();
         });
         function filterData()
         {
            var search_txt=$("#search_txt").val();
            var select_seller=$("#seller").val();
            var userid=$("#user").val();
            $.ajax({
              url:"ajax/published_data.php",
              type:"GET",
              data:
              {
                search:search_txt,
                seller:select_seller,
                uid:userid,
              },
              success:function(data){
                $("#published_table").html(data);
              }
            });
         }
       </script>
    </body>
</html> 
















