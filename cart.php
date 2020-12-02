<?php

include("includes/header.php")
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div style="display: <?php if(isset($_SESSION['showAlert'])) {echo $_SESSION['showAlert'];} else {echo 'none';} unset($_SESSION['showAlert']) ?>" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php if(isset($_SESSION['message'])) {echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-stripped text-center">
                    <thead>

                    <tr>
                        <td colspan="7">
                            <h4 class="text-center text-info m-0"> Products in your Cart!</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>
                            <a href="action.php?clear=all" class="badge-danger badge p-2" onclick="return confirm(('Are you sure you want to clear the cart'))"> <i class="fa fa-trash"></i>&nbsp;Clear Cart</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                   // require 'functions/functions.php';
                    $stmt = $db->prepare("select * from cart");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $grand_total=0;
                    while ($row = $result->fetch_assoc()):

                    ?>
                    <tr>
                        <td><?= $row['pid'] ?></td>
                        <input type="hidden" class="pid" value="<?= $row['pid'] ?>">
                        <?php
                        echo ' <td><img width="50px" class="img-fluid " src="images/'.$row['pimage'].'" alt="product image"></td>';
                        ?>
                        <td style="width: auto;"><?= $row['pname'] ?></td>

                        <td> Ksh <?=  number_format( $row['pprice'],2 )?></td>
                        <input type="hidden" class="pprice" value="<?=$row['pprice']?>">
                        <td><input type="number" class="form-control itemQty" style="width: 75px;" min="1" value="<?= $row['qty']?>"></td>
                        <td> Ksh <?=  number_format( $row['total_price'],2 )?></td>
                        <td>
                            <a href="action.php?remove=<?= $row['pid']?>" class="text-danger lead" onclick="return confirm('Are you sure you want to remove this item?');"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                        <?php $grand_total +=$row['total_price']; ?>
                    <?php endwhile; ?>
                    <tr>
                        <td colspan="3">
                            <a href="shop.php" class="btn btn-success"> Continue Shopping</a>
                        </td>
                        <td colspan="2"> <strong>Grand Total</strong> </td>
                        <td> Ksh. <strong><?= number_format($grand_total)?> </strong> </td>
                        <td>
                            <a href="checkout.php" class="btn btn-info <?= ($grand_total>1)?"":"disabled"?>"> <i class="fa fa-credit-card"></i> &nbsp; Checkout</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(function() {
        $(".itemQty").on('change',function () {
            let $el = $(this).closest('tr');

            let pid = $el.find(".pid").val();
            let pprice = $el.find(".pprice").val();
            let qty = $el.find(".itemQty").val();
           // console.log(qty);
            location.reload();

            $.ajax({
                url:'action.php',
                method:'post',
                cache:false,
                data:{qty:qty,pid:pid,pprice:pprice},
                success: function (response) {
                    console.log(response);

                }

            });

        });
        // load_cart_item_number();
        //
        // function load_cart_item_number(){
        //     $.ajax({
        //         url:'action.php',
        //         method:'get',
        //         data: {cartItem:"cart_item"},
        //         success:function (response){
        //             $("#cart-item").html(response);
        //         }
        //
        //     });
        // }

    });



</script>
<?php
include("includes/footer.php");
?>

