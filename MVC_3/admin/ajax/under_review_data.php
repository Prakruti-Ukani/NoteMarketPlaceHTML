<?php
include "../config.php";
session_start();

$search=(isset($_GET['search']))?$_GET['search']:" ";
$selected_seller=(isset($_GET['selected_seller']))?$_GET['selected_seller']:" ";
$uid=(isset($_GET['uid']))?$_GET['uid']:" ";

$query="SELECT sn.id,sn.title,sn.seller_id,sn.created_date,sn.status,c.name,u.first_name,u.last_name,r.value FROM seller_note sn LEFT JOIN category c ON sn.catagory=c.id LEFT JOIN user u ON sn.seller_id=u.id LEFT JOIN reference_data r ON sn.status=r.id WHERE (sn.status=8 OR sn.status=7)";

$add_query=" ";

if(isset($_GET['search']) && !empty($_GET['search']))
{
	$add_query .=" AND (sn.title LIKE '%{$search}%' OR c.name LIKE '%{$search}%')";
}

if(isset($_GET['selected_seller']) && !empty($_GET['selected_seller']))
{
	$add_query .=" AND (sn.seller_id=$selected_seller)";  
}

if(isset($_GET['uid']) && !empty($_GET['uid']) && $uid!=" ")
{
  $add_query .=" AND (sn.seller_id=$uid)";  
}

$query=$query . $add_query." ORDER BY sn.created_date DESC";
// echo $query;
$result=mysqli_query($conn,$query);



?>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                            <table class="table" id="myDataTable" style="min-width: 1600px !important;">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">NOTE TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">SELLER</th>
                                      <th></th> 
                                      <th scope="col">DATE ADDED</th>
                                      <th scope="col">STATUS</th>
                                      <th scope="col" style="text-align: center;">ACTION</th>
                                     
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $sr_no=1;
                                      foreach ($result as $row) {
                                      	$note_id=$row['id'] ;
                                      ?>
                                        <tr>
                                          <td><?php echo $sr_no; ?></td>
                                          <td><a href="note_details.php?noteid=<?php echo $note_id ?>" style="color: #6555a5;text-decoration: none;"><?php echo $row['title']; ?></a></td>
                                          <td><?php echo $row['name']; ?></td>
                                          <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                          <td>
                                            <a href="member_detail.php?uid=<?php echo $row['seller_id']; ?>"><img src="img/all/eye.png" height="20"></a>
                                          </td>
                                          <td><?php echo $row['created_date']; ?></td>
                                          <td><?php echo $row['value'] ?></td>
                                          <td>
                                            <div style="display: flex;text-align: center;">
                                            	<form action="" method="post">

		                                              <button class="btn btn-green" type="button" onclick="publishModal(<?php echo $note_id ?>);">Approve</button>

		                                              <button class="btn btn-red" type="button" onclick="rejectModal(<?php echo $note_id ?>,'<?php echo $row['title'] ?>');">Reject</button>
		                                              
		                                              <button type="button" class="btn btn-gray" name="inreview" onclick="inreviewModal(<?php echo $note_id ?>);">InReview</button>

		                                        </form>
                                              <div class="dropdown">
	                                              <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 30px;">
	                                              <div class="dropdown-menu" aria-labelledby="DownloadLink">
	                                              	<a class="dropdown-item" href="note_details.php?noteid=<?php echo $note_id ?>">View more Details</a>

	                                                <a class="dropdown-item" href="under_review.php?dnote_id=<?php echo $row['id']  ?>">Download Note</a>
	                                              </div>
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

<form action=" " method="POST">
    <div class="modal fade " id="confirm-inreview" tabindex="-1" role="dialog" aria-labelledby="confirmInreviewLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="confirmInreviewLabel">Via marking the note In Review – System will let user know that review process has been initiated. <br>Please press yes to continue. </h6>
          </div>
          <div class="modal-body">
              	<input type="hidden" name="inreview_note_id" id="inreview_note_id">
                <button class="btn btn-primary" style="width: 60px;" name="inreview-yes">YES</button>
                <button class="btn btn-primary" style="width: 60px;">NO</button>
          </div>

        </div>
      </div>
    </div>
  </form>

<form action=" " method="POST">
    <div class="modal fade " id="confirm-publish" tabindex="-1" role="dialog" aria-labelledby="confirmPublishLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="confirmPublishLabel">If you approve the notes – System will publish the notes over portal.<br> Please press yes to continue. </h6>
          </div>
          <div class="modal-body">
                <input type="hidden" name="publish_note_id" id="publish_note_id">
                <button class="btn btn-primary" style="width: 60px;" name="publish-yes">YES</button>
                <button class="btn btn-primary" style="width: 60px;">NO</button>
          </div>

        </div>
      </div>
    </div>
  </form>

<form action=" " method="POST">
    <div class="modal fade " id="confirm-reject" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="title_lbl" style="color: #6555a5;font-family: 'Open Sans';font-weight: 600;"></h4>
          </div>
          <div class="modal-body">
                <input type="hidden" name="reject_note_id" id="reject_note_id">
                <div class="form-group">
                  <label>Remarks* </label>
                  <textarea class="form-control" style="width: 100%;height: 60px;" name="remark"></textarea>
                </div>
                <button class="btn btn-danger" style="width: 60px;" name="reject-yes">YES</button>
                <button class="btn btn-gray" style="width: 60px;">NO</button>
          </div>

        </div>
      </div>
    </div>
  </form>


<script type="text/javascript">
  $(document).ready(function() {
    $('#myDataTable').DataTable({
      "scrollX": true,
      "pageLength":5
    });
  });
  // $(document).on("click","#inreview_btn",function(){
  // 		var inreview_id=$(this).data('inreview_id');
  // 		$("#inreview_note_id").val(inreview_id);
  // });


  function inreviewModal(inreview_id)
  {
  	$("#confirm-inreview").modal('show');
  	$("#inreview_note_id").val(inreview_id);
  }
  function publishModal(publish_id)
  {
    $("#confirm-publish").modal('show');
    $("#publish_note_id").val(publish_id);
  }
  function rejectModal(reject_id,reject_title)
  {
    $("#confirm-reject").modal('show');
    $("#reject_note_id").val(reject_id);
    $("#title_lbl").html(reject_title);
  }

</script>