<?php 
include "config.php";
session_start();

if(isset($_POST['add_admin']))
{
  header("location:add_admin.php");
}
if(isset($_POST['search_btn']))
{
      $search_txt=$_POST['search_txt'];
      $query="SELECT u.first_name,u.last_name,u.email,up.phone_no,u.created_date,u.isactive,u.id,c.country_code FROM user u LEFT JOIN user_profile up ON u.id=up.user_id LEFT JOIN country c ON c.id=up.country_code WHERE (u.first_name LIKE '%{$search_txt}%' OR u.last_name LIKE '%{$search_txt}%' OR u.email LIKE '%{$search_txt}%' OR up.phone_no LIKE '%{$search_txt}%' OR u.created_date LIKE '%{$search_txt}%' OR c.country_code LIKE '%{$search_txt}%') AND u.role_id=2";
      $result=mysqli_query($conn,"$query");
}
else
{
      $query="SELECT u.first_name,u.last_name,u.email,up.phone_no,u.created_date,u.isactive,u.id,c.country_code FROM user u LEFT JOIN user_profile up ON u.id=up.user_id LEFT JOIN country c ON c.id=up.country_code WHERE u.role_id=2";
      $result=mysqli_query($conn,"$query");
}

if(isset($_POST['deactive-yes']))
{
      $get_user_id=$_POST['get_user_id'];
      $deactive_query=mysqli_query($conn,"UPDATE user SET isactive=0 WHERE id=$get_user_id");
      header("location:manage_admin.php");
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

        <!--datatable-->
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
                                <h3>Manage Administrator</h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form class="manage-field" action=" " method="post">
                                <div class="row">
                                    <div class="col-md-6 col-lg-8 col-xl-8">
                                      <button class="add-btn" name="add_admin">Add Administrator</button>
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-xl-3">
                                        <div class="form-group  search-icon">
                                            <img src="img/all/search-icon.png">
                                            <input type="search" class="form-control" name="search_txt" placeholder="Search">
                                        </div>
                                    </div>
                                    <div class="col-md-1 search-btn-1 col-lg-1 col-xl-1">
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
                                      <th scope="col">FIRST NAME</th>
                                      <th scope="col">LAST NAME</th>
                                      <th scope="col">EMAIL</th>
                                      <th scope="col">PHONE NO</th>
                                      <th scope="col">DATE ADDED</th>
                                      <th scope="col">ACTIVE</th>
                                      <th scope="col">ACTION</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $sr_no=1;
                                    foreach($result as $row)
                                    { 
                                      $uid=$row['id'];
                                      ?>
                                      <tr>
                                        <td><?php echo $sr_no; ?></td>
                                        <td><?php echo $row['first_name']; ?></td>
                                        <td><?php echo $row['last_name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['country_code']." ".$row['phone_no']; ?></td>
                                        <td><?php echo $row['created_date']; ?></td>
                                        <td>
                                          <?php
                                          echo (($row['isactive']==1)? "Yes": "No"); 
                                          ?>
                                        </td>
                                        <td>
                                          <a href="add_admin.php?admin_id=<?php echo $uid; ?>"><img src="img/all/edit.png"></a>&nbsp;&nbsp;<a data-toggle="modal" data-target="#confirm-deactive" data-userid=<?php echo $uid; ?> id="inactive-user"><img src="img/all/delete.png"></a>
                                        </td>
                                      
                                      </tr>
                                    <?php
                                    $sr_no++;
                                  } ?>
                                    
                                    
                                    
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
            <h5 class="modal-title">Are you sure you want to make this administrator inactive ? </h5>
          </div>
          <div class="modal-body">
            <form action=" " method="POST">
                <input type="hidden" name="get_user_id" id="get_user_id">
                <button class="btn btn-primary" style="width: 60px;" name="deactive-yes">YES</button>
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

       
        <script type="text/javascript">

          $(document).on("click", "#inactive-user", function () {
               var user_id = $(this).data('userid');
               $("#get_user_id").val( user_id );
          });

          $(function(){
            $("#myDataTable").dataTable({
              "pageLength":5,
              "scrollX":true,
            });
          });
        </script>

    </body>
</html> 
















