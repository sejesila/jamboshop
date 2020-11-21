<?php
include("includes/header.php")
?>

<section class="py-3" id="cart">
    <div class="container-fluid w-75">
        <h5 class="font-size-20">Shopping Cart</h5>
        <div class="row">
            <div class="col-sm-8">
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="images/2.jpg" alt="cart1" height="220px" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-size-20"> HP Probook</h5>
                        <small>by Hewlett-Packard</small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star-half-full"></i></span>
                            </div>
                            <a href="#" class="px-2 font-size-14">20,304 ratings</a>
                        </div>
                        <div class="qty d-flex pt-2">
                        <div class="d-flex w-25">
                        <button class="qty-up border bg-light"><i class="fa fa-angle-up"></i></button>
                        <input type="text" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                        <button class="qty-down border bg-light"><i class="fa fa-angle-down"></i></button>                 
                        </div>
                        <button class="btn text-danger px-3 border-right">Delete</button>
                        <button class="btn text-primary ">Save for later</button>
                        </div>


                    </div>
                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger">
                            Ksh <span class="product_price">43,500</span>
                        </div>
                    </div>
                </div>
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="images/hp1.jpg" alt="cart1" height="220px" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-size-20"> HP Notebook</h5>
                        <small>by Hewlett-Packard</small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star-half-full"></i></span>
                            </div>
                            <a href="#" class="px-2 font-size-14">1,004 ratings</a>
                        </div>
                        <div class="qty d-flex pt-2">
                        <div class="d-flex w-25">
                        <button class="qty-up border bg-light"><i class="fa fa-angle-up"></i></button>
                        <input type="text" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                        <button class="qty-down border bg-light"><i class="fa fa-angle-down"></i></button>                 
                        </div>
                        <button class="btn text-danger px-3 border-right">Delete</button>
                        <button class="btn text-warning ">Save for later</button>
                        </div>


                    </div>
                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger">
                            Ksh <span class="product_price">43,500</span>
                        </div>
                    </div>
                </div>
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="images/1.jpg" alt="cart1" height="220px" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-size-20"> Dell Insipron</h5>
                        <small>by Hewlett-Packard</small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star-half-full"></i></span>
                            </div>
                            <a href="#" class="px-2 font-size-14">20,304 ratings</a>
                        </div>
                        <div class="qty d-flex pt-2">
                        <div class="d-flex w-25">
                        <button class="qty-up border bg-light"><i class="fa fa-angle-up"></i></button>
                        <input type="text" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                        <button class="qty-down border bg-light"><i class="fa fa-angle-down"></i></button>                 
                        </div>
                        <button class="btn text-danger px-3 border-right">Delete</button>
                        <button class="btn text-warning ">Save for later</button>
                        </div>
                    </div>
                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger">
                            Ksh <span class="product_price">43,500</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 pl-6">
                <div class="sub-total border text-center mt-2">
                    <small class="text-success py-3"><i class=" p-2 fa fa-check">Your order is eligible for FREE delivery</i></small>
                    <div class="border-top py-4">
                       <small>Total (3 items):&nbsp;<span class="text-danger">Ksh <span class="text-danger"> <?php total_price() ?></span></span></small>
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