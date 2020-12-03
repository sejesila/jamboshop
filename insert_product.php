<?php
include("includes/header.php")
?>

<div class="container">
    <h1 class="text-center">Insert Products</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="" class="col-md-3">Product Title</label>
            <div class="col-md-6">
                <input type="text" name="product_title" placeholder="Product Title" required class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-3">Product Category</label>
            <div class="col-md-6">
                <select name="product_cat" id="" class="form-control">
                    <option value="" selected disabled>Select Product Category</option>
                    <?php
                    $get_p_cats = "select * from products_categories";
                    $run_p_cats = mysqli_query($conn, $get_p_cats);
                    while ($row_p_cats = mysqli_fetch_array($run_p_cats,)) {
                        $p_cat_id = $row_p_cats['p_cat_id'];
                        $p_cat_title = $row_p_cats['p_cat_title'];

                        echo "
                                        <option value='$p_cat_id'> $p_cat_title</option>
                                        ";
                    }
                    ?>

                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 control-label">Product Image 1</label>
            <div class="col-md-6">
                <input type="file" name="product_img1" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 control-label">Product Image 2</label>
            <div class="col-md-6">
                <input type="file" name="product_img2" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 control-label">Product Image 3</label>
            <div class="col-md-6">
                <input type="file" name="product_img3" class="form-control">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-3 control-label">Initial Price</label>
            <div class="col-md-6">
                <input type="text" name="initial_price" class="form-control" placeholder="Initial Price" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 control-label">Current Price</label>
            <div class="col-md-6">
                <input type="text" name="product_price" class="form-control" placeholder="Product Price" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 control-label">Product Keywords</label>
            <div class="col-md-6">
                <input type="text" name="product_keywords" class="form-control" placeholder="Keywords" required>
            </div>

        </div>
        <div class="form-group row">
            <label for="" class="col-md-3"> Product Description</label>
            <div class="col-md-6">
                <textarea name="product_desc" cols="20" rows="6" placeholder="Product Description" required
                    class="form-control"> </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 control-label"></label>

            <div class="col-md-6">
                <input type="submit" value="Insert Product" name="submit" class="btn btn-primary form-control">
            </div>
        </div>

    </form>

</div>

<?php
if (isset($_POST['submit'])) {
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $initial_price = $_POST['initial_price'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1, "images/$product_img1");
    move_uploaded_file($temp_name2, "images/$product_img2");
    move_uploaded_file($temp_name3, "images/$product_img3");

    $add_product = "insert into products 
    (p_cat_id,date,product_title,product_img1,product_img2,product_img3,mrp,product_price,product_keywords,product_desc) values ('$product_cat',NOW(),' $product_title ','$product_img1','$product_img2','$product_img3','$initial_price','$product_price','$product_keywords','$product_desc') ";

    $run_product = mysqli_query($conn, $add_product);
    if ($run_product) {
        echo "<script> alert('Product added successfully') </script>";
        echo "<script> window.open('insert_product.php','_self')</script>";
    } else
        echo "<script> alert('An error occurred') </script>";
}