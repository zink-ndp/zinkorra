<?php
    require 'connect.php';
    $sql = "delete from cart_detail where CTM_ID = {$_SESSION['id']}";
    $conn->query($sql);
    $_SESSION['message'] = "Xoá thành công";
    header('Location: cart-page.php?popup=1');
?>