<?php

include "config.php";
session_start(); 

$uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
$email=(isset($_SESSION['email']))?$_SESSION['email']:" ";
$fn = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : " ";
$ln = isset($_SESSION['last_name']) ? $_SESSION['last_name'] : " ";

require 'PHPMailer/includes/PHPMailer.php';
require 'PHPMailer/includes/SMTP.php';
require 'PHPMailer/includes/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


?>

<?php
        if(isset($_POST['search']))
        {
          $search_txt=$_POST['search_txt'];
          $query=mysqli_query($conn,"SELECT DISTINCT d.note_id,d.note_title,d.note_catagory,d.downloader,d.is_allowed_download,u.email,d.ispaid,d.purchase_price,d.attachment_downloaded_date,d.seller FROM download d INNER JOIN user u ON u.id=d.downloader WHERE (d.note_title LIKE '%{$search_txt}%' OR d.note_catagory LIKE '%{$search_txt}%') AND d.is_allowed_download=1 AND d.downloader=$uid ORDER BY d.attachment_downloaded_date DESC");
        }
        else
        {
          $query=mysqli_query($conn,"SELECT DISTINCT d.note_id,d.note_title,d.note_catagory,d.downloader,d.is_allowed_download,u.email,d.ispaid,d.purchase_price,d.attachment_downloaded_date,d.seller FROM download d INNER JOIN user u ON u.id=d.downloader WHERE d.is_allowed_download=1  AND d.downloader=$uid ORDER BY d.attachment_downloaded_date DESC");
        }
        if(!$query)
        {
           die(mysqli_error($conn));
        }

?>
<?php
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
      $update_download=mysqli_query($conn,"UPDATE download SET is_attachment_downloaded=1 WHERE note_id=$dnote_id");
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
          $update_download=mysqli_query($conn,"UPDATE download SET is_attachment_downloaded=1 WHERE note_id=$dnote_id");
    }
}
if(isset($_POST['add_rate']))
{
    $get_note_id=$_POST['get_note_id'];
    $get_seller_id=$_POST['get_seller_id'];
    $rate_value=$_POST['starval'];
    $comment=$_POST['comment'];

    $fetch_rate=mysqli_query($conn,"SELECT * FROM seller_note_review WHERE note_id=$get_note_id AND reviewby_id=$uid");
    $rate_count=mysqli_num_rows($fetch_rate);
    if($rate_count==0)
    {
        $add_rate=mysqli_query($conn,"INSERT INTO seller_note_review(note_id,reviewby_id,againstby_id, rating, comments,created_date, created_by, modified_date, modified_by, isactive) VALUES ($get_note_id,$uid,$get_seller_id,$rate_value,'$comment',$uid,NOW(),$uid,NOW(),1)");
        if(!$add_rate)
        {
            die(mysqli_error($conn));
        }
    }
}

if(isset($_POST['add_report']))
{

    $report_note_id=$_POST['report_note_id'];
    $report_seller_id=$_POST['report_seller_id'];
    $remark=$_POST['remark'];

    $fetch_review=mysqli_query($conn,"SELECT * FROM seller_note_reported WHERE note_id=$report_note_id AND reportedby_id=$uid");
    $review_count=mysqli_num_rows($fetch_review);

    if($review_count==0)
    {
        $add_report=mysqli_query($conn,"INSERT INTO seller_note_reported(note_id,reportedby_id,against_downloader_id,remarks, created_date, created_by, modified_date, modified_by) VALUES ($report_note_id,$uid,$report_seller_id,'$remark',NOW(),$uid,NOW(),$uid)");

        if(!$add_report)
        {
            die(mysqli_error($conn));
        }  
        $get_title=mysqli_query($conn,"SELECT title FROM seller_note WHERE id=$report_note_id");
        foreach ($get_title as $note_row) {
            $title=$note_row['title'];
        }
        $get_user_data=mysqli_query($conn,"SELECT * FROM user WHERE id=$report_seller_id");
        foreach ($get_user_data as $user_row)
        {
            $buyer_name=$user_row['first_name'];
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

                $mail->setFrom($email, $fn);  
             
                $mail->addAddress('prakrutiukani@gmail.com', 'NoteMarketPlace');  
                $mail->addReplyTo($email, $fn);  
             
                $mail->IsHTML(true);  

                $mail->Subject =$fn.' Reported an issue for '.$title;  

                $mail->Body = "Hello Admin,<br><br>We want to inform you that, ".$fn." Reported an issue for ".$buyer_name."’s Note with title ".$title.". Please look at the notes and take required actions<br><br>Regards,<br>NoteMarketPlace";   //Email body
                  
             
                $mail->send();
               
            } 
            catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }

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
        <link rel="shortcut icon" href="img/front/favicon.ico">
        
        <!--font-->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!--bootstrap css-->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

        <link rel="stylesheet" href="css/rate/jsRapStar.css">

        <!-- Datatable CSS -->
        <link href='css/datatables.min.css' rel='stylesheet' type='text/css'>
        
       <!--custom css-->
        <link rel="stylesheet" href="css/custom_css/style.css">
        <link rel="stylesheet" href="css/responsive.css">

    </head>
    <body>
        <!--navbar-->
        <?php include "header.php" ?>
        <!--navbar end-->
        
        <section id="table-design">
            <div class ="content-box-md">
                <div class="container">
                    <div class="row" style="padding-top: 90px;">
                        <div class="col-md-8 col-sm-8 col-12">
                            <div class="heading">
                                <h3>My Downloads</h3>
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
                            <div>
                            <table class="table" style="min-width: 1100px !important;" id="myDataTable">
                                <thead>
                                    <tr>
                                      <th scope="col">SR NO.</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">BUYER</th>
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
                                   	foreach($query as $row)
                                    {
                                    ?>
                                      <tr>
                                        <td><?php echo $sr_no ?></td>
                                        <td><a href="note_details.php?noteid=<?php echo $row['note_id'] ?>" style="text-decoration: none;color: #6555a5;"><?php echo $row['note_title']; ?></a></td>
                                        <td><?php echo $row['note_catagory']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php if($row['ispaid']==1)
                                        {
                                          echo "Paid";
                                        }else{
                                          echo "Free";
                                        }?></td>
                                        <td><?php echo $row['purchase_price']; ?></td>
                                        <td><?php echo $row['attachment_downloaded_date']; ?></td>
                                        <td><a href="note_details.php?noteid=<?php echo $row['note_id'] ?>"><img src="img/login/eye.png"></a></td>
                                        
                                        <td>
                                          
                                            <div class="dropdown">
  	                                          <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
  	                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
    	                                            <a class="dropdown-item" href="my_downloads.php?dnote_id=<?php echo $row['note_id']  ?>">Download Note</a>

    	                                            <a class="dropdown-item" id="open-modal" href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#review-modal" data-noteid=<?php echo $row['note_id']; ?> data-sellerid=<?php echo $row['seller'] ?>>Add Review/feedback</a>
                                                  
    	                                            <a class="dropdown-item" href="#" id="report-open-modal" data-toggle="modal" data-target="#report-modal" data-noteid=<?php echo $row['note_id']; ?> data-sellerid=<?php echo $row['seller'] ?> data-title='<?php echo $row['note_title'] ?>'>Report as inappropriate</a>
  	                                          </div>
	                                           </div>
                                          
                                        </td>
                                      </tr>

                                    <?php $sr_no++;
                                    } 
                                    ?>
                                  </tbody>

                              </table>
                            </div>
                        </div>
                    </div>

                </div>
                 
            </div>
        </section>
           
          <!--add reivew modal-->
          <form action="" method="post">
           <div class="modal fade " id="review-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="close-btn">
                          <button type="button" data-dismiss="modal" ><img src="img/notes/close.png"></button>
                      </div>
                      <div class="">
                        <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                      </div>
                      <div id="show-star"></div>
                      <input value="" name="starval" id="starval" type="hidden">
                      <div class="modal-body" style="margin-top: -30px;">
                          <div class="form-group">
                             <p>Comment*</p>
                             <textarea class="form-control" id="comment" placeholder="Comments" required cols="0" style="font-size: 12px;margin-top: -10px;" name="comment"></textarea>
                             <input type="hidden" name="get_note_id" id="get_note_id">
                             <input type="hidden" name="get_seller_id" id="get_seller_id">
                          </div>
                          
                          <button name="add_rate" class="btn" style="background-color: #6555a5;color: #fff;">SUBMIT</button>
                      </div>
                  </div>
                </div>
           </div>
         </form>
         <!--modal end-->

         <!--add reivew modal-->
          <form action="" method="post">
           <div class="modal fade " id="report-modal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      
                      <div class="modal-body">
                          <div class="form-group">
                             <label>Note Title*</label>
                             <input type="text" name="title" id="get_title" disabled class="form-control">
                           </div>
                           <div class="form-group">
                            <label>Remarks*</label>
                              <input type="text" name="remark" class="form-control" required>
                            </div>
                             <input type="hidden" name="report_note_id" id="report_note_id">
                             <input type="hidden" name="report_seller_id" id="report_seller_id">
                             
                          <button name="add_report" class="btn" style="background-color: #6555a5;color: #fff;" id="add_report">Report an issue</button>
                          <button type="button" data-dismiss="modal" class="btn" style="background-color: #6555a5;color: #fff;">cancel</button>
                      </div>
                  </div>
                </div>
           </div>
         </form>
         <!--modal end-->
        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        
        <!-- jQuery Library -->
  		  <script src="js/jquery.min.js"></script>
        <script src="js/rate/jsRapStar.js"></script>

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
              "pageLength":10
            });
  		    });

          $(document).on("click", "#open-modal", function () {
               var note_id = $(this).data('noteid');
               var seller_id = $(this).data('sellerid');
               $("#get_note_id").val( note_id );
               $("#get_seller_id").val( seller_id );
          });

          $(document).on("click", "#report-open-modal", function () {
               var note_id = $(this).data('noteid');
               var seller_id = $(this).data('sellerid');
               var title=$(this).data('title');
               $("#report_note_id").val( note_id );
               $("#report_seller_id").val( seller_id );
               $("#get_title").val(title);
          });
          

		    </script>

        <script>
          $('#show-star').jsRapStar({
              step: false,
              value: 0,
              length: 5,
              starHeight: 64,
              colorFront: 'orange',
              onClick: function(score) {
                  this.StarF.css({
                      color: '#f0c420'
                  });
                  $('#starval').val(score);
              },
              onMousemove: function(score) {
                  $(this).attr('title', 'Rate ' + score);
              }
          });
          
    </script>

       
    </body>
</html> 
