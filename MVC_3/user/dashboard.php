<?php
include "config.php";
session_start();
if (isset($_SESSION['login'])) {
  $email = $_SESSION['email'];
  $uid=$_SESSION['userid'];
 
  
  if (isset($_POST['search_1']))
  {
      $search_field_1=$_POST['search_1_txt'];
      $query = "SELECT sn.id,sn.created_date,sn.title,sn.catagory,sn.status,c.name,rd.value FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id INNER JOIN reference_data rd ON sn.status=rd.id WHERE (sn.title  LIKE '%$search_field_1%' OR c.name  LIKE '%$search_field_1%') AND sn.status BETWEEN 6 and 8 AND sn.isactive=1 AND sn.seller_id=$uid ORDER BY sn.created_date DESC";
      $result = mysqli_query($conn, $query);
      
  } else {
    
      $query = "SELECT sn.id,sn.created_date,sn.title,sn.catagory,sn.status,c.name,rd.value FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id INNER JOIN reference_data rd ON sn.status=rd.id WHERE sn.isactive=1 AND sn.seller_id=$uid AND sn.status BETWEEN 6 and 8 ORDER BY sn.created_date DESC";
      $result = mysqli_query($conn, $query);
    
  }
  if (!$result) 
  {
    die('query failed' . mysqli_error());
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

    <section id="dashboard">
      <div class="content-box-md" style="margin-bottom: -50px;">
        <div class="container">
          <div class="row" style="padding-top: 60px;">
            <div class="col-md-8">
              <div class="heading" style="margin-bottom: 20px;">
                <h3>Dashboard</h3>
              </div>
            </div>
            <div class="col-md-4">
              <button onclick="window.location.href='add_note.php';" style="color:#fff;background-color: #6255a5;font-family: 'Open Sans';border-radius: 3px;height: 35px;font-size: 16px;font-family: 'Open Sans';line-height: 22px; float: right;width: 100px;border:transparent;">Add Notes</button>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2 col-sm-12 col-12 col-md-4">
              <div class="dashboard-box">
                <img src="img/front/my-earning.png" class="seller-img">
                <h3 class="text-center">My Earnings</h3>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-12 col-md-8">
              <div class="dashboard-box">
                <div class="row">
                  <div class="col-lg-6 text-center col-sm-6 col-6">
                    <?php 
                      $sold_query=mysqli_query($conn,"SELECT DISTINCT note_id FROM download WHERE seller=$uid AND is_allowed_download=1");
                      $sold_count=mysqli_num_rows($sold_query);
                    ?>
                    <h3><?php echo $sold_count; ?></h3>
                    <p>number of notes sold</p>
                  </div>
                  <div class="col-lg-6 text-center col-sm-6 col-6">
                    <?php 
                      $money_query=mysqli_query($conn,"SELECT sn.selling_price,d.note_id as dnoteid FROM seller_note sn LEFT JOIN download d ON sn.id=d.note_id WHERE sn.seller_id=$uid AND sn.status=9 AND d.is_allowed_download=1");

                      $price_sum=0;
                      foreach($money_query as $row) 
                      {
                          $selling_price=$row['selling_price'];
                          $dnoteid=$row['dnoteid'];

                          $find_num_note=mysqli_query($conn,"SELECT * FROM seller_note_attachments WHERE note_id=$dnoteid");
                          
                          $note_count=mysqli_num_rows($find_num_note);
                          $selling_price=$selling_price/$note_count;
                          
                          $price_sum=$price_sum+$selling_price;
                      }
                      ?>
                    <h3>$<?php echo $price_sum; ?></h3>
                    <p>Money Earned</p>
                  </div>
                </div>  
              </div>
            </div>
            <div class="col-lg-2 text-center col-sm-12 col-12 col-md-4">
              <div class="dashboard-box">
                <?php 
                  $download_query=mysqli_query($conn,"SELECT DISTINCT note_id FROM download WHERE downloader=$uid AND is_allowed_download=1");
                  $download_count=mysqli_num_rows($download_query);
                ?>
                <h3><?php echo $download_count; ?></h3>
                <p>My Downloads</p>
              </div>
            </div>
            <div class="col-lg-2 text-center col-sm-12 col-12 col-md-4">
              <div class="dashboard-box">
                <?php
                  $rejected_query=mysqli_query($conn,"SELECT * FROM seller_note WHERE status=10 AND seller_id=$uid");
                  $rejected_count=mysqli_num_rows($rejected_query);
                ?>
                <h3><?php echo $rejected_count; ?></h3>
                <p>My Rejected Notes</p>
              </div>
            </div>
            <div class="col-lg-2 text-center col-sm-12 col-12 col-md-4">
              <div class="dashboard-box">
                <?php
                  $buyer_query=mysqli_query($conn,"SELECT DISTINCT note_id FROM download WHERE is_allowed_download=0 AND seller=$uid AND ispaid=1");
                  $buyer_count=mysqli_num_rows($buyer_query);
                ?>
                <h3><?php echo $buyer_count ?></h3>
                <p>Buyer Requests</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <section id="table-design">
      <div class="content-box-md">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="sub-heading">
                <h3>My Rejected Notes</h3>
              </div>
            </div>
            <div class="col-md-4">
              <form action=" " method="post">
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group  search-icon">
                      <img src="img/front/search-icon.png">
                      <input type="text" name="search_1_txt" class="form-control" id="search-notes" placeholder="Search notes here">
                    </div>
                  </div>
                  <div class="col-md-2 search-btn">
                    <button name="search_1">Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="table-format" style="border:none;">
                <table class="table" id="myDataTable2" style="min-width: 1100px !important;">
                  <thead>
                    <tr>
                      <th scope="col">ADDED DATE</th>
                      <th scope="col">TITLE</th>
                      <th scope="col">CATAGORY</th>
                      <th scope="col">STATUS</th>
                      <th scope="col">ACTIONS</th>
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <td><?php echo $row['created_date']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['value']; ?></td>


                        <?php if ($row['status'] == 6) { ?>
                          <td><a href="add_note.php?note_id=<?php echo $row['id'] ?>"><img src="img/dashboard/edit.png"></a>&nbsp;&nbsp;
                            <a href="delete_note.php?note_id=<?php echo $row['id'] ?>"><img src="img/front/delete.png"></a>
                          </td>
                        <?php } else { ?>
                          <td><a href="note_details.php?noteid=<?php echo $row['id'] ?>"><img src="img/front/eye.png"></a></td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    
    <?php

    if (isset($_POST['search_2']))
     {    
          $search_field_2=$_POST['search_2_txt'];
          $published_query = "SELECT sn.published_date,sn.title,sn.catagory,sn.ispaid,sn.selling_price,c.name,rd.value,sn.id FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id INNER JOIN reference_data rd ON sn.ispaid=rd.id WHERE (sn.title LIKE '%$search_field_2%' OR c.name LIKE '%$search_field_2%') AND sn.status=9 AND sn.seller_id=$uid ORDER BY sn.published_date DESC";
          $published_result = mysqli_query($conn, $published_query);
    } 
    else
    {
      
          $published_query = "SELECT sn.published_date,sn.title,sn.catagory,sn.ispaid,sn.selling_price,c.name,rd.value,sn.id FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id INNER JOIN reference_data rd ON sn.ispaid=rd.id WHERE sn.status=9 AND sn.seller_id=$uid ORDER BY sn.published_date DESC";
          $published_result = mysqli_query($conn, $published_query);
    }
    if (!$published_result) {
      die('query failed' . mysqli_error($conn));
    }
    ?>
    <section id="table-design">
      <div class="content-box-md">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="sub-heading">
                <h3>Published Notes</h3>
              </div>
            </div>
            <div class="col-md-4">
              <form action=" " method="post">
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group  search-icon">
                      <img src="img/front/search-icon.png">
                      <input type="text" name="search_2_txt" class="form-control" id="search-notes" placeholder="Search notes here" required>
                    </div>
                  </div>
                  <div class="col-md-2 search-btn">
                    <button name="search_2">Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="table-format" style="border:none;">
                <table class="table" id="myDataTable" style="min-width: 1100px !important;">
                  <thead>
                    <tr>
                      <th scope="col">ADDED DATE</th>
                      <th scope="col">TITLE</th>
                      <th scope="col">CATAGORY</th>
                      <th scope="col">SELL TYPE</th>
                      <th scope="col">PRICE</th>
                      <th scope="col">ACTIONS</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($published_result)) { ?>
                      <tr>
                        <td><?php echo $row['published_date'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['value'] ?></td>
                        <td><?php echo $row['selling_price'] ?></td>
                        <td><a href="note_details.php?noteid=<?php echo $row['id'] ?>"><img src="img/front/eye.png"></a></td>
                      </tr>
                    <?php } ?>

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
              "pageLength":5,
            });

            $('#myDataTable2').DataTable({
              "scrollX": true,
              "pageLength":5,
            });
          });
        </script>


  </body>

  </html>
<?php } else {

  header("location:login.php");
} ?>
