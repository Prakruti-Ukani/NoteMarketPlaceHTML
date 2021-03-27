<?php

include "config.php";
session_start();
$uid=(isset($_SESSION['userid']))?$_SESSION['userid']:" ";
?>

<?php
        if(isset($_POST['search']))
        {
          $search_txt=$_POST['search_txt'];
          $query=mysqli_query($conn,"SELECT sn.id,sn.title,sn.status,sn.catagory,sn.remarks,c.name FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id WHERE (sn.title LIKE '%{$search_txt}%' OR c.name LIKE '%{$search_txt}%') AND sn.seller_id=$uid AND sn.status=10 ORDER BY sn.created_date DESC");
        }
        else
        {
          $query=mysqli_query($conn,"SELECT sn.id,sn.title,sn.status,sn.catagory,sn.remarks,c.name FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id WHERE sn.seller_id=$uid AND sn.status=10 ORDER BY sn.created_date DESC");
        }
        if(!$query)
        {
           die(mysqli_error($conn));
        }
          
?>
<?php 
  if(isset($_GET['note_id']))
  {
    $note_id=($_GET['note_id'])?$_GET['note_id']:" ";
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
                                <h3>My Rejected Notes</h3>
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
                                      <th scope="col">REMARKS</th>
                                      <th scope="col">CLONE</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    $sr_no=1;
                                    foreach ($query as $row ){
                                      ?>
                                    <tr>
                                      <td><?php echo $sr_no; ?></td>
                                      <td><a href="note_details.php?noteid=<?php echo $row['id'] ?>" style="text-decoration: none;color: #6555a5;"><?php echo $row['title'] ?></a></td>
                                      <td><?php echo $row['name'] ?></td>
                                      <td><?php echo $row['remarks'] ?></td>
                                      <td>clone</td>
                                      <td>
                                      	<div class="dropdown">
										  
                    										  <img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><div class="dropdown-menu" aria-labelledby="DownloadLink">
                    										    <a class="dropdown-item" href="Rejected_notes.php?note_id=<?php echo $row['id']  ?>">Download Note</a>
                    										  </div>
                    										</div>
                    									 </td>
                                    </tr>
                                  <?php $sr_no++; } ?>
                                    
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
        </script>

       
    </body>
</html> 



