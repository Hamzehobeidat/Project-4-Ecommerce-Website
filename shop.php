<?php
ob_start();
session_start();
include('connection.php');
include('header.php');
?>



<?php

if (!isset($_GET['pid'])) {
    $pid = $_GET["pid"] = null;
    // header("location:shopping-cart-empty.php");
}
// elseif (isset($_GET['name'])) {
//     header("location:shopping-cart.php");
// }

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
            //code for adding product in cart
        case "add":
            if (!empty($_POST["quantity"])) {
                $pid = $_GET["pid"];


                // $result = mysqli_query($conn, "SELECT * FROM products WHERE products_id='$pid'");
                // while ($productById = mysqli_fetch_array($result)) {

                $query  = "SELECT * FROM products WHERE products_id='$pid';";
                $result = mysqli_query($conn, $query);
                while ($productById = mysqli_fetch_assoc($result)) {



                    $itemArray = array($productById["products_id"] => array('name' => $productById["products_name"], 'quantity' => $_POST["quantity"], 'price' => $productById["products_price"], 'image' => $productById["products_image"]));

                    if (!empty($_SESSION["cart_item"])) {
                        if (in_array($productById["products_id"], array_keys($_SESSION["cart_item"]))) {
                            foreach ($_SESSION["cart_item"] as $k => $v) {
                                if ($productById["products_id"] == $k) {
                                    if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
                header("Location:shop.php");
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["name"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
            // code for if cart is empty
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}

?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">

                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <div class="fw-tags">
                        <?php
                        $query  = "SELECT * FROM category";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <a href="category.php?catname=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></a>
                        <?php
                        };
                        ?>
                    </div>
                </div>


                <div class="filter-widget">
                    <!-- <h4 class="fw-title">Category</h4> -->
                    <div class="recent-blog">

                        <?php
                        $query  = "SELECT * FROM category ";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <a href="category.php?catname=<?php echo $row['category_name']; ?>" class="rb-item">
                                <div class="rb-pic">
                                    <img src="admin/<?php echo $row['category_image']; ?>" width="70%" height="30%" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6><?php echo $row['category_name']; ?></h6>
                                    <p>Fashion</p>
                                </div>
                            </a>
                        <?php
                        };
                        ?>

                        <div class="filter-widget">
                            <h4 class="fw-title">Tags</h4>
                            <div class="fw-tags">
                                <?php
                                $query  = "SELECT * FROM category";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <a href="tagpage.php?tagname=<?php echo $row['category_tag']; ?>"><?php echo $row['category_tag']; ?></a>
                                <?php
                                };
                                ?>
                            </div>
                        </div>

                        <?php
                        $query  = "SELECT * FROM products WHERE category_tag='Sale' ";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <a href="tagpage.php?tagname=<?php echo $row['category_tag']; ?>" class="rb-item">
                                <div class="rb-pic">
                                    <img src="admin/<?php echo $row['products_image']; ?>" width="70%" height="30%" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6><?php echo $row['products_name']; ?></h6>
                                    <p><?php echo $row['sub_name'] ?> | <?php echo $row['category_tag'] ?></p>
                                </div>
                            </a>
                        <?php
                        };
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-list">
                    <div class="row">
                        <?php
                        $query  = "SELECT * FROM products";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic fixedBoxImglargeTag">
                                        <img class="pi-pic ImgSize" src="admin/<?php echo $row['products_image'] ?>" style="width:100%;height:100%;" alt="">
                                        <div class="sale pp-sale"><?php echo $row['category_tag'] ?></div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>

                                        <form method="post" action="shop.php?action=add&pid=<?php echo $row['products_id']; ?>">
                                            <div class="quantity">
                                            
                                                <!-- <a href="#" class="primary-btn pd-cart">Add To Cart</a> -->
                                                <input type="hidden" value="1" name="quantity" size="2">
                                                <!-- <button type="submit"><li class="w-icon active"><i class="icon_bag_alt"></i></li></button> -->

                                            <button type="submit"style="padding:0;border:none"><li class="w-icon active" ><a style="width:100%;height:100%;"><i class="icon_bag_alt" style="width:100%;height:100%;"></i></a></li></button>
                                            <li class="quick-view"><a href="product.php?proid=<?php echo $row['products_id']; ?>&&subname=<?php echo $row['sub_name']; ?>">+ Quick View</a></li>
                                            </div>
                                         </form>
                                            

                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><?php echo $row['products_name'] ?></div>
                                            <h5><?php echo $row['category_name'] ?></h5>
                                        <div class="product-price">
                                            $<?php echo $row['products_price'] ?>
                                            <span></span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        <?php
                        };
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Partner Logo Section Begin -->
<?php
include('footer.php');
?>