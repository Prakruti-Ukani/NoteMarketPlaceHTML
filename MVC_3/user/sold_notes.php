<?php
include "config.php";
session_start();

$uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
$email=(isset($_SESSION['email']))?$_SESSION['email']:" ";
?>

<?php
        if(isset($_POST['search']))
        {
          $search_txt=$_POST['search_txt'];
          $query=mysqli_query($conn,"SELECT DISTINCT d.note_id,d.note_title,d.note_catagory,d.downloader,d.is_allowed_download,u.email,d.ispaid,d.purchase_price,d.attachment_downloaded_date,d.seller FROM download d INNER JOIN user u ON u.id=d.downloader WHERE (d.note_title LIKE '%{$search_txt}%' OR d.note_catagory LIKE '%{$search_txt}%') AND d.is_allowed_download=1 AND d.seller=$uid ORDER BY d.attachment_downloaded_date DESC");
        }
        else
        {
          $query=mysqli_query($conn,"SELECT DISTINCT d.note_id,d.note_title,d.note_catagory,d.downloader,d.is_allowed_download,u.email,d.ispaid,d.purchase_price,d.attachment_downloaded_date,d.seller FROM download d INNER JOIN user u ON u.id=d.downloader WHERE d.is_allowed_download=1  AND d.seller=$uid ORDER BY d.attachment_downloaded_date DESC");
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
                                <h3>My Sold Notes</h3>
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
                            <table class="table" id="myDataTable" style="min-width: 1100px;">
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
                                                <a class="dropdown-item" href="Sold_notes.php?dnote_id=<?php echo $row['note_id']  ?>">Download Note</a>
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
            
        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        



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
              "pageLength":10
            });
          });
        </script>

       
    </body>
</html> 
















