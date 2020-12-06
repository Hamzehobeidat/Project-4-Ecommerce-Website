<?php
session_start();
include('connection.php');
include('header.php');

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
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $total=0;
                        // $total_2=0;
                        if (isset($_SESSION['cart'])) {
                            
                            foreach ($_SESSION['cart'] as $key => $value) {
                            
                            // $total_1 = $total_1 + ($value["item_price"]); 

                            // $total_2 = $total_2+ ($value["quantity"] * $value["item_price"]);  

                            ?>
                            <tr>
                                <td class="cart-pic first-row"><img src="<?php echo $value['image'] ?>" alt=""></td>
                                <td class="cart-title first-row">
                                    <h5><?php echo $value['item_name'] ?></h5>
                                </td>
                                <td class="p-price first-row">$<?php echo  $value["quantity"] * $value["item_price"]?></td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="<?php echo $value["quantity"]  ?>">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row">$<?php echo    ($value["quantity"] * $value["item_price"]); ?></td>
                                <!-- <td class="close-td first-row"><i class="ti-close"></i></td> -->

                               

                                <td>
                                <form action="removecart.php" method="POST">
                                    <button class="btn btn-sm btn-outline-danger" name="remove">Remove</button>
                                    <input type="hidden" name="item_name" value="<?php echo $value['item_name'] ?>">
                                </form>
                                </td>
                               
                                
                            </tr>
                            <?php 
                            
                            $total = $total + ($value["quantity"] * $value["item_price"]);
                        }
                            
                        }  ?>


                          
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>$<?php echo $total?></span></li>
                                    <li class="cart-total">Total <span>$<?php echo $total ?></span></li>
                                </ul>
                                <a href="check-out.php" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
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