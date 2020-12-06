<?php
include('includs/connection.php');
?>
<?php

if (isset($_POST['add'])) {

    $name = $_POST['sub_name'];
    // $tag = $_POST['cat_tag'];
    // $image_name = $_FILES['cat_img']['name'];
    // $tmp_name = $_FILES['cat_img']['tmp_name'];
    // $path = 'img/category_image/';
    // $subName  = $_POST['sub_name'];
    // move_uploaded_file($tmp_name, $path . $image_name);

    //insert to mysql
    $query = "insert into subcategory (sub_name) values('$name')";
    mysqli_query($conn, $query);
    header("location:submanage_category.php");
}
?>

 <!-- <?php

// if (isset($_POST['add'])) {

//     $name = $_POST['sub_name'];



//     //insert to mysql
//     $query = "insert into subcategory (sub_name) values('$name')";
//     mysqli_query($conn, $query);
//     header("location:submanage_category.php");
// }
?> -->
<?php
include('includs/header.php');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Category</h4>

                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post">
                            <div class="row">


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Subcategory Name</label>
                                        <input type="text" class="form-control" name="sub_name" required="required">
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Category Tag</label>
                                        <input type="text" class="form-control" name="cat_tag" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Subcategory</label>
                                        <input type="text" class="form-control" name="sub_name" required="required">
                                    </div>
                                </div> -->

                            </div>



                            <label for="img"></label>
                            <input class="btn btn-primary col-md-6" name="cat_img" type="file" id="img" name="img" accept="image/*">
                            <button type="submit" class="btn btn-primary pull-right" name="add">Create Subcategory</button>
                            <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Simple Table</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Subategory</th>
                                    <!-- <th>Image</th>
                                    <th>Tag</th>
                                    <th>Edit</th>
                                    <th>Delete</th> -->
                                </thead>
                                <tbody>
                                    <?php
                                    $query = 'select * from subcategory';
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>{$row['sub_id']}</td>";
                                        echo "<td>{$row['sub_name']}</td>";
                                        // echo "<td>{$row['sub_name']}</td>";
                                        // echo "<td><img src='{$row['category_image']}' width='80px' height='80px'</td>";
                                        // echo "<td>{$row['category_tag']}</td>";
                                        echo "<td><a href='subcategory_edit.php?id={$row['sub_id']}'class='btn btn-primary'><i class='material-icons'>create</i></a></td>";
                                        echo "<td><a href='subcategory_delete.php?id={$row['sub_id']}&&subname={$row['sub_name']}' class='btn btn-danger'><i class='material-icons'>delete_forever</i></a></td>";
                                        echo "</tr>";
                                    }

                                    ?>
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