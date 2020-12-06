<?php
include('includs/connection.php');
// make the action when user click on Save Button
if (isset($_POST['submit'])) {

    // get image data
    $image_name = $_FILES['admin_image']['name'];
    $tmp_name   = $_FILES['admin_image']['tmp_name'];
    $path       = 'img/admin_image/';


    // move image to folder
    move_uploaded_file($tmp_name, $path . $image_name);

    // Take Data From Web Form 
    $email    = $_POST['admin_email'];
    $password = $_POST['admin_password'];
    $fullname = $_POST['admin_name'];
    $role = "admin";

    $query = "insert into admin(admin_email,admin_password,admin_name,admin_image,admin_role)
              values('$email','$password','$fullname','$path$image_name','$role')";
    mysqli_query($conn, $query);
    header("location:index.php");
}
?>
<?php
include('includs/header.php');
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- CEO START -->
            <?php
            $query  = "SELECT * FROM admin WHERE admin_role='SuperAdmin';";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-md-12">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="<?php echo $row['admin_image']; ?>" target="_blank">
                                <img class="img" src="<?php echo $row['admin_image']; ?>" />
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category">CEO / CO-Founder</h6>
                            <h4 class="card-title"><?php echo $row['admin_name']; ?></h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-primary btn-round">Edit CEO Profile</a>
                        </div>
                    </div>
                </div>
            <?php
            };
            ?>
        </div>
    </div>
</div>
<?php
include('includs/footer.php');
?>