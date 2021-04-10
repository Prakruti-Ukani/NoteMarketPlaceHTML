<?php

include "config.php"; 
session_start();

require 'PHPMailer/includes/PHPMailer.php';
require 'PHPMailer/includes/SMTP.php';
require 'PHPMailer/includes/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_SESSION['email']))
{

?>
<?php

$admin_id=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";

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

       <!-- Datatable CSS -->
       <link href='css/datatables.min.css' rel='stylesheet' type='text/css'>
        
       <!--custom css-->
        <link rel="stylesheet" href="css/custom_css/style.css">
        <link rel="stylesheet" href="css/responsive.css">

    </head>
    <body>
        <!--navbar-->
        <?php include "header.php"; ?>
        <!--navbar end-->
        
        <section id="dashboard">
            <div class ="content-box-md" style="margin-bottom: -50px;">
                <div class="container">
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-8">
                            <div class="heading" style="margin-bottom: 20px;">
                                <h3>Dashboard</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 text-center col-sm-12 col-12 col-md-4">
                         <a href="under_review.php" style="text-decoration: none;"> 
                            <div class="dashboard-box">
                              <h3>
                                <?php
                                  $notes_query=mysqli_query($conn,"SELECT * FROM seller_note WHERE status=8 OR status=7");
                                  $note_count=mysqli_num_rows($notes_query);
                                  echo $note_count;
                                ?>
                              </h3>
                              <p>Number of notes in review for publish</p>
                            </div>
                          </div>
                        </a>
                        <div class="col-lg-4 text-center col-sm-12 col-12 col-md-4">
                        <a href="published_note.php" style="text-decoration: none;">
                            <div class="dashboard-box">
                              <h3>
                                <?php
                                  $download_query=mysqli_query($conn,"SELECT * FROM download WHERE attachment_downloaded_date > now() - INTERVAL 7 day AND is_attachment_downloaded=1");
                                  $download_count=mysqli_num_rows($download_query);
                                  echo $download_count;
                                ?>
                              </h3>
                              <p>Number of new notes downloaded<br>(Last 7 days)</p>
                            </div>
                          </div>
                        </a>
                        <div class="col-lg-4 text-center col-sm-12 col-12 col-md-4">
                          <a href="member.php" style="text-decoration: none;">
                            <div class="dashboard-box">
                              <h3>
                                <?php
                                  $user_query=mysqli_query($conn,"SELECT * FROM user WHERE created_date > now() - INTERVAL 7 day");
                                  $user_count=mysqli_num_rows($user_query);
                                  echo $user_count;
                                ?>
                              </h3>
                              <p>Number of new registration(Last 7 days)</p>
                            </div>
                          </a>
                        </div>
                      </div>
                </div>
            </div>
        </section>
        <section id="table-design">
            <div class ="content-box-md">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                            <div class="sub-heading">
                                <h3>Published Notes</h3>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-12">
                            <form class="dashboard-search">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                                        <div class="form-group  search-icon">
                                            <img src="img/all/search-icon.png">
                                            <input id="search_txt" type="text" class="form-control" placeholder="Search">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 search-btn col-12">
                                         <button type="button" onClick="filterData();">Search</button>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                         <div class="form-group">
                                            <select id="month" class="form-control filter arrow-down select-name" onchange="filterData();">
                                                    <option selected disabled>Select month</option>
                                                    <?php 
                                                      for ($i = 0; $i <= 5; $i++) 
                                                      {
                                                         $months[] = date("m-Y", strtotime( date( 'Y-m-01' )." -$i months"));
                                                      }
                                                      // var_dump($months);
                                                      foreach ($months as $value) { ?>
                                                          <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                      <?php }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="table_data">
                    </div>

                </div>
                 
            </div>
        </section>
           
           
        
        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        
        <!--jquery-->
        <script src="js/jquery.min.js"></script>

        <!-- Datatable JS -->
  		  <script src="js/datatables.min.js"></script>

        <!-- Popper js -->
        <script src="js/popper/popper.min.js"></script>
       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <script src="js/script.js"></script>

        

       <script type="text/javascript">
        $(function() {
            filterData();
        });

        function filterData() {
            var search_txt = $("#search_txt").val();
            var month = $("#month").val();

            $.ajax({
                
                url: "ajax/dashboard_data.php",
                type: "GET",
                data: {
                    search: search_txt, 
                    search_month:month,
                },
                success: function(data) {
                    $("#table_data").html(data);
                }
            });
        }
    </script>
    </body>
</html> 
<?php
}else{
  header("location:login.php");
}















