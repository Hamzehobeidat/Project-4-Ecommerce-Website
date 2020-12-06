<?php
include('includs/connection.php');
$query="delete from subcategory where sub_id={$_GET['id']}";
mysqli_query($conn,$query);
header("location:submanage_category.php");
?>