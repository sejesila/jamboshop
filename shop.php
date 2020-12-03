<?php
include("includes/header.php");

include($_SERVER['DOCUMENT_ROOT'] . '/eshop/includes/db.php');

?>
    <div id="container">

        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Shop
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <?php
                if (!isset($_GET['p_cat'])) {
                    echo "
                  <div class='box'>
                 <h1>Shop with Us</h1>
                 <p>Buy everything what you need on our website. Biggest choice near You. 100% Free Classified. Post free Ads and get Buyers. <br> Jambo -Buy Smarter! Buy anything, anytime. Easy Registration. </p>
                 </div>";
                }
                ?>
                <div class="row text-center">
                    <?php
                    if (!isset($_GET['p_cat'])) {
                        $per_page = 6;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }

                       $start_from = ($page - 1) * $per_page;
                        $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page ";
                        $run_products = mysqli_query($conn, $get_products);
                        while ($row_products = mysqli_fetch_array($run_products)) {
                            $pro_id = $row_products['product_id'];
                            $pro_title = $row_products['product_title'];
                            $pro_price = $row_products['product_price'];
                            $pro_img1 = $row_products['product_img1'];

                            echo "
                            <div class='card' style='width:250px' >
                            <div class='product' >
                    
                             <a href='details.php?pro_id=$pro_id'>
                              <img id='images' height='100px'  src='images/$pro_img1' alt='product image'>
                             </a>
                             
                            
                             <div class='text-center'>
                              <h6>
                               <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                               </h6>
                                <div  class='price p-2'<div/>
                                <span>  Ksh $pro_price</span>
                                
                                <p class='button'>
                                
                                  <a class='btn btn-sm btn-warning ' href='details.php?pro_id=$pro_id'>
                                  View Details
                                    </a>
                                  <a class='btn btn-sm btn-primary' href='details.php?pro_id=$pro_id'>
                                  
                                  <i class='fa fa-shopping-cart'> </i>  Add To Cart
                                  </a>
                                </p>
                                </div>
                             </div>
                            </div>
                            </div>
                            ";
                        }

                    ?>

                </div>

                <ul class="pagination justify-content-center pagination-md">
                <?php
                            $query = "select * from products";
                            $result = mysqli_query($conn, $query);
                            $total_records = mysqli_num_rows($result);
                            $total_pages = ceil($total_records / $per_page);

                            echo "
                                 <li class='page-item'> 
                                 <a class='page-link' href='shop.php?page=1'> " . 'First Page' . "</a>
                                 </li>
                            ";

                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "
                                    <li class='page-item'> 
                                    <a class='page-link' href='shop.php?page=" . $i . "'> " . $i . "</a>
                                    </li>
                                ";
                            };
                            echo "
                                <li class='page-item'> 
                                <a class='page-link' href='shop.php?page=$total_pages'> " . 'Last Page' . "</a>
                                </li>
                            ";
                       }

               ?>
                </ul>

                <?php
                            getpcatpro();
                          ?>

            </div>
        </div>
    </div>
