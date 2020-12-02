<?php

include("includes/header.php");

$grand_total = 0;
$total_items = "";
$items=array();

$sql = "select concat(pname,'(',qty,')') as ItemQty, total_price from cart";

$stmt = $db->prepare($sql);
//$stmt->bind_param("i",$pid);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc())
{
    $grand_total+=$row['total_price'];
    $items[]= $row['ItemQty'];

}

$total_items = implode(",",$items);
///echo $total_items;
?>

<div class="container" style="background-color: goldenrod">
    <div class="row justify-content-center">
        <div class="col-lg-6 px-4 pb-4" id="order">
            <h4 class="text-center text-info p-2"> Complete your order!</h4>
            <div class="jumbotron p-3 mb-4 text-center">
                <h6><b> Products(s) : </b><?= $total_items;?></h6>
                <h6><b>Delivery Charge : </b>Free</h6>
                <h5><b>Amount Payable : </b> <?= number_format($grand_total,2)?>/-</h5>
            </div>
            <form action="" method="post" id="placeOrder">
                <input type="hidden" name="products" value="<?= $total_items;?>">
                <input type="hidden" name="grand_total" value="<?= $grand_total?>">
                <div class="form-group">
                    <input type="text" name="name" required class="form-control m-2" placeholder="Enter Name">
                    <input type="email" name="email" required class="form-control m-2" placeholder="Enter Email">
                    <input type="tel" name="phone" required class="form-control m-2" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <textarea name="address" required id="" cols="55" placeholder="Enter Delivery Address here.." rows="5"></textarea>
                </div>
                <h6 class="text-center">Select Payment Mode</h6>
                <div class="form-group">
                    <select name="pmode" required class="form-control" id="">
                        <option value="" selected disabled>Select Payment Mode</option>
                        <option value="M-Pesa">M-Pesa</option>
                        <option value="Cash On Delivery">Cash on Delivery</option>
                        <option value="Bank Transfer">Bank Transfer</option>

                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Place Order" class="btn btn-info btn-block">

                </div>
            </form>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(function() {
        $("#placeOrder").submit(function (e) {
            e.preventDefault();

            $.ajax({
                url:'action.php',
                method:'post',
                data:$('form').serialize()+"&action=order",
                success:function (response) {
                    $("#order").html(response);

                }
            });
            
        });


    });



</script>
<?php
include("includes/footer.php");
?>
