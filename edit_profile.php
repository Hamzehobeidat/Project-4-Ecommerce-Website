<?php
session_start();
include('connection.php');
  $query = "select * from user where user_id ={$_GET['id']}";
  $resultuser = mysqli_query($conn,$query);
  $rowuser = mysqli_fetch_assoc($resultuser);

  if (isset($_POST['submit'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $pass = $_POST['user_password'];
    $address = $_POST['user_address'];
    $phone = $_POST['user_phone'];
    $country = $_POST['user_country'];
    $image_name = $_FILES['user_image']['name'];
    $tmp_name = $_FILES['user_image']['tmp_name'];
    
    $path = './img/user_image/';
    if ($image_name) {
        $user_image = $path.$image_name;
    } else {
        $user_image = $rowuser['user_image'];
    }
  
    $query ="SELECT user_email FROM user";
        
        if ($rowuser['user_email'] ==$email){
            $emailError = "Email Already Exists";
        }
        else{
            $query = "update user set 
            user_name='$name',
            user_email='$email', 
            user_password='$pass',
            user_country='$country',
            user_addres='$address',
            user_phone='$phone',
            user_image='$user_image' where user_id= {$_GET['id']}";


            mysqli_query($conn, $query);
            move_uploaded_file($tmp_name, $path.$image_name);
            header("location:profile.php");
        }


  }
  
?>

<?php
include('header.php');
?>

<div class="content" style="margin-top:5%; margin-bottom:5%; margin-left:15%">
    <div class="container-fluid">
        <div class="row">
            <!-- Form Start -->
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary" style="background-color: #E7AB3C;">
                        <h4 class="card-title">Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating"> Name</label>
                                        <input type="text" name="user_name" class="form-control" value="<?php echo $rowuser['user_name']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="email" name="user_email" class="form-control"$emailError = "Email Already Exists"; value="<?php echo $rowuser['user_email']?>">
                                    </div>
                                    <?php if(isset($emailError)){?>
                                            <div class='alert alert-danger' style="color:red;font-size: 15px"><?php echo $emailError?></div>
                                           <?php }?>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password</label>
                                        <input type="password" name="user_password" class="form-control" value="<?php echo $rowuser['user_password']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone Number</label>
                                        <input type="text" name="user_phone" class="form-control" value="<?php echo $rowuser['user_phone']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Country</label>
                                        <input type="text" name="user_country" class="form-control" value="<?php echo $rowuser['user_country']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="text" name="user_address" class="form-control" value="<?php echo $rowuser['user_addres']?>">
                                    </div>
                                </div>
                            </div>
                            <label for="img">Profile Image:</label>
                            <input class="btn  col-md-6" name="user_image" type="file" id="img" name="img" accept="image/*" style="background-color: #E7AB3C;">
                            <button type="submit" class=" site-btn login-btn btn  pull-right" name="submit" style="background-color: #E7AB3C;">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>