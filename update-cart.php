<?php

    require 'connect.php';

    $pdid = $_POST['pdid'];
    $sl = $_POST['pdq'];

    $sql = "update cart_detail set PD_quant = $sl where PD_ID = $pdid";

    $result = $conn->query($sql);

    header('Location: cart-page.php');

?>