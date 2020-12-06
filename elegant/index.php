<?php
ob_start();
session_start();
include('connection.php');
include('header.php');
?>
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="img/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Men's , Women's And Kid's</span>
                        <h1>Elegant Shop</h1>
                        <p>The elegant shop is one of Jordan's leading department stores. Guaranteed Satisfaction. Easy Return and Exchange. Attractive & Affordable.</p>
                        <a href="shop.php" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="img/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Get new year ready!!</span>
                        <h1>Up to 50% Sale</h1>
                        <p>End of season sale. Shop online for trendy men's and women's fashion clothing, handbags, fashion accessories and more at Elegant Shop</p>
                        <a href="shop.php" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="img/banner-1.jpg" alt="">
                    <div class="inner-text">
                    <?php
                    $query  = "SELECT * FROM category WHERE category_name='Men';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a href="category.php?catname=<?php echo $row['category_name'] ?>"><h4>Men’s</h4></a>
                    <?php
                    };
                    ?>             
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="img/banner-2.jpg" alt="">
                    <div class="inner-text">
                    <?php
                    $query  = "SELECT * FROM category WHERE category_name='Women';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a href="category.php?catname=<?php echo $row['category_name'] ?>"><h4>Women’s</h4></a>
                    <?php
                    };
                    ?>                   
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="img/banner-3.jpg" alt="">
                    <div class="inner-text">
                    <?php
                    $query  = "SELECT * FROM category WHERE category_name='Kids';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a href="category.php?catname=<?php echo $row['category_name'] ?>"><h4>Kid’s</h4></a>
                    <?php
                    };
                    ?>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->

<!-- Women Banner Section Begin -->
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                <?php
                    $query  = "SELECT * FROM category WHERE category_name='Women';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <h2><?php echo $row['category_name'] ?>’s</h2>

                    <a href="category.php?catname=<?php echo $row['category_name'] ?>&&tagimg=<?php echo $row['category_tag'] ?>">Discover More</a>
                    <?php
                    };
                    ?>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                    <?php
                    $query  = "SELECT * FROM category WHERE category_name='Women';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a href="category.php?catname=<?php echo $row['category_name'] ?>"><li class="active">Women’s Clothings</li></a>
                    <?php
                    };
                    ?>    
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    <?php
                    $query  = "SELECT * FROM products WHERE category_name='Women' AND category_tag='New arrival';";
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
                    <!-- <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-2.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
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
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-3.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
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
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-4.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
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
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Women Banner Section End -->

<!-- Deal Of The Week Section Begin-->
<section class="deal-of-week set-bg spad" data-setbg="img/time-bg.jpg">
    <div class="container">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h2>Deal Of The Week</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                    consectetur adipisicing elit </p>
                <div class="product-price">
                    $35.00
                    <span>/ HanBag</span>
                </div>
            </div>
            <div class="countdown-timer" id="countdown">
                <div class="cd-item">
                    <span>26</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>12</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>40</span>
                    <p>Mins</p>
                </div>
                <div class="cd-item">
                    <span>52</span>
                    <p>Secs</p>
                </div>
            </div>
            <a href="shop.php" class="primary-btn">Shop Now</a>
        </div>
    </div>
</section>
<!-- Deal Of The Week Section End -->

<!-- Man Banner Section Begin -->
<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <ul>
                    <?php
                    $query  = "SELECT * FROM category WHERE category_name='Men';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a href="category.php?catname=<?php echo $row['category_name'] ?>"><li class="active">Men’s Clothings</li></a>
                    <?php
                    };
                    ?>    
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    <?php
                    $query  = "SELECT * FROM products WHERE category_name='Men' AND category_tag='New arrival';";
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
                                    <li class="quick-view"><a href="product.php?proid=<?php echo $row['products_id']; ?>&&subname=<?php echo $row['sub_name']; ?>&&subname=<?php echo $row['sub_name']; ?>">+ Quick View</a></li>
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
                    <!-- <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/man-2.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
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
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/man-3.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
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
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/man-4.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
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
                    </div> -->
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg m-large" data-setbg="img/products/man-large.jpg">
                <?php
                    $query  = "SELECT * FROM category WHERE category_name='Men';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <h2><?php echo $row['category_name'] ?>’s</h2>

                    <a href="category.php?catname=<?php echo $row['category_name'] ?>&&tagimg=<?php echo $row['category_tag'] ?>">Discover More</a>
                    <?php
                    };
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Man Banner Section End -->


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

<!-- Women Banner Section Begin -->
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="admin/img/Child.jpg">
                <?php
                    $query  = "SELECT * FROM category WHERE category_name='Kids';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <h2><?php echo $row['category_name'] ?>’s</h2>

                    <a href="category.php?catname=<?php echo $row['category_name'] ?>&&tagimg=<?php echo $row['category_tag'] ?>">Discover More</a>
                    <?php
                    };
                    ?>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                    <?php
                    $query  = "SELECT * FROM category WHERE category_name='Kids';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a href="category.php?catname=<?php echo $row['category_name'] ?>"><li class="active">Kids’s Clothings</li></a>
                    <?php
                    };
                    ?> 
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    <?php
                    $query  = "SELECT * FROM products WHERE category_name='Kids' AND category_tag='New arrival';";
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
                    <!-- <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-2.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
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
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-3.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
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
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-4.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
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
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Instagram Section Begin -->
<div class="instagram-photo">
    <div class="insta-item set-bg" data-setbg="img/insta-1.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="shop.php">Elegant_Shop_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="img/insta-2.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="shop.php">Elegant_Shop_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="img/insta-3.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="shop.php">Elegant_Shop_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="img/insta-4.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="shop.php">Elegant_Shop_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="img/insta-5.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="shop.php">Elegant_Shop_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="img/insta-6.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="shop.php">Elegant_Shop_Collection</a></h5>
        </div>
    </div>
</div>
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="img/latest-1.jpg" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                        </div>
                        <a href="blog.php">
                            <h4>The Best Street Style From London Fashion Week</h4>
                        </a>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="img/latest-2.jpg" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                        </div>
                        <a href="blog.php">
                            <h4>Vogue's Ultimate Guide To Autumn/Winter 2020 Shoes</h4>
                        </a>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="img/latest-3.jpg" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                        </div>
                        <a href="blog.php">
                            <h4>How To Brighten Your Wardrobe</h4>
                        </a>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
        </div>



        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Free Shipping</h6>
                            <p>For all order over 99$</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-2.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Delivery On Time</h6>
                            <p>If good have prolems</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Secure Payment</h6>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Blog Section End -->
<?php
include('footer.php');
?>