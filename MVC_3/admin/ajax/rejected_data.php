<?php
include "../config.php";
session_start();

$search_str = (isset($_GET['search'])) ? $_GET['search'] : " ";
$seller_id=(isset($_GET['seller']))?$_GET['seller']:" ";


$query="SELECT sn.id,sn.seller_id,sn.title,sn.catagory,sn.created_date,sn.remarks,c.name,u.first_name,u.last_name,up.first_name as admin_fn,up.last_name as admin_ln FROM seller_note sn  LEFT JOIN category c ON sn.catagory=c.id LEFT JOIN user u ON sn.seller_id=u.id LEFT JOIN  user up ON sn.action_by=up.id  WHERE sn.status=10";

$add_query=" ";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $add_query .= " AND (sn.title LIKE '%{$search_str}%' OR c.name LIKE '%{$search_str}%' )";
}
if(isset($_GET['seller']) && !empty($_GET['seller']))
{
    $add_query .=" AND sn.seller_id=$seller_id";
}

$query=$query.$add_query;
// echo $query;
$result=mysqli_query($conn,"$query");

?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                            <table class="table" id="myDataTable" style="min-width: 1300px !important ;">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">SELLER</th>
                                      <th></th>
                                      <th scope="col">DATE ADDED</th>
                                      <th scope="col">REJECTED BY</th>
                                      <th scope="col">REMARK</th>
                                      
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $sr_no=1;
                                    foreach($result as $row)
                                    { ?>
                                      <tr>
                                        <td><?php echo $sr_no; ?></td>
                                        <td><a href="note_details.php?noteid=<?php echo $row['id'] ?>" style="color: #6555a5;text-decoration: none;"><?php echo $row['title']; ?></a></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                        <td>
                                          <a href="member_detail.php?uid=<?php echo $row['seller_id']; ?>">
                                            <img src="img/all/eye.png">
                                          </a>
                                        </td>
                                        <td><?php echo $row['created_date']; ?></td>
                                        <td><?php echo $row['admin_fn']." ".$row['admin_ln']; ?></td>
                                        <td><?php echo $row['remarks']; ?></td>
                                        <td>
                                          <div class="dropdown">
                                            <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-approve" data-noteid="<?php echo $row['id'] ?>" id="publish_note">Approve</a>
                                              
                                              <a class="dropdown-item" href="dashboard.php?dnote_id=<?php echo $row['id']  ?>">Download Note</a>

                                              <a class="dropdown-item" href="note_details.php?noteid=<?php echo $row['id'] ?>">View More Details</a>
                                              
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

  <!-- Modal -->
  <form action=" " method="POST">
    <div class="modal fade " id="confirm-approve" tabindex="-1" role="dialog" aria-labelledby="confirmApproveLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="confirmApproveLabel">If you approve the notes – System will publish the notes over portal.<br> Please press yes to continue.</h6>
          </div>
          <div class="modal-body">
                  <input type="hidden" name="get_note_id" id="get_note_id">
                  <button class="btn btn-primary" style="width: 60px;" name="publish-yes">YES</button>
                  <button class="btn btn-primary" style="width: 60px;">NO</button>
          </div>

        </div>
      </div>
    </div>
  </form>

  <script type="text/javascript">
    $("#myDataTable").dataTable({
      "pageLength":5,
      "scrollX":true,
    });

    $('#myDataTable').on('show.bs.dropdown', function() {
        $('#myDataTable').css("min-height", "115px");
    });
    $('#myDataTable').on('hide.bs.dropdown', function() {
        $('#myDataTable').css("min-height", "0");
    });

    $(document).on("click","#publish_note",function(){
        var publish_id=$(this).data('noteid');
        $("#get_note_id").val(publish_id);

    });

  </script>