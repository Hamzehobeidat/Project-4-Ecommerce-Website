<?php
include('includs/connection.php');

?>
<?php
$query = "select * from subcategory where sub_id={$_GET['id']}";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['add'])) {
    $name = $_POST['sub_name'];
    // $tag = $_POST['cat_tag'];
    // $image_name = $_FILES['cat_img']['name'];
    // $tmp_name = $_FILES['cat_img']['tmp_name'];
    // $subName  = $_POST['sub_name'];
    // $path = 'img/category_image';
    // if ($image_name) {
    //     $category_image = $path . $image_name;
    // } else {
    //     $category_image = $row['category_image'];
    // }

    //update to mysql
    $query = "update subcategory set 
    sub_name='$name',
    category_image='$category_image' where category_id= {$_GET['id']}";
    // move_uploaded_file($tmp_name, $path . $image_name);
    mysqli_query($conn, $query);
    header("location:submanage_category.php");
}
?>
<?php
if (isset($_POST['add'])) {
    $name = $_POST['sub_name'];
    //insert to mysql
    $query = "insert into subcategory (sub_name) values('$name')";
    mysqli_query($conn, $query);
    header("location:submanage_category.php");
}
?>
<?php
include('includs/header.php');
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Update Subcategory</h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Subcategory Name</label>
                                        <input type="text" class="form-control" name="sub_name" value="<?php echo $row['category_name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Category Tag</label>
                                        <input type="text" class="form-control" name="cat_tag" value="<?php echo $row['category_tag'] ?>">
                                    </div>
                                </div>
                                 <!--<div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Subcategory</label>
                                        <input type="text" class="form-control" name="sub_name" required="required">
                                    </div>
                                </div> -->
                            </div>
                            <label for="img"></label>
                            <input class="btn btn-primary col-md-6" name="cat_img" type="file" id="img" name="img" accept="image/*">
                            <button type="submit" class="btn btn-primary pull-right" name="add">Update Subcategory</button>
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
