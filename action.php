<?php
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
      $query = $db->prepare("insert into cart (pid,qty,pname,pprice,pimage) values (?,?,?,?,?)");
      $query->bind_param("sisss",$pid,$pqty,$pname,$pprice,$pimage);
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