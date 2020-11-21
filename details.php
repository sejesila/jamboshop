<?php
include("includes/header.php")
?>
<section id="product" class="py-3">
  <div class="container">
    <div class="row py-4">
      <div class="col-sm-6">
        <img src="images/1.jpg" alt="product" class="img-fluid">
        <div class="form-row pt-4 font-size-16">
          <div class="col">
            <button type="submit" class="btn btn-danger form-control">Proceed to buy</button>

          </div>
          <div class="col">
          <button type="submit" class="btn btn-warning form-control i fa fa-shopping-cart">de deAdd to Cart</button>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <h5 class="font-size-20">Dell Insipiron</h5>
        <small>by Dell Inc</small>
        <div class="d-flex">
          <div class="rating text-warning font-size-12">
            <span> <i class="fa fa-star"></i> </span>
            <span> <i class="fa fa-star"></i> </span>
            <span> <i class="fa fa-star"></i> </span>
            <span> <i class="fa fa-star"></i> </span>
            <span> <i class="fa fa-star"></i> </span>
          </div>
          <a href="#" class="px-2">209 ratings</a>
        </div>
        <hr style="height:0.5px;background-color:#333;">

        <table class="my-3">
          <tr class="font-size-14">
            <td>M.R.P</td>
            <td><strike>Ksh. 45,000</strike></td>
          </tr>
          <tr class="font-size-14">
            <td>Deal Price:</td>
            <td class="font-size-20 text-danger">Ksh <span>42,700</span></td>

          </tr>
        </table>

        <div id="policy">
          <div class="d-flex">
            <div class="return text-center mr-5">
              <div class="font-size-20 my-2">
                <span class="fa fa-retweet border p-4 rounded-pill"></span>
              </div>
              <a href="#" class="font-size-12"> 10 Days <br> Replacement</a>
            </div>
            <div class="return text-center mr-5">
              <div class="font-size-20 my-2">
                <span class="fa fa-truck border p-4 rounded-pill"></span>
              </div>
              <a href="#" class="font-size-12"> Jambo <br> Deliveries </a>
            </div>
            <div class="return text-center mr-5">
              <div class="font-size-20 my-2">
                <span class="fa fa-check-double border p-4 rounded-pill"></span>
              </div>
              <a href="#" class="font-size-12"> 1 Year <br> Warranty</a>
            </div> 
          </div>
        </div>
        <hr style="height:0.5px;background-color:#333;">
        <div class="flex-column text-dark" id="order-details">
          <small>Delivery by Mar 30 - Apr 2</small> <br>
          <small>Sold by: 254 Computer Tech</small>
        </div>
      </div>
      <div class="col-12">
        <h6> Product Description</h6>
        <hr>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum quidem rem aliquid esse velit mollitia a molestias quibusdam doloribus placeat. Aliquid, recusandae hic ratione quae atque consectetur nesciunt voluptates sapiente. <br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi reiciendis tempore assumenda itaque, recusandae in. Perspiciatis, cumque ratione. Iure porro nemo quidem magnam, libero deserunt maiores rem suscipit voluptatibus! Magni?
      </div>
    </div>
  </div>
</section>
<?php
    include("includes/footer.php");
    ?>