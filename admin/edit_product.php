<?php
include('includs/connection.php');
include('includs/header.php');


$q = "select * from products where  products_id = {$_GET['id']}";
  
          $result = mysqli_query($conn,$q);
          $row = mysqli_fetch_assoc($result);
// make the action when user click on Save Button
        if(isset($_POST['submit'])){

      //get image data
      $image_name = $_FILES['product_image']['name'];
      $tmp_name   = $_FILES['product_image']['tmp_name'];
      $path       = 'img/product_image/';

        //move image to folder
     

        //if the user uploude new image 
        if($image_name) {

            // Take Data From Web Form 
            $product_image = $path.$image_name;
  
        }else {

          //if the user not uploude new image frome db 
          $product_image = $row['products_image'];
           
        }


        $productName    = $_POST['product_name'];
        $productDesc    = $_POST['product_description'];
        $productPrice   = $_POST['product_price'];
        $categoryTag   = $_POST['category_tag'];
        $productsSale   = $_POST['products_sale'];
        $categoryName  = $_POST['category_name'];
        
  
             

            $query = "UPDATE products SET products_name    = '$productName',
                               products_price = '$productPrice',
                               products_des  = '$productDesc',
                               products_image = '$product_image',
                               category_tag   = '$categoryTag' ,
                               category_name =   '$categoryName',
                               products_sale  =  '$productsSale'
                               WHERE products_id = {$_GET['id']}";
    
    mysqli_query($conn,$query);

    move_uploaded_file($tmp_name,$admin_image);
    
    header("location:manage_product.php");
    
}

// Fetch Old Data 
$query = "select * from products where products_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
$row   = mysqli_fetch_assoc($result);



// header("location:manage_product.php");


 ?>
 
<!-- MAIN CONTENT-->
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <div class = "card-header card-header-primary">
                                <div class="card-header"><h3>Manage Product</h3></div>
                                </div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Product</h3>
                            </div>
                            <hr>
                            <form action="" method="post"  enctype="multipart/form-data">
                                    <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Product Fullname</label>
                                        <input type="text" name="product_name" class="form-control" value="<?php echo $row['products_name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Product description</label>
                                        <input type="text" class="form-control" name="product_description" value="<?php echo $row['products_des'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Product Image</label>
                                    <input type="file"  class="form-control" name="product_image" value="<?php echo $row['products_image'] ?>">
                                
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Product Price</label>
                                        <input type="text" class="form-control" name="product_price" value="<?php echo $row['products_price'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Product Tag</label>
                                        <input type="text" class="form-control" name="category_tag" value="<?php echo $row['category_tag'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Products Sale</label>
                                        <input type="text" class="form-control" name="products_sale" value="<?php echo $row['products_sale'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label class="bmd-label-floating">Category Name</label>
                                    <select id="select" class="form-control" name="category_name">
                                    <?php
                                    $query  = "select * from category";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo " <option> {$row['category_name']} </option>";
                                    }
                                    ?>
                                </select>
                                  
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Adress</label>
                                        <input type="text" class="form-control" name="product_image">
                                    </div>
                                </div>
                            </div> -->
                            <button type="submit" class="btn btn-primary pull-right" name = "submit">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                          
                        </div>
                    </div>
                </div>        
            </div>
        </div>
</div>
<!-- End MAIN CONTENT-->

<?php include('includs/footer.php'); ?>