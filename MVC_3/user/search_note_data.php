<?php

include "config.php";
session_start();

$limit = 6;
$sr_no = 1;
$page = (isset($_GET['page'])  && ($_GET['page'] > 0) && !empty($_GET['page'])) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $limit;
  


$search_str = (isset($_GET['search'])) ? $_GET['search'] : " ";
$type = (isset($_GET['selected_type'])) ? $_GET['selected_type'] : " ";
$category = (isset($_GET['selected_category'])) ? $_GET['selected_category'] : " ";
$university = (isset($_GET['selected_university'])) ? $_GET['selected_university'] : " ";
$course = (isset($_GET['selected_course'])) ? $_GET['selected_course'] : " ";
$country = (isset($_GET['selected_country'])) ? $_GET['selected_country'] : " ";
$rate = (isset($_GET['selected_rate'])) ? $_GET['selected_rate'] : " ";

$get_query = "SELECT DISTINCT sn.id as sn_id,sn.title,sn.number_of_pages,sn.university,sn.catagory,sn.published_date,sn.display_picture,c.name FROM seller_note sn LEFT JOIN category c ON sn.catagory=c.id LEFT JOIN seller_note_review r ON r.note_id=sn.id WHERE sn.isactive=1 AND sn.status=9";


$add_query = " ";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $add_query .= " AND (sn.title LIKE '%{$search_str}%' OR c.name LIKE '%{$search_str}%' )";
}

if (isset($_GET['selected_type']) &&  !empty($_GET['selected_type'])) {
    $add_query .= " AND (sn.note_type = $type) ";
}
if (isset($_GET['selected_category']) &&  !empty($_GET['selected_category'])) {
    $add_query .= " AND (sn.catagory = $category ) ";
}
if (isset($_GET['selected_university']) && !empty($_GET['selected_university'])) {
    $add_query .= " AND sn.university LIKE '%{$university}%'";
}
if (isset($_GET['selected_course']) && !empty($_GET['selected_course'])) {
    $add_query .= " AND sn.course LIKE '%{$course}%'";
}
if (isset($_GET['selected_country'])  && !empty($_GET['selected_country'])) {
    $add_query .= " AND ( sn.country = $country )";
}
if (isset($_GET['selected_rate'])  && !empty($_GET['selected_rate'])) {
    $add_query .= " AND ( r.rating>=$rate )";
}

$merge_query = $get_query . $add_query . "  ORDER BY sn.created_date DESC LIMIT " . $start_from . "," . $limit;
$get_data = mysqli_query($conn, $merge_query);

$page_count_query = mysqli_query($conn, $get_query . $add_query);
$total_rows = mysqli_num_rows($page_count_query);
$count = ceil($total_rows / $limit);

if ($count == 0) {
    echo "<center><h4>Note not found</h4></center>";
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="heading">
            <h3>Total <?php echo $total_rows ?> Notes</h3>
        </div>
    </div>
</div>
<div class="row">
    <?php while ($row = mysqli_fetch_assoc($get_data)) { ?>
        <div class="col-md-4 col-sm-12 col-12">
            <a href="note_details.php?noteid=<?php echo $row['sn_id'] ?>" style="text-decoration: none;">
                <div class="notes-img">
                    <img src="<?php echo $row['display_picture'] ?>">
                </div>
            
                <div class="notes-desc">
                    <div class="note-heading">
                        <h3><?php echo $row['title'] ?></h3>
                        <ul class="desc">
                            <li><img src="img/front/university.png"><span><?php echo $row['university'] ?></span></li>
                            <li><img src="img/front/pages.png"><span><?php echo $row['number_of_pages'] ?> Pages</span></li>
                            <li><img src="img/front/date.png"><span><?php echo date('D, d M Y', strtotime($row['published_date'])) ?> </span></li>
                            <?php 
                            $sn_id=$row['sn_id'];
                            $report_query=mysqli_query($conn,"SELECT * FROM seller_note_reported WHERE note_id=$sn_id");
                            $rep_count=mysqli_num_rows($report_query);
                            if($rep_count>=1)
                            {
                                echo '<li><img src="img/front/flag.png"><span style="color: #df3434">'.$rep_count.' user marked this note as inappropriate</span></li>';
                            }
                            else
                            {
                                echo '<li><span></span></li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <?php 
                    $average=0;
                    $avg_query = mysqli_query($conn, "SELECT avg(rating) FROM seller_note_review WHERE note_id=$sn_id");
                    
                    foreach ($avg_query as $avg_row) 
                    {
                        $average = $avg_row['avg(rating)'];
                    }
                    $review_count_query=mysqli_query($conn, "SELECT * FROM seller_note_review WHERE note_id=$sn_id");
                    $review_count=mysqli_num_rows($review_count_query);
                    ?>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <?php if($average!=0){ ?>
                                <div id="rate<?php echo $sn_id; ?>" start="<?php echo $average ?>" style="margin-left: 0px;margin-top: -14px;"></div>
                            <?php }else{ ?>
                                <div class="blank" style="margin-left: 0px;margin-top: -14px;"></div>
                            <?php } ?>

                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <p><?php echo $review_count ?> reviews</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <script type="text/javascript">
            
            $('#rate<?php echo $sn_id; ?>').jsRapStar({
                length: 5,
                value: '<?php echo $average ?>',
                enabled: false,
                starHeight:28,
                colorFront: 'orange'
            });

            $('.blank').jsRapStar({
                value: 0,
                length: 5,
                starHeight: 28,
                enabled:false
                
            });
        </script>

    <?php } ?>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="text-center col-md-12">
                <nav id="pagination-list">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" onclick="searchByDropdown(<?php echo ($page-1) ?>)" class="button"><img src="img/front/left-arrow.png"></a></li>
                        <?php for ($i = 1; $i <= $count; $i++) { ?>
                            <li class="pagination  <?php if ($i == $page) {
                                                        echo ' active"';
                                                    } ?>">
                                <a class="page-link" onclick="searchByDropdown(<?php echo ($i) ?>)"><?php echo $i ?></a>
                            </li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" onclick="searchByDropdown(<?php echo ($page+1) ?>)" class="button"><img src="img/front/right-arrow.png"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>







