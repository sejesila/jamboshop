<?php
include("includes/header.php")
?>

<section class="py-3" id="cart">
    <div class="container-fluid w-75">
        <h5 class="font-size-20">Shopping Cart</h5>
        <?php
        $select_cart = "select * from cart";
        $run_cart = mysqli_query($conn,$select_cart);
        $count = mysqli_num_rows($run_cart);
        ?>
        <div class="row">
            <div class="col-sm-8">
                <?php
                $total = 0;
                while ($row_cart = mysqli_fetch_array($run_cart)){
                    $pro_id = $row_cart['p_id'];
                    $pro_qty = $row_cart['qty'];
                    $get_products = "select * from products where product_id='$pro_id' ";
                    $run_products = mysqli_query($conn,$get_products);
                    while($row_products = mysqli_fetch_array($run_products)){
                        $pro_title = $row_products['product_title'];
                        $pro_price = $row_products['product_price'];
                        $pro_img1 = $row_products['product_img1'];
                        $sub_total = $row_products['product_price']*$pro_qty;
                        $seller = $row_products['seller_name'];
                        $total +=$sub_total;

                        echo "
                        <div class='row border-top py-3 mt-3'>
                    <div class='col-sm-2'>
                        <img src='images/$pro_img1' alt='cart1' height='220px' class='img-fluid'>
            </div>
            <div class='col-sm-8'>
                <h5 class='font-size-20'> $pro_title </h5>
                <small>by $seller</small>
                <div class='d-flex'>
                    <div class='rating text-warning font-size-12'>
                        <span><i class='fa fa-star'></i></span>
                        <span><i class='fa fa-star'></i></span>
                        <span><i class='fa fa-star'></i></span>
                        <span><i class='fa fa-star'></i></span>
                        <span><i class='fa fa-star-half-full'></i></span>
                    </div>
                    <a href='#' class='px-2 font-size-14'>20,304 ratings</a>
                </div>
                <div class='qty d-flex pt-2'>
               
                    <button class='btn text-danger px-3 border-right'>Delete</button>
                    <button class='btn text-warning'>Save for later</button>
                </div>
            </div>
            <div class='col-sm-2 text-right'>
                <div class='font-size-20 text-danger'>
                    Ksh <span class='product_price'>$pro_price</span>
                </div>
            </div>
        </div>
        
                        ";
                    }
                }
                ?>
    </div>


            <div class="col-sm-4 pl-6">
                <div class="sub-total border text-center mt-2">
                    <small class="text-success py-3"><i class=" p-2 fa fa-check">Your order is eligible for FREE
                            delivery</i></small>
                    <div class="border-top py-4">
                        <h6>Total: <?php items()?> items :&nbsp;<span class="text-secondary">Ksh <span
                                    class="text-secondary"> <?php total_price() ?></span>
                        </h6>
                        <button class="btn btn-warning mt-3">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php
include("includes/footer.php");
?>