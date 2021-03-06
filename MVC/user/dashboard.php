<?php
include "config.php";
session_start();

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
	


	if(isset($_POST['search_1']))
	{
    $search_field_1=$_POST['search_1_txt'];
    $query_count="SELECT * FROM seller_note WHERE status BETWEEN 6 and 8 AND title='$search_field_1'" ;
    $find_count=mysqli_query($conn,$query_count);
    $count=mysqli_num_rows($find_count);
    $count=ceil($count / $no_row);
		$query="SELECT sn.id,sn.created_date,sn.title,sn.catagory,sn.status,c.name,rd.value FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id INNER JOIN reference_data rd ON sn.status=rd.id WHERE sn.title  LIKE '%$search_field_1%' AND status BETWEEN 6 and 8 AND sn.isactive=1 ORDER BY sn.id DESC LIMIT $page_1,$no_row";
      $result=mysqli_query($conn,$query);
	    if(!$result)
	    {
	        die('query failed'.mysqli_error());
	    }
	}
	else
	{
    $query_count="SELECT * FROM seller_note WHERE status BETWEEN 6 and 8";
    $find_count=mysqli_query($conn,$query_count);
    $count=mysqli_num_rows($find_count);
    $count=ceil($count / $no_row);
		$query="SELECT sn.id,sn.created_date,sn.title,sn.catagory,sn.status,c.name,rd.value FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id INNER JOIN reference_data rd ON sn.status=rd.id WHERE sn.isactive=1 AND status BETWEEN 6 and 8 ORDER BY sn.id DESC LIMIT $page_1,$no_row";
	    $result=mysqli_query($conn,$query);
	    if(!$result)
	    {
	        die('query failed'.mysqli_error());
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


       <!--custom css-->
        <link rel="stylesheet" href="css/custom_css/style.css">
        <link rel="stylesheet" href="css/responsive.css">

    </head>
    <body>
        <!--navbar-->
        <?php include "header.php"; ?>
        <!--navbar end-->
        
        <section id="dashboard">
            <div class ="content-box-md" style="margin-bottom: -50px;">
                <div class="container">
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-8">
                            <div class="heading" style="margin-bottom: 20px;">
                                <h3>Dashboard</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                              <button onclick="window.location.href='add_note.php';" style="color:#fff;background-color: #6255a5;font-family: 'Open Sans';border-radius: 3px;height: 35px;font-size: 16px;font-family: 'Open Sans';line-height: 22px; float: right;width: 100px;border:transparent;" >Add Notes</button>
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
                                <h3>100</h3>
                                <p>number of notes sold</p>
                              </div>
                              <div class="col-lg-6 text-center col-sm-6 col-6">
                                <h3>$10,00,000</h3>
                                <p>Money Earned</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-2 text-center col-sm-12 col-12 col-md-4">
                          <div class="dashboard-box">
                            <h3>38</h3>
                            <p>My Downloads</p>
                          </div>
                        </div>
                        <div class="col-lg-2 text-center col-sm-12 col-12 col-md-4">
                          <div class="dashboard-box">
                            <h3>12</h3>
                            <p>My Rejected Notes</p>
                          </div>
                        </div>
                        <div class="col-lg-2 text-center col-sm-12 col-12 col-md-4">
                          <div class="dashboard-box">
                            <h3>102</h3>
                            <p>Buyer Requests</p>
                          </div>
                        </div>
                      </div>
                </div>
                 
            </div>
        </section>
        <section id="table-design">
            <div class ="content-box-md">
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
                                            <input type="text" name="search_1_txt" class="form-control" id="search-notes" placeholder="   Search notes here">
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
                            <div class="table-format table-responsive">
                            <table class="table">
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
                                    
                                    <?php while($row = mysqli_fetch_assoc($result))  
                                    {?>
                                    <tr>
                                      <td><?php echo $row['created_date'];?></td>
                                      <td><?php echo $row['title'];?></td>
                                      <td><?php echo $row['name'];?></td>
                                      <td><?php echo $row['value'];?></td>
                                      
                                        
	                                   <?php if($row['status']==6)
	                                    {?>
	                                      <td><a href="add_note.php?note_id=<?php echo $row['id']?>"><img src="img/dashboard/edit.png"></a>&nbsp;&nbsp;
                                          <a href="delete_note.php?note_id=<?php echo $row['id']?>"><img src="img/front/delete.png"></a></td>
	                                   <?php }else{ ?>
	                                      <td><img src="img/front/eye.png"></td>
	                                    <?php } ?>
	                                </tr>
                                    <?php }?>
                                    
                                    
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
           <?php

           $limit=5;
            if(isset($_GET['pub_page']))
            {
              $pub_page=$_GET['pub_page'];
            }
            else
            {
              $pub_page=1;
            }
            if($pub_page== "" || $pub_page == 1)
            {
              $page_2 = 0;
            }
            else
            {
              $page_2=($page * $no_row) - $no_row;
            }
            
            if(isset($_POST['search_2']))
            {
              $search_field_2=$_POST['search_2_txt'];
              $find_pub_count=mysqli_query($conn,"SELECT * FROM seller_note WHERE status=9 AND title LIKE '%$search_field_2%'");
              $pub_count=mysqli_num_rows($find_pub_count);
              $pub_count=ceil($pub_count / $limit);
              $published_query="SELECT sn.created_date,sn.title,sn.catagory,sn.ispaid,sn.selling_price,c.name,rd.value FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id INNER JOIN reference_data rd ON sn.ispaid=rd.id WHERE title LIKE '%$search_field_2%' AND status=9 LIMIT $page_2,$limit";
              $published_result=mysqli_query($conn,$published_query);

            }
            else
            {
              $find_pub_count=mysqli_query($conn,"SELECT * FROM seller_note WHERE status=9");
              $pub_count=mysqli_num_rows($find_pub_count);
              $pub_count=ceil($pub_count / $limit);
              $published_query="SELECT sn.created_date,sn.title,sn.catagory,sn.ispaid,sn.selling_price,c.name,rd.value FROM seller_note sn INNER JOIN category c ON sn.catagory=c.id INNER JOIN reference_data rd ON sn.ispaid=rd.id WHERE status=9 LIMIT $page_2,$limit";
              $published_result=mysqli_query($conn,$published_query);
            }
            
            if(!$published_result)
            {
                die('query failed'.mysqli_error($conn));
            }
            ?>
           <section id="table-design">
            <div class ="content-box-md">
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
                                            <input type="text" name="search_2_txt" class="form-control" id="search-notes" placeholder=" Search notes here" required>
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
                            <div class="table-format table-responsive">
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">ADDED DATE</th>
                                      <th scope="col">TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">SELL TYPE</th>
                                      <th scope="col">PRICE</th>
                                      <th scope="col">ACTIONS</th>
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    while($row=mysqli_fetch_assoc($published_result)) {?>
                                      <tr>
                                      <td><?php echo $row['created_date'] ?></td>
                                      <td><?php echo $row['title'] ?></td>
                                      <td><?php echo $row['name'] ?></td>
                                      <td><?php echo $row['value'] ?></td>
                                      <td><?php echo $row['selling_price'] ?></td>
                                      <td><img src="img/front/eye.png"></td>
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
                                echo "<li class='page-item'><a class='page-link' href='dashboard.php?page=".($pub_page-1)."' ><img src='img/front/left-arrow.png'></a></li>";
                                	for($j=1;$j<=$pub_count;$j++)
                                	{
                                		if($j==$pub_page)
                                		{
                                			echo "<li class='page-item active'><a class='page-link' href='dashboard.php?pub_page={$j}'>{$j}</a></li>";
                                		}
                                		else
                                		{
                                			echo "<li class='page-item'><a class='page-link' href='dashboard.php?pub_page={$j}'>{$j}</a></li>";
                                		}
                                	}
                                echo "<li class='page-item'><a class='page-link' href='dashboard.php?pub_page=".($page+1)."'><img src='img/front/right-arrow.png'></a></li>";
                                ?>
                              </ul>
                         </div>
                    </div>
                </div>
            </div>
           </div>
           <!--pagination end-->
        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        

        <!--jquery-->
        <script src="js/jquery.js"></script>

       
        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>


    </body>
</html> 
















