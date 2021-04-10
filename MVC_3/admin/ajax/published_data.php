<?php 
include "../config.php";
session_start();
$search_str = (isset($_GET['search'])) ? $_GET['search'] : " ";
$seller_id=(isset($_GET['seller']))?$_GET['seller']:" ";
$uid=(isset($_GET['uid']))?$_GET['uid']:" ";

$query="SELECT sn.id,sn.seller_id,sn.title,sn.catagory,sn.ispaid,sn.selling_price,sn.seller_id,sn.published_date,sn.action_by,c.name,u.first_name,u.last_name,up.first_name as admin_fn,up.last_name as admin_ln FROM seller_note sn LEFT JOIN category c ON sn.catagory=c.id LEFT JOIN user u ON sn.seller_id=u.id LEFT JOIN user up ON sn.action_by=up.id WHERE sn.status=9";

$add_query=" ";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $add_query .= " AND (sn.title LIKE '%{$search_str}%' OR c.name LIKE '%{$search_str}%' )";
}
if(isset($_GET['seller']) && !empty($_GET['seller']))
{
    $add_query .=" AND sn.seller_id=$seller_id";
}
if(isset($_GET['uid']) && !empty($_GET['uid']) && $uid!=" ")
{
    $add_query .=" AND sn.seller_id=$uid";
}

$query=$query." ".$add_query." ORDER BY sn.published_date DESC";
// echo $query;
$result=mysqli_query($conn,$query);


?>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="">
                            <table class="table" id="myDataTable" style="min-width: 1400px !important;">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">SELL TYPE</th>
                                      <th scope="col">PRICE</th>
                                      <th scope="col">SELLER</th>
                                       <th></th>
                                      <th scope="col">PUBLISHED DATE </th>
                                      <th scope="col">APPROVED BY</th>
                                      <th scope="col">NUMBER OF DOWNLOADS</th>
                                      <th></th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $sr_no=1;
                                      foreach ($result as $row) {
                                      ?>
                                      <tr>
                                        <td><?php echo $sr_no; ?></td>
                                        <td>
                                          <a href="note_details.php?noteid=<?php echo $row['id'] ?>" style="color: #6555a5;text-decoration: none;">
                                            <?php echo $row['title']; ?>
                                          </a>
                                        </td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php if($row['ispaid']==4)
                                        {
                                          echo "Paid";
                                          }
                                          else
                                          {
                                            echo "Free";
                                          } ?>
                                        </td>
                                        <td><?php echo $row['selling_price']; ?></td>
                                        <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                        <td>
                                            <a href="member_detail.php?uid=<?php echo $row['seller_id']; ?>">
                                            <img src="img/all/eye.png">
                                          </a>
                                        </td>
                                        <td><?php echo $row['published_date']; ?></td>
                                        <td><?php echo $row['admin_fn']." ".$row['admin_ln']; ?></td>
                                        <td>
                                          <a href="download_notes.php?note=<?php echo $row['id']; ?>" style="text-decoration: none;color: #212529;">
                                            <?php
                                              $seller_id=$row['seller_id'];
                                              $note_id=$row['id'];
                                              $attach_query=mysqli_query($conn,"SELECT DISTINCT downloader FROM download WHERE seller=$seller_id AND note_id=$note_id AND is_attachment_downloaded=1");
                                              $attach_count=mysqli_num_rows($attach_query);
                                              echo $attach_count;
                                            ?></a>
                                        </td>
                                        <td>
                                          <div class="dropdown">
                                            <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                              <a class="dropdown-item" href="published_data.php?dnote_id=<?php echo $row['id']  ?>">Download Note</a>

                                              <a class="dropdown-item" href="note_details.php?noteid=<?php echo $row['id'] ?>">View More Details</a>
                                              
                                              <a class="dropdown-item" id="unpublish-note" href="#" type="button" data-toggle="modal" data-target="#confirm-publish"  data-notetitle='<?php echo $row['title']; ?>' data-noteid=<?php echo $row['id']; ?>  >Unpublish</a>
                                            </div>
                                          </div>
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

<!-- Modal -->
    <form action=" " method="POST">
    <div class="modal fade " id="confirm-publish" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="get_note_title" style="color: #6555a5;"></h5>
          </div>
          <div class="modal-body">
            
                  
                  <input type="hidden" name="get_note_id" id="get_note_id">
                  <div class="form-group">
                    <label>remarks*</label>
                    <textarea class="form-control" style="width: 100%;height: 70px;" name="remarks"></textarea>
                  </div>
                  <button class="btn btn-danger" style="width: 100px;" name="unpublish-yes">Unpublish</button>
                  <button class="btn btn-gray" style="width: 100px;">Cancel</button>
          
          </div>

        </div>
      </div>
    </div>
  </form>



<script type="text/javascript">
  $(function(){
            $("#myDataTable").dataTable({
              "pageLength":5,
              "scrollX":true,
            });
         });
  $(document).on("click","#unpublish-note",function(){
      var note_id=$(this).data('noteid');
      var note_title=$(this).data('notetitle');
      $("#get_note_id").val(note_id);
      $("#get_note_title").html(note_title);
  });
</script>
