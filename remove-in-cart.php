<?php
    require 'connect.php';

    $pid = $_GET['pdid'];

    $sql = "delete from cart_detail where CTM_ID = {$_SESSION['id']} and PD_ID = $pid";

    if($conn->query($sql) == true){
        echo "<script type='text/javascript'>alert('Xoá sản phẩm khỏi giỏ hàng thành công');</script>";
        header('Refresh: 0;url=cart-page.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>