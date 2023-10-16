<?php

    require '../connect.php';

    $pdid = $_POST['id'];

    $itr = $_POST['interior'];
    $ty = $_POST['type'];
    $name = $_POST['name'];
    $des = $_POST['des'];
    $price = $_POST['price'];
    $quant = $_POST['quant'];
    $file = $_FILES["imgProduct"];

    if ($file['name']!=""){
        $filename = $file['name'];
        $img = uploadImage($file, $filename, "../images/products/", $pdid.'.png');
        $sql = "update products set 
                ITR_ID = $itr,
                TY_ID = $ty,
                PD_NAME = '$name',
                PD_PRICE = $price,
                PD_DESCRI = '$des',
                PD_PIC = '$img',
                PD_QUANT = $quant";
    } else {
        $sql = "update products set 
                ITR_ID = $itr,
                TY_ID = $ty,
                PD_NAME = '$name',
                PD_PRICE = $price,
                PD_DESCRI = '$des',
                PD_QUANT = $quant";
    }

    $sql .= " where PD_ID = $pdid";

    querySql($conn, $sql);

    header('Location: product_all.php');

?>