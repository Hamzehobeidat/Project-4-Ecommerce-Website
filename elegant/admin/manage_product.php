<?php
include('includs/connection.php');
?>

<?php
// make the action when user click on Save Button
if (isset($_POST['submit'])) {

    // get image data
    $image_name = $_FILES['product_image']['name'];
    $tmp_name   = $_FILES['product_image']['tmp_name'];
    $path       = 'img/product_image/';



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



    $query = "INSERT INTO products( products_name, products_des, products_image,  products_price, category_name, category_tag , products_sale, size_name ,sub_name )
    VALUES('$productName', '$productDescription', '$path$image_name' , '$productPrice', '$categoryName', '$categoryTag' ,  '$productsSale','$checkbox_values' , '$subName')";
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
                                <h3>Manage Product</h3>
                                <p class="card-category"> Here is a Products for this table</p>
                            </div>
                        </div>


                        <div class="card-body">

                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Fullname</label>
                                            <input type="text" name="product_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Price</label>
                                            <input type="text" class="form-control" name="product_price">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <!-- <div class="col-md-6">
                                        <label for="img"></label>
                                        <input type="file" class="btn btn-primary" name="product_image">

                                    </div> -->

                                    <!-- <label for="img"></label>
                                    <input class="btn btn-primary col-md-6" name="admin_image" type="file" id="img" name="img" accept="image/*"> -->


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product description</label>
                                            <input type="text" class="form-control" name="product_description">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Tag</label>
                                            <input type="text" class="form-control" name="category_tag">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Products Sale</label>
                                            <input type="text" class="form-control" name="products_sale">
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
                                                echo " <option style='color:black; background-color:#E7AB3C;'> {$row['category_name']} </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <select id="select" class="form-control" name="sub_name">
                                            <option style='color:black; background-color:#E7AB3C;'>Select Subcategory</option>
                                            <?php
                                            $query  = "select * from subcategory";
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
                                        <input type="file" class="btn btn-primary col-md-8" name="product_image">

                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary pull-right" name="submit">Update Product</button>
                                    </div>
                                </div>




                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Products Table</h4>
                        <p class="card-category"> Here is a Products for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Category Image
                                    </th>
                                    <th>
                                        Product Price
                                    </th>
                                    <th>
                                        Products Sale
                                    </th>
                                    <th>
                                        Product description
                                    </th>

                                    <th>
                                        category name
                                    </th>
                                    <th>
                                        Subcategory
                                    </th>
                                    <th>
                                        category_tag
                                    </th>
                                    <th>
                                        Size
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $query  = "select * from products";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";

                                            echo "<td>{$row['products_id']}</td>";
                                            echo "<td>{$row['products_name']}</td>";
                                            echo "<td><img src='{$row['products_image']}' width='100' height='100'></td>";
                                            echo "<td>{$row['products_price']}</td>";
                                            echo "<td>{$row['products_sale']}</td>";
                                            echo "<td>{$row['products_des']}</td>";
                                            echo "<td>{$row['category_name']}</td>";
                                            echo "<td>{$row['sub_name']}</td>";
                                            echo "<td>{$row['category_tag']}</td>";
                                            echo "<td>{$row['size_name']}</td>";
                                            echo "<td><a  href='edit_product.php?id={$row['products_id']}' class = 'btn btn-primary'>
                                                <i class='material-icons '>create</i>
                                                </a>
                                                </td>";
                                            echo "<td>
                                                <a  href='delete_product.php?id={$row['products_id']}' class = 'btn btn-danger'>
                                                    <i class='material-icons  '>delete_forever</i>  
                                                </a>
                                                </td>";
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
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