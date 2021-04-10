<?php
include "config.php";
session_start();


$user_id=(isset($_GET['uid']))?$_GET['uid']: " ";
$note_id=(isset($_GET['note']))?$_GET['note']: " ";

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

        <!--datatable css-->
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
                                <h3>Downloaded Notes</h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form class="manage-field">
                                <div class="row">
                                    <div class="col-md-12 col-lg-8">
                                      <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-12 ">
                                          <div class="row">
                                            <div class="col-md-12">
                                              Note
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <select id="note" class="form-control filter arrow-down" style="width: 170px;" onchange="filterData();">
                                                        <option selected disabled>Select note</option>
                                                        <?php
                                                        $note_query=mysqli_query($conn,"SELECT DISTINCT note_title,note_id FROM download");
                                                        foreach ($note_query as $note_row) 
                                                        {
                                                            echo "<option value=".$note_row['note_id'].">".$note_row['note_title']."</option>";
                                                        }
                                                        ?>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                          <div class="row">
                                            <div class="col-md-12">
                                              seller
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <select id="seller" class="form-control filter arrow-down" style="width: 170px;" onchange="filterData();">
                                                        <option selected disabled>Select name</option>
                                                        <?php
                                                        $seller_query=mysqli_query($conn,"SELECT DISTINCT d.seller,u.first_name,u.last_name FROM Download d LEFT JOIN user u ON d.seller=u.id WHERE d.is_allowed_download=1");
                                                        foreach($seller_query as $seller_row)
                                                        {
                                                          echo "<option value=".$seller_row['seller'].">".$seller_row['first_name']." ".$seller_row['last_name']."</option>";
                                                        }
                                                        ?>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                          <div class="row">
                                            <div class="col-md-12">
                                              Buyer
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <select id="buyer" class="form-control filter arrow-down" style="width: 170px;" onchange="filterData();">
                                                        <option selected disabled>Select name</option>
                                                        <?php
                                                        $buyer_note=mysqli_query($conn,"SELECT DISTINCT d.downloader,u.first_name,u.last_name FROM Download d LEFT JOIN user u ON d.downloader=u.id WHERE d.is_allowed_download=1");
                                                        foreach($buyer_note as $buyer_row)
                                                        {
                                                          echo "<option value=".$buyer_row['downloader'].">".$buyer_row['first_name']." ".$buyer_row['last_name']."</option>";
                                                        }
                                                        ?>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-sm-7">
                                        <div class="form-group  search-with-dropdown">
                                          <br>
                                            <img src="img/all/search-icon.png">
                                            <input type="text" class="form-control" id="search_txt" placeholder="Search" >
                                        </div>
                                    </div>
                                    <input type="hidden" name="user" value="<?php echo $user_id; ?>" id="user">
                                    <input type="hidden" name="noteid" value="<?php echo $note_id; ?>" id="noteid">
                                    <div class="col-lg-1 col-md-1 search-btn-1 col-sm-3">
                                      <br>
                                         <button type="button" onclick="filterData();">Search</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                  <div id="Downloaded_table"></div>

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

        <!--data table-->
        <script src="js/datatables.min.js"></script>
       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!--Custom js-->
        <script src="js/script.js"></script>

        <script type="text/javascript">
          

          $(function(){
            filterData();
          });
          function filterData(){
            var search_txt=$("#search_txt").val();
            var select_note=$("#note").val();
            var select_seller=$("#seller").val();
            var select_buyer=$("#buyer").val();
            var user_id=$("#user").val();
            var note_id=$("#noteid").val();

            $.ajax({
              url:"ajax/Downloaded_data.php",
              type:"GET",
              data:{
                search:search_txt,
                note:select_note,
                seller:select_seller,
                buyer:select_buyer,
                uid:user_id,
                noteid:note_id,
              },
              success:function(data){
                $("#Downloaded_table").html(data);
              }
            });
          }
        </script>
       
    </body>
</html> 
















