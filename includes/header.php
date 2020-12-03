<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/eshop/includes/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/eshop/functions/functions.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Jambo</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500;600&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand">JamboShop</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <form method="POST" class="navbar-form navbar-left" action="search.php">
                        <div class="input-group">
                            <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
                            <span class="input-group-btn" id="searchBtn" style="display:none;">
                                <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
                            </span>
                        </div>
                    </form>
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="shop.php" class="nav-link">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link">Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php" class="nav-link">
                            <i id="cart-item" class="fa fa-shopping-cart fa-8x"></i>
                            <span><?php items(); ?> </span>
                        </a>
                    </li>
                </ul>
                <?php if (!isset($_SESSION['username']))
                   
                    echo "<a href='login.php' <button type='button' class='btn btn-warning btn-sm'></button>Login</a>";  ?>

                <?php if (isset($_SESSION['username']))
                {

                    echo '<li class="nav-link"><a href="#">'.$_SESSION['username'].'</a></li>';
                    if (isset($_SESSION['role']))
                    {
                        echo "<a href='insert_product.php' <button type='button' style='margin-right: 15px' class='btn btn-primary btn-sm'></button>Add Product</a>";
                    }
                    echo "<a href='logout.php' <button type='button' class='btn btn-danger btn-sm'></button>Logout</a>"; 

                }
                ?>
            </div>
        </div>
    </nav>

