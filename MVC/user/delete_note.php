<?php
include "config.php";
$note_id=$_GET['note_id'];
$result=mysqli_query($conn,"UPDATE seller_note SET isactive=0 WHERE id=$note_id");
if($result)
{
	header("location:dashboard.php");
}
?>