<?php
include "config.php";
session_start();

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

        <!-- data table -->
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
                                <h3>Published Notes</h3>
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
                                            <select id="seller" class="form-control filter arrow-down" style="width: 170px;" onchange="filterData();">
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
                                    <div class="col-md-5 col-lg-3 col-xl-3">
                                        <div class="form-group  search-with-dropdown">
                                          <br>
                                            <img src="img/all/search-icon.png">
                                            <input type="text" class="form-control" placeholder="Search" id="search_txt">
                                        </div>
                                    </div>
                                    <div class="col-md-1 search-btn-1 col-lg-1 col-xl-1">
                                      <br>
                                         <button type="button" onclick="filterData();">Search</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="published_table"></div>
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

        <!--datatable js-->
        <script src="js/datatables.min.js"></script>

        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!-- custom js-->
        <script src="js/script.js"></script>

       <script type="text/javascript">
         

         $(function(){
            filterData();
         });
         function filterData()
         {
            var search_txt=$("#search_txt").val();
            var select_seller=$("#seller").val();
            $.ajax({
              url:"ajax/published_data.php",
              type:"GET",
              data:
              {
                search:search_txt,
                seller:select_seller,
              },
              success:function(data){
                $("#published_table").html(data);
              }
            });
         }
       </script>
    </body>
</html> 
















