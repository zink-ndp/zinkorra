<?php
    require 'connect.php';

    $pid = $_GET['pdid'];

    $sql = "delete from cart_detail where CTM_ID = {$_SESSION['id']} and PD_ID = $pid";

    if($conn->query($sql) == true){
        $_SESSION['message'] = "Đã xoá sản phẩm";
        header('Refresh: 0;url=cart-page.php?popup=1');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>