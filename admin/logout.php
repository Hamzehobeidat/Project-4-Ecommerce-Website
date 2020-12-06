<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['superadmin']);
header('Location:../login.php');
?>