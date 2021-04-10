<?php
include "config.php";

$review_id=$_GET['review_id'];
$note_id=$_GET['note_id'];

$result=mysqli_query($conn,"UPDATE seller_note_review SET isactive=0 WHERE id=$review_id");
if($result)
{
	header("location:review.php?noteid=$note_id");
}
?>