<?php

include "config.php";
$id=mysqli_real_escape_string($conn,$_GET['id']);

mysqli_query($conn,"update user SET is_emailverified=1 where id=$id");
echo "Account verified";
header("location:login.php");

?>