<?php

include "config.php";
session_start();

$uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
require 'PHPMailer/includes/PHPMailer.php';
require 'PHPMailer/includes/SMTP.php';
require 'PHPMailer/includes/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = isset($_SESSION['email']) ? $_SESSION['email'] : " ";
$seller_fn = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : " ";
$seller_ln = isset($_SESSION['last_name']) ? $_SESSION['last_name'] : " ";

  if(isset($_POST['search']))
  {

    $search_txt=$_POST['search_txt'];
    $query="SELECT DISTINCT d.note_id,d.note_title,d.note_catagory,d.downloader,d.is_allowed_download,u.email,d.ispaid,d.purchase_price,d.attachment_downloaded_date,up.phone_no,up.country_code,d.seller,c.country_code as code  FROM download d LEFT JOIN user u ON u.id=d.downloader LEFT JOIN user_profile up ON up.user_id=d.seller LEFT JOIN country c ON up.country_code=c.id WHERE (d.note_title LIKE '%{$search_txt}%' OR d.note_catagory LIKE '%{$search_txt}%') AND d.is_allowed_download=0 AND d.seller=$uid ORDER BY d.id DESC";

  }
  else
  {
    $query="SELECT DISTINCT d.note_id,d.note_title,d.note_catagory,d.downloader,d.is_allowed_download,u.email,d.ispaid,d.purchase_price,d.attachment_downloaded_date,up.phone_no,up.country_code,d.seller,c.country_code as code  FROM download d LEFT JOIN user u ON u.id=d.downloader LEFT JOIN user_profile up ON up.user_id=d.seller LEFT JOIN country c ON up.country_code=c.id WHERE d.is_allowed_download=0 AND d.seller=$uid ORDER BY d.id DESC";
  }
    
$result=mysqli_query($conn,$query);
if(!$result)
{
  die(mysqli_error($conn));
}

if(isset($_GET['dnote_id']))
{
    $dnote_id=$_GET['dnote_id'];
    $downloader_id=$_GET['downloader_id'];
    $allow_query=mysqli_query($conn,"UPDATE download SET is_allowed_download=1 WHERE note_id=$dnote_id AND downloader=$downloader_id");

    $get_user_data=mysqli_query($conn,"SELECT * FROM user WHERE id=$downloader_id");
    foreach ($get_user_data as $user_row)
    {
        $buyer_email=$user_row['email']; 
        $buyer_name=$user_row['first_name'];
    }
    
      $mail = new PHPMailer();
      try {
          
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port = 587;  
       
          $config_email = "prakrutiukani@gmail.com";
          $mail->Username = $config_email;
          $mail->Password = "Prakruti@ukani1999";   
       
          $mail->setFrom($email, $seller_fn.' '.$seller_ln);  
          $mail->addAddress($buyer_email, $buyer_name);  
          $mail->addReplyTo($email, $seller_fn." ".$seller_ln);   

          $mail->IsHTML(true); 
          
          $mail->Subject = $seller_fn." Allows you to download a note ";      
          $mail->Body = "Hello ".$buyer_name.", <br><br>We would like to inform you that, ".$seller_fn."  Allows you to download a note.Please login and see My Download tabs to download particular note <br><br>Regards,<br>NoteMarketPlace";   
            
       
          $mail->send();
          
      } 
      catch (Exception $e) {
          echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
      }
      header("location:buyer_request.php");
    
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
        
        <section id="table-design">
            <div class ="content-box-md">
                <div class="container">
                    <div class="row" style="padding-top: 90px;">
                        <div class="col-md-8 col-sm-8 col-12">
                            <div class="heading">
                                <h3>Buyer Request</h3>
                            </div>
                        </div>
                      <div class="col-md-4 col-12 col-sm-4">
                        <form action="" method="post">
                            <div class="row">
                              <div class="col-md-10 col-sm-10 col-12">
                                <div class="form-group  search-icon">
                                  <img src="img/front/search-icon.png">
                                      <label><input type="text" class="form-control" id="search-notes" placeholder="Search notes here" name="search_txt">
                                      </label>
                                </div>
                              </div>
                              <div class="col-md-2 search-btn col-sm-2 col-12">
                                     <button name="search">Search</button>
                              </div>
                            </div>
                        </form>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                            <table class="table"  id="myDataTable" style="min-width: 1100px !important;border:1px solid #d1d1d1;" >
                                  
                                  <thead>
                                    <tr>
                                      <th scope="col">SR NO.</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">BUYER</th>
                                      <th scope="col">PHONE NO.</th>
                                      <th scope="col">SELL TYPE</th>
                                      <th scope="col">PRICE</th>
                                      <th scope="col">DOWNLOAD DATE/TIME</th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $sr_no=1;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                      <tr>
                                        <td><?php echo $sr_no ?></td>
                                        <td><?php echo $row['note_title']?></td>
                                        <td><?php echo $row['note_catagory']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php if($row['code']==NULL)
                                        {
                                          echo " ";
                                        } 
                                        else
                                        {
                                          echo "+".$row['code']." ".$row['phone_no'];
                                        } ?></td>
                                        <td><?php if($row['ispaid']==1)
                                        {
                                          echo "Paid";
                                        }else{
                                          echo "Free";
                                        } ?></td>
                                        <td><?php echo $row['purchase_price']; ?></td>
                                        <td><?php echo $row['attachment_downloaded_date']; ?></td>
                                        <td><a href="note_details.php?noteid=<?php echo $row['note_id'] ?>"><img src="img/login/eye.png"></a></td>
                                        
                                        <td>
                                            <div class="dropdown">
                                              <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                                <form action="" method="post">
                                                  <a class="dropdown-item" href="buyer_request.php?dnote_id=<?php echo $row['note_id'];?>&downloader_id=<?php echo $row['downloader'] ?>" role="button">Allow Download</a>
                                                </form>
                                              </div>
                                            </div>
                                        </td>
                                      </tr>

                                    <?php $sr_no++;
                                  } ?>
                                  </tbody>
                            </table>
                            </div>
                        </div>
                    </div>

                </div>
                 
            </div>
        </section>
           
        <!--footer-->
        <?php include "footer.php";?>
        <!--footer end-->
        
        <!--jquery-->
        <script src="js/jquery.js"></script>

        <!-- jQuery Library -->
  		  <script src="js/jquery.min.js"></script>

  		  <!-- Datatable JS -->
  		  <script src="js/datatables.min.js"></script>

        <!-- Popper js -->
        <script src="js/popper/popper.min.js"></script>
       

        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <script src="js/script.js"></script>

        <script type="text/javascript">
  		    $(document).ready(function() {
  		      $('#myDataTable').DataTable({
              "scrollX": true,
            });
  		    });
		    </script>
       
    </body>
</html> 



