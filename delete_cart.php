<?php
session_start();



if(isset($_GET['key'])){
$key = $_GET['key'];

unset($_SESSION["cart_item"]["$key"]);
header("location:shopping-cart.php");
}

 ?>
