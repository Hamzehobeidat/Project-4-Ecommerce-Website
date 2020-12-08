<?php
ob_start();
include('connection.php');
include('header.php');
$query  = $_GET['search'];
if (!isset($_GET['search'])) {
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
                    <span>Search</span>
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

     <!--Search is start from hear-->       
<?php

$query = $_GET['search'];
// gets value sent over search form
$min_length = 2;
// you can set minimum length of the query if you want

if (strlen($query) >= $min_length) {

    $query = htmlspecialchars($query);


    $query = mysqli_real_escape_string($conn, $query);

    $searchTerms = explode(' ', $query);
    
    foreach ($searchTerms as $term) {
        $term = trim($term);
        if (!empty($term)) {
    $raw_results = "SELECT * FROM products 
     WHERE (`products_name`  LIKE '%$term%' OR `category_tag`  LIKE '%$term%'  OR `category_name`  LIKE '%$term%'  OR `sub_name`  LIKE '%$term%' )";
            
        }
    }


    $res = mysqli_query($conn, $raw_results);
    if (mysqli_num_rows($res) > 0) {

        while ($results = mysqli_fetch_array($res)) { 
            //  $results = mysqli_fetch_array($raw_results); ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="admin/<?php echo $results['products_image'] ?>" alt="">
                                        <div class="sale pp-sale"><?php echo $results['category_tag'] ?></div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="shopping-cart.php"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product.php?proid=<?php echo $results['products_id']; ?>&&subname=<?php echo $results['sub_name']; ?>">+ Quick View</a></li>
                                            <!-- <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><?php echo $results['products_name'] ?></div>
                                            <h5><?php echo $results['category_name'] ?></h5>
                                        <div class="product-price">
                                            $<?php echo $results['products_price'] ?>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                         
                    
                      <?php  }; ?>

                      <?php  }}; ?>
                        
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