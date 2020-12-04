<?php
include('includs/connection.php');
$query="delete from subcategory where sub_name={$_GET['subname']}";
mysqli_query($conn,$query);

?>

<?php
include('includs/connection.php');
$query="delete from category where category_id={$_GET['id']}";
mysqli_query($conn,$query);
header("location:manage_category.php");
?>

