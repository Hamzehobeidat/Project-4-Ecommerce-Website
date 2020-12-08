<?php
ob_start();
session_start();
include('connection.php');
include('header.php');
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
                <div class="breadcrumb-text product-more">
                    <a href="./home.php"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.php">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><a href="#myModal" class="btn btn-danger pd-cart" data-toggle="modal">Delete</a></th>
                                <!-- <th><a id="btnEmpty" href="shopping-cart.php?action=empty">Empty Cart</a></th> -->

                                <!-- Modal HTML -->
                                <div id="myModal" class="modal fade">
                                    <div class="modal-dialog modal-confirm">
                                        <div class="modal-content">
                                            <div class="modal-header flex-column">
                                                <div class="icon-box">
                                                    <i class="material-icons">&#xE5CD;</i>
                                                </div>
                                                <h4 class="modal-title w-100">Are you sure?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <p>Do you really want to delete these records? This process cannot be undone.</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" style="background-color:#6A737B;" data-dismiss="modal">Cancel</button>
                                                <a style="background-color:#DC3545;" href="shopping-cart.php?action=empty" class="btn btn-danger pd-cart">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <!-- <td class="close-td first-row">
                                    <a href="shopping-cart.php?action=empty" class="btn btn-danger pd-cart">Delete</a>
                                </td> -->


                                <?php
                                if (isset($_SESSION["cart_item"])) {
                                    $total_quantity = 0;
                                    $total_price = 0;
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    foreach ($_SESSION["cart_item"] as $item) {
                                        $item_price = $item["quantity"] * $item["price"];
                            ?>
                                <tr>
                                    <td class="cart-pic first-row"><img src="<?php echo "admin/" . $item["image"]; ?>" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5 style="text-align: center;"><?php echo $item["name"]; ?></h5>
                                    </td>
                                    <td class="p-price first-row">$<?php echo $item["price"]; ?></td>
                                    <td class="p-price first-row"><?php echo $item["quantity"]; ?></td>
                                    <!-- <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td> -->
                                    <td class="total-price first-row">$<?php echo  number_format($item_price, 2); ?></td>
                                    <!-- <td class="close-td first-row"><i class="ti-close"></i></td> -->

                                    <td class="close-td first-row">
                                        <a href="shopping-cart.php?action=remove&name=<?php echo $item["name"]; ?>" class="primary-btn pd-cart"><i class="ti-close"></i></a></td>
                                </tr>

                            <?php
                                        $total_quantity += $item["quantity"];
                                        $total_price += ($item["price"] * $item["quantity"]);
                                    }
                            ?> <?php
                                } else {
                                ?> 
                            <div class="alert alert-warning alert-dismissible fade show col-md-4">
                                <strong></strong> Your Cart is Empty .
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        <?php
                                }
                        ?>


                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                            <a href="#" class="primary-btn up-cart">Update cart</a>
                        </div>
                        <div class="discount-coupon">
                            <h6>Discount Codes</h6>
                            <form action="#" class="coupon-form">
                                <input type="text" placeholder="Enter your codes">
                                <button type="submit" class="site-btn coupon-btn">Apply</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Total Quantity <span><?php
                                                                            if (!isset($total_quantity)) {
                                                                                $total_quantity = null;
                                                                            }
                                                                            echo $total_quantity; ?></span></li>
                                <li class="cart-total">Total Price<span>$<?php
                                                                            if (!isset($total_price)) {
                                                                                $total_price = null;
                                                                            }
                                                                            echo  number_format($total_price, 2); ?></span></li>
                            </ul>
                            <a href="check-out.php" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shopping Cart Section End -->

<!-- Partner Logo Section Begin -->
<?php
include('footer.php');
?>