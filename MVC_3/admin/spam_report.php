<?php
include "config.php";
session_start();
if(isset($_POST['search_btn']))
{
    $search_txt=$_POST['search_txt'];
    $query="SELECT r.id,r.remarks,r.created_date,r.note_id,u.first_name,u.last_name,sn.title,c.name FROM seller_note_reported r LEFT JOIN user u ON r.reportedby_id=u.id LEFT JOIN seller_note sn ON sn.id=r.note_id LEFT JOIN category c ON c.id=sn.catagory";
    $result=mysqli_query($conn,"$query");
}
else
{
    $query="SELECT r.id,r.remarks,r.created_date,r.note_id,u.first_name,u.last_name,sn.title,c.name FROM seller_note_reported r LEFT JOIN user u ON r.reportedby_id=u.id LEFT JOIN seller_note sn ON sn.id=r.note_id LEFT JOIN category c ON c.id=sn.catagory";
    $result=mysqli_query($conn,"$query");
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

if(isset($_POST['deactive-yes']))
{
      $get_rep_id=$_POST['get_rep_id'];
      $report_query=mysqli_query($conn,"DELETE FROM seller_note_reported  WHERE id=$get_rep_id");
      header("location:spam_report.php");
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

        <!--datatble css-->
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
                        <div class="col-md-8">
                            <div class="heading">
                                <h3>Spam Reports</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form class="dashboard-search">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group  search-icon">
                                            <img src="img/all/search-icon.png">
                                            <input type="text" class="form-control" id="search-notes" placeholder="Search" name="search_txt">
                                        </div>
                                    </div>
                                    <div class="col-md-3 search-btn">
                                         <button name="search_btn">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                            <table class="table" id="myDataTable" style="min-width: 1100px !important;">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">REPORTED BY</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">DATE EDITED</th>
                                      <th scope="col">REMARK</th>
                                      <th scope="col">ACTION</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $sr_no=1;
                                    foreach($result as $row)
                                    { 
                                      $rid=$row['id'];
                                      $note_id=$row['note_id']; ?>
                                        <tr>
                                          <td><?php echo $sr_no; ?></td>
                                          <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                          <td>
                                            <a href="note_details.php?noteid=<?php echo $note_id; ?>" style="text-decoration: none;color: #6555a5;"><?php echo $row['title'] ?></a>
                                          </td>
                                          <td><?php echo $row['name']; ?></td>
                                          <td><?php echo $row['created_date']; ?></td>
                                          <td><?php echo $row['remarks']; ?></td>
                                          <td>
                                            <a data-toggle="modal" data-target="#confirm-deactive" data-rid=<?php echo $rid; ?> id="deactive-report"><img src="img/all/delete.png"></a>
                                          </td>
                                          <td>
                                            <div class="dropdown">
                                              <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                                
                                                <a class="dropdown-item" href="dashboard.php?dnote_id=<?php echo $note_id;  ?>">Download Note</a>

                                                <a class="dropdown-item" href="note_details.php?noteid=<?php echo $note_id; ?>">View More Details</a>
                                               
                                              </div>
                                            </div>
                                          </td>
                                          
                                        </tr>
                                        
                                    <?php
                                    $sr_no++;
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
            
    <!-- Modal -->
    <div class="modal fade " id="confirm-deactive" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Are you sure you want to make this report inactive ? </h5>
          </div>
          <div class="modal-body">
            <form action=" " method="POST">
                <input type="hidden" name="get_rep_id" id="get_rep_id">
                <button class="btn btn-primary" style="width: 60px;" name="deactive-yes">Yes</button>
                <button class="btn btn-primary" style="width: 60px;">No</button>
            </form>
          </div>

        </div>
      </div>
    </div>
        
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

        <!--custom js-->
        <script src="js/script.js"></script>

        <script type="text/javascript">
          $(function(){
            $("#myDataTable").dataTable({
              "pageLength":5,
              "scrollX":true,
            });
          });

          $(document).on("click","#deactive-report",function(){
            var r_id=$(this).data("rid");
            $("#get_rep_id").val(r_id);
          });
        </script>

       
    </body>
</html> 
















