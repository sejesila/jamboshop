<?php
session_start();
require 'functions/functions.php';

if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pqty = 1;

    $stmt = $db->prepare("SELECT pid from cart where pid=?");
    $stmt->bind_param("i",$pid);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = $r['pid'];

    if(!$code){
      $query = $db->prepare("insert into cart (pid,qty,pname,pprice,pimage,total_price) values (?,?,?,?,?,?)");
      $query->bind_param("sissss",$pid,$pqty,$pname,$pprice,$pimage,$pprice);
      $query->execute();
      echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Item added to your cart!</strong> 
            </div>';

    } else{
        echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Item already added to your cart!</strong> 
            </div>';


    }




}
if(isset($_GET['remove'])){
    $id = $_GET['remove'];

    $stmt = $db->prepare("delete from cart where pid = ?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] =  'Item removed from the cart!';
    header('location:cart.php');
}
if(isset($_GET['clear'])){
    $stmt = $db->prepare("delete from cart");
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] =  'All items removed from the cart!';
    header('location:cart.php');

}
if(isset($_POST['qty'])){
    $qty= $_POST['qty'];
    $pid= $_POST['pid'];
    $pprice= $_POST['pprice'];

    $tprice = $qty * $pprice;

    $stmt= $db->prepare("update cart set qty =?, total_price=? where pid=?");
    $stmt->bind_param("isi",$qty,$tprice,$pid);
    $stmt->execute();
}

if(isset($_POST['action']) && isset($_POST['action']) == 'order'){

    $name = $_POST['name'];
    $email =$_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];

    $data = '';
    $stmt = $db->prepare("insert into orders (name,email,phone,address,pmode,products,amount_paid) values (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss",$name,$email,$phone,$address,$pmode,$products,$grand_total);
    $stmt->execute();
//
//    $pdf = new FPDF();
//    $pdf ->AddPage();
//    $pdf->SetTitle("Jambo eshop: Order Receipt");
//    $pdf->SetFont('Arial', 'B',15);
//    $pdf ->Cell(10,10,"Jambo eshop: Order Receipt",1,1,"C");
//    $pdf->Output();
  $data .=

       '<div class="text-center">
                        <h1 class="display-4 mt-2 text-danger">Thank You</h1>
                        <h2 class="text-success">Your Order Placed Successfully!</h2>
                        <h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$products.'</h4>
                        <h4> Your name: '.$name.'</h4>
                        <h4> Your email: '.$email.'</h4>
                        <h4> Your phone: '.$phone.'</h4>
                        <h4> Total Amount Paid: '.number_format($grand_total,2).'</h4>
                        <h4> Payment Mode: '.$pmode.'</h4>

                       <form action="pdf_gen.php" method="post">
                        <input type="submit" name="btn_pdf" class="btn btn-info" value="Print Order Report">
                    </form>

            </div>';

    echo $data;


}
