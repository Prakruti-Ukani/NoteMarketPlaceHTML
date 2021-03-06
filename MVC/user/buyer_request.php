<?php
include "config.php";

  //pagination
  $no_row=5;
  if(isset($_GET['page']))
  {
    $page=$_GET['page'];
  }
  else
  {
    $page=1;
  }
  if($page== "" || $page == 1)
  {
    $page_1 = 0;
  }
  else
  {
    $page_1=($page * $no_row) - $no_row;
  }
  if(isset($_POST['search']))
  {

    $search_txt=$_POST['search_txt'];

    $query_count="SELECT * FROM download WHERE note_title='$search_txt'" ;
    $find_count=mysqli_query($conn,$query_count);
    $count=mysqli_num_rows($find_count);
    $count=ceil($count / $no_row);

    $query="SELECT d.id,d.note_title,d.note_catagory,d.downloader,u.email,d.ispaid,d.purchase_price,d.attachment_downloaded_date FROM download d INNER JOIN user u ON u.id=d.downloader WHERE d.note_title='$search_txt'";
  }
  else
  {
    $query_count="SELECT * FROM download" ;
    $find_count=mysqli_query($conn,$query_count);
    $count=mysqli_num_rows($find_count);
    $count=ceil($count / $no_row);

    $query="SELECT d.id,d.note_title,d.note_catagory,d.downloader,u.email,d.ispaid,d.purchase_price,d.attachment_downloaded_date FROM download d INNER JOIN user u ON u.id=d.downloader";
  }
    
$result=mysqli_query($conn,$query);
if(!$result)
{
  die(mysqli_error($conn));
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

       <!--custom css-->
        <link rel="stylesheet" href="css/custom_css/style.css">
        <link rel="stylesheet" href="css/responsive.css">

    </head>
    <body>
        <!--navbar-->
        <?php include "header.php"; ?>
        <!--navbar end-->
        
        <section id="table-design">
            <div class ="content-box-md" >
                <div class="container">
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-8 col-sm-8 col-12">
                            <div class="heading">
                                <h3>Buyer Requests</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 col-sm-4">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-10 col-sm-10 col-12">
                                        <div class="form-group  search-icon">
                                            <img src="img/front/search-icon.png">
                                            <input type="text" class="form-control" id="search-notes" placeholder="   Search notes here" required name="search_txt">
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
                            <div class="table-format table-responsive">
                            <table class="table" style="min-width: 1100px;">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR NO.</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">BUYER</th>
                                      <th scope="col">PHONE NO.</th>
                                      <th scope="col">SELL TYPE</th>
                                      <th scope="col">PRICE</th>
                                      <th scope="col">DOWNLOAD DATE/TIME</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php while($row=mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                      <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['note_title']; ?></td>
                                        <td><?php echo $row['note_catagory']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td>+91 2882929209</td>
                                        <td>Paid</td>
                                        <td><?php echo $row['purchase_price']; ?></td>
                                        <td><?php echo $row['attachment_downloaded_date']; ?></td>
                                        <td><img src="img/login/eye.png"></td>
                                        <td>
                                          <div class="dropdown">
                                            <a><img src="img/front/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                            <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                              <a class="dropdown-item" href="#">Allow Download</a>
                                            </div>
                                          </div>
                                        </td>
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
            <!--pagination-->
           <div class="page">
            <div class="container">
                <div class="row">
                    <div class="text-center col-md-12">
                         <div  id="pagination-list">
                              <ul class="pagination">
                                <?php 
                                  echo "<li class='page-item'><a class='page-link' href='dashboard.php?page=".($page-1)."' ><img src='img/front/left-arrow.png'></a></li>";
                                    for($i=1;$i<=$count;$i++)
                                    {
                                      if($i==$page)
                                      {
                                        echo "<li class='page-item active'><a class='page-link' href='dashboard.php?page=$i'>$i</a></li>";
                                      }
                                      else
                                      {
                                        echo "<li class='page-item'><a class='page-link' href='dashboard.php?page=$i'>$i</a></li>";
                                      }
                                    }
                                  echo "<li class='page-item'><a class='page-link' href='dashboard.php?page=".($page+1)."' ><img src='img/front/right-arrow.png'></a></li>";
                                ?>

                              </ul>
                         </div>
                    </div>
                </div>
            </div>
           </div>
           <!--pagination end-->
        <!--footer-->
        <?php include "footer.php";?>
        <!--footer end-->
        



        <!--jquery-->
        <script src="js/jquery.js"></script>

       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

      <!--bootstrap jquery-->
      <script src="js/bootstrap/bootstrap.min.js"></script>



       
    </body>
</html> 
















