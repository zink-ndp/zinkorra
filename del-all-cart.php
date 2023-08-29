<?php
    require 'connect.php';
    $sql = "delete from cart_detail where CTM_ID = {$_SESSION['id']}";
    $conn->query($sql);
    header('Location: cart-page.php');
?>