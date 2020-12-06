<?php
ob_start();
include('connection.php');
include('header.php');
$proid = $_GET['proid'];
$subname = $_GET['subname'];
if (!isset($_GET['proid'])) {
    header("location:shop.php");
}
if (!isset($_GET['subname'])) {
    header("location:shop.php");
}
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.php">Shop</a>
                    <span>Detail</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
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
                        $query  = "SELECT * FROM category WHERE category_name='Women'; ";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <a href="shop.php" class="rb-item">
                                <div class="rb-pic">
                                    <img src="admin/img/shopgo1.jpeg" width="70%" height="30%" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>Let's Take A look</h6>
                                    <p>Clothes and Accessories</p>
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
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php
                    $query  = "SELECT * FROM products WHERE products_id='$proid';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="admin/<?php echo $row['products_image']; ?>" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="admin/<?php echo $row['products_image']; ?>"><img src="admin/<?php echo $row['products_image']; ?>" alt=""></div>
                                    <div class="pt" data-imgbigurl="admin/<?php echo $row['products_image']; ?>"><img src="admin/<?php echo $row['products_image']; ?>" alt=""></div>
                                    <div class="pt" data-imgbigurl="admin/<?php echo $row['products_image']; ?>"><img src="admin/<?php echo $row['products_image']; ?>" alt=""></div>
                                    <div class="pt" data-imgbigurl="admin/<?php echo $row['products_image']; ?>"><img src="admin/<?php echo $row['products_image']; ?>" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <h3><?php echo $row['products_name']; ?></h3>
                                </div>
                                <div class="pd-desc"><?php echo $row['products_des']; ?></p>
                                    <h4>$<?php echo $row['products_price']; ?><span></span></h4>
                                </div>
                                <div class="pd-size-choose">
                                    <div class="sc-item">
                                        <input type="radio" id="sm-size">
                                        <label for="sm-size">s</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="md-size">
                                        <label for="md-size">m</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="lg-size">
                                        <label for="lg-size">l</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="xl-size">
                                        <label for="xl-size">xs</label>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                    <button onclick="location.href='carthandler.php?cart_id=<?php echo $row['products_id'] ?>&cart_name=<?php echo $row['products_name'] ?>&cart_price=<?php echo $row['products_price'] ?>'" type="submit" name="Add to Cart" class="primary-btn pd-cart">
                                        Add to cart
                                    </button>

                                </div>
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: More Accessories , Wallets & Cases</li>
                                    <li><span>TAGS</span>: Clothing, Sale, New Arrival, Christmas, Woman</li>
                                </ul>
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
<!-- Product Shop Section End -->

<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $query  = "SELECT * FROM products WHERE sub_name='$subname';";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="admin/<?php echo $row['products_image']; ?>" alt="">
                            <div class="sale"><?php echo $row['category_tag']; ?></div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="quick-view"><a href="product.php?proid=<?php echo $row['products_id']; ?>&&subname=<?php echo $row['sub_name']; ?>">+ Quick View</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name"><?php echo $row['category_name']; ?></div>
                            <a href="#">
                                <h5><?php echo $row['products_name']; ?></h5>
                            </a>
                            <div class="product-price">
                                $<?php echo $row['products_price']; ?>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            };
            ?>
            <!-- <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="img/products/women-2.jpg" alt="">
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="product.php?proid=">+ Quick View</a></li>
                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">Shoes</div>
                        <a href="#">
                            <h5>Guangzhou sweater</h5>
                        </a>
                        <div class="product-price">
                            $13.00
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="img/products/women-3.jpg" alt="">
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="product.php?proid=">+ Quick View</a></li>
                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">Towel</div>
                        <a href="#">
                            <h5>Pure Pineapple</h5>
                        </a>
                        <div class="product-price">
                            $34.00
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="img/products/women-4.jpg" alt="">
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="product.php?proid=">+ Quick View</a></li>
                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">Towel</div>
                        <a href="#">
                            <h5>Converse Shoes</h5>
                        </a>
                        <div class="product-price">
                            $34.00
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- Related Products Section End -->
<?php
include('footer.php');
?>