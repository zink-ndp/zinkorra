<?php
    require 'connect.php';
    querySql($conn,"delete from cart_detail where CTM_ID = {$_SESSION['id']}");
    $_SESSION['message'] = "Xoá thành công";
    header('Location: cart-page.php?popup=1');
?>