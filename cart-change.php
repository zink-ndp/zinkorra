<?php
    require 'connect.php';
    $pdid = $_POST['pdid'];
    $action = $_POST['action'];
    
    if ($action == 'check'){
        $act = 1;
    } else $act = 0;

    querySql($conn,"update table cart_detail set PD_isChecked = $act where PD_ID = $pdid");

    echo $pdid." ".$action;

    // header('Location: cart-page.php');

?>