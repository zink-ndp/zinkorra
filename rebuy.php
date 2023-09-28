<?php

    require 'connect.php';

    $bid = $_GET['id'];
    $ctmid = $_SESSION['id'];

    $sql = "delete from cart_detail where CTM_ID = $ctmid";
    $conn->query($sql);


    $sql = "select * from bill_detail where B_ID = $bid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
        foreach ($result_all as $row) {
            $insert = "insert into cart_detail values ($ctmid, {$row['PD_ID']}, {$row['PD_QUANT']})";
            $conn -> query($insert);
        }
    }

    header('Location: cart-page.php');

?>