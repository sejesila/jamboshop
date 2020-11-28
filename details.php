<?php
include("includes/header.php");

?>

<?php
if (isset($_GET['pro_id'])) {
    $product_id = $_GET['pro_id'];
    $get_product = "select * from products where product_id='$product_id'";
    $run_product = mysqli_query($conn, $get_product);
    while ($row_product = mysqli_fetch_array($run_product)) {
        $p_cat_id = $row_product['p_cat_id'];
        $pro_title = $row_product['product_title'];
        $retail_price = $row_product['mrp'];
        $pro_price = $row_product['product_price'];
        $pro_desc = $row_product['product_desc'];
        $pro_img = $row_product['product_img1'];
        $seller = $row_product['seller_name'];

        echo "
        
            
<form class='form-submit' action='' method='post'>
<section id='product' class='py-3'>
    <div class='container'>
         <div id='message'></div>
            <div class='row py-4'>
                 <div class='col-sm-6'>
                    <img src='images/$pro_img'   alt='product' class='img-fluid'>
                    <div class='form-row pt-4 font-size-16'>
                        <div class='col-sm-4'>
                            <button type='submit' class='btn btn-danger form-control'>Proceed to buy</button>

                        </div>
                    <div>
                    <form action='' class='form-submit'>
                        <input type='hidden' class='pid' value='$product_id'>
                        <input type='hidden' class='pname' value='$pro_title'>
                        <input type='hidden' class='pprice' value='$pro_price'>
                        <input type='hidden' class='pimage' value='$pro_img'>
                        <button  class='btn btn-info form-control i fa fa-shopping-cart addItemBtn'>Add to Cart</button>
                
                        
                    </form>
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
<script>
    $(function() {
        $(".addItemBtn").click(function(e) {
            e.preventDefault();
            let $form = $(this).closest(".form-submit");
            let pid = $form.find(".pid").val();
            let pname = $form.find(".pname").val();
            let pprice = $form.find(".pprice").val();
            let pimage = $form.find(".pimage").val();

            $.ajax({
                url: 'action.php',
                method: 'post',
                data: {
                    pid: pid,
                    pname: pname,
                    pprice: pprice,
                    pimage: pimage
                },

                success: function(response) {
                    $("#message").html(response);
                }

            });

        });


    });
</script>


<?php
include("includes/footer.php");
?>