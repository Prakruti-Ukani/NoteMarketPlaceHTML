<?php
include "config.php";
session_start();

$admin_id=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
$user_id=(isset($_GET['uid']))?$_GET['uid']: " ";

if(isset($_POST['inreview-yes']))
{
  $inreview_id=$_POST['inreview_note_id'];
  $inreview_query=mysqli_query($conn,"UPDATE seller_note SET status=8,action_by=$admin_id WHERE id=$inreview_id");

}
if(isset($_POST['publish-yes']))
{
  $publish_id=$_POST['publish_note_id'];
  $publish_query=mysqli_query($conn,"UPDATE seller_note SET status=9,action_by=$admin_id,published_date=NOW() WHERE id=$publish_id");
}

if(isset($_POST['reject-yes']))
{
	$reject_id=$_POST['reject_note_id'];
	$remark=$_POST['remark'];
  	$publish_query=mysqli_query($conn,"UPDATE seller_note SET status=10,action_by=$admin_id,remarks='$remark' WHERE id=$reject_id");
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
        
        <section id="table-design">
            <div class ="content-box-md">
                <div class="container">
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Notes Under Review</h3>
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
                                            <select id="seller" class="form-control filter arrow-down" style="width: 170px;" onchange ="filterData();">
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
                                    <form>
                                      <div class="col-md-5 col-lg-3 col-xl-3">
                                          <div class="form-group  search-with-dropdown">
                                            <br>
                                              <img src="img/all/search-icon.png">
                                              <input type="text" class="form-control" id="search_txt" placeholder="Search">
                                          </div>
                                      </div>
                                      <input type="hidden" name="user" id="user" value="<?php echo $user_id; ?>">
                                      <div class="col-md-1 search-btn-1 col-lg-1 col-xl-1">
                                        <br>
                                           <button type="button" onclick="filterData();">Search</button>
                                      </div>
                                    </form>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="under_review_table"></div>

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
          $(function(){
            filterData();
          });
          function filterData(){
            var search_txt=$("#search_txt").val();
            var seller=$("#seller").val();
            var userid=$("#user").val();

            $.ajax({
              url:"ajax/under_review_data.php",
              type:"GET",
              data:{
                search:search_txt,
                selected_seller:seller,
                uid:userid,
              },
              success:function(data){
                $("#under_review_table").html(data);
              }
            });
          }


        </script>

       
    </body>
</html> 
















