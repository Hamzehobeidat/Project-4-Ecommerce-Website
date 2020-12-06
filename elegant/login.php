<?php
session_start();
include('connection.php');
?>
<?php


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['login_name'];
        $password = $_POST['login_pass'];
        $sql = "SELECT * FROM admin WHERE admin_name = '$username'";
        $result = mysqli_query($conn, $sql);
        $check = mysqli_fetch_array($result);
        
        if(!empty($username)&&!empty($password)){
            
                if ($check) {
                    $sql = "SELECT * FROM admin WHERE 	admin_name = '$username' AND admin_password = '$password'";
                    $result = mysqli_query($conn, $sql);
                    $check = mysqli_fetch_array($result);
                    if ($check){
                    if ($check['admin_role']=='superadmin') {
                        $_SESSION['superadmin']='superadmin';
                        $_SESSION['id'] = $check['admin_id'];
                        header('Location:admin/');
                           
                        }
                       if($check['admin_role']=='admin'){
                           $_SESSION['admin']='admin';
                            $_SESSION['id'] = $check['admin_id'];
                            header('Location:admin/');
                               
                        }
                    }
                    else{
                        $error_pass="**The password you’ve entered is incorrect.";
                        }
                    
                }
                    else{
                        $error_name="**Username Not Found";
                        }
                       

                    
    }

    else{
    $empty_error="**username / password Required";
   }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['login_name'];
     $password = $_POST['login_pass'];
    
    $sql = "SELECT * FROM user WHERE user_name = '$username'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_fetch_array($result);
    if(!empty($username)&&!empty($password)){
        
            if ($check) {
                $sql = "SELECT * FROM user WHERE user_name = '$username' AND user_password = '$password' ";
                 $result = mysqli_query($conn, $sql);
                  $check = mysqli_fetch_array($result);
                  if ($check){
                if (isset($check)) {
                    $_SESSION['id'] = $check['user_id'];
                    header('Location:index.php');
                    die;
                
                }
                else{
                    $error_pass="**The password you’ve entered is incorrect.";
                    }
                  }
                else{
                    $error_name="**Username Not Found";
                }
                
            }    
                    
                   
                
}

else{
$empty_error="**username / password Required";
}
    

}
   
?>
<!-- Breadcrumb Section Begin -->
<?php include('header.php'); ?>
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
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
                    <div class="login-form">
                        <h2>Login</h2>
                        <form method="POST">
                            <div class="group-input">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="login_name">
                            </div>
                            <?php if(isset($error_name)){?>
                                            <div class='alert alert-danger' style="color:red;font-size: 15px"><?php echo $error_name?></div>
                                           <?php }?>       
                            <div class="group-input">
                                <label for="pass">Password </label>
                                <input type="text" id="pass" name="login_pass">
                            </div>
                            <?php if(isset($error_pass)){?>
                                            <div class='alert alert-danger' style="color:red;font-size: 15px"><?php echo $error_pass?></div>
                                           <?php }?>
                                          
                            <?php if(isset($empty_error)){?>
                                            <div class='alert alert-danger' style="color:red;font-size: 15px"><?php echo $empty_error ?></div>
                                           <?php }?>
                            <button type="submit" class="site-btn login-btn" name='submit'>Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="./register.php" class="or-login">Or Create An Account</a>
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

