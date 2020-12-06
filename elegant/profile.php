<?php
session_start();
include('connection.php');
$_SESSION['id'];
$query = "select * from user where user_id ={$_SESSION['id']}";
$resultuser = mysqli_query($conn,$query);
$rowuser = mysqli_fetch_assoc($resultuser);

?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Profile</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Faq Section Begin -->
<?php
include('header.php');
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <div class="container" style="margin-top:5%; margin-bottom:5%">    
                  <div class="row">
                      <div class="panel panel-default col-md-8 col-xs-12 col-sm-6 col-lg-12">
                      <div class="panel-heading col-md-8 col-xs-12 col-sm-6 col-lg-12" style="background-color: #E7AB3C;">  <h4 >User Profile</h4></div>
                       <div class="panel-body col-md-8 col-xs-12 col-sm-6 col-lg-12">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-6 "  >
                       <img alt="User Pic" src="admin/<?php echo $rowuser['user_image'];?>" id="profile-image1" class="img-responsive" style="width: 300px; height:400px" > 
                       <?php
                      echo "<a href='edit_profile.php?id={$rowuser['user_id']}'>
                       <button type='submit' class='site-btn login-btn justify-content-center' name='submit' style='margin-top: 4%; margin-left: 11%;'>Edit Profile</button></a>"
                    ?>
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-6">
                          <div class="container" >
                            <h2><?php echo $rowuser['user_name']?></h2>
                            
                
                          </div>
                           <hr>
                           <h4>Email: </h4>
                          <ul class="container details" style="list-style-type: none;" >
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px; color:#E7AB3C; font-size:25px;"></span><?php echo $rowuser['user_email'];?></p></li>
                            
                        </ul>
                        <hr>
                        <h4>Address: </h4>
                        <ul class="container details" style="list-style-type: none;" >
                            <li><p><span class="glyphicon glyphicon-home " style="width:50px; color:#E7AB3C;  font-size:25px;"></span><?php echo $rowuser['user_addres'];?></p></li>
                            
                        </ul>
                        <hr>
                        <h4>Phone Number:</h4>
                        <ul class="container details" style="list-style-type: none;" >
                            <li><p><span class="glyphicon glyphicon-earphone" style="width:50px; color:#E7AB3C;  font-size:25px;"></span><?php echo $rowuser['user_phone'];?></p></li>
                            
                        </ul>
                          <hr>
                          <h4>Country:</h4>
                        <ul class="container details" style="list-style-type: none;" >
                            <li><p><span class="glyphicon glyphicon-globe" style="width:50px; color:#E7AB3C;  font-size:25px;"></span><?php echo $rowuser['user_country'];?></p></li>
                            
                        </ul>
                      </div>
                </div>
            </div>
            </div>
 </div>
<!-- Faq Section End -->
<?php
include('footer.php');
?>


