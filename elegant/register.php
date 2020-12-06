<?php
ob_start();
session_start();
?>
<?php
include('connection.php');
include('header.php');
// make the action when user click on Save Button
if (isset($_POST['register'])) {

    // get image data
    $image_name = $_FILES['user_image']['name'];
    $tmp_name   = $_FILES['user_image']['tmp_name'];
    $path       = 'img/user_image/';
    $emailError = "";
    // move image to folder
    move_uploaded_file($tmp_name, $path . $image_name);
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $userEmail = $_POST['userEmail'];
    if (!empty($userName) && !empty($userPassword) && !empty($userEmail)) {
    // Take Data From Web Form 
    $sql="select * from user where (user_email='$userEmail');";
    $res=mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($userEmail==isset($row['user_email']))
        {
        $emailError = "Email Already Exists";
        }
		} else {

    $query = "insert into user(user_name,user_email,user_password,user_image)
              values('$userName','$userEmail','$userPassword','$path$image_name')";
    mysqli_query($conn, $query);
    header("location:login.php");
}
}
}
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Register</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Register</h2>
                    <form action="#" method="post" enctype="multipart/form-data">
                    
                        <div class="group-input">
                            <label for="username">Username *</label>
                            <input type="text" id="username" name="userName" required="required">
                        </div>
                        <div class="group-input">
                            <label for="email">Email address *</label>
                            <input type="email" id="email" name="userEmail" required="required">
                            <div class="alert alert ">
                        <h5 class="text-danger"> <?php echo ((isset($emailError) != '')?$emailError : ''); ?></h5>
                    </div>
                        </div>
                        <div class="group-input">
                            <label for="pass">Password *</label>
                            <input type="password" id="pass" name="userPassword" required="required">
                        </div>
                        <div class="group-input custom-file">
                            <label for="userimage" class="control-label mb-1 custom-file-label">Your Image</label>
                            <input id="userimg" class="custom-file-input" name="user_image" type="file" accept="image">
                        </div>
                        <button type="submit" class="site-btn register-btn" name="register">REGISTER</button>
                    </form>
                    <div class="switch-login">
                        <a href="./login.php" class="or-login">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
<?php
include('footer.php');
?>