<?php
include "config.php";
session_start();


$user_id=(isset($_GET['uid']))?$_GET['uid']:" ";

$add="SELECT u.first_name,u.last_name,u.email,up.profile_picture,up.dob,up.university,up.phone_no,up.address_line_1,up.address_line_2,up.city,up.state,up.zip_code,c.name FROM user u LEFT JOIN user_profile up  ON up.user_id=u.id LEFT JOIN country c ON up.country=c.id WHERE u.id=$user_id";

$member_query=mysqli_query($conn,"$add");

foreach($member_query as $member_row)
{
    $profile_img=$member_row['profile_picture'];
    $first_name=$member_row['first_name'];
    $last_name=$member_row['last_name'];
    $email=$member_row['email'];
    $dob=$member_row['dob'];
    $university=$member_row['university'];
    $phone=$member_row['phone_no'];
    $add1=$member_row['address_line_1'];
    $add2=$member_row['address_line_2'];
    $city=$member_row['city'];
    $state=$member_row['state'];
    $country=$member_row['name'];
    $code=$member_row['zip_code'];
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
        <section id="member-details">
            <div class="content-box-md">
                <div class="container"> 
                    <div class="row" style="padding-top: 60px;">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="note-heading">
                              <h4>Member Details</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div>
                              <div class="row">
                                <div class="col-lg-2 col-md-12 col-sm-5 col-12">
                                  <div class="member-img">
                                    <img src="<?php echo $profile_img; ?>">
                                  </div>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-7">
                                  <div id="member-left">
                                  <table width="100%">
                                    <tr>
                                      <td class="left">First Name:</td>
                                      <td class="right"><?php echo $first_name; ?></td>
                                    </tr>
                                    <tr>
                                      <td class="left">Last Name:</td>
                                      <td class="right"><?php echo $last_name; ?></td>
                                    </tr>
                                    <tr>
                                      <td class="left">Email</td>
                                      <td class="right"><?php echo $email; ?></td>
                                    </tr>
                                    <tr>
                                      <td class="left">DOB:</td>
                                      <td class="right"><?php echo $dob; ?></td>
                                    </tr>
                                    <tr>
                                      <td class="left">Phone Number:</td>
                                      <td class="right"><?php echo $phone; ?></td>
                                    </tr>
                                    <tr>
                                      <td class="left">College/University</td>
                                      <td class="right"><?php echo $university; ?></td>
                                    </tr>
                                    
                                  </table>
                                  </div>
                                  
                                </div>
                                <div class=" col-lg-5 col-md-5 col-sm-7 col-xs-7">
                                  <div id="member-right">
                                  <table width="100%">
                                    <tr>
                                      <td class="left">Address 1:</td>
                                      <td class="right"><?php echo $add1; ?></td>
                                    </tr>
                                    <tr>
                                      <td class="left">Address 2:</td>
                                      <td class="right"><?php echo $add2; ?></td>
                                    </tr>
                                    <tr>
                                      <td class="left">City:</td>
                                      <td class="right"><?php echo $city; ?></td>
                                    </tr>
                                    <tr>
                                      <td class="left">State</td>
                                      <td class="right"><?php echo $state; ?></td>
                                    </tr>
                                    <tr>
                                      <td class="left">Country</td>
                                      <td class="right"><?php echo $country; ?></td>
                                    </tr>
                                    <tr>
                                      <td class="left">Zip Code</td>
                                      <td class="right"><?php echo $code; ?></td>
                                    </tr>
                                    
                                  </table>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="table-design">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-heading" style="margin-bottom: 30px;">
                                <h3>Notes</h3>
                            </div>
                        </div>
                        
                    </div>
                    <?php
                    
                    $note_query=mysqli_query($conn,"SELECT sn.id,sn.title,sn.created_date,sn.published_date,sn.status,sn.selling_price,c.name,r.value FROM seller_note sn LEFT JOIN category c ON sn.catagory=c.id LEFT JOIN reference_data r ON sn.status=r.id WHERE sn.seller_id=$user_id");
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" ">
                            <table class="table" id="myDataTable">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">STATUS</th>
                                      <th scope="col">DOWNLOADED NOTES</th>
                                      <th scope="col">TOTAL EARNINGS</th>
                                      <th scope="col">DATE ADDED</th>
                                      <th scope="col">PUBLISHED DATE</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    $sr_no=1;
                                    foreach($note_query as $row)
                                    { 
                                      $note_id=$row['id'];
                                    ?>
                                      <tr>
                                      <td><?php echo $sr_no; ?></td>
                                      <td><a href="note_details.php?noteid=<?php echo $note_id; ?>"
                                        style="text-decoration: none;color: #6555a5;">    <?php echo $row['title']; ?></a>
                                      </td>
                                      <td><?php echo $row['name']; ?></td>
                                      <td><?php echo $row['value']; ?></td>
                                      <td><a href="download_notes.php?note=<?php echo $row['id']; ?>" style="text-decoration: none;color: #212529;">
                                        <?php
                                        $downloaded_query=mysqli_query($conn,"SELECT distinct downloader FROM download WHERE note_id=$note_id");
                                        $note_count=mysqli_num_rows($downloaded_query);
                                        echo $note_count;
                                        ?></a>
                                      </td>
                                      <td>
                                        <?php $earning=$note_count*$row['selling_price'];
                                            echo $earning;
                                        ?>
                                      </td>
                                      <td><?php echo $row['created_date']; ?></td>
                                      <td><?php echo $row['published_date']; ?></td>
                                      <td>
                                        <div class="dropdown">
                                          <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                            <a class="dropdown-item" href="#">Download Notes</a>
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
       </section>
        
       
        

        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer end-->
        
        <!--jquery-->
        <script src="js/jquery.min.js"></script>

        <!--popper js-->
        <script src="js/popper/popper.min.js"></script>

        <script src="js/datatables.min.js"></script>

        <!--bootstrap jquery-->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!--custom js-->
        <script src="js/script.js"></script>(
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
















