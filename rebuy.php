<?php

    require 'connect.php';

    $bid = $_GET['id'];
    $ctmid = $_SESSION['id'];

    querySql($conn,"delete from cart_detail where CTM_ID = $ctmid");

    $result = querySqlwithResult($conn,"select * from bill_detail where B_ID = $bid");
    if ($result->num_rows > 0) {
        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
        foreach ($result_all as $row) {
            querySql($conn,"insert into cart_detail values ($ctmid, {$row['PD_ID']}, {$row['PD_QUANT']})");
        }
    }

    header('Location: cart-page.php');

?>