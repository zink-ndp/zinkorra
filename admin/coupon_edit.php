<?php

    require '../connect.php';

    $code = $_GET['code'];
    $tile = $_GET['tile'];
    $nbd = $_GET['startd'];
    $nkt = $_GET['endd'];

    querySql($conn, "update sale set SL_PERCENT=$tile, SL_START_DATE='$nbd', SL_END_DATE='$nkt' where SL_CODE = '$code'");

    $_SESSION['message'] = "Cập nhật thành công!";

    header('Location: coupon.php?popup=1');

?>