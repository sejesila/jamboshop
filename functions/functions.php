<?php
 
    $db = mysqli_connect("localhost","root","","ecom_store");



    function add_cart(){ //not working
        global $db;
       if (isset($_GET['add_cart'])){
            $p_id = $_GET['add_cart'];
           //$product_qty = $_POST['qty'];
//          $product_size = $_POST['product_size'];
            $check_product = "select * from cart where p_id='$p_id'";
            $run_check = mysqli_query($db,$check_product);
            if (mysqli_num_rows($run_check) > 0){
                echo "<script> alert('This product has already been added to cart')</script>";
                echo "<script> window.open('details.php?pro_id=$p_id','_self')</script>";
            } else{
                // Prepare an insert statement
                $insert = "INSERT INTO cart (p_id) VALUES ( ?)";
                if($stmt = mysqli_prepare($db,$insert)){
                    mysqli_stmt_bind_param($stmt,"s",$p_id);
                    //Set Parameters
                    $p_id = $_REQUEST['p_id'];
                   // $product_qty=$_REQUEST['qty'];
                    if(mysqli_stmt_execute($stmt)){
                        echo "Product added to cart.";
                    }
                    else{
                        echo "Could not execute the query: $insert".mysqli_error($db);
                    }
                }
                else{
                    echo "Could not prepare the query: $insert".mysqli_error($db);
                }
//                $query = "insert into cart (p_id,qty) values ('$p_id','$product_qty')";
//                $run_query = mysqli_query($db,$query);
//                if($run_query){
//                    echo "<script> window.open('details.php?pro_id=$p_id','_self') </script>";
//                }else{
//                    echo "error occurred";
//                }

            }

       }
    }
    function details(){
        global $db;

    }
    function items(){
    global $db;
//    $ip_add = getRealIpUser();
    $get_items = "select * from cart ";
    $run_items = mysqli_query($db,$get_items);
    $count_items = mysqli_num_rows($run_items);
    echo $count_items;

    }
    function total_price(){
    global $db;
    $total = 0;
    $select_cart = "select * from cart ";
    $run_cart = mysqli_query($db,$select_cart);
    while ($record=mysqli_fetch_array($run_cart)){
        $pro_id = $record['pid'];
        $pro_qty =$record['qty'];
        $get_price = "select * from products where product_id='$pro_id' ";
        $run_price = mysqli_query($db,$get_price);
        while ($row_price =mysqli_fetch_array($run_price)){
            $sub_total = $row_price['product_price'] * $pro_qty;
            $total += $sub_total;

        }
    }
    echo "".$total;
    }
    function getPCats(){
        global $db;
        $get_p_cats = "select * from products_categories";
        $run_p_cats = mysqli_query($db,$get_p_cats);
        while ($row_p_cats = mysqli_fetch_array($run_p_cats)){
            $p_cat_id = $row_p_cats['p_cat_id'];
            $p_cat_title = $row_p_cats['p_cat_title'];
            echo "
            <li>
            <a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a>
            </li>
            ";
        }
    }
    function getPro(){
        global $db;
        $get_products = "select * from products order by 1 DESC LIMIT 0,8";
        $run_products = mysqli_query($db,$get_products);
        while ($row_products= mysqli_fetch_array($run_products)){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];
        }
    }
    function getpcatpro(){
        global $db;
        if(isset($_GET['p_cat'])){
            $p_cat_id = $_GET['p_cat'];
            $get_p_cat = "select * from products_categories where p_cat_id='$p_cat_id'";
            $run_p_cat = mysqli_query($db,$get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['p_cat_title'];
            $p_cat_desc = $row_p_cat['p_cat_desc'];

            $get_products = "select * from products where p_cat_id='$p_cat_id'";
            $run_products = mysqli_query($db,$get_products);
            $count = mysqli_num_rows($run_products);
            if($count==0){
                echo "
                <div class='box'>
                <h1> No product found in this categogy</h1>
                </div>
                ";
            } else{
                echo "
                <div class='col-md-9'>
                <div class='box'>
                <h1>$p_cat_title</h1>
                <p> $p_cat_desc </p>
                </div>
                </div>
                ";
            }
            while ($row_products=mysqli_fetch_array($run_products)){
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
                              <i class='fa fa-shopping-cart'></i> Add To Cart
                              </a>
                            </p>
                            </div>
                         </div>
                        </div>
                        </div>
                        ";
            }

        }
    }

?>