<?php

include "../config.php";
session_start();
$search_str = (isset($_GET['search'])) ? $_GET['search'] : " ";
$search_month=(isset($_GET['search_month'])) ? $_GET['search_month'] : " ";
   
$query="SELECT sn.id,sn.title,sn.catagory,sn.ispaid,sn.selling_price,sn.seller_id,sn.published_date,c.name,u.first_name,u.last_name FROM seller_note sn LEFT JOIN category c ON sn.catagory=c.id LEFT JOIN user u ON sn.seller_id=u.id WHERE sn.status=9 AND (MONTH(sn.published_date) = MONTH(CURRENT_DATE()) AND YEAR(sn.published_date) = YEAR(CURRENT_DATE()))";


$add_query = " ";
$arr = explode("-", $search_month);


if (isset($_GET['search']) && !empty($_GET['search'])) {
    $add_query .= " AND (sn.title LIKE '%{$search_str}%' OR c.name LIKE '%{$search_str}%' )";
}
if (isset($_GET['search_month']) && !empty($_GET['search_month'])) {
    $query = "SELECT sn.id,sn.title,sn.catagory,sn.ispaid,sn.selling_price,sn.seller_id,sn.published_date,c.name,u.first_name,u.last_name,u.id FROM seller_note sn LEFT JOIN category c ON sn.catagory=c.id LEFT JOIN user u ON sn.seller_id=u.id WHERE sn.status=9 AND (MONTH(sn.published_date)=$arr[0] AND YEAR(sn.published_date)=$arr[1] )";
}

$query=$query." ".$add_query." ORDER BY sn.published_date DESC";
$result=mysqli_query($conn,$query);



?>

                  <div class="row">
                        <div class="col-md-12">
                            <div class="">
                            <table class="table" id="myDataTable" style="min-width: 1500px !important;">
                                  <thead>
                                    <tr>
                                      <th scope="col">SR No.</th>
                                      <th scope="col">TITLE</th>
                                      <th scope="col">CATAGORY</th>
                                      <th scope="col">ATTACHMENT SIZE</th>
                                      <th scope="col">SELL TYPE</th>
                                      <th scope="col">PRICE</th>
                                      <th scope="col">PUBLISHER</th>
                                      <th scope="col">PUBLISHED DATE</th>
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
                                          <a href="note_details.php?noteid=<?php echo $row['id']; ?>" style="color: #6555a5;text-decoration: none;"><?php echo $row['title']; ?></a>
                                      </td>
                                      <td><?php echo $row['name']; ?></td>
                                      <td>10 KB</td>
                                      <td><?php if($row['ispaid']==4)
                                        {
                                          echo "Paid";
                                        }
                                        else
                                        {
                                          echo "Free";
                                        } ?></td>
                                      <td><?php echo $row['selling_price']; ?></td>
                                      <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                      <td><?php echo $row['published_date']; ?></td>
                                      <td><a href="download_notes.php?note=<?php echo $row['id']; ?>" style="text-decoration: none;color: #212529;"><?php
                                          $seller_id=$row['seller_id'];
                                          $note_id=$row['id'];
                                          $attach_query=mysqli_query($conn,"SELECT DISTINCT downloader FROM download WHERE seller=$seller_id AND note_id=$note_id AND is_attachment_downloaded=1");
                                          $attach_count=mysqli_num_rows($attach_query);
                                          echo $attach_count;
                                      ?></a></td>
                                      <td>
                                        
                                        <div class="dropdown">
                                              <img src="img/all/dots.png" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <div class="dropdown-menu" aria-labelledby="DownloadLink">
                                                
                                                  <a class="dropdown-item" href="dashboard.php?dnote_id=<?php echo $row['id']  ?>">Download Note</a>

                                                  <a class="dropdown-item" href="note_details.php?noteid=<?php echo $row['id']; ?>" >View More Details</a>

                                                  <a class="dropdown-item" id="unpublish-note" href="#" type="button" data-toggle="modal" data-target="#confirm-publish" data-notetitle='<?php echo $row['title']; ?>' data-noteid=<?php echo $row['id']; ?>>Unpublish</a>

                                                  
                                              
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
    <div class="modal fade " id="confirm-publish" tabindex="-1" role="dialog" aria-labelledby="confirmPublishLabel" aria-hidden="true">
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

          $(document).on("click", "#unpublish-note", function () {
               var note_id=$(this).data('noteid');
                var note_title=$(this).data('notetitle');
                $("#get_note_id").val(note_id);
                $("#get_note_title").html(note_title);
          });

          $(document).ready(function() {
            $('#myDataTable').DataTable({
              "scrollX": true,
              "pageLength":5
            });
          });

          $('#myDataTable').on('show.bs.dropdown', function() {
              $('#myDataTable').css("min-height", "115px");
          });
          $('#myDataTable').on('hide.bs.dropdown', function() {
              $('#myDataTable').css("min-height", "0");
          });
        </script>
