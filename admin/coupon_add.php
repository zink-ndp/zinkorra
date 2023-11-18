<?php

    require '../connect.php';

    $code = $_GET['code'];
    $tile = $_GET['tile'];
    $startd = $_GET['startd'];
    $endd = $_GET['endd'];

    querySql($conn, "insert into sale values ('$code',$tile,'$startd','$endd')");

    $_SESSION['message'] = "Thêm khuyến mãi thành công";
    header('Location: coupon.php?popup=1');

?>