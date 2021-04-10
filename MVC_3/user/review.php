
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!--rating star -->
  <link rel="stylesheet" href="css/rate/jsRapStar.css">
  <style>

.content
{
  padding: 30px;
  border:1px solid #d1d1d1;
  border-radius: 3px;
}
.profile-img
{
  height: 50px;
  width: 50px;
  border-radius: 25px;
}

h3
{
  font-family: 'Open Sans';
  font-size: 17px;
  color: #333333;
  font-weight: 600;
  margin-bottom: 0;
}
center
{
  font-family: 'Open Sans';
  font-size: 22px;
  color: #333333;
}
p
{
  font-family: 'Open Sans';
  font-size: 14px;
  color: #333333;
  font-weight: 400;
}


</style>
<!--font-->
<!--font-->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <!--jquery-->
  <script src="js/jquery.min.js"></script>

  <!--rating star-->
  <script src="js/rate/jsRapStar.js"></script>


</head>
<body>

<?php 
include "config.php";
session_start();

$note_id = isset($_GET['noteid']) ? $_GET['noteid'] : " ";
$uid = isset($_SESSION['userid']) ? $_SESSION['userid'] : " ";

$review_query=mysqli_query($conn,"SELECT r.reviewby_id,r.comments,r.rating,u.first_name,u.last_name,up.profile_picture FROM seller_note_review r LEFT JOIN user u ON r.reviewby_id=u.id LEFT JOIN user_profile up ON up.user_id=u.id  WHERE note_id=$note_id");

$review_count=mysqli_num_rows($review_query);
$msg=" ";
if($review_count==0)
{
    $msg= "<h3><center> NO REVIEWS </center></h3>";
}
if(!$review_query)
{
  die(mysqli_query($conn));
}
?>

                <div class="content">

                  <?php echo $msg; ?>
                  <?php
                  foreach($review_query as $review_row)
                   { ?>
                        <!--content 1-->
                        <div class="content-1">
                          <div class="row" style="display: flex;">
                            <div class="col-md-2 col-sm-2 col-xs-2" >
                              <img src="<?php if($review_row['profile_picture']==NULL){
                                echo "../upload/member/default/default-user.png";
                              }
                              else
                              {
                                echo $review_row['profile_picture'];
                              } ?>" class="profile-img">
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 30px;margin-top: -15px;font-family: 'Open Sans';">
                              <h3><?php echo $review_row['first_name']." ".$review_row['last_name']; ?></h3>
                              <div class="stars text-left">
                                <div id="<?php echo $review_row['reviewby_id'] ?>" start="<?php echo $review_row['rating'] ?>" style="margin-left: 0px;"></div>
                              </div>
                              <p><?php echo $review_row['comments'] ?></p>    
                            </div>
                            
                          </div>
                          
                        </div>
                        <hr>
                        <script type="text/javascript">
                          $('#<?php echo $review_row['reviewby_id'] ?>').jsRapStar({
                                length: 5,
                                value: '<?php echo $review_row['rating'] ?>',
                                enabled: false,
                                starHeight:24,
                                colorFront: 'orange'
                          });
                          </script>      
                        
                 <?php } 
                  ?>
                                          
                </div>



</body>

</html>
