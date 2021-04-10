<?php 
include "config.php";
session_start();

if(isset($_POST['add_type']))
{
  header("location:add_type.php");
}
if(isset($_POST['search_btn']))
{
    $search_txt=$_POST['search_txt'];
    $query="SELECT t.name,t.id,t.description,t.created_date,t.isactive,u.first_name,u.last_name FROM type t LEFT JOIN user u ON u.id=t.created_by WHERE t.name LIKE '%{$search_txt}%' OR t.description LIKE '%{$search_txt}%' OR t.created_date LIKE '%{$search_txt}%' OR u.first_name LIKE '%{$search_txt}%' OR u.last_name LIKE '%{$search_txt}%' ORDER BY t.created_date DESC";
    $result=mysqli_query($conn,"$query");

}
else
{
    $query="SELECT t.name,t.id,t.description,t.created_date,t.isactive,u.first_name,u.last_name FROM type t LEFT JOIN user u ON u.id=t.created_by ORDER BY t.created_date DESC";
    $result=mysqli_query($conn,"$query");

}


if(isset($_POST['deactive-yes']))
{
      $get_type_id=$_POST['get_type_id'];
      $type_query=mysqli_query($conn,"UPDATE type SET isactive=0 WHERE id=$get_type_id");
      header("location:manage_type.php");
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
                        <div class="col-md-12">
                            <div class="heading">
                                <h3>Manage Type</h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form class="manage-field" action=" " method="post">
                                <div class="row">
                                    <div class="col-md-6 col-lg-8 col-xl-8">
                                      <button name="add_type" class="add-btn" style="width: 120px;">ADD TYPE</button>
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-xl-3">
                                        <div class="form-group  search-icon">
                                            <img src="img/all/search-icon.png">
                                            <input type="text" class="form-control"  placeholder="Search" name="search_txt">
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
                            <table class="table" style="min-width: 1100px !important;" id="myDataTable">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">TYPE</th>
                                      <th scope="col">DISCRIPTION</th>
                                      <th scope="col">DATE ADDED</th>
                                      <th scope="col">ADDED BY</th>
                                      <th scope="col">ACTIVE</th>
                                      <th scope="col">ACTION</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $sr_no=1;
                                    foreach($result as $row)
                                    {
                                      $type_id=$row['id'];
                                    ?>
                                      <tr>
                                        <td><?php echo $sr_no; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['created_date']; ?></td>
                                        <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                        <td><?php echo ($row['isactive']?"Yes":"No") ?></td>
                                        <td>
                                          <a href="add_type.php?type_id=<?php echo $type_id; ?>"><img src="img/all/edit.png"></a>&nbsp;&nbsp;
                                          <a data-toggle="modal" data-target="#confirm-deactive" data-typeid=<?php echo $type_id; ?> id="deactive-type"><img src="img/all/delete.png"></a>
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
            <h5 class="modal-title">Are you sure you want to make this Type inactive ? </h5>
          </div>
          <div class="modal-body">
            <form action=" " method="POST">
                <input type="hidden" name="get_type_id" id="get_type_id">
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

          $(document).on("click","#deactive-type",function(){
            var type_id=$(this).data("typeid");
            $("#get_type_id").val(type_id);
          });
        </script>



       
    </body>
</html> 
















