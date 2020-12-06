<?php
ob_start();
include('connection.php');
include('header.php');
$catname = $_GET['catname'];
if (!isset($_GET['catname'])) {
    header("location:shop.php");
}
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Shop | </span>
                    <?php
                    $query  = "SELECT * FROM category WHERE category_name='$catname';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <span><?php echo $row['category_name']; ?></span>
                    <?php
                    };
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<div class="partner-logo" style="margin-bottom: 1.4rem; background-color:#F4F2E6;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <!-- <h2 style="color:wheat;">From The Blog</h2> -->
                    <div class="typewriter">
                        <h2 style="color:#E7AB3C;">New collection Winter 2020 .</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <?php
                $query  = "SELECT * FROM category WHERE category_name='$catname';";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="product-large set-bg" data-setbg="admin/<?php echo $row['category_image'] ?>">
                        <h2><?php echo $row['category_name'] ?>’s</h2>

                        <a href="tagpage.php">Discover More</a>
                    <?php
                };
                    ?>
                    </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <?php
                        $query  = "SELECT * FROM category WHERE category_name='$catname';";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <li class="active"><?php echo $row['category_name'] ?>’s Clothings</li>
                        <?php
                        };
                        ?>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    <?php
                    $query  = "SELECT * FROM products WHERE category_name='$catname' AND category_tag='New arrival';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="admin/<?php echo $row['products_image'] ?>" alt="">
                                <div class="sale"><?php echo $row['category_tag'] ?></div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="product.php?proid=<?php echo $row['products_id']; ?>&&subname=<?php echo $row['sub_name']; ?>">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $row['category_name'] ?></div>
                                <a href="#">
                                    <h5><?php echo $row['products_name'] ?></h5>
                                </a>
                                <div class="product-price">$
                                    <?php echo $row['products_price'] ?>
                                    <span></span>
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
</section>

<div class="partner-logo" style="margin-bottom: 1.4rem; background-color:#F4F2E6;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <!-- <h2 style="color:wheat;">From The Blog</h2> -->
                    <div class="typewriter">
                        <h2 style="color:#E7AB3C;">Christmas collection Winter 2020 .</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <ul>
                        <?php
                        $query  = "SELECT * FROM category WHERE category_name='$catname';";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <li class="active"><?php echo $row['category_name'] ?>’s Clothings</li>
                        <?php
                        };
                        ?>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    <?php
                    $query  = "SELECT * FROM products WHERE category_name='$catname' AND category_tag='Christmas';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="admin/<?php echo $row['products_image'] ?>" alt="">
                                <div class="sale"><?php echo $row['category_tag'] ?></div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="product.php?proid=<?php echo $row['products_id']; ?>&&subname=<?php echo $row['sub_name']; ?>">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $row['category_name'] ?></div>
                                <a href="#">
                                    <h5><?php echo $row['products_name'] ?></h5>
                                </a>
                                <div class="product-price">$
                                    <?php echo $row['products_price'] ?>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    <?php
                    };
                    ?>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <?php
                $query  = "SELECT * FROM category WHERE category_name='$catname';";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="product-large set-bg" data-setbg="admin/<?php echo $row['category_image'] ?>">
                        <h2><?php echo $row['category_name'] ?>’s</h2>

                        <a href="tagpage.php">Discover More</a>
                    <?php
                };
                    ?>
                    </div>
            </div>
        </div>
</section>

<div class="partner-logo" style="margin-bottom: 1.4rem; background-color:#F4F2E6;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <!-- <h2 style="color:wheat;">From The Blog</h2> -->
                    <div class="typewriter">
                        <h2 style="color:#E7AB3C;">Sale collection Winter 2020 .</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <?php
                $query  = "SELECT * FROM category WHERE category_name='$catname';";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="product-large set-bg" data-setbg="admin/<?php echo $row['category_image'] ?>">
                        <h2><?php echo $row['category_name'] ?>’s</h2>

                        <a href="tagpage.php">Discover More</a>
                    <?php
                };
                    ?>
                    </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                    <?php
                    $query  = "SELECT * FROM category WHERE category_name='$catname';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <li class="active"><?php echo $row['category_name'] ?>’s Clothings</li>
                    <?php
                    };
                    ?>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    <?php
                    $query  = "SELECT * FROM products WHERE category_name='$catname' AND category_tag='Sale';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="admin/<?php echo $row['products_image'] ?>" alt="">
                                <div class="sale"><?php echo $row['category_tag'] ?></div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="product.php?proid=<?php echo $row['products_id']; ?>&&subname=<?php echo $row['sub_name']; ?>">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $row['category_name'] ?></div>
                                <a href="#">
                                    <h5><?php echo $row['products_name'] ?></h5>
                                </a>
                                <div class="product-price">$
                                    <?php echo $row['products_price'] ?>
                                    <span></span>
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
</section>


<!-- Partner Logo Section Begin -->
<?php
include('footer.php');
?>