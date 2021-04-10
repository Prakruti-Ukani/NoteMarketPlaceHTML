<?php
include "config.php";
session_start();

if(isset($_POST['search_btn']))
{
    $search_txt=$_POST['search_txt'];
    $query="SELECT user.first_name,user.last_name,user.email,user.id,user.created_date FROM user WHERE role_id=1 AND user.isactive=1 AND (user.first_name LIKE '%{$search_txt}%' OR user.last_name LIKE '%{$search_txt}%' OR user.email LIKE '%{$search_txt}%' OR user.created_date LIKE '%{$search_txt}%') ORDER BY user.id DESC";

}
else
{
    $query="SELECT user.first_name,user.last_name,user.email,user.id,user.created_date FROM user WHERE role_id=1 AND user.isactive=1 ORDER BY user.id DESC";

}

$result=mysqli_query($conn,"$query");
if(!$result)
{
  die(mysqli_error($conn));
}

if(isset($_GET['uid']))
{
  $user_id=$_GET['uid'];
  $deactivate_query=mysqli_query($conn,"UPDATE user SET isactive=0 WHERE id=$user_id");
  if(!$deactivate_query)
  {
    die(mysqli_error($conn));
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
                    <div class="row" style="padding-top: 90px;">
                        <div class="col-md-8">
                            <div class="heading">
                                <h3>Members</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form class="dashboard-search" action=" " method="post">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group  search-icon">
                                            <img src="img/all/search-icon.png">
                                            <input type="search" class="form-control" id="search-notes" placeholder="Search" name="search_txt">
                                        </div>
                                    </div>
                                    <div class="col-md-3 search-btn">
                                         <button name="search_btn" >Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                            <table class="table" id="myDataTable" style="min-width: 1300px !important;">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">FIRST NAME</th>
                                      <th scope="col">LAST NAME</th>
                                      <th scope="col">EMAIL</th>
                                      <th scope="col">JOINING DATE</th>
                                      <th scope="col">UNDER REVIEW NOTES</th>
                                      <th scope="col">PUBLISHED NOTES</th>
                                      <th scope="col">DOWNLOADED NOTES</th>
                                      <th scope="col">TOTAL EXPENSES</th>
                                      <th scope="col">TOTAL EARNINGS</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    $sr_no=1;
                                    foreach ($result as $row) { 
                                      $uid=$row['id'];
                                      ?>
                                         <tr>
                                            <td><?php echo $sr_no; ?></td>
                                            <td><?php echo $row['first_name']; ?></td>
                                            <td><?php echo $row['last_name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['created_date']; ?></td>
                                            <td><a href="under_review.php?uid=<?php echo $uid ?>" style="text-decoration: none;color: #212529;">
                                              <?php

                                              $under_review_query=mysqli_query($conn,"SELECT * FROM seller_note WHERE seller_id=$uid AND (status=8 OR status=7)");
                                              $under_review_count=mysqli_num_rows($under_review_query);
                                              echo $under_review_count; 
                                              ?></a>
                                            </td>
                                            <td><a href="published_note.php?uid=<?php echo $uid ?>" style="text-decoration: none;color: #212529;">
                                              <?php

                                              $published_query=mysqli_query($conn,"SELECT * FROM seller_note WHERE seller_id=$uid AND status=9");
                                              $published_count=mysqli_num_rows($published_query);
                                              echo $published_count; 
                                              ?></a>
                                            </td>
                                            <td><a href="download_notes.php?uid=<?php echo $uid ?>" style="text-decoration: none;color: #212529;">
                                              <?php
                                              $downloaded_query=mysqli_query($conn,"SELECT DISTINCT note_id FROM download WHERE downloader=$uid AND is_allowed_download=1");
                                              $download_count=mysqli_num_rows($downloaded_query);
                                              echo $download_count;
                                              ?></a>
                                            </td>
                                            <td><a href="download_notes.php?uid=<?php echo $uid ?>" style="text-decoration: none;color: #212529;">
                                              <?php
                                                $expensse_query=mysqli_query($conn,"SELECT DISTINCT note_id,purchase_price FROM download WHERE is_allowed_download=1 AND downloader=$uid");
                                                $sum_expense=0;
                                                foreach ($expensse_query as $row) {
                                                  $expense=$row['purchase_price'];
                                                  $sum_expense+=$expense;
                                                }
                                                echo "$".$sum_expense;

                                              ?></a>
                                            </td>
                                            <td>
                                              <?php
                                                $purchase_query=mysqli_query($conn,"SELECT DISTINCT note_id,purchase_price FROM download WHERE is_allowed_download=1 AND seller=$uid");
                                                $sum_earning=0;
                                                foreach ($purchase_query as $row)
                                                {
                                                    $earning=$row['purchase_price'];
                                                    $sum_earning+=$earning;  
                                                }
                                                echo "$".$sum_earning;
                                              ?>
                                            </td>
                                            <td>
                                              <div class="dropdown">
                                                <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                                  <a class="dropdown-item" href="member_detail.php?uid=<?php echo $uid; ?>">View More Details</a>
                                                  <a class="dropdown-item" href="member.php?uid=<?php echo $uid; ?>">Deactive</a>
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
        <?php include "footer.php"; ?>
        <!--footer end-->
        



        <!--jquery-->
        <script src="js/jquery.min.js"></script>

        <!--popper js-->
       	<script src="js/popper/popper.min.js"></script>

       	<!--datable js-->
       	<script src="js/datatables.min.js"></script>

        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!--custom css-->
        <script src="js/script.js"></script>

        <script type="text/javascript">
        	$(function(){
	            $("#myDataTable").dataTable({
	              "pageLength":5,
	              "scrollX":true,
	            });
	          });
        </script>

       
    </body>
</html> 









