<?php

    require 'connect.php';

    $bid = $_GET['bid'];

    querySql($conn, "update bill set ST_ID=4 where B_ID=$bid");

    $_SESSION['message'] = "Huỷ đơn thành công!";
    header('Location: bill.php?popup=1');

?>