<?php
include("includes/header.php");
add_cart();
?>
<?php
if(isset($_GET['pro_id'])) {
    $product_id = $_GET['pro_id'];
    $get_product = "select * from products where product_id='$product_id'";
    $run_product = mysqli_query($conn, $get_product);
    while ( $row_product = mysqli_fetch_array($run_product)){
        $p_cat_id = $row_product['p_cat_id'];
        $pro_title = $row_product['product_title'];
        $retail_price = $row_product['mrp'];
        $pro_price =$row_product['product_price'];
        $pro_desc = $row_product['product_desc'];
        $pro_img = $row_product['product_img1'];
        $seller = $row_product['seller_name'];



        echo "
            
<form action='' method='post'>
<section id='product' class='py-3'>
    <div class='container'>
        <div class='row py-4'>
            <div class='col-sm-6'>
                <img src='images/$pro_img'   alt='product' class='img-fluid'>
                <div class='form-row pt-4 font-size-16'>
                    <div class='col'>
                        <button type='submit' class='btn btn-danger form-control'>Proceed to buy</button>

                    </div>
                    <div class='col'>
                        <button type='submit' name='add_cart' class='btn btn-warning form-control i fa fa-shopping-cart'>Add to
                            Cart</button>
                    </div>
                </div>
            </div>
            <div class='col-sm-6'>
                <h5 class='font-size-20'> $pro_title</h5>
                <small>by $seller</small>
                <div class='d-flex'>
                    <div class='rating text-warning font-size-12'>
                        <span> <i class='fa fa-star'></i> </span>
                        <span> <i class='fa fa-star'></i> </span>
                        <span> <i class='fa fa-star'></i> </span>
                        <span> <i class='fa fa-star'></i> </span>
                        <span> <i class='fa fa-star'></i> </span>
                    </div>
                    <a href='#' class='px-2'>209 ratings </a>
</div>
                <hr style='height:0.5px;background-color:#333;'>

                <table class='my-3'>
                 <tr class='font-size-14'>
                        <td>Deal Price:</td>
                        <td class='font-size-20 '>Ksh <span>$pro_price </span></td>

                    </tr>
                    <tr class='font-size-14'>
                        <td>M.R.P:</td>
                        <td><strike>Ksh. $retail_price</strike></td>
                    </tr>
                   
                </table>

                <div id='policy'>
                    <div class='d-flex'>
                        <div class='return text-center mr-5'>
                            <div class='font-size-20 my-2'>
                                <span class='fa fa-retweet border p-4 rounded-pill'></span>
                            </div>
                            <a href='#' class='font-size-12'> 10 Days <br> Replacement</a>
                        </div>
                        <div class='return text-center mr-5'>
                            <div class='font-size-20 my-2'>
                                <span class='fa fa-truck border p-4 rounded-pill'></span>
                            </div>
                            <a href='#' class='font-size-12'> Jambo <br> Deliveries </a>
                        </div>
                        <div class='return text-center mr-5'>
                            <div class='font-size-20 my-2'>
                                <span class='fa fa-check-double border p-4 rounded-pill'></span>
                            </div>
                            <a href='#' class='font-size-12'> 1 Year <br> Warranty</a>
                        </div>
                    </div>
                </div>
                <hr style='height:0.5px;background-color:#333;'>
                <div class='flex-column text-dark' id='order-details'>
                    <small>Delivery by Dec 10 - Dec 12</small> <br>
                    <small>Sold by: $seller</small>
                </div>
            </div>
            <div class='col-12'>
                <h6> Product Description</h6>
                <hr>
             $pro_desc  

            </div>
        </div>
    </div>
</section>
</form>
";

    }


}

?>


<?php
    include("includes/footer.php");
    ?>