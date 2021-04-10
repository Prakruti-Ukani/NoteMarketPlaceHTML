<?php

include "config.php";
session_start();
$note_id = isset($_GET['noteid']) ? $_GET['noteid'] : " ";


?>


<?php

$get_note_data = mysqli_query($conn, "SELECT sn.seller_id,sn.title,sn.catagory,sn.description,sn.display_picture,sn.note_type,sn.ispaid,sn.selling_price,sn.university,sn.country,c.id,c.name,coun.name as country,sn.course,sn.course_code,sn.Professor,sn.number_of_pages,sn.published_date,sn.notes_preview FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id INNER JOIN country coun ON sn.country=coun.id WHERE sn.id=$note_id");

if (!$get_note_data) {
  die(mysqli_error($conn));
}
while ($row = mysqli_fetch_assoc($get_note_data)) 
{
    $display_pic = $row['display_picture'];
    $price = $row['selling_price'];
    $title = $row['title'];
    $cat_name = $row['name'];
    $desc = $row['description'];
    $ispaid = $row['ispaid'];
    $university = $row['university'];
    $country = $row['country'];
    $course = $row['course'];
    $course_code = $row['course_code'];
    $Professor = $row['Professor'];
    $nop = $row['number_of_pages'];
    $pub_date = $row['published_date'];
    $preview_pic = $row['notes_preview'];
    $seller_id = $row['seller_id'];
}

if(isset($_POST['downloadbtn']))
{
  $attach_query = mysqli_query($conn, "SELECT * FROM seller_note_attachments WHERE note_id=$note_id");
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

<?php 
      $average=0;
      $avg_query = mysqli_query($conn, "SELECT avg(rating) FROM seller_note_review WHERE note_id=$note_id");
      
      foreach ($avg_query as $avg_row) 
      {
          $average = $avg_row['avg(rating)'];
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

  <!--rating star -->
  <link rel="stylesheet" href="css/rate/jsRapStar.css">

  <!--custom css-->
  <link rel="stylesheet" href="css/custom_css/style.css">
  <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
  <!--navbar-->
  <?php include "header.php"; ?>
  <!--navbar end-->
  <section id="note-details">
    <div class="content-box-md">
      <div class="container">
        <div class="row" style="padding-top: 60px;">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="note-heading">
              <h4>Notes Details</h4>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-7 col-sm-12 col-12">
            <div id="note-left">
              <div class="row">
                <div class="col-md-5 col-sm-5 col-12">
                  <div class="notes-img">
                    <img src="<?php echo $display_pic; ?>">
                  </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-7">
                  <h3><?php echo $title; ?></h3>
                  <span><?php echo $cat_name; ?></span>
                  <p class="left-para"><?php echo $desc; ?> </p>

                      <form action=" " method="post">
                        <button class="download-btn" type="submit" name="downloadbtn">DOWNLOAD </button>
                      </form>
                    

                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-sm-12 col-xs-12">
            <div id="note-right">
              <table width="100%">
                <tr>
                  <td class="left">Institution</td>
                  <td class="right"><?php echo $university; ?></td>
                </tr>
                <tr>
                  <td class="left">Country</td>
                  <td class="right"><?php echo $country; ?></td>
                </tr>
                <tr>
                  <td class="left">Course name</td>
                  <td class="right"><?php echo $course; ?></td>
                </tr>
                <tr>
                  <td class="left">Course code</td>
                  <td class="right"><?php echo $course_code; ?></td>
                </tr>
                <tr>
                  <td class="left">Professor</td>
                  <td class="right"><?php echo $Professor; ?></td>
                </tr>
                <tr>
                  <td class="left">Number Of Pages</td>
                  <td class="right"><?php echo $nop; ?></td>
                </tr>
                <tr>
                  <td class="left">Approved Date</td>
                  <td class="right"><?php echo date('D, d M Y', strtotime($pub_date)); ?></td>
                </tr>
                
                  <?php if($average!=0){ ?>
                        <tr>
                          <td class="left">Rating</td>
                          <td class="right">
                              <div id="rate" start="<?php echo $average ?>" style="margin-right: 0px;"></div>
                          </td>
                        </tr>
                  <?php } ?>

                  
              </table>
              <?php 
                  $report_query=mysqli_query($conn,"SELECT * FROM seller_note_reported WHERE note_id=$note_id");
                  $rep_count=mysqli_num_rows($report_query);
                  if($rep_count>=1)
                  {
                      echo '<p>'.$rep_count.' users marked this note as inappropriate</p>';
                  }
                  else
                  {
                      echo '<p></p>';
                  }
              ?>
              
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <hr>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="note-details-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="note-bottom-left">
            <div class="row">
              <div class="col-md-12">
                <div class="note-heading">
                  <h4>Notes Preview</h4>
                </div>
                <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                  <div class="responsive-wrapper 
                                       responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                    <iframe src="<?php echo $preview_pic; ?>">
                      <p style="font-size: 110%;"><em><strong>ERROR: </strong>
                          An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em> Please update your browser to its most recent version and try again, or access the file <a href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">with this link.</a></p>
                    </iframe>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-md-7 col-sm-12 col-xs-12">

          <div id="note-bottom-right">
            <div class="row">
              <div class="col-md-12">
                <div class="note-heading">
                  <h4>Customer Review</h4>
                </div>
                  <iframe src="review.php?noteid=<?php echo $note_id ?>" width="100%" height="420">
                  </iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  


    <!--footer start-->
    <?php include "footer.php"; ?>
    <!--footer end-->

    <!--jquery-->
    <script src="js/jquery.min.js"></script>

    <!--rating star-->
    <script src="js/rate/jsRapStar.js"></script>

    <!--bootstrap jquery-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- custom jquery -->
    <script src="js/script.js"></script>

    <script type="text/javascript">

            
            

            $('#rate').jsRapStar({
                length: 5,
                value: '<?php echo $average ?>',
                enabled: false,
                starHeight:20,
                colorFront: 'orange'
            });

            $('#blank').jsRapStar({
                value: 0,
                length: 5,
                starHeight: 28,
                
            });
    </script>
</body>

</html>