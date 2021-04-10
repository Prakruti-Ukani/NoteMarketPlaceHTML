<?php
include "../config.php";
session_start();

$search_str=(isset($_GET['search']))?$_GET['search']:" ";
$search_note=(isset($_GET['note']))?$_GET['note']:" ";
$search_seller=(isset($_GET['seller']))?$_GET['seller']:" ";
$search_buyer=(isset($_GET['buyer']))?$_GET['buyer']:" ";
$uid=(isset($_GET['uid']))?$_GET['uid']:" ";
$noteid=(isset($_GET['noteid']))?$_GET['noteid']:" ";

$query="SELECT DISTINCT d.note_id,d.note_title,d.note_catagory,d.ispaid,d.purchase_price,d.attachment_downloaded_date,d.downloader,d.seller,u.first_name as seller_fn,u.last_name as seller_ln,up.first_name as buyer_fn,up.last_name as buyer_ln FROM download d LEFT JOIN user u ON d.downloader=u.id LEFT JOIN user up ON d.seller=up.id WHERE  d.is_allowed_download=1";

$add_query=" ";
if(isset($_GET['search']) && !empty($_GET['search']))
{
    $add_query .=" AND (d.note_title LIKE '%{$search_str}%' OR d.note_catagory LIKE '%{$search_str}%')";
}

if(isset($_GET['note']) && !empty($_GET['note']))
{
    $add_query .=" AND (d.note_id=$search_note)";
}

if(isset($_GET['seller']) && !empty($_GET['seller']))
{
    $add_query .=" AND (d.seller=$search_seller)";
}

if(isset($_GET['buyer']) && !empty($_GET['buyer']))
{
    $add_query .=" AND (d.downloader=$search_buyer)";
}

if(isset($_GET['uid']) && !empty($_GET['uid']) && $uid!=" ")
{
    $add_query .=" AND d.downloader=$uid";
}

if(isset($_GET['noteid']) && !empty($_GET['noteid']) && $noteid!=" ")
{
    $add_query .=" AND d.note_id=$noteid";
}

$query=$query.$add_query;
$result=mysqli_query($conn,"$query");


?>

                    <div class="row">
                        <div class="col-md-12">
                          <div class="">
                            <table class="table" style="min-width: 1300px !important;" id="myDataTable">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">BUYER</th>
                                      <th></th>
                                      <th scope="col">SELLER</th>
                                      <th></th>
                                      <th scope="col">SELL TYPE</th>
                                      <th scope="col">PRICE</th>
                                      <th scope="col">DOWNLOADED DATE/TIME</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $sr_no=1;
                                    foreach($result as $row)
                                    {
                                    ?>
                                      <tr>
                                        <td><?php echo $sr_no; ?></td>
                                        <td>
                                          <a href="note_details.php?noteid=<?php echo $row['note_id'] ?>" style="color: #6555a5;text-decoration: none;">
                                            <?php echo $row['note_title']; ?>
                                          </a>
                                        </td>
                                        <td><?php echo $row['note_catagory']; ?></td>
                                        <td><?php echo $row['seller_fn']." ".$row['seller_ln']; ?></td>
                                        <td>
                                          <a href="member_detail.php?uid=<?php echo $row['downloader']; ?>">
                                            <img src="img/all/eye.png">
                                          </a>
                                        </td>
                                        <td><?php echo $row['buyer_fn']." ".$row['buyer_ln']; ?></td>
                                        <td>
                                          <a href="member_detail.php?uid=<?php echo $row['seller']; ?>">
                                            <img src="img/all/eye.png">
                                          </a>
                                        </td>
                                        <td>
                                        <?php
                                          if($row['ispaid']==1)
                                          {
                                            echo "Paid";
                                          }
                                          else
                                          {
                                            echo "Free";
                                          }
                                        ?>
                                        </td>
                                        <td><?php echo $row['purchase_price']; ?></td>
                                        <td><?php echo $row['attachment_downloaded_date']; ?></td>
                                        <td>
                                          <div class="dropdown">
                                            <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                              
                                              <a class="dropdown-item" href="download_notes.php?dnote_id=<?php echo $row['note_id']  ?>">Download Note</a>

                                              <a class="dropdown-item" href="note_details.php?noteid=<?php echo $row['note_id']; ?>">View More Details</a>
                                              
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

<script type="text/javascript">
  $(function(){
            $("#myDataTable").dataTable({
                "pageLength":5,
                "scrollX":true,
            });
          });
</script>