<?php
include('connection.php');
?>

<?php
if (isset($_POST['sendmsg'])) {

    $usermsg = $_POST['com_message'];
    $username = $_POST['com_name'];
    $useremail = $_POST['com_email'];

    $query = "insert into customermsg(msg_name,msg_email,msg_comment)
              values('$username','$useremail','$usermsg')";
    mysqli_query($conn, $query);
    header("location:contact.php");
}
?>