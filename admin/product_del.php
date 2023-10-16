<?php
    require '../connect.php';
    $pdid = $_GET['id'];
    querySql($conn, 'delete from products where PD_ID = '.$pdid);
    $_SESSION['message'] = "Xoá sản phẩm thành công";
    header('Location: product_all.php?popup=1')
?>