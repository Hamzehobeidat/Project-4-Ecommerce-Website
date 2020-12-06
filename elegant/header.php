<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Full Dynamic website ">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Get the best offers from the Elegant store in Jordan. Choose your favorite clothes and order them now! Logistics service. Production control.  home delivery at the lowest cost Most popular Types: clothes and accessories women, men and Kids ">
    <meta property="og:description" content="Get the best offers from the Elegant store in Jordan. Choose your favorite clothes and order them now! Logistics service. Production control.  home delivery at the lowest cost Most popular Types: clothes and accessories women, men and Kids ">
    <meta name="keywords" content="Ecommerce  , Ecommerce website, New arrival , Sale,End Year Sale , Christmas, Christmas clothes , Clothes , Accessories , Sweater Burgundy, Copper Watch,  Mens Fashion Watch,Girls Pinafore Dress, Cotton Warm Jacket, Fashion women outfit ,Fashion men outfit, Fashion Kids outfit,baby clothes, Baby boy winter outfits,Kids dress girl   ">
    <meta name="author" content="Mohammad & Hamzeh& Lara , Dania , Tala , Aya ">
    <title>elegant Shop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="apple-touch-icon" sizes="76x76" href="admin/img/apple-icon.png">
    <link rel="icon" type="image/png" href="admin/img/favicon.png">

    <style>
        .typewriter h2 {
            overflow: hidden;
            /* Ensures the content is not revealed until the animation */
            border-right: .15em solid orange;
            /* The typwriter cursor */
            white-space: nowrap;
            /* Keeps the content on a single line */
            margin: 0 auto;
            /* Gives that scrolling effect as the typing happens */
            letter-spacing: .15em;
            /* Adjust as needed */
            animation:

                typing 4.0s steps(80, end),
                blink-caret 0.75s step-end infinite;
            animation-iteration-count: 500;
        }

        /* The typing effect */
        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        /* The typewriter cursor effect */
        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: orange;
            }
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/newlogo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Elegant Shop</button>


                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="submit" name="submit"><i class="ti-search"></i></button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <!-- <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li> -->

                            <?php
                            if (!empty($_SESSION['cart'])) {
                                $qty = count($_SESSION['cart']); ?>
                                <li class="cart-icon">
                                    <a href="shop.php">
                                        <i class="icon_bag_alt"></i>
                                        <span><?php echo $qty ?></span>
                                    </a>

                                <?php } else { ?>
                                <li class="heart-icon">
                                    <a href="#">
                                        <i class="icon_heart_alt"></i>
                                        <span>1</span>
                                    </a>
                                </li>

                            <?php }   ?>

                            <?php if (isset($_SESSION['name'])) { ?>
                                <li class="cart-price" style="color:#E7AB3C;">Welcome <?php echo $_SESSION['name'] ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class=""><a href="./index.php">Home</a></li>
                        <li><a href="#">Category</a>
                            <ul class="dropdown">
                                <?php
                                $query  = "SELECT * FROM category";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <li><a href="category.php?catname=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?>'s</a></li>
                                <?php
                                };
                                ?>
                            </ul>
                        </li>
                        <li><a href="./shop.php">Shop</a></li>
                        <li><a href="./shopping-cart.php">Cart</a></li>
                        <li><a href="./check-out.php">Checkout</a></li>
                        <li><a href="./contact.php">Contact Us</a></li>
                        <li><a href="#">Account</a>
                            <ul class="dropdown">
                                <?php if (!isset($_SESSION['id'])) { ?>
                                    <li><a href="./login.php">Log in</a></li>
                                    <li><a href="./register.php">Register</a></li>
                                <?php } else { ?>
                                    <li><a href="./profile.php">Profile</a></li>
                                    <li><a href="./logout.php">Log out</a></li>

                                <?php } ?>

                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->