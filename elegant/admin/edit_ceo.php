<?php
include('includs/connection.php');
// make the action when user click on Save Button

$query = "select * from admin where admin_role='SuperAdmin'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
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
    $role     = "SuperAdmin";
    $id = $_GET['id'];

    if ($image_name) {
        $ceo_image = $path . $image_name;
    } else {
        $ceo_image = $row['admin_image'];
    }

    $query = "update admin set 
    admin_email      = '$email',
    admin_password   = '$password',
    admin_name       = '$fullname',
    admin_image      = '$ceo_image',
    admin_role       = '$role'
    where admin_role = 'SuperAdmin'";


    mysqli_query($conn, $query);
    header("location:manage_admin.php");
}
?>
<?php
include('includs/header.php');
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Form Start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Admin</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Full Name</label>
                                        <input type="text" name="admin_name" class="form-control" value="<?php echo $row['admin_name']?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="email" name="admin_email" class="form-control" value="<?php echo $row['admin_email']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password</label>
                                        <input type="password" name="admin_password" class="form-control" value="<?php echo $row['admin_password']?>">
                                    </div>
                                </div>
                            </div>
                            <label for="img"></label>
                            <input class="btn btn-primary col-md-6" name="admin_image" type="file" id="img" name="img" accept="image/*">
                            <button type="submit" class="btn btn-primary pull-right" name="submit">Create Admin</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includs/footer.php');
?>