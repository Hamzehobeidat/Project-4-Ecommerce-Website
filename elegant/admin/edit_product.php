<?php
include('includs/connection.php');
?>

<?php

$q = "select * from products where  products_id = {$_GET['id']}";

$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);

// make the action when user click on Save Button
if (isset($_POST['submit'])) {

    // get image data
    $image_name = $_FILES['product_image']['name'];
    $tmp_name   = $_FILES['product_image']['tmp_name'];
    $path       = 'img/product_image/';




    //if the user uploude new image 
    if ($image_name) {

        // Take Data From Web Form 
        $product_image = $path . $image_name;
    } else {

        //if the user not uploude new image frome db 
        $product_image = $row['products_image'];
    }



    // move image to folder
    move_uploaded_file($tmp_name, $path . $image_name);


    // Take Data From Web Form
    // $productId   = $_POST['select'];

    $productName    = $_POST['product_name'];
    $productDescription    = $_POST['product_description'];
    $productPrice   = $_POST['product_price'];
    $categoryName   = $_POST['category_name'];
    $categoryTag    = $_POST['category_tag'];
    $subName    = $_POST['sub_name'];

    $productsSale   = $_POST['products_sale'];

    // The implode() function returns a string from the elements of an array.
    $checkbox_values = implode(',', $_POST['size']);


    $query = "UPDATE products SET products_name = '$productName',
    products_price = '$productPrice',
    products_des  = '$productDescription',
    products_image = '$product_image',
    category_tag   = '$categoryTag' ,
    category_name =   '$categoryName',
    size_name =   '$checkbox_values',
    sub_name  = '$subName',
    products_sale  =  '$productsSale'
    WHERE products_id = {$_GET['id']}";

    mysqli_query($conn, $query);


    header("location:manage_product.php");
}
?>

<?php
include('includs/header.php');
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12" style="padding-bottom: 100px;">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-header">
                                <h3>Edite Product</h3>
                            </div>
                        </div>


                        <div class="card-body">

                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Fullname</label>
                                            <input type="text" name="product_name" class="form-control" value="<?php echo $row['products_name'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Price</label>
                                            <input type="text" class="form-control" name="product_price" value="<?php echo $row['products_price'] ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product description</label>
                                            <input type="text" class="form-control" name="product_description" value="<?php echo $row['products_des'] ?>">
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
                                    <div class="col-md-6">
                                        <select id="select" class="form-control" name="category_name">
                                            <option style='color:black; background-color:#E7AB3C;'>Select Category</option>
                                            <?php
                                            $query  = "select * from category";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo " <option style='color:black; background-color:#E7AB3C;' > {$row['category_name']} </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <select id="select" class="form-control" name="sub_name">
                                            <option style='color:black; background-color:#E7AB3C;'>Select Subcategory</option>
                                            <?php
                                            $query  = "select * from category";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo " <option style='color:black; background-color:#E7AB3C;'> {$row['sub_name']} </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="size" style='color:#e7ab3c;'>Select Size</label><br>
                                        <?php
                                        $query  = "select * from sizes";
                                        $result = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo " <input type='checkbox'   name='size[]' value='{$row['size_name']}'>
                                                    <label for='size' style='color:#e7ab3c; display: inline;'>{$row['size_name']}</label>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="img"></label>
                                        <input type="file" class="btn btn-primary col-md-8" name="product_image" value="<?php echo $row['products_image'] ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary pull-right" name="submit">Update Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
include('includs/footer.php');
?>